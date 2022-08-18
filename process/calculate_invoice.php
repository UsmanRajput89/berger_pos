<?php 
include 'model.php'; 

$obj = new database();

$qty = $_POST['qty'];
$pcs = $_POST['pcs'];

// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';


$product = $obj->select_row_table('products', 'id', $_POST['product']);


switch ($qty) {
    case 'gallon':
        $total = number_format($product['gallon_price'], 2, '.', '') * $pcs;
        $product['qty'] = 'Gallon';
        $product['price'] = $product['gallon_price'];
        break;
    
    case 'quarter':
        $total = number_format($product['quarter_price'], 2, '.', '') * $pcs;
        $product['qty'] = 'Quarter';
        $product['price'] = $product['quarter_price'];
        break;

    case 'dabbi':
        
        $total = number_format($product['dabbi_price'], 2, '.', '') * $pcs;
        $product['qty'] = 'Dabbi';
        $product['price'] = $product['dabbi_price'];
        break;
    
}

$total = number_format($total, 2, '.', '');

$product['pcs'] = $_POST['pcs'];
$product['total'] = $total;
$product['invoice_number'] = $_POST['invoice'];


$insert_Array = array(
    'invoice_number' => $_POST['invoice'],
    'customer_id' => $_POST['customers'],
    'category_id' => $_POST['category'],
    'product_id' => $_POST['product'],
    'product_quantity' => $_POST['qty'],
    'pcs' => $product['pcs'],
    'total' => $total,
);


$obj->insert('invoices', $insert_Array);


$encoded = json_encode($product);
echo $encoded;

?>

