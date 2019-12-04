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

?>


<!DOCTYPE html>
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
    
    <div class="container">
        <div class="card">

   <?php
         // define variables and set to empty values
         $nameErr = $emailErr = $typeErr = $websiteErr = "";
         $name = $email = $type = $class = $course = $subject = "";
         
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
               $nameErr = "Name is required";
            }else {
               $name = test_input($_POST["name"]);
            }
            
            if (empty($_POST["email"])) {
               $emailErr = "Email is required";
            }else {
               $email = test_input($_POST["email"]);
               
               // check if e-mail address is well-formed
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format"; 
               }
            }
            
            if (empty($_POST["course"])) {
               $course = "";
            }else {
               $course = test_input($_POST["course"]);
            }
            
            if (empty($_POST["class"])) {
               $class = "";
            }else {
               $class = test_input($_POST["class"]);
            }
            
            if (empty($_POST["type"])) {
               $typeErr = "type is required";
            }else {
               $type = test_input($_POST["type"]);
            }
            
            if (empty($_POST["subject"])) {
               $subjectErr = "You must select 1 or more";
            }else {
               $subject = $_POST["subject"];    
            }
         }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }
      ?>
        
      <h2>Form</h2>
      
      <p><span class = "error">* required field.</span></p>
      
      <form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
         <table>
            <tr>
               <td>Name:</td>
               <td><input class="form-element" type = "text" name = "name" placeholder="Phoenix Ren">
                  <span class = "error">* <?php echo $nameErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>E-mail: </td>
               <td><input class="form-element" type = "text" name = "email" placeholder="1808599753@qq.com">
                  <span class = "error">* <?php echo $emailErr;?></span>
               </td>
            </tr>
            
            <tr>
               <td>Classes:</td>
               <td> <textarea  class="form-element" name = "class" rows = "5" cols = "40"placeholder="WNM 608, WNM615. WNM "></textarea></td>
            </tr>
            
            <tr>
               <td>Type:</td>
               <div class="form-block">
               <td><div class="form-element-inline">
                  <input class="form-radio" type = "radio" name = "type" value = "Teacher">Teacher</div>
                 <div class="form-element-inline"> 
                 <input  class="form-radio"type = "radio" name = "type" value = "Student" checked>Student</div>
                 <div class="form-element-inline">
                  <input  class="form-radio" type = "radio" name = "type" value = "Other" >Other</div>

                  <span class = "error">* <?php echo $typeErr;?></span>
              <br><br>
  <input class="submit-btn" type="submit" name="submit" value="Submit">  
</form>
   
<?php

 $dir = 'myDir';

 // create new directory with 744 permissions if it does not exist yet
 // owner will be the user/group the PHP script is run under
 if ( !file_exists($dir) ) {
     mkdir ($dir, 0744);
 }

 file_put_contents ($dir.'/test.txt', 'Hello File');
// read json file
 
$data = file_get_contents('data/json_notes.json');

// decode json to associative array
$json_arr = json_decode($data, true);
foreach ($json_arr as $key => $value) {
    echo  $json_arr[$key] . " - " .  $json_arr[$value] . "<br/>";
}

//foreach ($json_arr as $key => $value) {
   // if ($value['name_code'] == '2') {
      //  $json_arr[$key]['type'] = "teacher";
   // }
//}

// add data
//$json_arr[] = array('name_code'=>5, 'name'=>'Jeff Darwin', 'type'=>'student');

// encode json and save to file
//file_put_contents('data/json_notes_new.json', json_encode($json_arr));

// encode array to json and save to file
//file_put_contents('data/json_notes_new.json', json_encode($json_arr));

// get array index to delete
//$arr_index = array();
//foreach ($json_arr as $key => $value)
//{
 //   if ($value['name_code'] == "2")
 //   {
 //       $arr_index[] = $key;
 //   }
//}

// delete data
//foreach ($arr_index as $i)
//{
  //  unset($json_arr[$i]);
//}

// rebase array
//$json_arr = array_values($json_arr);

// encode array to json and save to file
//file_put_contents('data/json_notes_new.json', json_encode($json_arr));



         echo "<h2>Your Result :</h2>";
         echo ("<p>Your name is $name</p>");
         echo ("<p> your email address is $email</p>");
         echo ("<p>your class info $class </p>");
         echo ("<p>your type is $type</p>");
         
         for($i = 0; $i < count($subject); $i++) {
            echo($subject[$i] . " ");
         }

         $jsonString = file_get_contents('data/json_notes.json');
         $data = json_decode($jsonString, true);
         $data[0]['activity_name'] = "TENNIS";
         $newJsonString = json_encode($data);
         file_put_contents('data/json_notes.json', $newJsonString);


      ?>
            <?php

            if(isset($_GET['id'])) {

                showUser($data->users[$_GET['id']]);
                
            } else {

            ?>

                </div>
            </div>
                
            </div>

        </div>
    </div>

            <div class="container">
        <div class="card">
<?php
$jsonString = file_get_contents('jsonFile.json');
$data = json_decode($jsonString, true);

$data[0]['activity_name'] = "TENNIS";
// or if you want to change all entries with activity_code "1"
foreach ($data as $key => $entry) {
    if ($entry['activity_code'] == '1') {
        $data[$key]['activity_name'] = "TENNIS";
    }
}$newJsonString = json_encode($data);
file_put_contents('jsonFile.json', $newJsonString);}



?>

         

                </div>
            </div>
                
            </div>

        </div>
    </div>
    
</body>
</html>