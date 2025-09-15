<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

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
	} elseif (preg_match('/\.css.*$/', $requestedFile)) {
		$contentType = 'text/css';
	} elseif (preg_match('/\.js.*$/', $requestedFile)) {
		$contentType = 'text/javascript';
	}

	if (isset($contentType))
	{
		header("Content-Type: $contentType");
		if ($contentType == 'font/ttf') {
			readfile("fonts/materialdesignicons-webfont.ttf");
		} else if ($contentType == 'font/woff') {
			readfile("fonts/materialdesignicons-webfont.woff");
		} else if ($contentType == 'font/woff2') {
			readfile("fonts/materialdesignicons-webfont.woff2");
		} else if ($contentType == 'text/css') {
			readfile("gmod_style.css");
		} else if ($contentType == 'text/javascript') {
			readfile("gmod_script.js");
		}
		exit(0);
	}

	include('config.php');
	$config = GetConfig();
	$categories = $config['categories'];

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

		if ($config['xampp'])
		{
			$currentUrl = str_replace('/:', ':', $currentUrl); // Apache hates it
		}
	}

	if (strcmp($currentPage, "api/check_version") == 0)
	{
		// ToDo: HolyLib provides three headers we can use to check their version. HolyLib_Branch | HolyLib_RunNumber | HolyLib_Version
		header("Content-Type: text/plain");
		echo(json_encode(array(
			'status' => 'ok',
		)));
		return;
	}

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
		<link rel="stylesheet" href="gmod_style.css"/>
		<script src="gmod_script.js"></script>

		<meta name="theme-color" content="#0082ff">

		<meta property="og:title" name="og:title" content="<?php echo $config['name']; ?>">
		<meta property="og:site_name" name="og:site_name" content="<?php echo $config['name']; ?>">
		<meta property="og:type" name="og:type" content="website">
		<meta property="og:description" name="og:description" content="<?php echo htmlspecialchars(isset($currentSQLPage) ? $currentSQLPage['description'] : $config['description'], ENT_QUOTES | ENT_HTML5, 'UTF-8'); ?>">
		<script>WikiRealm = "gmod";</script>
	</head>
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
						echo 'Page views: ' . (isset($currentSQLPage) ? $MySQL->GetIncreasedViews($currentPage) : 0);
						echo '<br>';
						echo 'Updated: ' . (isset($currentSQLPage['updated']) ? $currentSQLPage['updated'] : 'Never');
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
			Navigate.Install();
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
echo '{
	"title": "' . $title .'",
	"wikiName": "' . $config['name'] . '",
	"wikiIcon": "' . $config['icon'] . '",
	"wikiUrl": "gmod",
	"tags": "' . $MySQL->GetSearchTags($currentPage) . '",
	"address": ' . json_encode($currentPage) . ',
	"createdTime": "2020-01-21T17:09:42.1+00:00",
	"updateCount": ' . $MySQL->GetUpdateCount($currentPage) . ',
	"markup":' . json_encode($MySQL->GetMarkup($currentPage)) . ',
	"html":' . json_encode($MySQL->GetHTML($currentPage)) . ',
	"footer": "Page views: ' . $MySQL->GetIncreasedViews($currentPage) . '\u003Cbr\u003EUpdated: ' . $MySQL->GetLastUpdated($currentPage) . '",
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