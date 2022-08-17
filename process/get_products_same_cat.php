<?php 
include 'model.php'; 

$obj = new database();

$products = $obj->product_same_cat($_POST['category']);

// echo '<pre>';
// var_dump($products);
// echo '</pre>';

echo json_encode($products);
?>

