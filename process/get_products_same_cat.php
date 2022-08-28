<?php 
include 'model.php'; 

$obj = new database();

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';
$cat=$_POST['cat'];

$query = "SELECT * FROM PRODUCTS WHERE category=$cat";
$products = $obj->custom_query($query);


echo json_encode($products);
?>

