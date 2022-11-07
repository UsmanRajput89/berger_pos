<?php 
include 'model.php'; 

$obj = new database();

$qty = $_POST['qty'];
$pcs = $_POST['pcs'];

$discount_percent = $_POST['discount'];



// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';


$product = $obj->select_row_table('products', 'id', $_POST['product']);

$category = $obj->select_row_table('categories', 'category_id', $_POST['category']);



switch ($qty) {
    case 'Gallon':
        $item_price = number_format($category['gallon_price'], 2, '.', '');
        $discount = ($item_price/100)*($discount_percent);
        $discounted_price = $item_price - $discount;
        
        $total = $discounted_price * $pcs;
        $product['qty'] = 'Gallon';
        $product['price'] = $category['gallon_price'];
    break;
    
    case 'Quarter':
        $total = number_format($category['quarter_price'], 2, '.', '') * $pcs;
        $item_price = number_format($category['quarter_price'], 2, '.', '');
        $discount = ($item_price/100)*($discount_percent);
        $discounted_price = $item_price - $discount;

        $total = $discounted_price * $pcs;
        $product['qty'] = 'Quarter';
        $product['price'] = $category['quarter_price'];
    break;

    case 'Dabbi':   
        
        $total = number_format($category['dabbi_price'], 2, '.', '') * $pcs;
        $item_price = number_format($category['dabbi_price'], 2, '.', '');
        $discount = ($item_price/100)*($discount_percent);
        $discounted_price = $item_price - $discount;

        $total = $discounted_price * $pcs;
        $product['qty'] = 'Dabbi';
        $product['price'] = $category['dabbi_price'];
    break;

    case 'Drumi':
        $total = number_format($category['drumi_price'], 2, '.', '') * $pcs;
        $item_price = number_format($category['drumi_price'], 2, '.', '');
        $discount = ($item_price/100)*($discount_percent);
        $discounted_price = $item_price - $discount;

        $total = $discounted_price * $pcs;   
        $product['qty'] = 'Drumi';
        $product['price'] = $category['drumi_price'];
    break;

}




$total = number_format($total, 2, '.', '');



$product['price'] = $item_price;
$product['discounted_price'] = $discounted_price;
$product['discount_percent'] = $discount_percent;

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
    'p_per_item' => $item_price,
    'discount_percent' => $discount_percent,
    'discounted_price' => $discounted_price,
    'total' => $total,
);

$obj->insert('invoices', $insert_Array);

$encoded = json_encode($product);
echo $encoded;

?>

