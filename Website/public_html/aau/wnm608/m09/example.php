<?php
​
$jsonString = file_get_contents('data/jsonFile.json');
$data = json_decode($jsonString, true);
​
$data[0]['activity_name'] = "TENNIS";
​
$newJsonString = json_encode($data);
file_put_contents('data/jsonFile.json', $newJsonString);
​
?> 