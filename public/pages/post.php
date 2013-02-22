<?php
include "../../bits/functions.php";

$type = $_GET['type'];
$id = (int) $_GET['id'];
$slug = $_GET['slug'];
$dir = "../../posts/$type/";

if (is_dir($dir)) {
	connect();

	$query = "SELECT * FROM posts WHERE type=\"$type\" AND id=$id";
	$result = mysqli_query($link, $query);

	$row = mysqli_fetch_assoc($result);

	disconnect();

	if (!$row || $row['slug'] != $slug) {
		//not found
		error_page("Unrecognized post.");
	} else {
		$title = $row['title'];
		$date = $row['date'];

		$filename = $row['filename'];
		$path = $dir . $filename;
		$content = file_get_contents($path);
		$html_content = md($content);

		head($title, "post");
		nav();

		display("post", array(
				"title" => $title,
				"date" => $date,
				"html_content" => $html_content
			)
		);

		foot("post");
	}
} else {
	error_page("Unrecognized post type: $type");
}
