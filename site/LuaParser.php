<?php

function IsLuaKeyword(string $type): bool
{
	return in_array($type, [
		'TK_AND', 'TK_BREAK', 'TK_CONST', 'TK_CONTINUE',
		'TK_DO', 'TK_ELSE', 'TK_ELSEIF', 'TK_END',
		'TK_FALSE', 'TK_FOR', 'TK_FUNCTION', 'TK_GOTO',
		'TK_IF', 'TK_IN', 'TK_LOCAL', 'TK_NIL', 'TK_NOT',
		'TK_OR', 'TK_REPEAT', 'TK_RETURN', 'TK_THEN',
		'TK_TRUE', 'TK_UNTIL', 'TK_WHILE'
	], true);
}

function IsLuaOperator(string $type): bool
{
	return in_array($type, [
		'TK_ADD', 'TK_SUB', 'TK_MUL', 'TK_DIV', 'TK_MOD',
		'TK_POW', 'TK_LEN', 'TK_BAND', 'TK_BOR', 'TK_BNOT',
		'TK_EQUAL', 'TK_NOT_EQUAL', 'TK_LESS',
		'TK_LESS_OR_EQUAL', 'TK_GREATER',
		'TK_GREATER_OR_EQUAL', 'TK_CONCAT', 'TK_DOTS',
		'TK_SHL', 'TK_SHR', 'TK_SAR',
		'TK_AND_SHORT', 'TK_OR_SHORT',
		'TK_NAV', 'TK_COAL', 'TK_ARROW', 'TK_ASSIGN'
	], true);
}

function IsLuaOperand(string $type): bool
{
	return $type === 'TK_NAME' ||
			$type === 'TK_NUMBER' ||
			$type === 'TK_STRING' ||
			$type === 'TK_TRUE' ||
			$type === 'TK_FALSE' ||
			$type === 'TK_NIL';
}

function ResolveLuaMethod($object, $method, $parser)
{
	$functionFile = FileSystem::FindFile($method);
	$parentFile = FileSystem::FindFile($object);

	if (!$functionFile)
		$functionFile = FileSystem::FindFuzzyFile($method, $object);

	if (!$parentFile && $functionFile)
		$parentFile = $parser->findParent($functionFile);

	return [$functionFile, $parentFile];
}

