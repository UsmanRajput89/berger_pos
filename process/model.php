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

    public function update($table,$para=array(),$id){
        $args = array();

        foreach ($para as $key => $value) {
            $args[] = "$key = '$value'"; 
        }

        $sql="UPDATE  $table SET " . implode(',', $args);

        $sql .=" WHERE $id";

        $result = $this->mysqli->query($sql);
    }

    public function delete($table,$id){

        $sql="DELETE FROM $table WHERE id= '$id' ";
        
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


    // public function __destruct(){
    //     $this->mysqli->close();
    // }
}
?>
