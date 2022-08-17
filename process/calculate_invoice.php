<?php 
include 'model.php'; 

$obj = new database();


$product = $obj->select_row_table('products', 'id', $_POST['product']);



$product['qty'] = $_POST['qty'];

function calculate_total($product){
    $total = $product['price'] * $product['qty'];
    return number_format($total, 2, '.', '');
}
calculate_total($product);
$product['qty'] = $_POST['qty'];
$product['total'] = calculate_total($product);

// echo '<pre>';
// var_dump($product);
// echo '</pre>';

$encoded = json_encode($product);
echo $encoded;

?>

