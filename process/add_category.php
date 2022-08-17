<?php 
include 'model.php'; 

$obj = new database();

$arr = array(
    'category_name' => $_POST["name"],
    // 'code' => $_POST["code"],
);

$res = $obj->insert('categories', $arr);


// echo '<pre>';
// var_dump($res);
// echo '</pre>';
// echo '1';

// header('Location: ' . $_SERVER['HTTP_REFERER']);


?>