function RenderLuaMethod($object, $separator, $method, $parser)
{
	[$functionFile, $parentFile] = ResolveLuaMethod($object, $method, $parser);

	if (!$functionFile)
		return null;

	$output = '';

	if ($parentFile)
	{
		$output .= '<span class="className">';
		$output .= '<a href="/' . $parser->PageAddress($parentFile) . '">';
	   		$output .= htmlspecialchars($object, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
		$output .= '</a>';
		$output .= '</span>';
	}
	else
	{
		$output .= htmlspecialchars($object, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
	}

	$output .= htmlspecialchars($separator, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

	$output .= '<span class="method">';
	$output .= '<a ';

	if ($functionFile)
		$output .= 'href="/' . $parser->PageAddress($functionFile) . '"';
	else
		$output .= 'target="_blank"';

	$output .= '>' . htmlspecialchars($method, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</a>';
	$output .= '</span>';

	return $output;
}

// Port from HolyLib's implementation
function ParseLua(string $content): array
{
	$tokens = [];
	$length = strlen($content);
	$i = 0;

	$keywords = [
		'and' => 'TK_AND',
		'break' => 'TK_BREAK',
		'const' => 'TK_CONST',
		'continue' => 'TK_CONTINUE',
		'do' => 'TK_DO',
		'else' => 'TK_ELSE',
		'elseif' => 'TK_ELSEIF',
		'end' => 'TK_END',
		'false' => 'TK_FALSE',
		'for' => 'TK_FOR',
		'function' => 'TK_FUNCTION',
		'goto' => 'TK_GOTO',
		'if' => 'TK_IF',
		'in' => 'TK_IN',
		'local' => 'TK_LOCAL',
		'nil' => 'TK_NIL',
		'not' => 'TK_NOT',
		'or' => 'TK_OR',
		'repeat' => 'TK_REPEAT',
		'return' => 'TK_RETURN',
		'then' => 'TK_THEN',
		'true' => 'TK_TRUE',
		'until' => 'TK_UNTIL',
		'while' => 'TK_WHILE'
	];

	$addToken = function(string $type, string $content, bool $isSpace = false) use (&$tokens) {
		$tokens[] = ['type' => $type, 'content' => $content, 'isSpace' => $isSpace];
	};

	$match = function(string $text) use (&$content, &$i, &$length): bool {
		$len = strlen($text);
		return $i + $len <= $length && substr($content, $i, $len) === $text;
	};

	while ($i < $length)
	{
		$c = $content[$i];

		if ($c === "\n")
		{
			$addToken('TK_LINEEND', "\n", true);
			$i++;
			continue;
		}

		if ($c === ' ' || $c === "\t" || $c === "\r")
		{
			$addToken('TK_WHITESPACE', $c, true);
			$i++;
			continue;
		}

		if ($match('--'))
		{
			$start = $i;
			$i += 2;

			if ($i < $length && $content[$i] === '[')
			{
				$j = $i + 1;
				$level = 0;

				while ($j < $length && $content[$j] === '=')
				{
					$level++;
					$j++;
				}

				if ($j < $length && $content[$j] === '[')
				{
					$i = $j + 1;

					while ($i < $length)
					{
						if ($content[$i] === ']')
						{
							$j = $i + 1;
							$closeLevel = 0;

							while ($j < $length && $content[$j] === '=')
							{
								$closeLevel++;
								$j++;
							}

							if ($closeLevel === $level && $j < $length && $content[$j] === ']')
							{
								$i = $j + 1;
								break;
							}
						}

						$i++;
					}
				}
				else
				{
					while ($i < $length && $content[$i] !== "\n")
						$i++;
				}
			}
			else
			{
				while ($i < $length && $content[$i] !== "\n")
					$i++;
			}

			$addToken('TK_COMMENT', substr($content, $start, $i - $start));
			continue;
		}

		if ($c === '"' || $c === "'")
		{
			$quote = $c;
			$start = $i++;
			
			while ($i < $length)
			{
				if ($content[$i] === '\\')
				{
					$i += 2;
					continue;
				}

				if ($content[$i] === $quote)
				{
					$i++;
					break;
				}

				$i++;
			}

			$addToken('TK_STRING', substr($content, $start, $i - $start));
			continue;
		}

		if ($c === '[')
		{
			$start = $i;
			$j = $i + 1;
			$level = 0;

			while ($j < $length && $content[$j] === '=')
			{
				$level++;
				$j++;
			}

			if ($j < $length && $content[$j] === '[')
			{
				$i = $j + 1;

				while ($i < $length)
				{
					if ($content[$i] === ']')
					{
						$j = $i + 1;
						$closeLevel = 0;

						while ($j < $length && $content[$j] === '=')
						{
							$closeLevel++;
							$j++;
						}

						if ($closeLevel === $level && $j < $length && $content[$j] === ']')
						{
							$i = $j + 1;
							break;
						}
					}

					$i++;
				}

				$addToken('TK_STRING', substr($content, $start, $i - $start));
				continue;
			}
		}

		if (ctype_digit($c))
		{
			$start = $i;

			if ($c === '0' && $i + 1 < $length && ($content[$i + 1] === 'x' || $content[$i + 1] === 'X'))
			{
				$i += 2;

				while ($i < $length && ctype_xdigit($content[$i]))
					$i++;

				if ($i < $length && $content[$i] === '.')
				{
					$i++;

					while ($i < $length && ctype_xdigit($content[$i]))
						$i++;
				}

				if ($i < $length && ($content[$i] === 'p' || $content[$i] === 'P'))
				{
					$i++;

					if ($i < $length && ($content[$i] === '+' || $content[$i] === '-'))
						$i++;

					while ($i < $length && ctype_digit($content[$i]))
						$i++;
				}
			}
			else
			{
				while ($i < $length && ctype_digit($content[$i]))
					$i++;

				if ($i < $length && $content[$i] === '.' && !($i + 1 < $length && $content[$i + 1] === '.'))
				{
					$i++;

					while ($i < $length && ctype_digit($content[$i]))
						$i++;
				}

				if ($i < $length && ($content[$i] === 'e' || $content[$i] === 'E'))
				{
					$i++;

					if ($i < $length && ($content[$i] === '+' || $content[$i] === '-'))
						$i++;

					while ($i < $length && ctype_digit($content[$i]))
						$i++;
				}
			}

			$addToken('TK_NUMBER', substr($content, $start, $i - $start));
			continue;
		}

		if (ctype_alpha($c) || $c === '_')
		{
			$start = $i++;

			while ($i < $length)
			{
				$ch = $content[$i];

				if (ctype_alnum($ch) || $ch === '_')
					$i++;
				else
					break;
			}

			$word = substr($content, $start, $i - $start);
			$addToken($keywords[$word] ?? 'TK_NAME', $word);
			continue;
		}

		if ($match('...'))
		{
			$addToken('TK_DOTS', '...');
			$i += 3;
			continue;
		}

		if ($match('~>>'))
		{
			$addToken('TK_SAR', '~>>');
			$i += 3;
			continue;
		}

		if ($match('=='))
		{
			$addToken('TK_EQUAL', '==');
			$i += 2;
			continue;
		}

		if ($match('~='))
		{
			$addToken('TK_NOT_EQUAL', '~=');
			$i += 2;
			continue;
		}

		if ($match('!='))
		{
			$addToken('TK_NOT_EQUAL', '!=');
			$i += 2;
			continue;
		}

		if ($match('>='))
		{
			$addToken('TK_GREATER_OR_EQUAL', '>=');
			$i += 2;
			continue;
		}

		if ($match('<='))
		{
			$addToken('TK_LESS_OR_EQUAL', '<=');
			$i += 2;
			continue;
		}

		if ($match('..'))
		{
			$addToken('TK_CONCAT', '..');
			$i += 2;
			continue;
		}

		if ($match('<<'))
		{
			$addToken('TK_SHL', '<<');
			$i += 2;
			continue;
		}

		if ($match('>>'))
		{
			$addToken('TK_SHR', '>>');
			$i += 2;
			continue;
		}

		if ($match('&&'))
		{
			$addToken('TK_AND_SHORT', '&&');
			$i += 2;
			continue;
		}

		if ($match('||'))
		{
			$addToken('TK_OR_SHORT', '||');
			$i += 2;
			continue;
		}

		if ($match('?.'))
		{
			$addToken('TK_NAV', '?.');
			$i += 2;
			continue;
		}

		if ($match('??'))
		{
			$addToken('TK_COAL', '??');
			$i += 2;
			continue;
		}

		if ($match('->'))
		{
			$addToken('TK_ARROW', '->');
			$i += 2;
			continue;
		}

		if ($match('::'))
		{
			$addToken('TK_LABEL', '::');
			$i += 2;
			continue;
		}

		$singleCharTokens = [
			'+' => 'TK_ADD',
			'-' => 'TK_SUB',
			'*' => 'TK_MUL',
			'/' => 'TK_DIV',
			'%' => 'TK_MOD',
			'^' => 'TK_POW',
			'#' => 'TK_LEN',
			'&' => 'TK_BAND',
			'|' => 'TK_BOR',
			'~' => 'TK_BNOT',
			'=' => 'TK_ASSIGN',
			'<' => 'TK_LESS',
			'>' => 'TK_GREATER',
			'(' => 'TK_LPAREN',
			')' => 'TK_RPAREN',
			'{' => 'TK_LBRACE',
			'}' => 'TK_RBRACE',
			'[' => 'TK_LBRACKET',
			']' => 'TK_RBRACKET',
			';' => 'TK_SEMICOLON',
			':' => 'TK_COLON',
			',' => 'TK_COMMA',
			'.' => 'TK_DOT'
		];

		if (isset($singleCharTokens[$c]))
		{
			$addToken($singleCharTokens[$c], $c);
			$i++;
			continue;
		}

		$addToken('TK_INVALID', $c);
		$i++;
	}

	$addToken('TK_EOF', '');

	return $tokens;
}

?>