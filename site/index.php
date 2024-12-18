<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

	$config = array(
		'name' => "HolyLib Wiki", 
		'front_page' => 'gmod.md',
		'missing_page' => 'missing.md',
		'pages_path' => 'pages/',
		'issues_url' => 'https://github.com/RaphaelIT7/gmod-holylib/issues/',
		'code_language' => 'lua', // lua or c++
		'icon' => '',
		'version' => 0.61,
		'next_version' => 0.7,
	);

	$categories = array(
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
				array(
					'mdi' => 'mdi-database',
					'name' => 'ConVars',
					'path' => 'modules/pvs/convars',
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
			'name' => 'entitiylist', 
			'categories' => array(
				array(
					'mdi' => 'mdi-bookshelf',
					'name' => 'Libraries',
					'path' => 'modules/entitiylist/libraries',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-book',
					'name' => 'Classes',
					'path' => 'modules/entitiylist/classes',
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
					'path' => 'modules/entitiylist/libraries',
					'tags' => 'true',
				),
				array(
					'mdi' => 'mdi-book',
					'name' => 'Classes',
					'path' => 'modules/entitiylist/classes',
					'tags' => 'true',
				),
			),
		),
	);

	# I hate this so much XD
	$requestedFile = $_SERVER['REQUEST_URI'];
	if (preg_match('/\.ttf.*$/', $requestedFile)) {
		$contentType = 'font/ttf';
	} elseif (preg_match('/\.eot.*$/', $requestedFile)) {
		$contentType = 'application/vnd.ms-fontobject';
	} elseif (preg_match('/\.woff.*$/', $requestedFile)) {
		$contentType = 'font/woff';
	} elseif (preg_match('/\.woff2.*$/', $requestedFile)) {
		$contentType = 'font/woff2';
	}

	if (isset($contentType))
	{
		header("Content-Type: $contentType");
		if ($contentType == 'font/ttf')
			readfile("fonts/materialdesignicons-webfont.ttf");
		else if ($contentType == 'font/woff')
			readfile("fonts/materialdesignicons-webfont.woff");
		else if ($contentType == 'font/woff2')
			readfile("fonts/materialdesignicons-webfont.woff2");
		exit(0);
	}

	if ($config['code_language'] == 'c++') {
		$config['code_funcseparator'] = '::';
	} elseif ($config['code_language'] == 'lua') {
		$config['code_funcseparator'] = ':';
	}

	include('Extension.php');
	include('mysql.php');
	include('Importer.php');

	$MySQL = new MySQL();
	$MySQL->Init();

	$Parsedown = new Extension();
	$Parsedown->config = $config;
	$Parsedown->categories = $categories;

	$Importer = new Importer();
	$Importer->Init($MySQL, $Parsedown);
	$Importer->ImportEverything(); # I want to remove this later. Maybe having a cron job run it every minute would be better than every request?

	if (isset($_GET['url'])) {
		$currentPage = $_GET['url'];
	} else {
		$currentUrl = $_SERVER['REQUEST_URI'];
		$currentPage = strtr(substr(parse_url($currentUrl, PHP_URL_PATH), 1), array("gmod/" => ""));
	}

	//title = $config['name'];
	$currentSQLPage = $MySQL->GetFullPage($currentPage);
	$title = isset($currentSQLPage) ? $currentSQLPage['title'] : null;
	if (!isset($title))
		$missing = True;
?>

