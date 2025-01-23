<?php
function GetConfig()
{
	return array(
	'name' => "HolyLib Wiki", 
	'front_page' => 'gmod.md',
	'missing_page' => 'missing.md',
	'pages_path' => 'pages/',
	'issues_url' => 'https://github.com/RaphaelIT7/gmod-holylib/issues/',
	'code_language' => 'lua', // lua or c++
	'icon' => '',
	'version' => 0.61,
	'next_version' => 0.7,
	'description' => 'Welcome to the HolyLib Wiki.&#xA;Here you will find a lot of documentation about HolyLib.&#xA;',
	'categories' => array(
		array(
			'name' => 'Basics', 
			'categories' => array(
				array(
					'mdi' => 'mdi-book',
					'name' => 'Basics',
					'path' => 'basics',
				),
				array(
					'mdi' => 'mdi-book',
					'name' => 'Wiki',
					'path' => 'wiki',
				),
			),
		),
		array(
			'name' => 'Types', 
			'categories' => array(
				array(
					'mdi' => 'mdi-language-lua',
					'name' => 'Lua Types',
					'path' => 'types',
				),
			),
		),
		array( // A category containing EVERY single thing
			'name' => 'Global', 
			'global' => true,
			'basePath' => 'modules',
			'categories' => array(
				array(
					'mdi' => 'mdi-code-braces',
					'name' => 'Globals',
					'path' => 'globals',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-bookshelf',
					'name' => 'Libraries',
					'path' => 'libraries',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-hook',
					'name' => 'Hooks',
					'path' => 'hooks',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-book',
					'name' => 'Classes',
					'path' => 'classes',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-database',
					'name' => 'ConVars',
					'path' => 'convars',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-server',
					'name' => 'Commands',
					'path' => 'commands',
					'tags' => 'true',
				),
			),
		),
		array(
			'name' => 'holylib', 
			'categories' => array(
				array(
					'mdi' => 'mdi-bookshelf',
					'name' => 'Libraries',
					'path' => 'modules/holylib/libraries',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-hook',
					'name' => 'Hooks',
					'path' => 'modules/holylib/hooks',
					'tags' => 'true',
				),
			),
		),
		array(
			'name' => 'gameevent', 
			'categories' => array(
				array(
					'mdi' => 'mdi-bookshelf',
					'name' => 'Libraries',
					'path' => 'modules/gameevent/libraries',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-hook',
					'name' => 'Hooks',
					'path' => 'modules/gameevent/hooks',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-book',
					'name' => 'Classes',
					'path' => 'modules/gameevent/classes',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-database',
					'name' => 'ConVars',
					'path' => 'modules/gameevent/convars',
					'tags' => 'true',
				),
			),
		),
		array(
			'name' => 'precachefix', 
			'categories' => array(
				array(
					'mdi' => 'mdi-hook',
					'name' => 'Hooks',
					'path' => 'modules/precachefix/hooks',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-database',
					'name' => 'ConVars',
					'path' => 'modules/precachefix/convars',
					'tags' => 'true',
				),
			),
		),
		array(
			'name' => 'stringtable', 
			'categories' => array(
				array(
					'mdi' => 'mdi-bookshelf',
					'name' => 'Libraries',
					'path' => 'modules/stringtable/libraries',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-hook',
					'name' => 'Hooks',
					'path' => 'modules/stringtable/hooks',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-book',
					'name' => 'Classes',
					'path' => 'modules/stringtable/classes',
					'tags' => 'true',
				),
			),
		),
		array(
			'name' => 'pvs', 
			'categories' => array(
				array(
					'mdi' => 'mdi-bookshelf',
					'name' => 'Libraries',
					'path' => 'modules/pvs/libraries',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-hook',
					'name' => 'Hooks',
					'path' => 'modules/pvs/hooks',
					'tags' => 'true',
				),
			),
		),
		array(
			'name' => 'surffix', 
			'categories' => array(
				array(
					'mdi' => 'mdi-database',
					'name' => 'ConVars',
					'path' => 'modules/surffix/convars',
					'tags' => 'true',
				),
			),
		),
		array(
			'name' => 'filesystem', 
			'categories' => array(
				array(
					'mdi' => 'mdi-bookshelf',
					'name' => 'Libraries',
					'path' => 'modules/filesystem/libraries',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-database',
					'name' => 'ConVars',
					'path' => 'modules/filesystem/convars',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-server',
					'name' => 'Commands',
					'path' => 'modules/filesystem/commands',
					'tags' => 'true',
				),
			),
		),
		array(
			'name' => 'util', 
			'categories' => array(
				array(
					'mdi' => 'mdi-bookshelf',
					'name' => 'Libraries',
					'path' => 'modules/util/libraries',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-database',
					'name' => 'ConVars',
					'path' => 'modules/util/convars',
					'tags' => 'true',
				),
			),
		),
		array(
			'name' => 'concommand', 
			'categories' => array(
				array(
					'mdi' => 'mdi-database',
					'name' => 'ConVars',
					'path' => 'modules/concommand/convars',
					'tags' => 'true',
				),
			),
		),
		array(
			'name' => 'vprof', 
			'categories' => array(
				array(
					'mdi' => 'mdi-bookshelf',
					'name' => 'Libraries',
					'path' => 'modules/vprof/libraries',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-book',
					'name' => 'Classes',
					'path' => 'modules/vprof/classes',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-database',
					'name' => 'ConVars',
					'path' => 'modules/vprof/convars',
					'tags' => 'true',
				),
			),
		),
		array(
			'name' => 'cvars', 
			'categories' => array(
				array(
					'mdi' => 'mdi-bookshelf',
					'name' => 'Libraries',
					'path' => 'modules/cvars/libraries',
					'tags' => 'true',
				),
			),
		),
		array(
			'name' => 'sourcetv', 
			'categories' => array(
				array(
					'mdi' => 'mdi-bookshelf',
					'name' => 'Libraries',
					'path' => 'modules/sourcetv/libraries',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-hook',
					'name' => 'Hooks',
					'path' => 'modules/sourcetv/hooks',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-book',
					'name' => 'Classes',
					'path' => 'modules/sourcetv/classes',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-database',
					'name' => 'ConVars',
					'path' => 'modules/sourcetv/convars',
					'tags' => 'true',
				),
			),
		),
		array(
			'name' => 'bitbuf', 
			'categories' => array(
				array(
					'mdi' => 'mdi-bookshelf',
					'name' => 'Libraries',
					'path' => 'modules/bitbuf/libraries',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-book',
					'name' => 'Classes',
					'path' => 'modules/bitbuf/classes',
					'tags' => 'true',
				),
			),
		),
		array(
			'name' => 'steamworks', 
			'categories' => array(
				array(
					'mdi' => 'mdi-bookshelf',
					'name' => 'Libraries',
					'path' => 'modules/steamworks/libraries',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-hook',
					'name' => 'Hooks',
					'path' => 'modules/steamworks/hooks',
					'tags' => 'true',
				),
			),
		),
		array(
			'name' => 'systimer', 
			'categories' => array(
				array(
					'mdi' => 'mdi-bookshelf',
					'name' => 'Libraries',
					'path' => 'modules/systimer/libraries',
					'tags' => 'true',
				),
			),
		),
		array(
			'name' => 'pas', 
			'categories' => array(
				array(
					'mdi' => 'mdi-bookshelf',
					'name' => 'Libraries',
					'path' => 'modules/pas/libraries',
					'tags' => 'true',
				),
			),
		),
		array(
			'name' => 'voicechat', 
			'categories' => array(
				array(
					'mdi' => 'mdi-bookshelf',
					'name' => 'Libraries',
					'path' => 'modules/voicechat/libraries',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-hook',
					'name' => 'Hooks',
					'path' => 'modules/voicechat/hooks',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-book',
					'name' => 'Classes',
					'path' => 'modules/voicechat/classes',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-database',
					'name' => 'ConVars',
					'path' => 'modules/voicechat/convars',
					'tags' => 'true',
				),
			),
		),
		array(
			'name' => 'physenv', 
			'categories' => array(
				array(
					'mdi' => 'mdi-bookshelf',
					'name' => 'Libraries',
					'path' => 'modules/physenv/libraries',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-hook',
					'name' => 'Hooks',
					'path' => 'modules/physenv/hooks',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-book',
					'name' => 'Classes',
					'path' => 'modules/physenv/classes',
					'tags' => 'true',
				),
			),
		),
		array(
			'name' => 'bass', 
			'categories' => array(
				array(
					'mdi' => 'mdi-bookshelf',
					'name' => 'Libraries',
					'path' => 'modules/bass/libraries',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-book',
					'name' => 'Classes',
					'path' => 'modules/bass/classes',
					'tags' => 'true',
				),
			),
		),
		array(
			'name' => 'entitylist', 
			'categories' => array(
				array(
					'mdi' => 'mdi-code-braces',
					'name' => 'Globals',
					'path' => 'modules/entitylist/globals',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-book',
					'name' => 'Classes',
					'path' => 'modules/entitylist/classes',
					'tags' => 'true',
				),
			),
		),
		array(
			'name' => 'httpserver', 
			'categories' => array(
				array(
					'mdi' => 'mdi-bookshelf',
					'name' => 'Libraries',
					'path' => 'modules/httpserver/libraries',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-book',
					'name' => 'Classes',
					'path' => 'modules/httpserver/classes',
					'tags' => 'true',
				),
			),
		),
		array(
			'name' => 'gameserver', 
			'categories' => array(
				array(
					'mdi' => 'mdi-bookshelf',
					'name' => 'Libraries',
					'path' => 'modules/gameserver/libraries',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-book',
					'name' => 'Classes',
					'path' => 'modules/gameserver/classes',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-hook',
					'name' => 'Hooks',
					'path' => 'modules/gameserver/hooks',
					'tags' => 'true',
				),
			),
		),
	)
	);
}
?>