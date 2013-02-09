<?php
include "../../bits/functions.php";

$type = $_GET['type'];
$id = $_GET['id'];
$slug = $_GET['slug'];
$dir = "../../posts/$type/";

if (is_dir($dir)) {
	$dataPath = $dir . "data.json";

	if (file_exists($dataPath)) {
		$data = json_decode(file_get_contents($dataPath));
	} else {
		$data = json_decode("{\"posts\":[]}");
	}
	echo "<pre>";
	print_r($data);
	echo "</pre>";
} else {
	error_page("Unrecognized post type: $type");
}
