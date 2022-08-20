
<?php 
    include 'process/model.php';
    include "includes/contants.php";

    $obj = new database();

    $customer_id = $_GET['id'];

    // $query="SELECT * FROM SALES WHERE customer_id = $customer_id";
    // $customer = $obj->custom_query($query);
    
    $query="SELECT * FROM SALES WHERE customer_id = $customer_id";
    $ledger = $obj->custom_query($query);

    // $customer_id = $invoice_items[0]['customer_id'];
    $query = "SELECT customer_name, customer_address, customer_phone  FROM customers WHERE customer_id = $customer_id";

    $customer_det = $obj->custom_query($query);
            
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css"> -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css"> -->
        <!-- <title>Document</title> -->
        <link rel="stylesheet" href="assets/css/bootstrap.css">
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
    


        <!-- <hr> -->
        <div class="container mt-4" >
            <h4>General Ledger</h4>
            <h5> <strong> <?php echo $customer_det[0]['customer_name']; ?></strong></h5>
            <p> <strong> <?php echo $customer_det[0]['customer_address']; ?></strong></p>
    
            <table class="table">
                <thead>
                    <tr class="text-center">

                        <th>Date</th>
                        <th>Invoice No.</th>
                        <th>Amount</th>
                        <th>Recieved </th>
                        <!-- <th>Remaining</th> -->
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($ledger as $ld ): ?>
                        <tr class="text-center">
                            <td class="text-center"><?php echo $ld['date']; ?></td>
                            <td><?php echo $ld['invoice_number']; ?></td>
                            <td><?php echo $ld['invoice_amount']; ?></td>
                            <td><?php echo $ld['amount_recieved']; ?></td>
                            <!-- <td><?php //echo $ld['remaining_amount'] ; ?></td> -->
                        </tr>
                    <?php endforeach; ?>
                    
                </tbody>
            </table>

        </div>

    </body>
</html>