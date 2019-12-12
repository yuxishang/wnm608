<?php

require_once "lib/php/helpers.php";
$conn = makeConn();

// $filename = "data/json_notes.json";
// $data = get_json($filename);

// print_p($data);
// print_p($_GET);
// print_p($_POST);


// file_put_contents, json_encode, explode, $_POST



$empty_product = (object)[
	"name"=>"Durian",
	"price"=>"9.99",
	"category"=>"fruit",
	"description"=>"I only know this because of Legend of Zelda.",
	"image_main"=>"/images/store/strawberry_main.jpg",
	"other_images"=>"/images/store/strawberry_main.jpg"
];




if(isset($_GET['action'])) {
	if($_GET['action'] == 'update') {
		// $data->users[$_GET['id']]->name = $_POST['edit-name'];
		// $data->users[$_GET['id']]->type = $_POST['edit-type'];
		// $data->users[$_GET['id']]->email = $_POST['edit-email'];
		// $data->users[$_GET['id']]->classes = explode(", ",$_POST['edit-classes']);

		// file_put_contents($filename, json_encode($data));

		$statement = $conn->prepare("UPDATE `products` SET
			`name`=?,
			`price`=?,
			`category`=?,
			`description`=?,
			`image_main`=?,
			`other_images`=?,
			`date_modify`=NOW()
			WHERE `id`=?
			");
		$statement->bind_param("sdssssi",
			$_POST["name"],
			$_POST["price"],
			$_POST["category"],
			$_POST["description"],
			$_POST["image_main"],
			$_POST["other_images"],
			$_GET['id']
		);
		$statement->execute();
		if($conn->errno) die($conn->error);

		header("location:product_admin.php?id={$_GET['id']}");
	}
	if($_GET['action'] == 'creates') {
		// $empty_product->name = $_POST['edit-name'];
		// $empty_product->type = $_POST['edit-type'];
		// $empty_product->email = $_POST['edit-email'];
		// $empty_product->classes = explode(", ",$_POST['edit-classes']);

		// $id = count($data->users);

		// $data->users[] = $empty_product;
		// // array_push($data->users,$empty_product);

		// file_put_contents($filename, json_encode($data));



		$statement = $conn->prepare("INSERT INTO `products`
			(
				`name`,
				`price`,
				`category`,
				`description`,
				`image_main`,
				`other_images`,
				`date_creates`,
				`date_modify`
			)
			VALUES (?,?,?,?,?,?,NOW(),NOW())
			");
		$statement->bind_param("sdssss",
			$_POST["name"],
			$_POST["price"],
			$_POST["category"],
			$_POST["description"],
			$_POST["image_main"],
			$_POST["other_images"]
		);
		$statement->execute();
		if($conn->errno) die($conn->error);
		$id = $conn->insert_id;

		header("location:product_admin.php?id=$id");
	}
	if($_GET['action'] == 'delete') {

		// array_splice($data->users,$_GET['id'],1);

		// file_put_contents($filename, json_encode($data));

		$statement = $conn->prepare("DELETE FROM `products` WHERE `id`=?");
		$statement->bind_param("i",$_GET['id']);
		$statement->execute();


		header("location:product_admin.php");
	}
}






function makeListItemTemplate($carry,$item) {
return $carry.<<<HTML
<div class='itemlist-item flex-parent'>
	<div class='flex-none'>
		<img src="$item->thumbnail" class="product-thumb">
	</div>
	<div class='flex-child'>
		<div><strong>$item->title</strong></div>
		<div>$item->category</div>
	</div>
	<div class='flex-none'>
		<div>[<a href='?id=$item->id'>edit</a>]</div>
		<div>[<a href='product_item.php?id=$item->id'>visit</a>]</div>
	</div>
</div>
HTML;
}


function makeProductForm($o) {

$id = $_GET['id'];
$addoredit = $id=='new' ? 'Add' : 'Edit';
$createorupdate = $id=='new' ? 'create' : 'update';

echo <<<HTML
<div class="flex-parent">
	<div class="flex-child">
		<a href="product_admin.php">Back</a>
	</div>
	<div class="flex-none">
		[<a href="product_admin.php?id=$id&action=delete">Delete</a>]
	</div>
</div>
<form method="post" action="?id=$id&action=$createorupdate">
	<h2>$addoredit Product</h2>
	<div class="form-control">
		<label class="form-label" for="title">Title</label>
		<input class="form-input" id="title" name="title" type="text" value="$o->title">
	</div>
	<div class="form-control">
		<label class="form-label" for="price">Price</label>
		<input class="form-input" id="price" name="price" type="number" min="1" max="1000" step="0.01" value="$o->price">
	</div>
	<div class="form-control">
		<label class="form-label" for="category">Category</label>
		<input class="form-input" id="category" name="category" type="text" value="$o->category">
	</div>
	<div class="form-control">
		<label class="form-label" for="description">Description</label>
		<textarea class="form-input" id="description" name="description">$o->description</textarea>
	</div>
	<div class="form-control">
		<label class="form-label" for="thumbnail">Thumbnail</label>
		<input class="form-input" id="thumbnail" name="thumbnail" type="text" value="$o->thumbnail">
	</div>
	<div class="form-control">
		<label class="form-label" for="other_images">Other Images</label>
		<input class="form-input" id="other_images" name="other_images" type="text" value="$o->other_images">
	</div>
	<div class="form-control">
		<input class="form-button" type="submit" value="Confirm">
	</div>
</form>
HTML;
}



?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product Admin</title>

	<?php include "parts/head.html" ?>
</head>
<body>

	<header class="navbar">
		<div class="container flex-parent flex-wrap">
			<div class="flex-child">
				<h1>Product Admin</h1>
			</div>

			<input type="checkbox" id="nav-menu" class="hidden">
			<label for="nav-menu">&equiv;</label>

			<nav class="nav nav-flex flex-none">
				<ul>
					<li><a href="product_main.php">Store</a></li>
					<li><a href="product_admin.php">List</a></li>
					<li><a href="product_admin.php?id=new">Add New Product</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<div class="container">
		<div class="card">

		<?php

		if(isset($_GET['id'])) {

			if($_GET['id']=='new') {
				makeProductForm( $empty_product );
			} else {
				$data = makeQuery($conn,
					"SELECT * FROM `products` WHERE `id`='{$_GET['id']}'");
				makeProductForm( $data[0] );
			}
			// ternary conditional
			// makeProductForm(
			// 	$_GET['id']=='new' ?
			// 		$empty_product :
			// 		$data->users[$_GET['id']]
			// );
				
		} else {

			?>

			<h2>Product List</h2>

			<div class="itemlist">
			<?php

			$data = makeQuery($conn,"SELECT * FROM `products`");

			echo array_reduce($data,'makeListItemTemplate');

			?>
			</div>

			<?php
		}
		?>
		</div>
	</div>
	
</body>
</html>