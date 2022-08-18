<?php 

include 'model.php'; 

$id = $_POST['id'];

$obj = new database();

$category = $obj->select_row_table('categories','category_id', $id);

echo json_encode($category);
