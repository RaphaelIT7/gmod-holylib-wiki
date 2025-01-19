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
			if (!file_exists($page))
				return false;

			$lastChanged = filemtime($page);
			$sqlPage = $this->MySQL->GetFullPageByFile($page);
			if (isset($sqlPage) && $sqlPage['fileTime'] == $lastChanged && !$fullUpdate) # file wasn't updated
				return false;

			$file = $this->Parser->OpenFile($page);

			$title = $this->Parser->PageTitle($file);
			$tags = $this->Parser->GetTags($file);
			$address = isset($addressOverride) ? $addressOverride : $this->Parser->PageAddress($file);
			$createdTime = isset($sqlPage) ? $sqlPage['createdTime'] : '';
			$markup = $file;
			$html = $this->Parser->text($file);
			$views = isset($sqlPage) ? $sqlPage['views'] : 0;
			$updated = 'Unknown';
			$revisionId = 0;
			# $category = $category;
			$searchTags = '';
			$fileTime = $lastChanged;
			$filePath = $page;
			$updateCount = isset($sqlPage) ? ($sqlPage['updateCount'] + ($fullUpdate ? ($sqlPage['html'] != $html ? 1 : 0) : 1)) : 0; # If were in a fullUpdate, then we only raise the updateCount if our HTML content actually changed.
			if (!$fullUpdate)
				echo '<p>' . $filePath . '</p>'; # Debugging which files update.

			$this->MySQL->AddFilePageOrUpdate($title, $tags, $address, $createdTime, $markup, $html, $views, $updated, $revisionId, $category, $searchTags, $fileTime, $filePath, $updateCount);

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

		public function CheckPHP($file, $name)
		{
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
		 */
		public function ImportEverything($fullUpdate = false) {
			if (!$fullUpdate)
			{
				if ($this->CheckPHP('Importer.php', 'importer') ||
					$this->CheckPHP('index.php', 'index') ||
					$this->CheckPHP('Extension.php', 'extension') ||
					$this->CheckPHP('mysql.php', 'myql'))
				{
					$fullUpdate = true;
				}
			}

			foreach ($this->Parser->categories as &$category) {
				foreach ($category['categories'] as &$chapter) {
					$path = $this->Parser->config['pages_path'] . $chapter['path'] . '/';
					$files = file_exists($path) ? array_diff(scandir($path), array('..', '.')) : array();
					foreach ($files as &$page) {
						if (is_dir($path . $page)) {
							if ($this->ImportPage($path . $page . '/' . $page . '.md', $page, $fullUpdate) && !$fullUpdate)
								break;

							$fullpath = $path . $page;
							$subFiles = array_diff(scandir($fullpath), array('..', '.', $page . '.md'));
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

			if ($fullUpdate)
			{
				$this->UpdateSideBar();
			}

			$this->ImportPage($this->Parser->config['pages_path'] . $this->Parser->config['front_page'], '', $fullUpdate, NULL, "");

			#if ($fullUpdate)
			#	echo 'Ran full update!';
		}

		public function UpdateSideBar()
		{
			$html = '';
			foreach ($this->Parser->categories as &$category) {
				$html .= '<div class="sectionheader">' . $category['name'] . '</div>';
				$html .= '<div class="section">';

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
									$html .= '<a class="' . $sqlPage['tags'] . '" href="/' . $sqlPage['address'] . '">' . $sqlPage['title'] . '</a>';
								$html .= '</summary>';
								$html .= '<ul>';
									$fullpath = $path . $page;
									$files2 = array_diff(scandir($fullpath), array('..', '.', $page . '.md'));
									foreach($files2 as &$page2) {
										$sqlPage = $this->MySQL->GetPageForSidebarByFile($fullpath . '/' . $page2);

										$page2 = substr($page2, 0, strripos($page2, '.'));

										$html .= '<li>';
											if (isset($sqlPage))
												$html .= '<a class="' . $sqlPage['tags'] . '" href="/' . $sqlPage['address'] . '" search="' . $sqlPage['title'] . '">' . $sqlPage['title'] . '</a>';
											else
											   $html .= '<p>' . $fullpath . '/' . $page2 . '</p>';
										$html .= '</li>';
									}
								$html .= '</ul>';
							$html .= '</details>';
						} else {
							$sqlPage = $this->MySQL->GetPageForSidebarByFile($path . $page);

							$html .= '<a class="' . (isset($chapter['tags']) ? $sqlPage['tags'] : '') . '" href="/' . $sqlPage['address'] . '" search="' . $sqlPage['title'] . '">' . $sqlPage['title'] . '</a>';
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