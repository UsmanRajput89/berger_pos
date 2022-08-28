<?php

include 'process/model.php';
include 'modules/functions.php';
// onload="self.print()"
date_default_timezone_set("Asia/Karachi");
$obj = new database();

$invoice = $_GET['invoice'];
$builty = $_GET['builty'];

if (isset($_GET['amount_recieved'])) {
    $recieved = $_GET['amount_recieved'];
} else {
    $recieved = '0';
}
// echo $recieved;

$query = "SELECT * FROM invoices WHERE invoice_number = $invoice";

$invoice_items = $obj->custom_query($query);

function quantity_in_out($val){

    $product_id = $val['product_id'];
    $product_quan = $val['product_quantity'];
    $product_pcs = $val['pcs'];

    switch ($product_quan) {
        case 'quarter':
            $obj = new database();
            $old_quan_query = "SELECT gallon_quantity FROM products WHERE id = $product_id ";
            $old_quan = $obj->custom_query($old_quan_query);

            $old_quan = $old_quan[0]['gallon_quantity'];
            $new_quan = $old_quan - $product_pcs;

            $up_query = "UPDATE products SET gallon_quantity = '$new_quan' WHERE id=$product_id";
            $obj->new_query($up_query);

            break;
        case 'quarter':
            $obj = new database();
            $old_quan_query = "SELECT quarter_quantity FROM products WHERE id = $product_id ";
            $old_quan = $obj->custom_query($old_quan_query);

            $old_quan = $old_quan[0]['quarter_quantity'];
            $new_quan = $old_quan - $product_pcs;

            $up_query = "UPDATE products SET quarter_quantity = '$new_quan' WHERE id=$product_id";
            $obj->new_query($up_query);

            break;
        case 'dabbi':
            $obj = new database();
            $old_quan_query = "SELECT dabbi_quantity FROM products WHERE id = $product_id ";
            $old_quan = $obj->custom_query($old_quan_query);

            $old_quan = $old_quan[0]['dabbi_quantity'];
            $new_quan = $old_quan - $product_pcs;

            $up_query = "UPDATE products SET dabbi_quantity = '$new_quan' WHERE id=$product_id";
            $obj->new_query($up_query);

            break;
        case 'drumi':
            $obj = new database();
            $old_quan_query = "SELECT drumi_quantity FROM products WHERE id = $product_id ";
            $old_quan = $obj->custom_query($old_quan_query);

            $old_quan = $old_quan[0]['drumi_quantity'];
            $new_quan = $old_quan - $product_pcs;

            $up_query = "UPDATE products SET drumi_quantity = '$new_quan' WHERE id=$product_id";
            $obj->new_query($up_query);

            break;

    }

}

function new_q($qty){

    switch ($qty) {
        case 'Gallon':
        return 'gallon_price';
        break;
        
        case 'Quarter':
        return 'quarter_price';
        break;
        
        case 'Drumi':
        return 'drumi_price';
        break;
        
        case 'Dabbi':
        return 'dabbi_price';
        break;
    }
}

