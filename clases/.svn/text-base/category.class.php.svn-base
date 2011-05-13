<?php
include_once("conexion.class.php");

class Category{
 //constructor
 	var $con;
 	function Category(){
 		$this->con=new DBManager;
 	}

	function insert($campos){
		if($this->con->conectar()==true){
//			print_r($campos);
			//echo 'INSERT INTO `dmt_category`(`id`,`name`) VALUES(NULL,"'.$campos[0].'")';
			return mysql_query('INSERT INTO `dmt_category`(`id`,`name`) VALUES(NULL,"'.$campos[0].'")');
		}
	}

	function refresh($id,$title){
		if($this->con->conectar()==true){
			//print_r($campos);
			return mysql_query("UPDATE dmt_category SET name= '".$title."' WHERE id = ".$id);
		}
	}

	function show_category($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM dmt_category WHERE id=".$id);
		}
	}

	function show_categories(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM dmt_category ORDER BY id ASC");
		}
	}

	function delete($id){
		if($this->con->conectar()==true){
			return mysql_query("DELETE FROM dmt_category WHERE id=".$id);
		}
	}


}
?>