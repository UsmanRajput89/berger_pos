<?php 
include 'model.php'; 

$obj = new database();

// $_POST['id'];


$products = $obj->product_same_cat($_POST['id']);

echo '<pre>';
var_dump($products);
echo '</pre>';

?>

