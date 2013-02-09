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
	<body><?php
}

function foot($page_name) {
	?>
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
		<a href="https://twitter.com/jetpacmonkey" class="twitter">
			<span class="icon-social" data-icon="t"></span>
			<span class="descText">@jetpacmonkey</span>
		</a>
		<a href="https://facebook.com/jetpacmonkey" class="facebook">
			<span class="icon-social" data-icon="F"></span>
			<span class="descText">Jeremy Tice</span>
		</a>
	</nav>

	<nav class="nav-2">
		<header>Content</header>
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
