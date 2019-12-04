<?php

function print_p($v) {
	echo "<pre>",print_r($v),"</pre>";
}

function get_json($s) {
	return json_decode(file_get_contents($s));
}


function makeConn() {
	$db_host = "localhost";
	$db_user = "hamil19_class";
	$db_pass = "password";
	$db_name = "hamil19_class";

	$conn = new mysqli(
		$db_host,
		$db_user,
		$db_pass,
		$db_name
	);

	if($conn->connect_errno)
		die($conn->connect_error);

	return $conn;
}


function makeQuery($conn,$qry) {

	$result = $conn->query($qry);

	if($conn->errno)
		die($conn->error);

	$result_array = [];

	while($row = $result->fetch_object()) {
		$result_array[] = $row;
	}

	return $result_array;
}