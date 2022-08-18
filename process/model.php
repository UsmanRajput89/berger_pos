<?php 

class database{
    public $que;
    private $servername='localhost';
    private $username='root';
    private $password='';
    private $dbname='berger';
    private $result=array();
    private $mysqli='';

    public function __construct(){
        $this->mysqli = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
    }

    public function insert($table, $para=array()){
        $table_columns = implode(',', array_keys($para));
        $table_value = implode("','", $para);

        $sql="INSERT INTO $table($table_columns) VALUES('$table_value')";

        $result = $this->mysqli->query($sql);
    }

    public function update($table,$para=array(),$col_id,$id){
        $args = array();

        foreach ($para as $key => $value) {
            $args[] = "$key = '$value'"; 
        }

        $sql="UPDATE  $table SET " . implode(',', $args);

        $sql .=" WHERE $col_id = $id";

        // die($sql);

        $result = $this->mysqli->query($sql);
    }

    public function delete($table, $col, $id){

        $sql="DELETE FROM $table WHERE $col='$id' ";
        
        $result = $this->mysqli->query($sql);

        return $result;
    }

    public function get_data( $table){
        $array = array();  
        $query = "SELECT * FROM ".$table."";  
        // $result = mysqli_query($this->con, $query);
        $result = $this->mysqli->query($query);
        while($row = mysqli_fetch_assoc($result))  
        {  
            $array[] = $row;  
        }  
        return $array;
    }    

    public function select_data($table, $col, $id){
        $array = array();
        $query = "SELECT $col FROM $table WHERE id='$id'";
        
        $result = $this->mysqli->query($query);
        $row = mysqli_fetch_assoc($result);
        // while($row = mysqli_fetch_assoc($result))  
        // {  
        //     $array[] = $row;  
        // }  
        return $row;
    }

    public function join_double($table1 , $table2 , $t1_col, $t2_col){
        $array = array();
        $query = "SELECT * FROM $table1 a INNER JOIN $table2 b ON a.$t1_col = b.$t2_col";
        
        $result = $this->mysqli->query($query);
        
        while($row = mysqli_fetch_assoc($result))  
        {  
            $array[] = $row;  
        }  

        return $array;
    }

    public function one_row($table1 , $table2 , $t1_col, $t2_col, $id){
        $array = array();
        $query = "SELECT * FROM $table1 a INNER JOIN $table2 b ON a.$t1_col = b.$t2_col WHERE a.id= $id ";
        
        $result = $this->mysqli->query($query);
        $row = mysqli_fetch_assoc($result);

        return $row;
    }

    public function product_same_cat($category){
        $array = array();

        $query = "SELECT * FROM products WHERE category = '$category'";
    
        // die($query);

        $result = $this->mysqli->query($query);
        
        while($row = mysqli_fetch_assoc($result))    
        {  
            $array[] = $row;  
        }  
        return $array;
    }

    public function select_row_table($table, $col, $id){
        $array = array();
        $query = "SELECT * FROM $table WHERE $col='$id'";
        
        // die($query);

        $result = $this->mysqli->query($query);
        
        while($row = mysqli_fetch_assoc($result))  
        {  
            $array[] = $row;  
        }  

        return $array[0];
    }

    public function custom_query($query){
        $array = array();
        // $query = "SELECT * FROM $table WHERE $col='$id'";
        
        $result = $this->mysqli->query($query);
        
        while($row = mysqli_fetch_assoc($result))  
        {  
            $array[] = $row;  
        }  

        return $array;
    }



}
?>

