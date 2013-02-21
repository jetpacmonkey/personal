<?php
include "../../bits/functions.php";
$type = $_GET['type'];
$dir = "../../posts/$type/";

if (is_dir($dir)) {
	connect();

	$query = "SELECT * FROM post_types WHERE short=\"$type\"";
	$result = mysqli_query($query);

	$data = mysqli_fetch_assoc($result);

	disconnect();

	head($data['long'], "posts");
	nav();
	
	$query = "SELECT * FROM posts WHERE type=\"$type\"";
	$posts_result = mysqli_query($query);

	$posts = array();
	while ($row = mysqli_fetch_assoc($posts_result)) {
		$posts[] = $row;
	}

	display("posts", array("type"=>$data['type'], "name"=>$data['long'], "posts"=>$posts));

	foot("posts");
} else {
	error_page("Unrecognized post type: $type");
}
?>