<?php if (!isset($_GET["format"])): ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?php echo $title; ?> - <?php echo $config['name']; ?></title>
		<link rel="icon" type="image/png" href="https://files.facepunch.com/garry/822e60dc-c931-43e4-800f-cbe010b3d4cc.png">
		<link rel="search" title="<?php echo $config['name']; ?>" type="application/opensearchdescription+xml" href="https://wiki.facepunch.com/gmod/~searchmanifest" />
		<script href="https://wiki.facepunch.com/cdn-cgi/apps/head/JodREY1zTjWBVnPepvx61z0haaQ.js"></script>
		<link rel="stylesheet" href="https://wiki.facepunch.com/styles/gmod.css?n=7fe51698-72dd-4fa7-aee6-7942d119990a" />
		<script src="https://wiki.facepunch.com/script.js?n=7fe51698-72dd-4fa7-aee6-7942d119990a"></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<meta name="theme-color" content="#0082ff">

		<meta property="og:title" name="og:title" content="<?php echo $config['name']; ?>">
		<meta property="og:site_name" name="og:site_name" content="<?php echo $config['name']; ?>">
		<meta property="og:type" name="og:type" content="website">
		<meta property="og:description" name="og:description" content="Welcome to the HolyLib Wiki.&#xA;Here you will find a lot of documentation about HolyLib.&#xA;">
		<script>WikiRealm = "gmod";</script>
	</head>
	<style>
		@font-face {
		font-family: "Material Design Icons";
		src: url("https://wiki.facepunch.com/fonts/materialdesignicons-webfont.eot?v=5.9.55");
		src: url("https://wiki.facepunch.com/fonts/materialdesignicons-webfont.eot?#iefix&v=5.9.55") format("embedded-opentype"), url("https://wiki.facepunch.com/fonts/materialdesignicons-webfont.woff2?v=5.9.55") format("woff2"), url("https://wiki.facepunch.com/fonts/materialdesignicons-webfont.woff?v=5.9.55") format("woff"), url("../../fonts/materialdesignicons-webfont.ttf?v=5.9.55") format("truetype");
		font-weight: normal;
		font-style: normal;
		}
		.mdi:before,
		.mdi-set {
		display: inline-block;
		font: normal normal normal 24px/1 "Material Design Icons";
		font-size: inherit;
		text-rendering: auto;
		line-height: inherit;
		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale;
		}
	</style>
	<body>
		<div id="toolbar">
			<div>
				<div>
					<button onclick="ToggleClass( 'sidebar', 'visible' )"><i class="mdi mdi-menu"></i></button>
				</div>

				<div class="grow"></div>

				<h1 class="title">
					<a href="/"><?php echo $config['name']; ?></a>
				</h1>
			</div>
		</div>

		<div class="body">
			<div class="body-tabs">
				<div class="pagetitle" id="tabs_page_title"><a href="/" class="parent">Home</a> / 
					<?php
						echo '<a href="';
						if (isset($_GET["page"]))
						{
							echo '/' . $_GET["page"];
						} else {
							echo '/';
						}
						echo '">';
						echo $title;
						echo '</a>';
					?>
				</div>

				<ul id="pagelinks">
				</ul>
			</div>

			<div class="content">
				<div class="content">
					<h1 class="pagetitle" id="pagetitle"><?php echo $title; ?></h1>
					<div class="markdown" id="pagecontent">
						<?php
							if (isset($missing)) {
								echo '<a name="notfound" class="anchor_offset"></a>';
								echo '<h1>Not Found<a class"anchor" href="#notfound"><i class="mdi mdi-link-variant"></i></a></h1>This page is missing.';
							} else {
								echo $currentSQLPage['html'];
							}   
						?>
					</div>
				</div>

				<div class="footer" id="pagefooter">
					<?php
						echo 'Page views: ' . $MySQL->GetIncreasedViews($currentPage);
						echo '<br>';
						echo 'Updated: ' . $currentSQLPage['updated'];
					?>
				</div>
			</div>

			<div class="footer" id="pagefooter">
			</div>
		</div>

		<div id="sidebar">
			<div>
				<div id="ident">
					<div class="icon">
						<a href="/">
							<img src="https://files.facepunch.com/garry/822e60dc-c931-43e4-800f-cbe010b3d4cc.png" />
						</a>
					</div>
					<h1 class="title">
						<a href="/"><?php echo $config['name']; ?></a>
					</h1>
				</div>

				<div id="topbar">
					<div class="search">
						<input autocomplete="off" id="search" type="search" placeholder="press / to quick search" />
					</div>
				</div>

				<div id="searchresults"></div>

				<div id="contents">
					<?php
						// SideBar is built in Importer.php -> UpdateSideBar
						echo $MySQL->GetCachePage('sidebar');
					?>
				</div>
			</div>
		</div>
		<script>
			function InitSearch() {
				SearchInput = document.getElementById("search");
				SearchResults = document.getElementById("searchresults");
				SidebarContents = document.getElementById("contents");
				SearchInput.addEventListener("input", e => {
					clearTimeout(SearchDelay);
					SearchDelay = setTimeout(UpdateSearch, 200);
				});
			}
			// We removed enter. (We don't support it yet.)
			function AddSearchTitle() {
				if (Titles.length == 0)
					return;
				if (SectionHeader != null) {
					var copy = SectionHeader.cloneNode(true);
					SearchResults.appendChild(copy);
					SectionHeader = null;
				}
				for (var i = 0; i < Titles.length; i++) {
					var cpy = Titles[i].cloneNode(true);
					if (cpy.href)
						cpy.onclick = e => location.replace(cpy.href);
					cpy.className = "node" + ((TitleCount - Titles.length) + i);
					SearchResults.appendChild(cpy);
				}
				Titles = [];
			}

			function SearchRecursive(str, el, tags) {
				var title = null;
				if (el.children.length > 0 && el.children[0].tagName == "SUMMARY") {
					title = el.children[0].children[0];
					Titles.push(title);
					TitleCount++;
				}
				var children = el.children;
				for (var i = 0; i < children.length; i++) {
					var child = children[i];
					if (child.className == "sectionheader")
						SectionHeader = child;
					if (child.tagName == "A") {
						if (child.parentElement.tagName == "SUMMARY")
							continue;
						var txt = child.getAttribute("search");
						if (txt != null) {
							var found = txt.match(str);
							if (found && tags.length > 0) {
								var tagClasses = { "is:server": "rs", "is:sv": "rs", "is:client": "rc", "is:cl": "rc", "is:menu": "rm", "is:mn": "rm" };
								var tagNotClasses = { "not:server": "rs", "not:sv": "rs", "not:client": "rc", "not:cl": "rc", "not:menu": "rm", "not:mn": "rm" };
								tags.forEach(str => {
									if (tagClasses[str] != null && !child.classList.contains(tagClasses[str])) {
										found = null;
									}
									if (tagNotClasses[str] != null && child.classList.contains(tagNotClasses[str])) {
										found = null;
									}
									if (str == "is:global" && child.getAttribute("href").indexOf("Global.") == -1) {
										found = null;
									}
									if (str == "is:enum" && child.getAttribute("href").indexOf("Enums/") == -1) {
										found = null;
									}
									if (str == "is:struct" && child.getAttribute("href").indexOf("Structures/") == -1) {
										found = null;
									}
								});
							}
							if (found) {
								if (ResultCount < MaxResultCount) {
									AddSearchTitle();
									var copy = child.cloneNode(true);
									copy.onclick = e => location.replace(cpy.href);
									copy.classList.add("node" + TitleCount);
									SearchResults.appendChild(copy);
								}
								ResultCount++;
							}
						}
					}
					SearchRecursive(str, child, tags);
				}
				if (title != null) {
					TitleCount--;
					if (Titles[Titles.length - 1] == title) {
						Titles.pop();
					}
				}
			}

			function UpdateSearch(limitResults = true) {
				if (limitResults)
					MaxResultCount = 100;
				else
					MaxResultCount = 2000;
				var child = SearchResults.lastElementChild;
				while (child) {
					SearchResults.removeChild(child);
					child = SearchResults.lastElementChild;
				}
				var string = SearchInput.value;
				var tags = [];
				var searchTerms = string.split(" ");
				searchTerms.forEach(str => {
					if (str.startsWith("is:") || str.startsWith("not:")) {
						tags.push(str);
						string = string.replace(str, "");
					}
				});
				if (string.length < 2) {
					SidebarContents.classList.remove("searching");
					SearchResults.classList.remove("searching");
					var sidebar = document.getElementById("sidebar");
					var active = sidebar.getElementsByClassName("active");
					if (active.length == 1) {
						active[0].scrollIntoView({ block: "center" });
					}
					return;
				}
				SidebarContents.classList.add("searching");
				SearchResults.classList.add("searching");
				ResultCount = 0;
				Titles = [];
				TitleCount = 0;
				SectionHeader = null;
				if (string.toUpperCase() == string && string.indexOf("_") != -1) {
					string = string.substring(0, string.indexOf("_"));
				}
				var parts = string.split(' ');
				var q = "";
				for (var i in parts) {
					if (parts[i].length < 1)
						continue;
					var t = parts[i].replace(/([^a-zA-Z0-9_-])/g, "\\$1");
					q += ".*(" + t + ")";
				}
				q += ".*";
				var regex = new RegExp(q, 'gi');
				SearchRecursive(regex, SidebarContents, tags);
				if (limitResults && ResultCount > MaxResultCount) {
					var moreresults = document.createElement('a');
					moreresults.href = "#";
					moreresults.classList.add('noresults');
					moreresults.innerHTML = (ResultCount - 100) + ' more results - show more?';
					moreresults.onclick = (e) => { UpdateSearch(false); return false; };
					SearchResults.append(moreresults);
				}
				if (SearchResults.children.length == 0) {
					var noresults = document.createElement('span');
					noresults.classList.add('noresults');
					SearchResults.appendChild(noresults);
				}
			}

			var sidebar = document.getElementById( "sidebar" );
			var active = sidebar.getElementsByClassName( "active" );
			if ( active.length == 1 )
			{
				active[0].scrollIntoView( { smooth: true, block: "center" } );
			}

			InitSearch();
			// Navigate.Install();
		</script>
	</body>
