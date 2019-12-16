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
  "name"=>"Hazelnut",
  "price"=>"4",
  "category"=>"Nut",
  "description"=>"Rich hazelnut praline whipped with creamy milk chocolate.",
  "image_main"=>"images/hazelnut_main.jpg",
  "other_images"=>"images/hazelnut_1.jpg"
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
  if($_GET['action'] == 'create') {
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
        `date_create`,
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
 <li class="items even">    
     <div class="infoWrap"> 
     <div class="cartSection">
     <img src="$item->image_main" class="itemImg"/ >
     <p class="itemNumber">$item->category</p>
     <h3>$item->name</h3>
     </div>  
     <div class="prodTotal cartSection">
     <p>[<a href='?id=$item->id'>edit</a>]<br><br><br>
     [<a href='sp.php?id=$item->id'>visit</a>]</p>
     </div>
     </div>
     </li>
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
<div class="cart">
<div class="pwrapper">
    <div class="pcontainer">
        <form method="post" action="?id=$id&action=$createorupdate">
            <h6>
            $addoredit Product
            </h6>
            <div class="name">
                <div>
                    <label for="name">Name</label>
                     <input class="form-input" id="name" name="name" type="text" value="$o->name">
                </div>
                <div>
                    <label for="price">Price</label>
                    <input class="form-input" id="price" name="price" type="number" min="1" max="1000" step="0.01" value="$o->price">
                </div>
            </div>
            <div class="street">
                  <label for="description">Description</label>
                   <input class="form-input" id="description" name="description" value="$o->description">

            </div>
            <div class="address-info">
                <div>
                    <label for="category">Category</label>
                <input class="form-input" id="category" name="category" type="text" value="$o->category">
                </div>
                <div>
                    <label for="image_main">image_main</label>
                   <input class="form-input" id="image_main" name="image_main" type="text" value="$o->image_main">
                </div>
                <div>
                    <label for="other_images">other_images</label>
                    <input class="form-input" id="other_images" name="other_images" type="text" value="$o->other_images">
                </div>
            </div>
                 <div class="cc-num">
                  <input class="p-btn" type="submit" value="Confirm">
               </div>
        </form>
    </div>
</div>
</div>
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

 <nav>
        <ul class="menu">
            <li class="logo"><a href="#">Product Admin
</a></li>
            <li class="item"><a href="#">Product Admin</a></li>
            <li class="item"><a href="login.php">Login</a></li>
            <li class="item button"><a href="product_admin.php?id=new">Add New Product</a></li>
            <li class="item button secondary"><a href="main.php">Home</a></li>
            <li class="toggle"><span class="bars"></span></li>

        </ul>
    </nav>
    
  </header>


  <div class="wrap cf">
  <div class="heading cf">
    <h1>Product List</h1>
  </div>
    <div class="cart ">

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
      //  $_GET['id']=='new' ?
      //    $empty_product :
      //    $data->users[$_GET['id']]
      // );
        
    } else {

      ?>

    

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