<?php
include "../../bits/functions.php";
$type = $_GET['type'];
$dir = "../../posts/$type/";

if (is_dir($dir)) {
	$dataPath = $dir . "data.json";

	if (file_exists($dataPath)) {
		$data = json_decode(file_get_contents($dataPath));
	} else {
		$data = json_decode("{\"posts\":[]}");
	}

	head($data->name, "posts");
	nav();
	
	/*
	foreach ($data->posts as $post) {
		echo "<pre>";
		print_r($post);
		echo "</pre>";
	}
	*/
	display("posts", array("type"=>$data->type, "name"=>$data->name, "posts"=>$data->posts));

	foot("posts");
} else {
	error_page("Unrecognized post type: $type");
}
?>