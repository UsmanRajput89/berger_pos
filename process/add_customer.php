<?php 
include 'model.php'; 

$obj = new database();

$arr = array(
    'customer_name' => $_POST["name"],
    'customer_phone' => $_POST["number"],
    'customer_address' => $_POST["address"],
    'customer_city' => $_POST["city"],
);

$obj->insert('customers', $arr);


header('Location: ' . $_SERVER['HTTP_REFERER']);

?>

