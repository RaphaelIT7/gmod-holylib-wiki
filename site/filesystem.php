<?php

class Filesystem
{
	private static $config;
	private static $parser;

	private static $fileIndex = array();
	private static $titleIndex = array();
	private static $aliasIndex = array();

	private static $fileContentCache = array();
	private static $initialized = false;

	public static function Init($parser)
	{
		self::$parser = $parser;
		self::$config = GetConfig();

		self::NukeCache();
		self::BuildIndex();

		self::$initialized = true;
	}

	private static function BuildIndex()
	{
		$rootPath = self::NormalizePhysicalPath(self::$config['pages_path']);
		if (self::$config['front_page'] !== null)
			self::IndexFile(self::NormalizePhysicalPath($rootPath . self::$config['front_page']), $rootPath);

		if (self::$config['missing_page'] !== null)
			self::IndexFile(self::NormalizePhysicalPath($rootPath . self::$config['missing_page']), $rootPath);

		if (self::$config['cache_page'] !== null)
			self::IndexFile(self::NormalizePhysicalPath($rootPath . self::$config['cache_page']), $rootPath);

		if (!isset(self::$config['categories']) || !is_array(self::$config['categories']))
			return;

		foreach (self::$config['categories'] as $category)
		{
			if (!isset($category['categories']) || !is_array($category['categories']))
				continue;

			foreach ($category['categories'] as $chapter)
			{
				if (!isset($chapter['path']))
					continue;

				$basePath = self::$config['pages_path'] . $chapter['path'];
				$basePath = self::NormalizePhysicalPath($basePath);

				if (!is_dir($basePath))
					continue;

				self::IndexDirectory($basePath);
			}
		}
	}

	private static function IndexDirectory(string $directory)
	{
		try
		{
			$iterator = new RecursiveIteratorIterator(
				new RecursiveDirectoryIterator(
					$directory,
					FilesystemIterator::SKIP_DOTS | FilesystemIterator::CURRENT_AS_FILEINFO
				),
				RecursiveIteratorIterator::LEAVES_ONLY
			);

			foreach ($iterator as $fileInfo)
			{
				if (!$fileInfo->isFile())
					continue;

				if (strtolower($fileInfo->getExtension()) !== 'md')
					continue;

				$path = $fileInfo->getPathname();
				self::IndexFile($path, $directory);
			}
		}
		catch (Exception $e)
		{
			return;
		}
	}

	private static function IndexFile(string $path, string $chapterPath)
	{
		$physicalPath = self::NormalizePhysicalPath($path);
		$filename = pathinfo($physicalPath, PATHINFO_FILENAME);
		$fileKey = self::NormalizeLookupKey($filename);
		if (!isset(self::$fileIndex[$fileKey]))
			self::$fileIndex[$fileKey] = $physicalPath;

		$relative = self::RelativePath($physicalPath, $chapterPath);
		if ($relative !== null)
		{
			$relative = preg_replace('/\.md$/i', '', $relative);
			$relativeKey = self::NormalizeLookupKey($relative);
			if ($relativeKey !== '' && !isset(self::$fileIndex[$relativeKey]))
				self::$fileIndex[$relativeKey] = $physicalPath;
		}

		$content = self::OpenFile($physicalPath);
		if ($content === false)
			return;

		if (preg_match('/<alias>\s*(.*?)\s*<\/alias>/is', $content, $matches))
		{
			$alias = self::NormalizeLookupKey($matches[1]);
			if ($alias !== '' && !isset(self::$aliasIndex[$alias]))
				self::$aliasIndex[$alias] = $physicalPath;
		}

		$title = self::$parser->PageTitle($content, true);
		if ($title !== null)
		{
			$titleKey = self::NormalizeTitle($title);
			if ($titleKey !== '' && !isset(self::$titleIndex[$titleKey]))
			{
				self::$titleIndex[$titleKey] = array(
					'file' => $physicalPath,
					'title' => $title // Needed for title lookups, avoids us having to re-process the contents
				);
			}
		}
	}

	public static function FindFile($file, $title = null, bool $secondPass = false)
	{
		if (!self::$initialized)
			return null;

		if ($title !== null)
		{
			$titleKey = self::NormalizeTitle($title);

			if (isset(self::$titleIndex[$titleKey]))
				return self::$titleIndex[$titleKey]['file'];
		}

		if ($file === null)
			return null;

		$lookupKey = self::NormalizeLookupKey($file);
		if ($lookupKey === '')
			return null;

		if (isset(self::$fileIndex[$lookupKey]))
			return self::$fileIndex[$lookupKey];

		if (isset(self::$aliasIndex[$lookupKey]))
			return self::$aliasIndex[$lookupKey];

		if (!$secondPass)
		{
			$lastDot = strrpos($lookupKey, '.');
			$lastColon = strrpos($lookupKey, ':');

			$lastPos = max(
				$lastDot !== false ? $lastDot : -1,
				$lastColon !== false ? $lastColon : -1
			);

			if ($lastPos !== -1)
			{
				$fallback = substr($lookupKey, $lastPos + 1);

				if ($fallback !== $lookupKey)
					return self::FindFile($fallback, $title, true);
			}
		}

		return null;
	}

