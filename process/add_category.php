<?php 
include 'model.php'; 

$obj = new database();


if (empty($_POST['category_id'])) {
    $arr = array(
        'category_name' => $_POST["name"],
        'drumi_price' => $_POST["drumi_price"],
        'quarter_price' => $_POST["quarter_price"],
        'gallon_price' => $_POST["gallon_price"],
        'dabbi_price' => $_POST["dabbi_price"],
    );
    $res = $obj->insert('categories', $arr);
}else{
    
    $arr = array(
        'category_id' => $_POST["category_id"],
        'category_name' => $_POST["name"],
        'drumi_price' => $_POST["drumi_price"],
        'quarter_price' => $_POST["quarter_price"],
        'gallon_price' => $_POST["gallon_price"],
        'dabbi_price' => $_POST["dabbi_price"],
    );
    $res = $obj->update('categories', $arr, 'category_id',$_POST["category_id"]);

}


// header('Location: ' . $_SERVER['HTTP_REFERER']);


?>

