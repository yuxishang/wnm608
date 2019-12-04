<?php

require_once "lib/php/helpers.php";

$filename = "data/json_notes.json";
$data = get_json($filename);

// print_p($data);
// print_p($_GET);
// print_p($_POST);


// file_put_contents, json_encode, explode, $_POST



$empty_user = (object)[
  "name"=>"",
  "type"=>"",
  "email"=>"",
  "classes"=>[]
];




if(isset($_GET['action'])) {
  if($_GET['action'] == 'update') {
    $data->users[$_GET['id']]->name = $_POST['edit-name'];
    $data->users[$_GET['id']]->type = $_POST['edit-type'];
    $data->users[$_GET['id']]->email = $_POST['edit-email'];
    $data->users[$_GET['id']]->classes = explode(", ",$_POST['edit-classes']);

    file_put_contents($filename, json_encode($data));
  }
  if($_GET['action'] == 'create') {
    $empty_user->name = $_POST['edit-name'];
    $empty_user->type = $_POST['edit-type'];
    $empty_user->email = $_POST['edit-email'];
    $empty_user->classes = explode(", ",$_POST['edit-classes']);

    $id = count($data->users);

    $data->users[] = $empty_user;
    // array_push($data->users,$empty_user);

    file_put_contents($filename, json_encode($data));

    header("location:user_admin.php?id=$id");
  }
  if($_GET['action'] == 'delete') {
    array_splice($data->users,$_GET['id'],1);
    file_put_contents($filename, json_encode($data));
    header("location:user_admin.php");
  }
}





function showUser($user) {

$id = $_GET['id'];
$classes = implode(", ",$user->classes);
$addoredit = $id=='new' ? 'Add' : 'Edit';
$createorupdate = $id=='new' ? 'create' : 'update';

echo <<<HTML
<div class="flex-parent">
  <div class="flex-child">
    <a href="user_admin.php">Back</a>
  </div>
  <div class="flex-none">
    [<a href="user_admin.php?id=$id&action=delete">Delete</a>]
  </div>
</div>
<form method="post" action="?id=$id&action=$createorupdate">
  <h2>$addoredit User</h2>
  <div class="form-control">
    <label class="form-label">Name</label>
    <input class="form-input" name="edit-name" type="text" value="$user->name">
  </div>
  <div class="form-control">
    <label class="form-label">Type</label>
    <input class="form-input" name="edit-type" type="text" value="$user->type">
  </div>
  <div class="form-control">
    <label class="form-label">Email</label>
    <input class="form-input" name="edit-email" type="text" value="$user->email">
  </div>
  <div class="form-control">
    <label class="form-label">Classes</label>
    <input class="form-input" name="edit-classes" type="text" value="$classes">
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
  <title>User Admin</title>

  <?php include "parts/head.html" ?>
</head>
<body>

  <header class="navbar">
    <div class="container flex-parent flex-wrap">
      <div class="flex-child">
        <h1>User Admin</h1>
      </div>

      <input type="checkbox" id="nav-menu" class="hidden">
      <label for="nav-menu">&equiv;</label>

      <nav class="nav nav-flex flex-none">
        <ul>
          <li><a href="user_admin.php">List</a></li>
          <li><a href="user_admin.php?id=new">Add New User</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <div class="container">
    <div class="card">

      <?php

      if(isset($_GET['id'])) {

        // ternary conditional
        showUser(
          $_GET['id']=='new' ?
            $empty_user :
            $data->users[$_GET['id']]
        );
        
      } else {

      ?>

      <h2>User List</h2>

      <div class="userlist">
      <?php

      foreach($data->users as $i=>$user) {
        echo "
        <div class='userlist-item flex-parent'>
          <div class='flex-child'>
            <div class='userlist-name'>$user->name</div>
            <div class='userlist-type'>$user->type</div>
          </div>
          <div class='flex-none'>
            [<a href='?id=$i'>visit</a>]
          </div>
        </div>
        ";
      }

      ?>
      </div>

      <?php

      }

      ?>
    </div>
  </div>
  
</body>
</html>