<?php 
include 'model.php'; 

$obj = new database();

$arr = array(
    'name' => $_POST["name"],
    'sku' => $_POST["sku"],
    'category' => $_POST["category"],
    'price' => $_POST["price"],
);

$obj->insert('products', $arr);


header('Location: ' . $_SERVER['HTTP_REFERER']);

?>

