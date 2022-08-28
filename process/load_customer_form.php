<?php 

include 'model.php'; 

$id = $_POST['id'];

$obj = new database();

$res = $obj->select_row_table('customers','customer_id', $id);

echo json_encode($res);

