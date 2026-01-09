<?php
	class Importer {
		private $MySQL;
		private $Parser;

		function getTextBeforeLastSlash($input) {
			$lastSlashPosition = strrpos($input, '/');
			if ($lastSlashPosition !== false) {
				return substr($input, 0, $lastSlashPosition);
			}

			return $input;
		}

		// Returns true if it ran a full update
		public function ImportPage($page, $category, $fullUpdate = false, $view_count = 0, $addressOverride = NULL) {
			if (!file_exists($page)) {
				return false;
			}

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

			$lastChanged = filemtime($page);
			$sqlPage = $this->MySQL->GetFullPageByFile($page);
			if (isset($sqlPage) && $sqlPage['fileTime'] == $lastChanged && !$fullUpdate) { # file wasn't updated
				return false;
			}

			$file = FileSystem::OpenFile($page);

			$title = $this->Parser->PageTitle($file, true);
			$tags = $this->Parser->GetTags($file);
			$address = isset($addressOverride) ? $addressOverride : $this->Parser->PageAddress($file);
			$createdTime = isset($sqlPage) ? $sqlPage['createdTime'] : '';
			$markup = $file;
			$html = $this->Parser->text($file);
			$description = $this->Parser->description($file);
			$views = isset($sqlPage) ? $sqlPage['views'] : 0;
			$updated = 'Unknown';
			$revisionId = 0;
			# $category = $category;
			$searchTags = '';
			$fileTime = $lastChanged;
			$filePath = $page;
			$updateCount = isset($sqlPage) ? ($html !== $sqlPage['html'] ? ($sqlPage['updateCount'] + 1) : $sqlPage['updateCount']) : 0; # If were in a fullUpdate, then we only raise the updateCount if our HTML content actually changed.
			if (!$fullUpdate) {
				echo '<p>' . $filePath . '</p>'; # Debugging which files update.
			}

			$this->MySQL->AddFilePageOrUpdate($title, $tags, $address, $createdTime, $markup, $html, $description, $views, $updated, $revisionId, $category, $searchTags, $fileTime, $filePath, $updateCount);

			#$categoryFilePath = $this->getTextBeforeLastSlash($page) . '/' . $category . ".md";
			#if (!$this->Parser->FileExists($categoryFilePath) || $page == $categoryFilePath)
			# 	return;

			#$this->ImportPage($categoryFilePath, $category, true);

			if (!$fullUpdate)
			{
				# echo 'Making full update! (' . $filePath . ')';
				$this->ImportEverything(true);
				echo '<p>Triggered full update ' . $filePath . ' (' . (isset($sqlPage) ? 'true' : 'false') . ', ' . $lastChanged . ')';
				return true;
			}
		}

		private $phpPages = array(
			"Importer.php",
			"index.php",
			"Extension.php",
			"mysql.php",
			"config.php"
		);
		public function CheckPHP($file)
		{
			$name = str_replace(".php", "", strtolower($file));
			$fileChanged = filemtime($file);
			if ($fileChanged != $this->MySQL->GetCacheTime($name))
			{
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
					if ($this->CheckPHP($phpPage)) {
						$fullUpdate = true;
					}
				}
			}

			foreach ($this->Parser->categories as &$category) {
				foreach ($category['categories'] as &$chapter) {
					$path = $this->Parser->config['pages_path'] . $chapter['path'] . '/';
					$files = file_exists($path) ? array_diff(scandir($path), array('..', '.')) : array();
					foreach ($files as &$page) {
						if (is_dir($path . $page)) {
							if ($this->ImportPage($path . $page . '/' . $page . '.md', $page, $fullUpdate) && !$fullUpdate) {
								break;
							}

							$fullpath = $path . $page;
							$subFiles = array_diff(scandir($fullpath), array('..', '.', $page . '.md'));
							foreach($subFiles as &$subPage) {
								if ($this->ImportPage($fullpath . '/' . $subPage, $page, $fullUpdate) && !$fullUpdate) {
									break;
								}
							}
						} else {
							if ($this->ImportPage($path . $page, $chapter['path'], $fullUpdate) && !$fullUpdate) {
								break;
							}
						}
					}
				}
			}

			if ($fullUpdate) {
				$this->UpdateSideBar();
				$this->MySQL->SetCachePage('lastupdate', '', time());
			}

			$this->ImportPage($this->Parser->config['pages_path'] . $this->Parser->config['front_page'], '', $fullUpdate, NULL, ''); # We override the address to be ''

			$this->ImportPage($this->Parser->config['pages_path'] . $this->Parser->config['cache_page'], '/cache', $fullUpdate, NULL, NULL);

			#if ($fullUpdate)
			#	echo 'Ran full update!';

			//echo 'Took ' . ((floor(microtime(true) * 1000) - $totalTime) / 1000) . "s";
		}

		public function GetFullTitle($sqlPage)
		{
			$address = $sqlPage['address'];

			if ($this->Parser->config['xampp'])
			{
				$address = str_replace('/:', ':', $address); // Apache hates it
			}

			return $address;
		}

		public function CreateGlobalCategory($category)
		{
			$html = '';
			foreach ($category['categories'] as &$chapter) {
				$html .= '<details class="level1">';

				$basePath = $this->Parser->config['pages_path'] . $category['basePath'] . '/';
				$folders = file_exists($basePath) ? array_diff(scandir($basePath), array('..', '.')) : array();

				$count = 0;
				foreach ($folders as &$folder)
				{
					$folderPath = $basePath . $folder . '/' . $chapter['path'];
					$folderFiles = file_exists($folderPath) ? array_diff(scandir($folderPath), array('..', '.')) : array();
					$count += count($folderFiles);
					//$html .= '<p>' . $folder . '|' . file_exists($folderPath) . '</p>';
				}

				$html .= '<summary><div><i class="mdi ' . $chapter['mdi'] . '"></i>' . $chapter['name'] . ' <span class="child-count">' . $count . '</span></div></summary>';
				$html .= '<ul>';

				foreach ($folders as &$folder)
				{
					$folderPath = $basePath . $folder . '/' . $chapter['path'] . '/';
					$folderFiles = file_exists($folderPath) ? array_diff(scandir($folderPath), array('..', '.')) : array();

					foreach ($folderFiles as &$page) {
						$html .= '<li>';
						if (is_dir($folderPath . $page)) {
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
									$files2 = array_diff(scandir($fullpath), array('..', '.', $page . '.md'));
									foreach($files2 as &$page2) {
										$sqlPage = $this->MySQL->GetPageForSidebarByFile($fullpath . '/' . $page2);

										$page2 = substr($page2, 0, strripos($page2, '.'));

										$html .= '<li>';
											if (isset($sqlPage)) {
												$html .= '<a class="' . $sqlPage['tags'] . '" href="/' . $sqlPage['address'] . '" search="' . $this->GetFullTitle($sqlPage)  . '">' . $sqlPage['title'] . '</a>';
											} else {
											   $html .= '<p>' . $fullpath . '/' . $page2 . '</p>';
											}
										$html .= '</li>';
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
					$files = file_exists($path) ? array_diff(scandir($path), array('..', '.')) : array();
					$html .= '<summary><div><i class="mdi ' . $chapter['mdi'] . '"></i>' . $chapter['name'] . ' <span class="child-count">' . count($files) . '</span></div></summary>';

					$html .= '<ul>';
					foreach ($files as &$page) {
						$html .= '<li>';
						if (is_dir($path . $page)) {
							$html .= '<details class="level2 cm type e">';
								$html .= '<summary>';
									$sqlPage = $this->MySQL->GetPageForSidebarByFile($path . $page . '/' . $page . '.md');
									if (isset($sqlPage)) {
										$html .= '<a class="' . $sqlPage['tags'] . '" href="/' . $sqlPage['address'] . '" search="' . $this->GetFullTitle($sqlPage)  . '">' . $sqlPage['title'] . '</a>';
									} else {
										$html .= '<p>' . $path . $page . '/' . $page . '.md' . '</p>';
									}
								$html .= '</summary>';
								$html .= '<ul>';
									$fullpath = $path . $page;
									$files2 = array_diff(scandir($fullpath), array('..', '.', $page . '.md'));
									foreach($files2 as &$page2) {
										$sqlPage = $this->MySQL->GetPageForSidebarByFile($fullpath . '/' . $page2);

										$page2 = substr($page2, 0, strripos($page2, '.'));

										$html .= '<li>';
											if (isset($sqlPage)) {
												$html .= '<a class="' . $sqlPage['tags'] . '" href="/' . $sqlPage['address'] . '" search="' . $this->GetFullTitle($sqlPage)  . '">' . $sqlPage['title'] . '</a>';
											} else {
											   $html .= '<p>' . $fullpath . '/' . $page2 . '</p>';
											}
										$html .= '</li>';
									}
								$html .= '</ul>';
							$html .= '</details>';
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