function get_prod_price($type, $id){
    // echo $type;
    // echo $id;

    $obj = new database();
    
    $query = "SELECT $type FROM categories WHERE category_id=$id";

    // die($query);
    // echo $query;
    $prod_price = $obj->custom_query($query);

    // echo '<pre>';
    // var_dump($prod_price);
    // echo '</pre>';
    return $prod_price[0][$type];
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <style>
            * {
                font-family: sans-serif;
            }

            h1 {
                text-align: center;
            }
            table td, table th{
                border:1px solid black;
                text-align:center;
                padding:2px 8px;
            }
            table tfoot td{
                text-align:left;
            }
            table{
                border-collapse:collapse;
            }
            .customer_detail td{
                text-align:left;
            }
            .invoice_calc{
                margin-left:auto;
            }
            .invoice_calc td{
                text-align:left;
            }

            .footer{
                position:absolute;
                bottom:10px;
                width:100%;
            }
            .footer .prep{
                display:flex;
                justify-content:space-between;
            }
            .footer .prep p{
                width:20%;
                border-top:1px solid black;
            }
            .footer .border{
                width:100%;
                border-top:1px solid black;
                /* text-align:center; */
            }
            /* @page {
                @bottom-right {
                    content: counter(page) ' of ' counter(pages);
                }
                #pageFooter {
                    display: table-footer-group;
                }
            } */
            /* @page { size: auto;  margin: 0mm; } */
        </style>

    </head>

    <body onload="self.print()">
    <!-- self.print() -->
        <h1>Estimate</h1>





      
        <table style="width:70%;" class="customer_detail">
            <tbody>
                <tr>
                    <td style=" width:35%;">Customer Name : </td>
                    <td colspan="4">
                        <strong>
                        <?php
                            $customer_id = $invoice_items[0]['customer_id'];
                            $query = "SELECT customer_name, customer_address, customer_phone  FROM customers WHERE customer_id = $customer_id";

                            $res = $obj->custom_query($query);
                            echo $res[0]['customer_name'];
                            
                            // echo '<pre>';
                            // var_dump($res);
                            // echo '</pre>';

                        ?>
                        </strong>
                    </td>
                </tr>
                <tr>
                    <td style="">Address: </td>
                    <td><?php echo $res[0]['customer_address']; ?></td>
                </tr>
                <tr>
                    <td style="">Contact No: </td>
                    <td><?php echo $res[0]['customer_phone']; ?></td>
                </tr>
                <tr>
                    <td style="">Transport Adda: </td>
                    <td></td>
                </tr>
                <tr>
                    <td style="">Order No. </td>
                    <td><strong><?php echo $invoice; ?><?php //echo date('d/m/Y'); ?></strong></td>
                </tr>

            </tbody>
        </table>

        <table style="margin:20px 0px;">
            <tr>
                <td>Delivery Challan #</td>
                <td> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </td>
                <td>Delivery Challan Date:</td>
                <td>&nbsp; <?php echo date('d/m/Y'); ?>  &nbsp;</td>
                <td>Bilty #</td>
                <td> <?php echo $builty; ?> </td>
            </tr>
        </table>

<!-- items table -->
        <table style="width:100%; margin:0 auto;">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>UOM</th>
                    <!-- <th>Pack Size</th> -->
                    <th>Quantity</th>
                    <!-- <th>Quantity</th> -->
                    <th>Price</th>
                    <th>Disc%</th>
                    <th>Disc Amnt</th>
                    <th>Rate</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; $pcs = 0;?>

                <?php foreach ($invoice_items as $val): ?>

                    <?php
                        quantity_in_out($val);
                    ?>

                    <tr>
                        <td>
                            <?php
                                $res = $obj->select_data('products', 'name', $val['product_id']);
                                echo $res['name'];
                                
                            ?>
                        </td>
                        <!-- <td>
                            <?php
                                // $res = $obj->select_data('products', 'price', $val['product_id']);
                                // echo $res['price'];
                            ?>
                        </td> -->
                        <td>
                            <?php echo $val['product_quantity']; ?>
                        </td>
                    
                        <td><?php echo $val['pcs']; ?></td>
                        <td>
                            <?php echo get_prod_price(new_q($val['product_quantity']), $val['category_id']); ?>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo $val['total']; ?></td>
                    </tr>

                <?php
                    $total = $val['total'] + $total;
                    $pcs = $val['pcs'] + $pcs;
                    endforeach;
                ?>

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"><strong>Total</strong></td>
                    <td colspan="4"><strong><?php echo $pcs; ?></strong></strong></td>
                    <td><strong><?php echo $total; ?></strong></td>
                </tr>
                <tr>
                    <td colspan="12"><strong>Remarks : </strong></td>
                </tr>
            </tfoot>
        </table>

<!-- CALCULATIONS -->
        <table style="margin-top:40px;" class="invoice_calc">
            <tbody>
                <tr>
                    <td>
                        <strong>Invoice Calculation</strong>
                    </td>
                    <td>
                        Amount
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <strong>Total Retail Value</strong>
                    </td>
                    <td><?php echo $total; ?>
                    </td>
                </tr>

                <tr>
                    <td>
                        <strong>Less: Discount Value</strong>
                    </td>
                    <td>0</td>
                </tr>

                <tr>
                    <td>
                        <strong>Paid: </strong>
                    </td>
                    <td>
                        <strong><?php echo $recieved; ?></strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Remaining </strong>
                    </td>
                    <td>
                        <strong><?php echo $total - $recieved; ?></strong>
                    </td>
                </tr>
            </tbody>
        </table>


        <div class="footer">
            <div class="prep">
                <p><strong>Prepared By</strong></p>
                <p><strong>Checked By</strong></p>
                <p><strong>Recieved By: Name And Signature</strong></p>
            </div>

            <div class="border">
                <p><?php echo date('d/m/Y');  ?><span style="margin-left:20px;"><?php echo date("h:i:sa"); ?></span></p>
            </div>

        </div>



        <?php
            $date = date("d-m-Y");

            $insert_sale = array(
                'customer_id' => $customer_id,
                'invoice_number' => $invoice,
                'invoice_amount' => $total,
                'amount_recieved' => $recieved,
                'date' => $date,
            );

            $obj->insert('sales', $insert_sale);

        ?>

        <?php /* ?>
<?php

$date = date("d-m-Y");

$insert_sale = array(
'customer_id' => $customer_id ,
'invoice_number' => $invoice ,
'invoice_amount' => $total ,
'amount_recieved' =>  $recieved,
'date' => $date,
);

// $obj->insert('sales', $insert_sale);

$query="SELECT * FROM SALES WHERE customer_id = $customer_id";
$ledger = $obj->custom_query($query);

$customer_id = $invoice_items[0]['customer_id'];
$query = "SELECT customer_name, customer_address, customer_phone  FROM customers WHERE customer_id = $customer_id";

$customer_det = $obj->custom_query($query);

?>
<hr>

<div class="container mt-4" >
<h4>General Ledger</h4>
<h5> <strong> <?php echo $customer_det[0]['customer_name']; ?></strong></h5>
<p> <strong> <?php echo $customer_det[0]['customer_address']; ?></strong></p>

<table class="table">
<thead>
<th>Date</th>
<th>Invoice No.</th>
<th>Amount</th>
<th>Recieved </th>
<th>Remaining</th>
</thead>
<tbody>

<?php foreach($ledger as $ld ): ?>
<tr class="text-center">
<td class="text-center"><?php echo $ld['date']; ?></td>
<td><?php echo $ld['invoice_number']; ?></td>
<td><?php echo $ld['invoice_amount']; ?></td>
<td><?php echo $ld['amount_recieved']; ?></td>
<td><?php echo $ld['amount_recieved'] - $ld['invoice_amount'] ; ?></td>
</tr>
<?php endforeach; ?>

</tbody>
</table>

</div>

<?php */?>

    </body>

</html>



