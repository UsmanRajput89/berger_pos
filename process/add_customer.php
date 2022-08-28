<?php 
include 'model.php'; 

$obj = new database();

echo '<pre>';
var_dump($_POST);
echo '</pre>';

$arr = array(
    'customer_name' => $_POST["name"],
    'customer_phone' => $_POST["number"],
    'customer_address' => $_POST["address"],
    'customer_city' => $_POST["city"],
);

$res = $obj->insert('customers', $arr);

echo $res;
?>

