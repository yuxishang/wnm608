<?php

require_once "lib/php/helpers.php";

$data = get_json("data/json_notes.json");

// print_p($data);


// file_put_contents, json_encode, explode, $_POST


function showUser($user) {
$classes = implode(", ",$user->classes);
echo <<<HTML
<div><a href="user_admin.php">Back</a></div>
<div>
	<h2>$user->name</h2>
	<div>
		<strong>Type</strong>
		<span>$user->type</span>
	</div>
	<div>
		<strong>Email</strong>
		<span>$user->email</span>
	</div>
	<div>
		<strong>Classes</strong>
		<span>$classes</span>
	</div>
</div>
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
		<div class="container flex-parent">
			<div class="flex-child">
				<h1>User Admin</h1>
			</div>

			<input type="checkbox" id="nav-menu" class="hidden">
			<label for="nav-menu">&equiv;</label>

			<nav class="nav nav-flex flex-none">
				<ul>
					<li><a href="user_admin.php">List</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<div class="container">
		<div class="card">

			<?php

			if(isset($_GET['id'])) {

				showUser($data->users[$_GET['id']]);
				
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