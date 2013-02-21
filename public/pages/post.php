<?php
include "../../bits/functions.php";

$type = $_GET['type'];
$id = $_GET['id'];
$slug = $_GET['slug'];
$dir = "../../posts/$type/";

if (is_dir($dir)) {
	connect();

	$query = "SELECT * FROM post_types WHERE short=\"$type\"";
	$result = mysqli_query($query);

	print_r($result);

	disconnect();
} else {
	error_page("Unrecognized post type: $type");
}
