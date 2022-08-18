<?php 

    include 'process/model.php'; 
    include 'modules/functions.php'; 
    // onload="self.print()"
    $obj = new database();

    $invoice = $_GET['invoice'];
    $recieved = $_GET['amount_recieved'];

    // echo $recieved;

    $query = "SELECT * FROM invoices WHERE invoice_number = $invoice";

    $invoice_items = $obj->custom_query($query);
    
    

    // echo '<pre>';
    // var_dump($invoice_items);
    // echo '</pre>';

    // $words = numberTowords(1000);
    // echo $words;
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css">
        <!-- <title>Document</title> -->
        <style>
            * {
                font-family: sans-serif;
            }

            h1 {
                text-align: center;
            }
            .table td{
                padding:0.25rem;
            }
            @page { size: auto;  margin: 0mm; }
        </style>
    </head>

    <body onload="self.print()">
    <!-- self.print() -->
        <!-- <h1>Estimate</h1> -->


        


        <div class="container pt-30" style="margin-top:30px;">
            <h3 class="text-center">Estimate Invoice</h3>
            <div class="card" >
                <div class="card-header">
                    Invoice : 
                    <strong><?php echo $invoice; ?></strong>
                    <!-- <span class="float-right"> <strong>Status:</strong> Pending</span> -->
                </div>

                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-12">
                            <!-- <h6 class="mb-3">From:</h6> -->
                            <div>Customer Name : 
                                <strong> 
                                <?php 
                                    $customer_id = $invoice_items[0]['customer_id'];
                                    $query = "SELECT customer_name, customer_address, customer_phone  FROM customers WHERE customer_id = $customer_id";

                                    $res = $obj->custom_query($query);
                                    echo $res[0]['customer_name'];

                                ?>    
                                </strong>
                            </div>
                            <div>Address : 
                                <strong><?php echo $res[0]['customer_address']; ?></strong>
                            </div>
                            <!-- <div>Madalinskiego 8</div> -->
                            <!-- <div>71-101 Szczecin, Poland</div> -->
                            <!-- <div>Email: info@webz.com.pl</div> -->
                            <div>Phone : <strong><?php echo $res[0]['customer_phone']; ?></strong></div>
                        </div>

                    </div>

                    <div class="table-responsive-sm">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <!-- <th class="center">#</th> -->
                                    <th>Item</th>
                                    <!-- <th>Description</th> -->

                                    <th class="center">Pack Size</th>
                                    <th class="center">Pcs</th>
                                    <th class="right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0; $pcs=0;?>
                                
                                <?php foreach ($invoice_items as $val) :?>
                                    <tr>
                                        <td class="left strong">
                                            <?php 
                                                $res = $obj->select_data('products', 'name', $val['product_id']);
                                                echo $res['name']; 
                                            ?>
                                        </td>
                                        <!-- <td class="left"><?php  ?></td> -->
    
                                        <td class="right"><?php echo $val['product_quantity']; ?></td>
                                        <td class="center"><?php echo $val['pcs'];  ?></td>
                                        <td class="right"><?php echo $val['total']; ?></td>
                                    </tr>

                                <?php
                                    $total = $val['total'] + $total;
                                    $pcs = $val['pcs'] + $pcs;
                                    endforeach;
                                ?>
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2"><strong>Total</strong></td>
                                    <td><strong><?php echo $pcs; ?></strong></strong></td>
                                    <td><strong><?php echo $total; ?></strong></td>
                                </tr>
                                <tr>
                                    <td colspan="10"><strong>Remarks : </strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="row">

                        <div class="col-lg-5 col-sm-5 ml-auto">
                            <table class="table table-clear">
                                <tbody>
                                    <tr>
                                        <td class="left">
                                            <strong>Subtotal</strong>
                                        </td>
                                        <td class="right"><?php echo $total; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong>Discount (0%)</strong>
                                        </td>
                                        <td class="right">0</td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong>VAT (0%)</strong>
                                        </td>
                                        <td class="right">0</td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                            <strong>Total</strong>
                                        </td>
                                        <td class="right">
                                            <strong><?php echo $total; ?></strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>


                        </div>

                    </div>

                </div>
            </div>
        </div>


        <?php 

            $date = date("d-m-Y");

            $insert_sale = array(
                'customer_id' => $customer_id ,
                'invoice_number' => $invoice ,
                'invoice_amount' => $total ,
                'amount_recieved' =>  $recieved,
                'date' => $date,
            );

            $obj->insert('sales', $insert_sale); 

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
                            <td><?php echo $ld['invoice_amount'] - $ld['amount_recieved']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    
                </tbody>
            </table>

        </div>

    </body>

</html>



