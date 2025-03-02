<?php
	include("config.php");
	class Filesystem
	{
		private static $fileSystem = new Filesystem;
		function GetFilesystem()
		{
			return $this->fileSystem;
		}

		private $fileCache = array();
		private $config = GetConfig();
		private $parser;

		public function Init($parser)
		{
			$this->parser = $parser;
		}

		public function FindFile($file, $title = null) {
			$file = $this->SafeLink($file);
			$file = strtolower($file);
			$file = str_replace('.', '_', $file);

			if ($this->config['xampp']) {
				$file = str_replace('/:', ':', $file); // Apache hates it
			}

			$file = str_replace(':', '_', $file);

			if (isset($title) && isset($this->fileCache[$title])) {
				return $this->fileCache[$title];
			}

			if (!isset($title) && isset($this->fileCache[$file]))
			{
				return $this->fileCache[$file];
				//echo "<p>Cache hit " . $file . "</p>";
			} else {
				//echo "<p>Cache miss " . $file . "</p>";
			}

			foreach($this->config['categories'] as &$category) {
				foreach ($category['categories'] as &$chapter) {
					$shortpath = $this->config['pages_path'] . $chapter['path'] . '/';
					$path = $shortpath  . $file . '.md';

					if (!file_exists($shortpath)) {
						continue;
					}

					$files = array_diff(scandir($shortpath), array('..', '.'));
					foreach($files as $file2) {
						if (is_dir($shortpath . $file2)) {
							$filePath = $shortpath . $file2 . '/' . $file . '.md';
							if (file_exists($filePath))
							{
								if ($title)
								{
									$content = $this->OpenFile($filePath);
									if ($title != $this->parser->PageTitle($content, true)) {
										continue;
									}

									$this->fileCache[$title] = $filePath;
								}

								$this->fileCache[$file] = $filePath;
								return $filePath;
							}
						}
					}

					if (file_exists($path))
					{
						$filec = $this->OpenFile($path);
						if (preg_match('/<alias>(.*?)<\/alias>/', $filec, $matches)) {
							$path = $shortpath  . $matches[1] . '.md';
						}

						$this->fileCache[$file] = $path;
						return $path;
					}
				}
			}
		}

		function NukeCache() {

		}

		public function SafeLink($url) {
			$url = str_replace('*', '', $url); // Removes all *
			$url = str_replace(' ', '_', $url); // Removes all *
			# $url = strtolower($url);
			$url = str_replace(['../', './'], '', $url);
			$url = preg_replace('/[^a-zA-Z0-9_\-.:]/', '', $url);

			if ($this->config['xampp']) {
				$url = str_replace(':', '/:', $url); // Apache hates it
			}

			return $url;
		}

		public function OpenFile($path) {
			$path = strtolower($path);

			if ($this->config['xampp']) {
				$path = str_replace('/:', ':', $path); // Apache hates it
			}

			if (!file_exists($path)) {
				return null;
			}

			return file_get_contents($path);
		}

		public function FileExists($path) {
			$path = strtolower($path);

			if ($this->config['xampp']) {
				$path = str_replace('/:', ':', $path); // Apache hates it
			}

			return file_exists($path);
		}
	}
?>