<?php
include "local_settings.php";

function head($title, $page_name) {
	?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" type="text/css" href="/css/main.css">
		<link rel="stylesheet" type="text/css" href="/css/<?php echo $page_name; ?>.css">
		<meta name="viewport" content="width=device-width">
	</head>
	<body>
		<header class="pageTitle"><a href="/">Jeremy Tice</a></header>
		<div id="body"><?php
}

function foot($page_name) {
	?>
		</div>
		<script type="text/javascript" src="/js/main.js"></script>
		<script type="text/javascript" src="/js/<?php echo $page_name; ?>.js"></script>
	</body>
</html>
	<?php
}

function nav() {
	?>
<div class="navWrapper">
	<nav class="nav-1">
		<header>Social</header>
		<a href="https://twitter.com/jetpacmonkey" class="twitter" title="Twitter">
			<span class="icon-social" data-icon="t" alt="Twitter"></span>
			<span class="descText">@jetpacmonkey</span>
		</a>
		<a href="https://facebook.com/jetpacmonkey" class="facebook" title="Facebook">
			<span class="icon-social" data-icon="F" alt="Facebook"></span>
			<span class="descText">Jeremy Tice</span>
		</a>
		<a href="http://www.linkedin.com/pub/jeremy-tice/12/490/4ab/" class="linkedin" title="LinkedIn">
			<span class="icon-social" data-icon="l" alt="LinkedIn"></span>
			<span class="descText">Jeremy Tice</span>
		</a>
	</nav>

	<nav class="nav-2">
		<header>Content</header>
		<a href="/about" class="about">
			<span class="icon" data-icon="X"></span>
			<span class="descText">About Me</span>
		</a>
		<a href="/posts/projects" class="projects">
			<span class="icon" data-icon="+"></span>
			<span class="descText">Projects</span>
		</a>
		<a href="/posts/music" class="music">
			<span class="icon" data-icon="*"></span>
			<span class="descText">Music</span>
		</a>
		<a href="/posts/blog" class="blog">
			<span class="icon" data-icon="\"></span>
			<span class="descText">Blog</span>
		</a>
	</nav>
</div>
<?php
}

function error_page($msg) {
	head("Error", "error");
	nav();
	?>
	<div id="main">
		<?php echo htmlspecialchars($msg); ?>
	</div>
	<?php
	foot("error");
}

function connect() {
	global $settings;

	mysql_connect($settings['database']['host'], $settings['database']['user'], $settings['database']['password']);
	mysql_select_db($settings['database']['database']);
}

function disconnect() {
	mysql_close();
}

function display($template, $vars=array()) {
	global $settings;

	require($settings['root'] . 'bits/Smarty/libs/Smarty.class.php');

	$smarty = new Smarty();

	$smarty->setTemplateDir($settings['root'] . 'templates/templates');
	$smarty->setCompileDir($settings['root'] . 'templates/templates_c');
	$smarty->setCacheDir($settings['root'] . 'templates/cache');
	$smarty->setConfigDir($settings['root'] . 'templates/config');

	foreach ($vars as $key => $value) {
		$smarty->assign($key, $value);
	}

	$smarty->display("$template.tpl");
}

include_once "markdown_extra/markdown.php";
function md($txt) {
	return Markdown($txt);
}
?>
