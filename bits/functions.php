<?php
function head($title, $page_name) {
	?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/<?php echo $page_name; ?>.css">
		<meta name="viewport" content="width=device-width">
	</head>
	<body><?php
}

function foot($page_name) {
	?>
		<script type="text/javascript" src="js/main.js"></script>
		<script type="text/javascript" src="js/<?php echo $page_name; ?>.js"></script>
	</body>
</html>
	<?php
}

include_once "markdown_extra/markdown.php";
function md($txt) {
	return Markdown($txt);
}
?>
