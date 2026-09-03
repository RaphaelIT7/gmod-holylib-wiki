<?php
	class Importer {
		private $MySQL;
		private $Parser;

		function getTextBeforeLastSlash($input) {
			$lastSlashPosition = strrpos($input, '/');

			if ($lastSlashPosition !== false)
				return substr($input, 0, $lastSlashPosition);

			return $input;
		}

		// Returns true if it ran a full update
		public function ImportPage($page, $category, $fullUpdate = false, $view_count = 0, $addressOverride = NULL) {
			if (!Filesystem::FileExists($page))
				return false;

			// Enfoce lowercase as out stuff expects it
			if (strtolower($page) != $page)
			{
				rename($page, strtolower($page));
				$page = strtolower($page);
			}

			if (str_ends_with($page, ".deleted"))
			{
				$this->MySQL->DeleteFilePage(str_ireplace(".deleted", ".md", $page));
				return false;
			}

			$isUsingSQLValue = false;
			$lastChanged = Filesystem::GetModifiedTime($page);
			$sqlPage = $this->MySQL->GetFullPageByFile($page);
			if (isset($sqlPage) && $sqlPage['fileTime'] == $lastChanged && !$fullUpdate) { # file wasn't updated
				if (!str_contains($sqlPage['markup'], '<sqlvalue>'))
					return false;

				$isUsingSQLValue = true;
			}

			$fileContents = FileSystem::OpenFile($page);
			$html = $this->Parser->text($fileContents);
			if ($isUsingSQLValue && $html === $sqlPage['html'])
				return;

			$title = FileSystem::GetTitleFromEntry($page);
			$tags = $this->Parser->GetTags($fileContents);
			$address = isset($addressOverride) ? $addressOverride : $this->Parser->PageAddress($page);
			$createdTime = isset($sqlPage) ? $sqlPage['createdTime'] : '';
			$markup = $fileContents;
			$description = $this->Parser->description($fileContents);
			$views = isset($sqlPage) ? $sqlPage['views'] : 0;
			$updated = 'Unknown';
			$revisionId = 0;
			# $category = $category;
			$searchTags = '';
			$fileTime = $lastChanged;
			$filePath = $page;
			$updateCount = isset($sqlPage) ? ($html !== $sqlPage['html'] ? ($sqlPage['updateCount'] + 1) : $sqlPage['updateCount']) : 0; # If were in a fullUpdate, then we only raise the updateCount if our HTML content actually changed.

			$this->MySQL->AddFilePageOrUpdate($title, $tags, $address, $createdTime, $markup, $html, $description, $views, $updated, $revisionId, $category, $searchTags, $fileTime, $filePath, $updateCount);

			#$categoryFilePath = $this->getTextBeforeLastSlash($page) . '/' . $category . ".md";
			#if (!$this->Parser->FileExists($categoryFilePath) || $page == $categoryFilePath)
			# 	return;

			#$this->ImportPage($categoryFilePath, $category, true);

			if (!$fullUpdate && !$isUsingSQLValue)
			{
				# echo 'Making full update! (' . $filePath . ')';
				$this->ImportEverything(true);
				# echo '<p>Triggered full update ' . $filePath . ' (' . (isset($sqlPage) ? 'true' : 'false') . ', ' . $lastChanged . ')';
				return true; 
			}
		}

		private $phpPages = array(
			"Importer.php",
			"index.php",
			"Extension.php",
			"mysql.php",
			"config.php",
			"filesystem.php"
		);
		public function CheckPHP($file)
		{
			$name = str_replace(".php", "", strtolower($file));
			$fileChanged = FileSystem::GetModifiedTime($file);
			if ($fileChanged != $this->MySQL->GetCacheTime($name)) {
				$this->MySQL->SetCachePage($name, '', $fileChanged);
				return true;
			}

			return false;
		}

		/*
		 * BUG: If a file is imported using a wrong filePath, it will create a broken entry.
		 * I'll implement a fix later, when it happens again & annoys me enouth.
		 * 
		 * NOTE: This entire thing is utterly slow, we should minimize filesystem usage.
		 */
		public function ImportEverything($fullUpdate = false) {
			$totalTime = floor(microtime(true) * 1000);

			if (!$fullUpdate) {
				foreach($this->phpPages as &$phpPage) {
					if ($this->CheckPHP($phpPage))
						$fullUpdate = true;
				}
			}

			foreach ($this->Parser->categories as &$category) {
				foreach ($category['categories'] as &$chapter) {
					$path = $this->Parser->config['pages_path'] . $chapter['path'] . '/';
					$files = Filesystem::GetChildren($path);
					foreach ($files as &$page) {
						if (Filesystem::FolderExists($path . $page)) {
							if ($this->ImportPage($path . $page . '/' . $page . '.md', $page, $fullUpdate) && !$fullUpdate)
								break;

							$fullpath = $path . $page;
							$subFiles = Filesystem::GetChildren($fullpath);
							foreach($subFiles as &$subPage) {
								if ($this->ImportPage($fullpath . '/' . $subPage, $page, $fullUpdate) && !$fullUpdate)
									break;
							}
						} else {
							if ($this->ImportPage($path . $page, $chapter['path'], $fullUpdate) && !$fullUpdate)
								break;
						}
					}
				}
			}

			if ($fullUpdate) {
				$this->UpdateSideBar();
				$this->MySQL->SetCachePage('lastupdate', '', time());
			}

			$this->ImportPage($this->Parser->config['pages_path'] . $this->Parser->config['front_page'], '', $fullUpdate, NULL, ''); # We override the address to be ''

			$this->ImportPage($this->Parser->config['pages_path'] . $this->Parser->config['missing_page'], '/missing', $fullUpdate, NULL, NULL);

			$this->ImportPage($this->Parser->config['pages_path'] . $this->Parser->config['cache_page'], '/cache', $fullUpdate, NULL, NULL);

			#if ($fullUpdate)
			#	echo 'Ran full update!';

			//echo 'Took ' . ((floor(microtime(true) * 1000) - $totalTime) / 1000) . "s";
		}

		public function GetFullTitle($sqlPage)
		{
			$address = $sqlPage['address'];

			if ($this->Parser->config['xampp'])
				$address = str_replace('/:', ':', $address); // Apache hates it

			return $address;
		}

		private function GetGroupedPages($path, $parent)
		{
			$groups = array();
			$files = array_diff(scandir($path), array('..', '.', $parent . '.md'));
			foreach ($files as &$page)
			{
				$filePath = $path . '/' . $page;
				$file = Filesystem::OpenFile($filePath);
				if ($file === false)
					continue;

				$group = $this->Parser->GetPageGroup($file);
				if (!isset($group) || trim($group) === '')
					$group = '';

				if (!isset($groups[$group]))
					$groups[$group] = array();

				$groups[$group][] = array(
					'path' => $filePath,
					'file' => $file
				);
			}

			return $groups;
		}

		public function CreateGlobalCategory($category)
		{
			$html = '';
			foreach ($category['categories'] as &$chapter) {
				$html .= '<details class="level1">';

				$basePath = $this->Parser->config['pages_path'] . $category['basePath'] . '/';
				$folders = Filesystem::GetChildren($basePath);

				$count = 0;
				foreach ($folders as &$folder)
				{
					$folderPath = $basePath . $folder . '/' . $chapter['path'];
					$folderFiles = Filesystem::GetChildren($folderPath);
					$count += count($folderFiles);
					//$html .= '<p>' . $folder . '|' . file_exists($folderPath) . '</p>';
				}

				$html .= '<summary><div><i class="mdi ' . $chapter['mdi'] . '"></i>' . $chapter['name'] . ' <span class="child-count">' . $count . '</span></div></summary>';
				$html .= '<ul>';

				foreach ($folders as &$folder)
				{
					$folderPath = $basePath . $folder . '/' . $chapter['path'] . '/';
					$folderFiles = Filesystem::GetChildren($folderPath);

					foreach ($folderFiles as &$page) {
						$html .= '<li>';
						if (FileSystem::FolderExists($folderPath . $page)) {
							$html .= '<details class="level2 cm type e">';
								$html .= '<summary>';
									$sqlPage = $this->MySQL->GetPageForSidebarByFile($folderPath . $page . '/' . $page . '.md');
									if (isset($sqlPage)) {
										$html .= '<a class="' . $sqlPage['tags'] . '" href="/' . $sqlPage['address'] . '" search="' . $this->GetFullTitle($sqlPage)  . '">' . $sqlPage['title'] . '</a>';
									} else {
										$html .= '<p>' . $folderPath . $page . '/' . $page . '.md' . '</p>';
									}
								$html .= '</summary>';
								$html .= '<ul>';
									$fullpath = $folderPath . $page;
									$groups = $this->GetGroupedPages($fullpath, $page);
									foreach ($groups as $group => &$groupPages) {
										if ($group !== '') {
											$html .= '<li>';
											$html .= '<details class="level3">';
											$html .= '<summary>' . $page . ' (' . $group . ')</summary>';
											$html .= '<ul>';
										}

										foreach ($groupPages as &$groupPage) {
											$sqlPage = $this->MySQL->GetPageForSidebarByFile($groupPage['path']);
											$html .= '<li>';
											if (isset($sqlPage))
												$html .= '<a class="' . $sqlPage['tags'] . '" href="/' . $sqlPage['address'] . '" search="' . $this->GetFullTitle($sqlPage) . '">' . $sqlPage['title'] . '</a>';
											else
												$html .= '<p>' . $groupPage['path'] . '</p>';

											$html .= '</li>';
										}

										if ($group !== '') {
											$html .= '</ul>';
											$html .= '</details>';
											$html .= '</li>';
										}
									}
								$html .= '</ul>';
							$html .= '</details>';
						} else {
							$sqlPage = $this->MySQL->GetPageForSidebarByFile($folderPath . $page);
							if (!isset($sqlPage))
							{
								$html .= $folderPath . $page;
								continue;
							}

							$html .= '<a class="' . (isset($chapter['tags']) ? $sqlPage['tags'] : '') . '" href="/' . $sqlPage['address'] . '" search="' . $this->GetFullTitle($sqlPage)  . '">' . $sqlPage['title'] . '</a>';
						}

						$html .= '</li>';
					}
				}

				$html .= '</ul>';
				$html .= '</details>';
			}

			$html .= '</div>';
			return $html;
		}

		public function UpdateSideBar()
		{
			$html = '';
			foreach ($this->Parser->categories as &$category) {
				$html .= '<div class="sectionheader">' . $category['name'] . '</div>';
				$html .= '<div class="section">';

				if (isset($category['global']))
				{
					$html .= $this->CreateGlobalCategory($category);
					continue;
				}

				foreach ($category['categories'] as &$chapter) {
					$html .= '<details class="level1">';

					$path = $this->Parser->config['pages_path'] . $chapter['path'] . '/';
					$files = Filesystem::GetChildren($path);
					$html .= '<summary><div><i class="mdi ' . $chapter['mdi'] . '"></i>' . $chapter['name'] . ' <span class="child-count">' . count($files) . '</span></div></summary>';

					$html .= '<ul>';
					foreach ($files as &$page) {
						$html .= '<li>';
						if (FileSystem::FolderExists($path . $page)) {
							$fullpath = $path . $page;
							$groups = $this->GetGroupedPages($fullpath, $page);

							foreach ($groups as $group => &$groupPages) {
								$html .= '<details class="level2 cm type e">';
									$html .= '<summary>';
										$sqlPage = $this->MySQL->GetPageForSidebarByFile($fullpath . '/' . $page . '.md');
										if (isset($sqlPage)) {
											$title = $sqlPage['title'];

											if ($group !== '')
												$title .= ' (' . $group . ')';

											$html .= '<a class="' . $sqlPage['tags'] . '" href="/' . $sqlPage['address'] . '" search="' . $this->GetFullTitle($sqlPage)  . '">' . $title . '</a>';
										} else {
											$html .= '<p>' . $fullpath . '/' . $page . '.md' . '</p>';
										}
									$html .= '</summary>';
									$html .= '<ul>';

									foreach ($groupPages as &$groupPage) {
										$sqlPage = $this->MySQL->GetPageForSidebarByFile($groupPage['path']);

										$html .= '<li>';
											if (isset($sqlPage))
												$html .= '<a class="' . $sqlPage['tags'] . '" href="/' . $sqlPage['address'] . '" search="' . $this->GetFullTitle($sqlPage) . '">' . $sqlPage['title'] . '</a>';
											else
												$html .= '<p>' . $groupPage['path'] . '</p>';
										$html .= '</li>';
									}

									$html .= '</ul>';
								$html .= '</details>';
							}
						} else {
							$sqlPage = $this->MySQL->GetPageForSidebarByFile($path . $page);
							if (!isset($sqlPage))
							{
								$html .= $path . $page;
								continue;
							}

							$html .= '<a class="' . (isset($chapter['tags']) ? $sqlPage['tags'] : '') . '" href="/' . $sqlPage['address'] . '" search="' . $this->GetFullTitle($sqlPage)  . '">' . $sqlPage['title'] . '</a>';
						}

						$html .= '</li>';
					}

					$html .= '</ul>';
					$html .= '</details>';
				}

				$html .= '</div>';
			}

			$this->MySQL->SetCachePage('sidebar', $html, 0);
		}

		public function Init($MySQL, $Parser) {
			$this->MySQL = $MySQL;
			$this->Parser = $Parser;
		}
	}

	//if (strpos(__FILE__, $_SERVER['SCRIPT_FILENAME']) != 0) {
		//include('mysql.php');
		// ToDo
	//} 
?>