</html>
<?php else:
	header('Content-Type:text/plain');
	if ($_GET["format"] === 'text') {
		echo $MySQL->GetMarkup($currentPage);
	} elseif ($_GET["format"] === 'html') {
		echo $MySQL->GetHTML($currentPage);
	} elseif ($_GET["format"] === 'json') {
		function escapeForJson($string) {
			return json_encode(str_replace(array("\n", "\r", "\t"), '', $string));
		}

echo '{
	"title": "' . $title .'",
	"wikiName": "' . $config['name'] . '",
	"wikiIcon": "' . $config['icon'] . '",
	"wikiUrl": "gmod",
	"tags": "' . $MySQL->GetSearchTags($currentPage) . '",
	"address": ' . escapeForJson($currentPage) . ',
	"createdTime": "2020-01-21T17:09:42.1+00:00",
	"updateCount": ' . $MySQL->GetUpdateCount($currentPage) . ',
	"markup":' . json_encode($MySQL->GetMarkup($currentPage)) . ',
	"html":' . escapeForJson($MySQL->GetHTML($currentPage)) . ',
	"footer": "Page views: ' . $MySQL->GetViews($currentPage) . '\u003Cbr\u003EUpdated: ' . $MySQL->GetLastUpdated($currentPage) . '",
	"revisionId": ' . $MySQL->GetRevision($currentPage) . ',
	"pageLinks":[
		{
			"url":"' . (isset($_GET['url']) ? $_GET['url'] : $currentPage) .'",
			"label":"View",
			"icon":"file",
			"description":""
		},
		{
			"url":"' . (isset($_GET['url']) ? $_GET['url'] : $currentPage) .'~edit",
			"label":"Edit",
			"icon":"pencil",
			"description":""
		},
		{
			"url":"' . (isset($_GET['url']) ? $_GET['url'] : $currentPage) .'~history",
			"label":"History",
			"icon":"history",
			"description":""
		}
	]
}';
	}

	endif;
?>