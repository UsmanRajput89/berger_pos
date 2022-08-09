<?php 
    
    include 'model.php'; 

    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';


    $obj = new database();

    $table = $_POST['table'];
    $col = $_POST['col'];

    echo $obj->delete($table, $col ,$_POST['id']);

?>

