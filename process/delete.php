<?php 
    
    include 'model.php'; 

    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';


    $obj = new database();

    $table = $_POST['table'];

    echo $obj->delete($table, $_POST['id']);

?>

