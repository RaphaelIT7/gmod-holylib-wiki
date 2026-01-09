<?php
	class Filesystem
	{
		private static $fileCache = array();
		private static $fileContentCache = array();
		private static $folderContentCache = array();
		private static $config;
		private static $parser;

		public static function Init($parser)
		{
			self::$parser = $parser;
			self::$config = GetConfig();
		}

		public static function FindFile($file, $title = null)
		{
			$file = self::$parser->SafeLink($file);
			$file = strtolower($file);
			# $file = str_replace('.', '_', $file);

			if (self::$config['xampp'])
				$file = str_replace('/:', ':', $file); // Apache hates it

			$file = str_replace(':', '_', $file);
			if (isset($title) && isset(self::$fileCache[$title]))
				return self::$fileCache[$title];

			if (!isset($title) && isset(self::$fileCache[$file]))
			{
				return self::$fileCache[$file];
				//echo "<p>Cache hit " . $file . "</p>";
			} else {
				//echo "<p>Cache miss " . $file . "</p>";
			}

			foreach(self::$config['categories'] as &$category)
			{
				foreach ($category['categories'] as &$chapter)
				{
					$shortpath = self::$config['pages_path'] . $chapter['path'] . '/';
					$path = $shortpath  . $file . '.md';

					if (!self::FileExists($shortpath))
						continue;

					$files = self::ScanFolder($shortpath);
					foreach($files as $file2)
					{
						if (self::FolderExists($shortpath . $file2))
						{
							$filePath = $shortpath . $file2 . '/' . $file . '.md';
							if (self::FileExists($filePath))
							{
								if ($title)
								{
									$content = self::OpenFile($filePath);
									if ($title != self::$parser->PageTitle($content, true))
										continue;

									self::$fileCache[$title] = $filePath;
								}

								self::$fileCache[$file] = $filePath;
								return $filePath;
							}
						}
					}

					if (self::FileExists($path))
					{
						$filec = self::OpenFile($path);
						if (preg_match('/<alias>(.*?)<\/alias>/', $filec, $matches))
							$path = $shortpath  . $matches[1] . '.md';

						self::$fileCache[$file] = $path;
						return $path;
					}
				}
			}
		}

		function NukeCache()
		{

		}

		public static function SafeLink($url) {
			$url = str_replace('*', '', $url); // Removes all *
			$url = str_replace(' ', '_', $url); // Removes all *
			# $url = strtolower($url);
			$url = str_replace(['../', './'], '', $url);
			$url = preg_replace('/[^a-zA-Z0-9_\-.:]/', '', $url);

			if (self::$config['xampp'])
				$url = str_replace(':', '/:', $url); // Apache hates it

			return $url;
		}

		public static function OpenFile($path)
		{
			$path = strtolower($path);
			if (self::$config['xampp'])
				$path = str_replace('/:', ':', $path); // Apache hates it

			if (isset(self::$fileContentCache[$path]))
				return self::$fileContentCache[$path];

			if (!is_file($path))
			{
				# echo 'Failed lookup for ' . $path . '\n';
				self::$fileContentCache[$path] = false;
				return false;
			}

			$content = file_get_contents($path);
			self::$fileContentCache[$path] = $content;

			# echo 'Read for ' . $path . '\n';

			return $content;
		}

		public static function FileExists($path)
		{
			# SHIT, this function previously also returned true for folders... if it doesn't then stuff breaks
			if (self::FolderExists($path))
				return true;

			return self::OpenFile($path) !== false;
		}

		public static function ScanFolder($path)
		{
			$path = strtolower($path);
			if (self::$config['xampp'])
				$path = str_replace('/:', ':', $path);

			if (isset(self::$folderContentCache[$path]))
				return self::$folderContentCache[$path];

			if (!is_dir($path))
			{
				# echo 'Folder failed for ' . $path . '\n';
				self::$folderContentCache[$path] = false;
				return false;
			}

			$unfilteredFiles = scandir($path);
			if ($unfilteredFiles === false)
			{
				# echo 'Folder failed for ' . $path . '\n';
				self::$folderContentCache[$path] = false;
				return false;
			}

			$files = array_diff($unfilteredFiles, array('..', '.'));
			self::$folderContentCache[$path] = $files;

			# echo 'Scan for ' . $path . '\n';

			return $files;
		}

		public static function FolderExists($path)
		{
			return self::ScanFolder($path) !== false;
		}
	}
?>