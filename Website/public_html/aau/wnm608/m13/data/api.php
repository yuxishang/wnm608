<?php

require_once "../lib/php/helpers.php";

$output = [];

if(!isset($_GET['type'])) {
	$output['error'] = "No Type";
}
else switch($_GET['type']){
	case 1: $output['result'] = makeQuery(
			makeConn(),
			"SELECT * 
			FROM `products`
			ORDER BY date_creates DESC
			limit 12
			"
	);
	break;
	case 2:
		if(!isset($_POST['id']))
			$output['error'] = "No ID";
		else $output['result'] = makeQuery(makeConn(),
			"SELECT *
			FROM `products`
			WHERE id = {$_POST['id']}
			"
		);
		break;
	case 3:
		if(!isset($_POST['category']))
			$output['error'] = "No Category";
		else $output['result'] = makeQuery(makeConn(),
			"SELECT *
			FROM `products`
			WHERE `category` = '{$_POST['category']}'
			ORDER BY `date_creates` DESC
			limit 12
			"
		);
		break;
	// Search
	case 10:
		if(!isset($_POST['search']))
			$output['error'] = "No Search";
		else $output['result'] = makeQuery(makeConn(),
			"SELECT *
			FROM `products`
			WHERE
			`name` LIKE '%{$_POST['search']}%' OR
			`category` LIKE '%{$_POST['search']}%' OR
			`description` LIKE '%{$_POST['search']}%'
			ORDER BY `date_creates` DESC
			limit 12
			"
		);
		break;
	// Sort
	case 20:
		if(!isset($_POST['sort']) || !isset($_POST['dir']))
			$output['error'] = "Incorrect Data";
		else $output['result'] = makeQuery(makeConn(),
			"SELECT *
			FROM `products`
			ORDER BY `{$_POST['sort']}` {$_POST['dir']}
			limit 12
			"
		);
		break;
	case 4564356: break;
}




//print_p($output); 

echo json_encode(
	$output,
	JSON_UNESCAPED_UNICODE |
	JSON_NUMBERIC_CHECK
); 