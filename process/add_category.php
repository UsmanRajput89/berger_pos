<?php 
include 'model.php'; 

$obj = new database();

$arr = array(
    'name' => $_POST["name"],
    // 'code' => $_POST["code"],
);

$obj->insert('categories', $arr);


header('Location: ' . $_SERVER['HTTP_REFERER']);






?>

