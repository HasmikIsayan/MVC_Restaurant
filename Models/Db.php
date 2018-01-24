<?php

class Models_Db {
	
	public $con;

	
	function __construct() {
        		
		$this->con = new PDO('mysql:host='.SERVER.';dbname='.DATABASE.';charset=utf8', USERNAME, PASSWORD);
		
    }

    public function getRow($table, $where) {

		$result = $this->con->query("select * from $table where $where order by 'id'");	
		$row = $result->fetch(PDO::FETCH_ASSOC);
			
       // echo $row['name'].'<br>';
		//print_r($row);
        return $row;
    }

    public function getRows($table, $where) {

		$result = $this->con->query("select * from $table where $where order by 'id'");	
		$i=0;
		while($row[$i] = $result->fetch(PDO::FETCH_ASSOC)){
			$i++;
			}
			
			
        print_r($row);
       
    }

    public function delete($delete) {
		
		$result = $this->con->query($delete);	        
        
    }

    public function update($table, $data, $where) {


        $result = $this->con->query("Update $table set $data where $where");
       /* if ($result) {

            echo'<br>' . 'Update ' . $table . ' table which ' . $where . ' value';
        } else {
            echo 'there is a problem';
        };*/
		//print_r($result);
		return $result;
    }

    public function countNum($table, $where) {

		$result = $this->con->query("SELECT count(*) as count from $table where $where");	
		$row = $result->fetch(PDO::FETCH_ASSOC);
        echo '<br>';
        echo 'There are ' . $row['count'] . ' column';
    }
	
	public function selectTable($table){
		
		$result = $this->con->query("select * from $table");	
		$i=0;
		while($row[$i] = $result->fetch(PDO::FETCH_ASSOC)){
			$i++;
			};

		return $row;
       // print_r($row);
       
	}
	public function insert($insert){
		
		$result = $this->con->query($insert);
		return $result;
		//print_r($result);
		
	}
}

//$user_model->getRow("users", "id=2");
//$user_model->getRows("users","name='Hasmik'");
//$user_model->delete("users", "id=10");
//$user_model->update("users","name='Tatevik'","id=3");
//$user_model->countNum("users", "name='Hasmik'");





