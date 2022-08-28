<?php 
include 'model.php'; 

$obj = new database();

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';



if (empty($_POST['product_id'])) {
    $arr = array(
        'name' => $_POST["name"],
        'sku' => $_POST["sku"],
        'category' => $_POST["category"],
        // 'gallon_price' => $_POST["gallon_price"],
        'gallon_quantity' => $_POST["gallon_quantity"],
        // 'quarter_price' => $_POST["quarter_price"],
        'quarter_quantity' => $_POST["quarter_quantity"],
        // 'dabbi_price' => $_POST["dabbi_price"],
        'dabbi_quantity' => $_POST["dabbi_quantity"],
        // 'drumi_price' => $_POST["drumi_price"],
        'drumi_quantity' => $_POST["drumi_quantity"],
    );
    
    $obj->insert('products', $arr);
    
}else{
    $arr = array(
        'id' => $_POST["product_id"],
        'name' => $_POST["name"],
        'sku' => $_POST["sku"],
        'category' => $_POST["category"],
        // 'gallon_price' => $_POST["gallon_price"],
        'gallon_quantity' => $_POST["gallon_quantity"],
        // 'quarter_price' => $_POST["quarter_price"],
        'quarter_quantity' => $_POST["quarter_quantity"],
        // 'dabbi_price' => $_POST["dabbi_price"],
        'dabbi_quantity' => $_POST["dabbi_quantity"],
        // 'drumi_price' => $_POST["drumi_price"],
        'drumi_quantity' => $_POST["drumi_quantity"],
    );

    $res = $obj->update('products', $arr, 'id',$_POST["product_id"]);

}

?>

