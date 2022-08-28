<?php 
include 'model.php'; 

$obj = new database();

echo '<pre>';
var_dump($_POST);
echo '</pre>';



// $res = $obj->insert('customers', $arr);

if (empty($_POST['customer_id'])) {
    $arr = array(
        'customer_name' => $_POST["name"],
        'customer_phone' => $_POST["customer_phone"],
        'customer_address' => $_POST["address"],
        'customer_city' => $_POST["city"],
    );

    $res = $obj->insert('customers', $arr);

}else{
    $arr = array(
        'customer_id' => $_POST["customer_id"],
        'customer_name' => $_POST["name"],
        'customer_phone' => $_POST["customer_phone"],
        'customer_address' => $_POST["address"],
        'customer_city' => $_POST["city"],
    );
    $res = $obj->update('customers', $arr, 'customer_id', $_POST["customer_id"]);

}


// header('Location: ' . $_SERVER['HTTP_REFERER']);
?>

