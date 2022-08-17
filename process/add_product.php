<?php 
include 'model.php'; 

$obj = new database();

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

$arr = array(
    'name' => $_POST["name"],
    'sku' => $_POST["sku"],
    'category' => $_POST["category"],
    'price' => $_POST["price"],
    'quantity' => $_POST["quantity"],
);

$obj->insert('products', $arr);


// header('Location: ' . $_SERVER['HTTP_REFERER']);

?>

