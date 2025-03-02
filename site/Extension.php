<?php
	include('Parsedown.php');
	include('utils.php');

	$function = array();

	class Extension extends Parsedown
	{

		private $baseImagePath = '';
		public $config;
		public $categories;
		protected $lua_keywords = array('and', 'break', 'do', 'else', 'elseif', 'end', 'false', 'for', 'function', 'if', 'in', 'local', 'nil', 'not', 'or', 'repeat', 'return', 'then', 'true', 'until', 'while', 'continue');
		protected $lua_operators = array('&&', '!=', '==', '>=', '<=', '||', '#', '+', '-', '*', '/', '%', '^', '~=', '<', '>', '..');
		protected $cpp_keywords = array(
			'alignas', 'alignof', 'and', 'and_eq', 'asm', 'auto',
			'bitand', 'bitor', 'bool', 'break', 'case', 'catch', 'char', 'char16_t', 'char32_t', 'class', 'compl', 'const', 'constexpr', 'const_cast', 'continue',
			'decltype', 'default', 'delete', 'do', 'double', 'dynamic_cast',
			'else', 'enum', 'explicit', 'export', 'extern',
			'false', 'float', 'for', 'friend',
			'goto',
			'if', 'inline', 'int',
			'long',
			'mutable',
			'namespace', 'new', 'noexcept', 'not', 'not_eq', 'nullptr',
			'operator', 'or', 'or_eq',
			'private', 'protected', 'public',
			'register', 'reinterpret_cast', 'return',
			'short', 'signed', 'sizeof', 'static', 'static_assert', 'static_cast', 'struct', 'switch',
			'template', 'this', 'thread_local', 'throw', 'true', 'try', 'typedef', 'typeid', 'typename',
			'union', 'unsigned', 'using',
			'virtual', 'void', 'volatile',
			'wchar_t', 'while', 'xor', 'xor_eq'
		);

		#
		# Utilities
		#
		private $fileCache = array();
		function FindFile($file, $title = null) {
			$file = $this->SafeLink($file);
			$file = strtolower($file);
			$file = str_replace('.', '_', $file);

			if ($this->config['xampp'])
			{
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

			foreach($this->categories as &$category) {
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
									if ($title != $this->PageTitle($content, true)) {
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

		function SafeLink($url) {
			$url = str_replace('*', '', $url); // Removes all *
			$url = str_replace(' ', '_', $url); // Removes all *
			# $url = strtolower($url);
			$url = str_replace(['../', './'], '', $url);
			$url = preg_replace('/[^a-zA-Z0-9_\-.:]/', '', $url);

			if ($this->config['xampp'])
			{
				$url = str_replace(':', '/:', $url); // Apache hates it
			}

			return $url;
		}

		function OpenFile($path) {
			$path = strtolower($path);

			if ($this->config['xampp'])
			{
				$path = str_replace('/:', ':', $path); // Apache hates it
			}

			if (!file_exists($path)) {
				return null;
			}

			return file_get_contents($path);
		}

		function FileExists($path) {
			$path = strtolower($path);

			if ($this->config['xampp'])
			{
				$path = str_replace('/:', ':', $path); // Apache hates it
			}

			return file_exists($path);
		}

		function PageTitle($text, $fullName = NULL)
		{
			$title = $this->config['name'];
			if (preg_match('/<title>(.*?)<\/title>/', $text, $matches)) {
				$title = $matches[1];
			}

			if (preg_match('/<function name="([^"]+)" parent="([^"]*)" type="([^"]+)">([\s\S]*?)<\/function>/s', $text, $matches)) {
				if (isset($fullName))
				{
					if($matches[3] == 'classfunc' && $this->config['code_language'] == 'lua') {
						$title = (strlen($matches[2]) > 0 ? ($matches[2] . ':') : '') . $matches[1];
					} else if(($matches[3] == 'libraryfunc' || $matches[3] == 'libraryfield') && $this->config['code_language'] == 'lua') {
						$title = (strlen($matches[2]) > 0 ? ($matches[2] . '.') : '') . $matches[1];
					} else {
						$title = (strlen($matches[2]) > 0 ? ($matches[2] . $this->config['code_funcseparator']) : '') . $matches[1];
					}
				} else {
					   $title = $matches[1];
				}
			}

			if (preg_match('/<type name="([^"]+)" category="([^"]*)" is="([^"]+)">([\s\S]*?)<\/type>/s', $text, $matches)) {
				$title = $matches[1];
			}

			return $title;
		}

		function PageAddress($text)
		{
			return $this->SafeLink($this->PageTitle($text, true));
		}

		function GetSpecialTags($text)
		{
			if (preg_match('/<deprecated>([\s\S]*?)<\/deprecated>/', $text, $matches)) {
				return ' depr';
			}

			if (preg_match('/<removed>([\s\S]*?)<\/removed>/', $text, $matches)) {
				return ' depr';
			}

			if (preg_match_all('/<internal>([\s\S]*?)<\/internal>/', $text, $matches)) {
				return ' intrn';
			}

			return '';
		}

		function GetTags($text)
		{
			$tags = '';
			if (preg_match('/<function name="([^"]+)" parent="([^"]*)" type="([^"]+)">([\s\S]*?)<\/function>/s', $text, $matches)) {
				if (isset($matches[3]) && $matches[3] != '') {
					if ($matches[3] == 'classfunc' || $matches[3] == 'libraryfunc') {
						$tags .= 'cm f meth memb';
					}

					if ($matches[3] == 'libraryfield') {
						$tags .= 'cm meth memb';
					}

					if ($matches[3] == 'hook') {
						$tags .= 'cm event f meth memb';
					}
				}
			} else {
				$tags .= 'cm';
			}

			if (strlen($tags) != 0) {
				$tags .= ' ';
			}

			if (preg_match('/<realm>(.*?)<\/realm>/s', $text, $matches)) {
				$realm = $matches[1];

				if ($realm === 'Client and Menu') {
					$tags .= 'rc rm';
				} elseif ($realm === 'Menu') {
					$tags .= 'rm';
				} elseif ($realm === 'Client') {
					$tags .= 'rc';
				} elseif ($realm === 'Server') {
					$tags .= 'rs';
				} elseif ($realm === 'Shared') {
					$tags .= 'rs rc';
				} elseif ($realm === 'Shared and Menu') {
					$tags .= 'rs rc rm';
				}
			} else {
				$tags .= 'e';
			}

			$tags .= $this->GetSpecialTags($text);

			return $tags;
		}

		function LableRealm($text) 
		{
			if (preg_match('/<function name="([^"]+)" parent="([^"]*)" type="([^"]+)">([\s\S]*?)<\/function>/s', $text, $matches)) {
				if (preg_match('/<realm>(.*?)<\/realm>/s', $text, $matches2)) {
					$realm = $matches2[1];

					if ($realm === 'Client and Menu') {
						return 'rc rm';
					} elseif ($realm === 'Menu') {
						return 'rm';
					} elseif ($realm === 'Client') {
						return 'rc';
					} elseif ($realm === 'Server') {
						return 'rs';
					} elseif ($realm === 'Shared') {
						return 'rs rc';
					} elseif ($realm === 'Shared and Menu') {
						return 'rs rc rm';
					}
				} else {
					return '';
				}
			}

			return '';
		}

		function FuncData($text) 
		{
			if (preg_match('/<function name="([^"]+)" parent="([^"]*)" type="([^"]+)">([\s\S]*?)<\/function>/s', $text, $matches)) {
				$function = array();
				$function['name'] = $matches[1];
				$function['parent'] = $matches[2];
				$function['type'] = $matches[3];

				$textContent = $matches[4];

				if (preg_match('/<description>\s*(.*?)\s*<\/description>/s', $text, $matches)) {
					$function['desc'] = $matches[1];
				}

				if (preg_match('/<source>\s*(.*?)\s*<\/source>/s', $text, $matches)) {
					$function['source'] = $matches[1];
				}

				#if (preg_match('/<realm>(.*?)<\/realm>/s', $text, $matches)) {
				#	$this->getrealm($matches[1]);
				#} else {
				#	$function['realm'] = '';
				#	$function['realmdesc'] = "No";
				#}

				if (preg_match('/<args>(.*?)<\/args>/s', $text, $matches)) {
					$function['args'] = $this->getStuff($matches[1], 'args', 'arg');
				}

				if (preg_match('/<rets>(.*?)<\/rets>/s', $text, $matches)) {
					$function['rets'] = $this->getStuff($matches[1], 'rets', 'ret');
				}

				return $function;
			}

			return null;
		}

		#
		# Overrides
		#
		protected function inlineImage($excerpt)
		{
			$image = parent::inlineImage($excerpt);

			if (!isset($image))
			{
				return null;
			}

			$image['element']['attributes']['src'] = $this->baseImagePath . $image['element']['attributes']['src'];

			return $image;
		}

		protected function blockHeader($Line)
		{
			$Block = parent::blockHeader($Line);

			$arg = $Block['element']['handler']['argument'];
			$Block['element']['handler']['argument'] = '<a name="' . $arg . '" class="anchor_offset"></a>' . $arg . '<a class="anchor" href="#' . $arg . '"><i class="mdi mdi-link-variant"></i></a>';

			return $Block;
		}

		protected function getFunctionName($func)
		{
			if (!isset($func['parent']) || strlen($func['parent']) == 0) {
				return $func['name'];
			}

			$outPut = $func['parent'];

			if (isset($func['type']) && ($func['type'] == 'libraryfunc' || $func['type'] == 'libraryfield')) {
				$outPut .= '.';
			} else if (isset($func['type']) && $func['type'] == 'hook') {
				$outPut = '(hook) ' . ((strlen($func['parent']) != 0) ? ($outPut . ':') : '');
			} else {
				$outPut .= $this->config['code_funcseparator'];
			}

			$outPut .= $func['name'];

			return $outPut;
		}

		protected function buildFunction($func)
		{
			$html = '<div class="function ' . $func['type'] . ' ' . $func['realm'] . '">';
				$html .= '<div class="function_line">';
					$html .= '<a href="gmod/States" class="realm_icon" title="' . $func['realmdesc'] . '">&nbsp;</a>';
					#$html .= '<a class="link-page exists" href="/gmod/number">number</a>';

					if(isset($func['parent']) && strlen($func['parent']) > 0)
					{
						$func['parent'] = '<a class="link-page ' . ($this->FindFile($func['parent']) != null ? 'exists' : 'missing') . '" href="/' . $func['parent'] . '">' . $func['parent'] . '</a>';
					}

					$func['args'] = isset($func['args']) ? $func['args'] : array();
					$func['rets'] = isset($func['rets']) ? $func['rets'] : array();
					if (sizeof($func['args']) != 0 || sizeof($func['rets']) != 0) {
						$args = '';
						foreach ($func['args'] as $arg) {
							if (!str_ends_with($args, ',') && $args !== '')
							{
								$args .= ',';
							}

							$args .= ' ' . '<a class="link-page ' . ($this->FindFile($arg['type']) != null ? 'exists' : 'missing') . '" href="/' . $this->SafeLink($arg['type']) . '">' . $arg['type'] . '</a>' . ' ' . $arg['name'];

							if (isset($arg['default']) && $arg['default'] !== '')
							{
								$args .= ' = ' . $arg['default'];
							}
						}

						$rets = '';
						foreach ($func['rets'] as $ret) {
							if (!str_ends_with($rets, ',') && $rets !== '')
							{
								$rets .= ',';
							}

							$rets .= ' ' . '<a class="link-page ' . ($this->FindFile($ret['type']) != null ? 'exists' : 'missing') . '" href="/' . $this->SafeLink($ret['type']) . '">' . $ret['type'] . '</a>';

							#if (isset($ret['default']) && $ret['default'] !== '')
							#{
							#	$rets .= ' = ' . $ret['default'];
							#}
						}

						$html .= $rets . ' ' . $this->getFunctionName($func) . '(' . $args .' )';
					} else {
						$html .= ' ' . $this->getFunctionName($func) . (($func['type'] == 'libraryfield') ? (isset($func['value']) ? (" = " . $func['value']) : '') : "()");
					}
				$html .= '</div>';

				$html .= '<div class="function_links">';
					if (isset($func['source']) && $func['source'] != '')
					{
						$html .= '<a href="' . $func['source'] . '">';
							$html .= '<i class=mdi mdi-source-branch">';
							$html .= '</i>';
							$html .= ' View Source';
						$html .= '</a>';
					}
				$html .= '</div>';
				
				if (isset($func['desc']))
				{
					$html .= '<h1>Description</h1>';
					$html .= '<div class="description_section function_description section">';
						$html .= $this->text($func['desc']);
					$html .= '</div>';
				}

				if (isset($func['args']) && sizeof($func['args']) > 0)
				{
					$html .= '<h1>Arguments</h1>';
					$html .= '<div class="function_arguments section">';
					$i = 0;
					foreach($func['args'] as $arg)
					{
						$i = $i + 1;
						$html .='<div>';
							$html .= '<span class="numbertag">' . $i . '</span>';
							$html .= '<a class="link-page ' . ($this->FindFile($arg['type']) != null ? 'exists' : 'missing') . '" href="/' . $this->SafeLink($arg['type']) . '">' . $arg['type'] . '</a>';
							$html .= '<span class="name"> ' . $arg['name'] . '</span>';
							if(isset($arg['default']) && $arg['default'] != '') {
								$html .= '<span class="default"> = ' . $arg['default'] . '</span>';
							}
							$html .= '<div class="numbertagindent">';
								$html .= $this->text($arg['desc']);
							$html .= '</div>';
						$html .= '</div>';
					}
					$html .= '</div>';
				}

				if (isset($func['rets']) && sizeof($func['rets']) > 0)
				{
					$html .= '<h1>Returns</h1>';
					$html .= '<div class="function_returns section">';
					$i = 0;
					foreach($func['rets'] as $arg)
					{
						$i = $i + 1;
						$html .='<div>';
							$html .= '<span class="numbertag">' . $i . '</span>';
							$html .= '<a class="link-page ' . ($this->FindFile($arg['type']) != null ? 'exists' : 'missing') . '" href="/' . $this->SafeLink($arg['type']) . '">' . $arg['type'] . '</a>';
							$html .= '<span class="name"> ' . $arg['name'] . '</span>';
							if(isset($arg['default']) && $arg['default'] != '') {
								$html .= '<span class="default"> = ' . $arg['default'] . '</span>';
							}
							$html .= '<div class="numbertagindent">';
								$html .= $this->text($arg['desc']);
							$html .= '</div>';
						$html .= '</div>';
					}
					$html .= '</div>';
				}
			$html .= '</div>';

			return $html;
		}

		protected function buildType($type)
		{
			$html = '<div class="type">';
				$html .= $this->text($type['summ']);
				#$html .= '<div class="section">';
				#	$html .= $this->text($type['summ']);
				#$html .= '</div>';
				if ($type['is'] == 'convar')
				{
					$html .= '</div>';
					return $html;
				}

				$html .= '<div class="members">';
					$html .= '<h1>Methods</h1>';
					$html .= '<div class="section">';
						$path = $this->FindFile($type['name'], $type['name']);
						if (isset($path) && $path != '') {
							$fileName = substr($path, strripos($path, '/') + 1, strlen($path) - strripos($path, '/') - 4);
							$mainDir = !strripos($path, $fileName . "/" . $fileName);
							$path = substr($path, 0, strripos($path, '/'));
							$files = array_diff(scandir($path), array('..', '.', strtolower($type['name']) . '.md'));
							foreach($files as &$page2) {
								$file = $this->OpenFile($path . '/' . $page2 . ($mainDir ? ("/" . $page2) : ''));
								if (!$file) {
									continue;
								}

								$pagetitle = $this->PageTitle($file); 

								$page2 = substr($page2, 0, strripos($page2, '.'));

								$func = $this->FuncData($file);
								$func['args'] = isset($func['args']) ? $func['args'] : array();
								$func['rets'] = isset($func['rets']) ? $func['rets'] : array();

								$html .= '<div class="member_line">';
									$html .= '<div class="syntax' . $this->GetSpecialTags($file) . '">';
										$func['name'] = '<a class="subject" href="/' . $this->PageAddress($file) . '">' . (isset($func['name']) ? $func['name'] : '_INVALID_FUNCTION_NAME_')  . '</a>';

										if (sizeof($func['args']) != 0 || sizeof($func['rets']) != 0) {
											$args = '';
											foreach ($func['args'] as $arg) {
												if (!str_ends_with($args, ',') && $args !== '')
												{
													$args .= ',';
												}

												$args .= ' ' . '<a class="link-page ' . ($this->FindFile($arg['type']) != null ? 'exists' : 'missing') . '" href="' . $this->SafeLink($arg['type']) . '">' . $arg['type'] . '</a>' . ' ' . $arg['name'];

												if (isset($arg['default']) && $arg['default'] !== '')
												{
													$args .= ' = ' . $arg['default'];
												}
											}

											$rets = '';
											foreach ($func['rets'] as $ret) {
												if (!str_ends_with($rets, ',') && $rets !== '')
												{
													$rets .= ',';
												}

												$rets .= ' ' . '<a class="link-page ' . ($this->FindFile($ret['type']) != null ? 'exists' : 'missing') . '" href="' . $this->SafeLink($ret['type']) . '">' . $ret['type'] . '</a>';
											}

											$html .= $rets . ' ' . $this->getFunctionName($func) . '(' . $args .' )';
										} else {
											$html .= $this->getFunctionName($func) . "()";
										}
									$html .= '</div>';
									$html .= '<div class="summary">';
										$html .= $this->GetPreviewText(isset($func['desc']) ? $func['desc'] : '');
									$html .= '</div>';
								$html .= '</div>';
							}
						}
					$html .= '</div>';
				$html .= '</div>';
			$html .= '</div>';

			return $html;
		}

		protected function buildStructure($structure) {
			$html = '<div class="struct">';
				$html .= '<h1>Description</h1>';
				$html .= '<div class="struct_description section">';
					$html .= $this->text($structure['desc']);
				$html .= '</div>';
				$html .= '<h1>Parameters</h1>';
				$html .= '<div class="section">';
					foreach ($structure['fields'] as $field) {
						$html .='<div class="parameter">';
							$html .= '<a class="link-page ' . ($this->FindFile($field['type']) != null ? 'exists' : 'missing') . '" href="' . $this->SafeLink($field['type']) . '">' . $field['type'] . '</a>';
							$html .= '<strong> ' . $field['name'] . '</strong>';
							$html .= '<div class="description numbertagindent">';
								$html .= $this->text($field['desc']);
								if(isset($field['default']) && $field['default'] != '') {
									$html .= '<p>';
										$html .= '<strong>Default:</strong>';
										$html .= '<code>' . $field['default'] . '</code>';
									$html .= '</p>';
								}
							$html .= '</div>';
						$html .= '</div>';
					}
				$html .= '</div>';
			$html .= '</div>';

			return $html;
		}

		protected function buildEnums($enums) {
			$html = '<div class="enum">';
				$html .= '<h1>Description</h1>';
				$html .= '<div class="function_description section">';
					$html .= $this->text($enums['desc']);
				$html .= '</div>';
				$html .= '<h1>Parameters</h1>';
				$html .= '<div class="section">';
					foreach ($enums['items'] as $field) {
						$html .='<div class="parameter">';
							$html .= '<a class="link-page ' . ($this->FindFile($field['type']) != null ? 'exists' : 'missing') . '" href="' . $this->SafeLink($field['type']) . '">' . $field['type'] . '</a>';
							$html .= '<strong> ' . $field['name'] . '</strong>';
							$html .= '<div class="description numbertagindent">';
								$html .= $this->text($field['desc']);
								if(isset($field['default']) && $field['default'] != '') {
									$html .= '<p>';
										$html .= '<strong>Default:</strong>';
										$html .= '<code>' . $field['default'] . '</code>';
									$html .= '</p>';
								}
							$html .= '</div>';
						$html .= '</div>';
					}
				$html .= '</div>';
			$html .= '</div>';

			return $html;
		}

		protected function buildNote($text, $preView)
		{
			if ($preView) {
				return $this->GetPreviewText($text);
			}

			$html = '<div class="note">';
				$html .= '<div class="inner">';
					$html .= $this->text($text);
				$html .= '</div>';
			$html .= '</div>';

			return $html;
		}

		protected function buildWarning($text, $preView)
		{
			if ($preView) {
				return $this->GetPreviewText($text);
			}

			$html = '<div class="warning">';
				$html .= '<div class="inner">';
					$html .= $this->text($text);
				$html .= '</div>';
			$html .= '</div>';

			return $html;
		}

		protected function buildKey($text)
		{
			$html = '<span title="' . $text .'" class="key key-' . $text . '">';
				$html .= $text;
			$html .= '</span>';

			return $html;
		}

		protected function buildRemoved($text, $version, $preView)
		{
			$htmlText = '';
			if ($version)
			{
				$version = (double)$version;
				if ($version == 0 || $version > $this->config['version'])  { // If 0 then it failed to cast.
					$htmlText .= '<p>This will be removed in version (<strong>' . $version . ($version == $this->config['next_version'] ? ' - DEV' : '') . '</strong>).</p>';
				}
			}

			$htmlText .= $text;

			if ($preView) {
				return $htmlText;
			}

			$html = '<div class="removed">';
				$html .= '<div class="inner">';
					$html .= $htmlText;
				$html .= '</div>';
			$html .= '</div>';

			return $html;
		}

		protected function buildDeprecated($text, $preView)
		{
			$htmlText = 'We advise against using this. It may be changed or removed in a future update. ' . $text;

			if ($preView) {
				return $htmlText;
			}

			$html = '<div class="deprecated">';
				$html .= '<div class="inner">';
					$html .= $htmlText;
				$html .= '</div>';
			$html .= '</div>';

			return $html;
		}

		protected function buildValidate($text, $preView)
		{
			if ($preView) {
				return $text;
			}

			$html = '<div class="validate">';
				$html .= '<div class="inner">';
					$html .= $text;
				$html .= '</div>';
			$html .= '</div>';

			return $html;
		}

		protected function buildInternal($text, $preView)
		{
			$html = '<div class="internal">';
				$html .= '<div class="inner">';
					$html .= $text;
				$html .= '</div>';
			$html .= '</div>';

			return $html;
		}

		protected function buildURL($name, $url)
		{
			$html = '<a href="';
			$html .= $url;
			$html .= '">';
				$html .= $name;
			$html .= '</a>';

			return $html;
		}

		protected function buildPageURL($page, $name)
		{
			$file = $this->FindFile($page);
			$html = '<a class="link-page ' . (isset($file) ? 'exists' : 'missing') . '" href="';
			$html .= "/" . $this->SafeLink($page);
			$html .= '">';
				$html .= isset($name) && $name != '' ? $name : (isset($file) ? $this->PageTitle($this->OpenFile($file), true) : $this->SafeLink($page));
			$html .= '</a>';

			return $html;
		}

		protected function buildAmbig($text, $page, $preView)
		{
			if ($preView) {
				return '';
			}

			$file = $this->FindFile($page);

			$html = '<div class="ambig">';
				$html .= '<div class="target">';
					$html .= '<a class="link-page ' . (isset($file) ? 'exists' : 'missing') . '" href="' . $page . '">' . (isset($file) ? $this->PageTitle($this->OpenFile($file), true) : $page) . '</a>';
				$html .= '</div>';
				$html .= '<div class="desc">';
					$html .= $text;
				$html .= '</div>';
			$html .= '</div>';

			return $html;
		}

		protected function buildBug($text, $issue, $preView)
		{
			if ($preView) {
				return $text;
			}

			$html = '<div class="bug">';
				$html .= '<div class="inner">';
					$html .= $text;
					if (isset($issue))
					{
						$html .= '<br><br>Issue Tracker: ';
						$html .= '<a href=' . $this->config['issues_url'] . $issue . '>' . $issue . '</a>';
					}
				$html .= '</div>';
			$html .= '</div>';

			return $html;
		}

		protected function processCode($code)
		{
			if ($this->config['code_language'] == 'lua') {
				/*foreach($this->lua_operators as $operator)
				{
					$code = preg_replace('/(?<![<\w])' . preg_quote($operator, '/') . '(?![>\w])/', '<span class="operator">' . $operator . '</span>', $code);
				}*/

				$code = preg_replace('/"(.*?)"/', '<span class="string">"$1"</span>', $code);

				foreach($this->lua_keywords as $keyword)
				{
					$code = preg_replace('/\b' . preg_quote($keyword, '/') . '\b/', '<span class="keyword">' . $keyword . '</span>', $code);
				}

				$code = preg_replace('/--(.*?)\n/', '<span class="comment">--$1</span>', $code);
				$code = preg_replace('/\/\/(.*?)\n/', '<span class="comment">//$1</span>', $code);
				$code = preg_replace('/--\[\[(.*?)\]\]/s', '<span class="multiline-comment">--[[$1]]</span>', $code);

				$code = preg_replace('/local function (\w+)\(/', 'local function <span class="methoddef">$1</span>(', $code);
			
				$code = preg_replace_callback(
					'/(?<=\s)([a-zA-Z0-9_]+(?:[.:][a-zA-Z0-9_]+)+)/', // Matches any "classname.function(" or "classname:function("
					function($match) {
						$name = $match[1];
						$functionFile = $this->FindFile($name);
						$parentFile = null; // the class/library file

						$pos = stripos($name, ":");
						if (!$pos)
						{
							$pos = stripos($name, ".");
						}

						$parentFile = $this->FindFile(substr($name, 0, $pos));
						if ($functionFile && $parentFile && ($pos !== false))
						{
							$output = '<span class="className">';
								$output .= '<a href="/' . $this->PageAddress($this->OpenFile($parentFile)) . '">' . substr($name, 0, $pos) . '</a>';
							$output .= '</span>';
							$output .= substr($name, $pos, 1);
							$output .= '<span class="method">';
								$output .= '<a href="/' . $this->PageAddress($this->OpenFile($functionFile)) . '">' . substr($name, $pos + 1) . '</a>';
							$output .= '</span>';

							return $output;
						} else {
							return $name; // don't replace it
						}
					},
					$code
				);
				
			} elseif ($this->config['code_language'] == 'c++') {
				foreach($this->cpp_keywords as $keyword)
				{
					$code = preg_replace('/\b' . preg_quote($keyword, '/') . '\b/', '<span class="keyword">' . $keyword . '</span>', $code);
				}

				$code = preg_replace('/\/\/(.*?)\n/', '<span class="comment">//$1</span>', $code);
				$code = preg_replace('#/\*(.*?)\*/#s', '<span class="multiline-comment">/* $1 */</span>', $code);
			}

			return $code;
		}

		protected function buildCode($code, $language)
		{
			$html = '<div class="code">';
				$html .= '<copy onclick="CopyCode( event )">';
					$html .= '<i class="mdi mdi-content-copy"></i>';
				$html .= '</copy>';
				$html .= $this->processCode($code);
			$html .= '</div>';

			return $html;
		}

		protected function buildExample($exam)
		{
			$html = '<h2>' . (isset($exam['name']) ? ("Example: " . $exam['name']) : "Example") . '</h2>';
			$html .= '<div class="example">';
				if (isset($exam['desc']))
				{
					$html .= '<div class="description">';
						$html .= $exam['desc'];
					$html .= '</div>';
				}

				$html .= $this->buildCode($exam['code'], $this->config['code_language']);

				if (isset($exam['output']) && strlen($exam['output']) > 0) {
					$html .= '<div class="output">';
						$html .= $this->buildCode($exam['output'], $this->config['code_language']);
					$html .= '</div>';
				}
			$html .= '</div>';

			return $html;
		}

		protected function buildCallback($text)
		{
			$html = '<div class="callback_args">';
				$html .= 'Function argument(s): ';
				$args = $this->getStuff($text, 'callback', 'arg');
				$idx = 0;
				foreach($args as $arg)
				{
					$idx = $idx + 1;
					$html .= '<div>';
						$html .= '<span class="numbertag">' . $idx . '</span>';
						$html .= '<a class="link-page ' . ($this->FindFile($arg['type']) != null ? 'exists' : 'missing') . '" href="' . $this->SafeLink($arg['type']) . '">' . $arg['type'] . '</a>';
						$html .= '<strong> ' . $arg['name'] . '</strong>';
						$html .= ' - ' . $this->text($arg['desc']);
					$html .= '</div>';
				}
			$html .= '</div>';

			return $html;
		}

		protected function buildAdded($text, $version, $preView)
		{
			$version = (double)$version;
			if ($preView || $version == 0 || $version < $this->config['version']) { // If 0 then it failed to cast.
				return '';
			}

			$html = '<h1>';
				$html .= 'Recently Added';
				$html .= '<a class="anchor" href="#recentlyadded">';
					$html .= '<i class="mdi mdi-link-variant"></i>';
				$html .= '</a>';
				$html .= '<a name="recentlyadded" class="anchor_offset"></a>';
			$html .= '</h1>';

			$html .= '<div class="section">';
				$html .= 'This was recently added in version (<strong>' . $version . ($version == $this->config['next_version'] ? ' - DEV' : '') . '</strong>).';
				$html .= '<p>' . $this->text($text) . '</p>';
			$html .= '</div>';

			return $html;
		}

		protected function buildChanged($text, $version, $preView)
		{
			$version = (double)$version;
			if ($preView || $version == 0 || $version < $this->config['version']) { // If 0 then it failed to cast.
				return '';
			}

			$html = '<h1>';
				$html .= 'Recently Changed';
				$html .= '<a class="anchor" href="#recentlychanged">';
					$html .= '<i class="mdi mdi-link-variant"></i>';
				$html .= '</a>';
				$html .= '<a name="recentlychanged" class="anchor_offset"></a>';
			$html .= '</h1>';

			$html .= '<div class="section">';
				$html .= 'This was recently changed in version (<strong>' . $version . ($version == $this->config['next_version'] ? ' - DEV' : '') . '</strong>).';
				$html .= '<p>' . $this->text($text) . '</p>';
			$html .= '</div>';

			return $html;
		}

		function getRealm($realm) 
		{
			$realm = trim($realm);

			$data = array();
			if ($realm === 'Client and Menu') {
				$data['realm'] = 'realm-client realm-menu';
				$data['realmdesc'] = "This function is available in client and menu state(s)";
			} elseif ($realm === 'Menu') {
				$data['realm'] = 'realm-menu';
				$data['realmdesc'] = "This function is available in menu state";
			} elseif ($realm === 'Client') {
				$data['realm'] = 'realm-client';
				$data['realmdesc'] = "This function is available in client state";
			} elseif ($realm === 'Server') {
				$data['realm'] = 'realm-server';
				$data['realmdesc'] = "This function is available in server state";
			} elseif ($realm === 'Shared') {
				$data['realm'] = 'realm-client realm-server';
				$data['realmdesc'] = "This function is available in client and server state(s)";
			} elseif ($realm === 'Shared and Menu') {
				$data['realm'] = 'realm-client realm-server realm-menu';
				$data['realmdesc'] = "This function is available in client, server and menu state(s)";
			}

			return $data;
		}

		function getStuff($text, $name, $prefix)
		{
			$ret = array();

			// Solves a bug, as callback also uses <arg> & in a function list it would falsely add these args
			$text = preg_replace('/<callback>[\s\S]+?<\/callback>/', '', $text);

			preg_match_all('/<' . $prefix . ' name="([^"]*)" type="([^"]+)"(?: default="([^"]*)")?>(.*?)<\/' . $prefix . '>/s', $text, $matches, PREG_SET_ORDER);

			foreach ($matches as $match) {
				$name = $match[1];
				$type = $match[2];
				$default = isset($match[3]) ? $match[3] : null;
				$desc = trim($match[4]);

				if (isset($default) && $default == ' ')
				{
					$default = '""';
				}

				$aArray = array(
					'name' => $name,
					'type' => $type,
					'desc' => $desc,
				);

				if ($default !== null) {
					$aArray['default'] = $default;
				}

				$ret[] = $aArray;
			}

			return $ret;
		}

		// preView is used in things like page lists, were we don't want to display notes.
		function text($text, $preView = false)
		{
			$lines = explode("\n", $text);

			foreach ($lines as &$line) {
				if (!preg_match('/^#/', $line) && preg_match('/\s{4}$/', $line)) {
					$line .= '<br>';
				}
			}

			$text = implode("\n", $lines);
			$text = preg_replace('/`(.*?)`/', '<code>$1</code>', $text);

			/*
			 * Helper function to make things easier.
			 * handledElements is REQUIRED as we REMOVE the already processed elements and after markdown processed the remaining test, we insert the elements back.
			 */
			$handledElements = [];
			$replaceCall = function ($pattern, $callback) use (&$handledElements, &$text)
			{
				$text = preg_replace_callback(
					$pattern,
					function ($match) use (&$handledElements, &$callback) {
						$key = '%%ELEMENT_' . count($handledElements) . '%%';
						$handledElements[$key] = $callback($match);
						return $key;
					},
					$text
				);
			};

			$replaceCall(
				'/<note>([\s\S]*?)<\/note>/',
				function ($match) use ($preView) {
					return $this->buildNote($match[1], $preView);
				}
			);

			$replaceCall(
				'/<warning>([\s\S]*?)<\/warning>/',
				function ($match) use ($preView) {
					return $this->buildWarning($match[1], $preView);
				}
			);

			$replaceCall(
				'/<removed>([\s\S]*?)<\/removed>/',
				function ($match) use ($preView) {
					return $this->buildRemoved($match[1], null, $preView);
				}
			);

			$replaceCall(
				'/<deprecated>([\s\S]*?)<\/deprecated>/',
				function ($match) use ($preView) {
					return $this->buildDeprecated($match[1], $preView);
				}
			);

			$replaceCall(
				'/<validate>([\s\S]*?)<\/validate>/',
				function ($match) use ($preView, &$handleElement) {
					return $this->buildValidate($match[1], $preView);
				}
			);

			$replaceCall(
				'/<internal>([\s\S]*?)<\/internal>/',
				function ($match) use ($preView) {
					return $this->buildInternal($match[1], $preView);
				}
			);

			$replaceCall(
				'/<key>([\s\S]*?)<\/key>/',
				function ($match) {
					return $this->buildKey(strtolower($match[1]));
				}
			);

			$replaceCall(
				'/\[([^]]+)\]\(([^)]+)\)/',
				function ($match){
					return $this->buildURL($match[1], $match[2]);
				}
			);

			$replaceCall(
				'/<ambig\s+page="([^"]+)">([\s\S]*?)<\/ambig>/s',
				function ($match) use ($preView){
					return $this->buildAmbig($match[2], $match[1], $preView);
				}
			);

			$replaceCall(
				'/<bug\s+issue="([^"]+)">([\s\S]*?)<\/bug>/',
				function ($match) use ($preView) {
					return $this->buildBug($match[2], $match[1], $preView);
				}
			);

			$replaceCall(
				'/<bug>([\s\S]*?)<\/bug>/',
				function ($match) use ($preView) {
					return $this->buildBug($match[1], null, $preView);
				}
			);

			$replaceCall(
				'/<added\s+version="([^"]+)">([\s\S]*?)<\/added>/',
				function ($match) use ($preView) {
					return $this->buildAdded($match[2], $match[1], $preView);
				}
			);

			$replaceCall(
				'/<removed\s+version="([^"]+)">([\s\S]*?)<\/removed>/',
				function ($match) use ($preView) {
					return $this->buildRemoved($match[2], $match[1], $preView);
				}
			);

			$replaceCall(
				'/<changed\s+version="([^"]+)">([\s\S]*?)<\/changed>/',
				function ($match) use ($preView) {
					return $this->buildChanged($match[2], $match[1], $preView);
				}
			);

			$replaceCall(
				'/<callback>([\s\S]*?)<\/callback>/',
				function ($match) {
					return $this->buildCallback($match[1]);
				}
			);

			//if (preg_match_all('/```([^"]+)\n([\s\S]*?)\n```/s', $text, $matches, PREG_SET_ORDER)) {
			//	foreach ($matches as $match) {
			//		$text = str_replace('```' . $match[1] . '\n' . $match[2] . '```', $this->buildCode($match[1], $match[2]), $text);
			//	}
			//}

			$replaceCall(
				'/<code\s+language="([^"]+)">([\s\S]*?)<\/code>/',
				function ($match){
					return $this->buildCode(trim($match[2]), $match[1]);
				}
			);

			$replaceCall(
				'/<page(?:\s+text="([^"]*)")?>([^<]+)<\/page>/', 
				function ($match){	
					return $this->buildPageURL($match[2], $match[1]);
				}
			);

			$replaceCall(
				'/<function name="([^"]+)" parent="([^"]*)" type="([^"]+)">([\s\S]*?)<\/function>/s',
				function ($matches){
					$function = array();
					$function['name'] = $matches[1];
					$function['parent'] = $matches[2];
					$function['type'] = $matches[3];

					$textContent = $matches[4];

					if (preg_match('/<description>\s*(.*?)\s*<\/description>/s', $textContent, $matches)) {
						$function['desc'] = trim($matches[1]);
					}

					if (preg_match('/<source>\s*(.*?)\s*<\/source>/s', $textContent, $matches)) {
						$function['source'] = trim($matches[1]);
					}

					if (preg_match('/<value>\s*(.*?)\s*<\/value>/s', $textContent, $matches)) { # Used by enums
						$function['value'] = trim($matches[1]);
					}

					if (preg_match('/<realm>(.*?)<\/realm>/s', $textContent, $matches)) {
						$data = $this->getRealm($matches[1]);
						$function['realm'] = $data['realm'];
						$function['realmdesc'] = $data['realmdesc'];
					} else {
						$function['realm'] = '';
						$function['realmdesc'] = "No";
					}

					if (preg_match('/<args>(.*?)<\/args>/s', $textContent, $matches)) {
						$function['args'] = $this->getStuff(trim($matches[1]), 'args', 'arg');
					}

					if (preg_match('/<rets>(.*?)<\/rets>/s', $textContent, $matches)) {
						$function['rets'] = $this->getStuff(trim($matches[1]), 'rets', 'ret');
					}

					return $this->buildFunction($function);
				}
			);

			$replaceCall(
				'/<type name="([^"]+)" category="([^"]*)" is="([^"]+)">([\s\S]*?)<\/type>/s',
				function ($matches){
					$type = array();
					$type['name'] = $matches[1];
					$type['category'] = $matches[2];
					$type['is'] = $matches[3];

					$content = $matches[4];

					if (preg_match('/<summary>\s*(.*?)\s*<\/summary>/s', $content, $matches2)) {
						$type['summ'] = trim($matches2[1]);
					}

					return $this->buildType($type);
				}
			);

			$replaceCall(
				'/<structure>([\s\S]*?)<\/structure>/s',
				function ($matches){
					$structure = array();
					$content = $matches[1];

					if (preg_match('/<description>\s*(.*?)\s*<\/description>/s', $content, $matches)) {
						$structure['desc'] = trim($matches[1]);
					}

					if (preg_match('/<source>\s*(.*?)\s*<\/source>/s', $content, $matches)) {
						$structure['src'] = trim($matches[1]);
					}

					if (preg_match('/<realm>(.*?)<\/realm>/s', $content, $matches)) {
						$data = $this->getRealm($matches[1]);
						$structure['realm'] = $data['realm'];
						$structure['realmdesc'] = $data['realmdesc'];
					} else {
						$structure['realm'] = '';
						$structure['realmdesc'] = "No";
					}

					if (preg_match('/<fields>(.*?)<\/fields>/s', $content, $matches)) {
						$structure['fields'] = $this->getStuff($matches[1], 'fields', 'item');
					}

					return $this->buildStructure($structure);
				}
			);

			$replaceCall(
				'/<enum>([\s\S]*?)<\/enum>/s',
				function ($matches){
					$enums = array();
					$content = $matches[1];

					if (preg_match('/<description>\s*(.*?)\s*<\/description>/s', $content, $matches)) {
						$enums['desc'] = trim($matches[1]);
					}

					if (preg_match('/<source>\s*(.*?)\s*<\/source>/s', $content, $matches)) {
						$enums['src'] = trim($matches[1]);
					}

					if (preg_match('/<realm>(.*?)<\/realm>/s', $content, $matches)) {
						$data = $this->getRealm($matches[1]);
						$enums['realm'] = $data['realm'];
						$enums['realmdesc'] = $data['realmdesc'];
					} else {
						$enums['realm'] = '';
						$enums['realmdesc'] = "No";
					}

					if (preg_match('/<items>(.*?)<\/items>/s', $content, $matches)) {
						$enums['items'] = $this->getStuff($matches[1], 'items', 'item');
					}

					return $this->buildEnums($enums);
				}
			);

			$replaceCall(
				'/<example(?:\s+name="([^"]*)")?>(?:\s*<description>(.*?)<\/description>)?\s*<code>(.*?)<\/code>(?:\s*<output>(.*?)<\/output>)?\s*<\/example>/s',
				function ($matches) {
					$example = array(
						'name' => (isset($matches[1]) && strlen($matches[1]) > 0) ? $matches[1] : null,
						'desc' => (isset($matches[2]) && strlen($matches[2]) > 0) ? $this->text(trim($matches[2])) : null,
						'code' => trim($matches[3]),
						'output' => (isset($matches[4]) && strlen($matches[4]) > 0) ? trim($matches[4]) : null,
					);

					return $this->buildExample($example);
				}
			);

			$markup = parent::text($text);
			$tries = 0;
			// Why a while loop?
			// Because elements can be nested meaning if we insert ELEMENT_1 it could have contained ELEMENT_0 which we otherwise would have skipped now.
			while (preg_match('/%%ELEMENT_\d+%%/', $markup))
			{
				$tries++;
				if ($tries > 1000) // As a failsafe in case it somehow happened
				{
					error_log("while loop reached 1000 tries. What did you do...");
					break;
				}

				$markup = str_replace(array_keys($handledElements), array_values($handledElements), $markup);
			}

			$markup = preg_replace('!^<p>(.*?)</p>$!i', '$1', $markup);
			#$text = preg_replace('/(?<!^#)\s{2}$/m', '<br>', $text); // Add <br> tag at the end of lines with two spaces

			return $markup;
		}

		public function GetPreviewText($text)
		{
			$markup = $this->text($text, true);

			if (preg_match_all('/<p>([\s\S]*?)<\/p>/', $markup, $matches, PREG_SET_ORDER)) {
				foreach ($matches as $match) {
					$markup = str_replace('<p>' . $match[1] . '</p>', $match[1], $markup);
				}
			}

			return $markup;
		}

		function ViewText($text)
		{
			$title = $this->config['name'];
			if (preg_match('/<title>(.*?)<\/title>/', $text, $matches))
			{
				$title = $matches[1];
			}

			$html = '<h1 class="pagetitle" id="pagetitle">' . $title .'</h1>';
			$html .= '<div class="markdown" id="pagecontent">';
			$html .= $this->text($text);
			$html .= '</div>';

			return $html;
		}

		protected function blockMarkup($Line)
		{
			$Block = parent::blockMarkup($Line);

			if (!isset($Block['name']))
			{
				return;
			}

			if (strcmp($Block['name'], 'image') == 0 && !str_contains($Line['text'], 'class="image"'))
			{
				$Block['element']['rawHtml'] = substr($Line['text'], 0, -2) . ' class="image"/>';
			}

			return $Block;
		}

		protected function blockCode($Excerpt, $Block = null) {
			return; // Parsedown should NEVER handle code itself as else it randomly wraps things with <pre> or <pre><code> or just <code>.
		}
	}
?>