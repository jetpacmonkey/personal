<?php
include "../../bits/functions.php";
$type = $_GET['type'];
$dir = "../../posts/$type/";

if (is_dir($dir)) {
	connect();

	$query = "SELECT * FROM post_types WHERE short=\"$type\"";
	$result = mysqli_query($link, $query);

	$data = mysqli_fetch_assoc($result);
	
	$query = "SELECT * FROM posts WHERE type=\"$type\" ORDER BY `date` DESC";
	$posts_result = mysqli_query($link, $query);

	$posts = array();
	while ($row = mysqli_fetch_assoc($posts_result)) {
		$posts[] = $row;
	}

	disconnect();

	head($data['long'], "posts");
	nav();

	display("posts", array(
		"type" => $data['type'],
		"short" => $data['short'],
		"name" => $data['long'],
		"posts" => $posts));

	foot("posts");
} else {
	error_page("Unrecognized post type: $type");
}
?>