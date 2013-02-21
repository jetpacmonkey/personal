<?php
include "../../bits/functions.php";
$type = $_GET['type'];
$dir = "../../posts/$type/";

if (is_dir($dir)) {
	connect();

	$query = "SELECT * FROM post_types WHERE short=\"$type\"";
	$result = mysql_query($query);

	$data = mysql_fetch_assoc($result);

	disconnect();

	head($data['short'], "posts");
	nav();
	
	/*
	foreach ($data->posts as $post) {
		echo "<pre>";
		print_r($post);
		echo "</pre>";
	}
	*/
	display("posts", array("type"=>$data['type'], "name"=>$data['long'], "posts"=>$posts));

	foot("posts");
} else {
	error_page("Unrecognized post type: $type");
}
?>