	// This is never used for FS lookups!
	public static function SafeLink($url)
	{
		if ($url === null)
			return '';

		$url = (string)$url;
		$url = str_replace('*', '', $url);
		$url = str_replace(' ', '_', $url);
		$url = str_replace('\\', '/', $url);
		$url = str_replace('../', '', $url);
		$url = str_replace('./', '', $url);
		$url = preg_replace('/[^a-zA-Z0-9_\-.:\/]/', '', $url);

		if (self::$config['xampp'])
			$url = str_replace(':', '/:', $url); // Apache still hates it

		return $url;
	}

	private static function NormalizeLookupKey(string $value)
	{
		if ($value === null)
			return '';

		$value = self::SafeLink($value);
		$value = str_replace('/:', ':', $value);
		$value = strtolower($value);
		$value = preg_replace('#/+#', '/', $value);
		$value = trim($value, '/');
		$value = preg_replace('/\.md$/', '', $value);

		return $value;
	}

	private static function NormalizeTitle(string $title)
	{
		if ($title === null)
			return '';

		$title = trim((string)$title);
		$title = preg_replace('/\s+/', ' ', $title);

		return $title;
	}

	public static function NormalizePhysicalPath(string $path)
	{
		#if ($path === null)
		#	var_dump(debug_backtrace());

		$path = str_replace('\\', '/', $path);

		if (self::$config['xampp'])
			$path = str_replace('/:', ':', $path);

		return $path;
	}

	private static function RelativePath(string $filePath, string $basePath)
	{
		$filePath = str_replace('\\', '/', $filePath);
		$basePath = rtrim(str_replace('\\', '/', $basePath), '/');
		$prefix = $basePath . '/';

		if (strpos($filePath, $prefix) !== 0)
			return null;

		return substr($filePath, strlen($prefix));
	}

	public static function OpenFile(string $path)
	{
		$path = self::NormalizePhysicalPath($path);

		if (array_key_exists($path, self::$fileContentCache))
			return self::$fileContentCache[$path];

		if (!is_file($path))
		{
			self::$fileContentCache[$path] = false;
			return false;
		}

		$content = file_get_contents($path);

		if ($content === false)
		{
			self::$fileContentCache[$path] = false;
			return false;
		}

		self::$fileContentCache[$path] = $content;

		return $content;
	}

	public static function FileExists(string $path)
	{
		$path = self::NormalizePhysicalPath($path);

		return is_file($path);
	}

	public static function GetModifiedTime(string $path)
	{
		$path = self::NormalizePhysicalPath($path);

		return filemtime($path);
	}

	public static function ScanFolder(string $path)
	{
		$path = self::NormalizePhysicalPath($path);

		if (!is_dir($path))
			return false;

		$files = scandir($path);

		if ($files === false)
			return false;

		return array_diff($files, array('.', '..'));
	}

	public static function FolderExists(string $path)
	{
		return is_dir(self::NormalizePhysicalPath($path));
	}

	public static function NukeCache()
	{
		self::$fileIndex = array();
		self::$titleIndex = array();
		self::$aliasIndex = array();
		self::$fileContentCache = array();
		self::$initialized = false;
	}

	public static function GetChildren(string $path)
	{
		if (!self::$initialized)
			return array();

		$path = self::NormalizePhysicalPath($path);
		$path = rtrim(str_replace('\\', '/', $path), '/');

		$children = array();
		$directories = array();
		foreach (self::$fileIndex as $filePath)
		{
			$filePath = str_replace('\\', '/', $filePath);
			$directory = dirname($filePath);
			$directory = str_replace('\\', '/', $directory);
			if ($directory === $path)
			{
				$children[] = basename($filePath);
				continue;
			}

			$prefix = $path . '/';
			if (strpos($filePath, $prefix) !== 0)
				continue;

			$relative = substr($filePath, strlen($prefix));
			$slash = strpos($relative, '/');
			if ($slash === false)
				continue;

			$directory = substr($relative, 0, $slash);
			if (!isset($directories[$directory]))
				$directories[$directory] = true;
		}

		foreach ($directories as $directory => $_)
			$children[] = $directory;

		sort($children, SORT_NATURAL | SORT_FLAG_CASE);
		return array_values(array_unique($children));
	}

	public static function FindFuzzyFile(string $file, string $match)
	{
		if (!self::$initialized)
			return null;

		$fileKey = self::NormalizeLookupKey($file);
		$matchKey = strtolower(trim((string)$match));
		if ($fileKey === '')
			return null;

		$paths = array();
		foreach (self::$fileIndex as $indexedPath)
		{
			if (!isset($paths[$indexedPath]))
				$paths[$indexedPath] = true;
		}

		foreach ($paths as $path => $_)
		{
			$filename = pathinfo($path, PATHINFO_FILENAME);
			$filenameKey = self::NormalizeLookupKey($filename);
			if (strpos($filenameKey, $fileKey) === false)
				continue;

			if ($matchKey === '')
				return $path;

			$normalizedPath = strtolower(str_replace('\\', '/', $path));
			if (strpos($normalizedPath, $matchKey) !== false)
				return $path;

			foreach (self::$titleIndex as $title => $titleEntry)
			{
				if ($titleEntry['file'] !== $path)
					continue;

				if (strpos($title, $matchKey) !== false)
					return $path;
			}
		}

		return null;
	}

	public static function GetTitleFromEntry(string $file)
	{
		if (!self::$initialized)
			return null;

		$file = self::NormalizePhysicalPath($file);
		foreach (self::$titleIndex as $title => $titleEntry)
		{
			if ($titleEntry['file'] === $file)
				return $titleEntry['title'];
		}

		return null;
	}
}
?>