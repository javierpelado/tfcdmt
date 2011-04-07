<?php
include_once("conexion.class.php");

class Opinion{
 //constructor
 	var $con;
 	function Opinion(){
 		$this->con=new DBManager;
 	}

	function insert($campos){
		if($this->con->conectar()==true){
//			print_r($campos);
                    if(sizeof($campos) > 1 ) {
			return mysql_query('INSERT INTO `dmt_sessions`(`id`,`id_category`,`title`,`date`) VALUES(NULL,'.$campos[0].',"'.$campos[1].'",NOW())');
                    }
                    else {
                        if(!mysql_fetch_array($this->search_sessions('text', $campos[0])))
                            return mysql_query('INSERT INTO `dmt_opinions`(`id`,`text`,`polarity`) VALUES(NULL,"'.$campos[0].'","positive")');
                        else
                            return false;
                    }
//                       echo 'INSERT INTO `dmt_sessions`(`id`,`id_category`,`title`,`date`) VALUES(NULL,'.$campos[0].',"'.$campos[1].'",NOW())';
		}
	}

	function refresh($campos,$id){
		if($this->con->conectar()==true){
			//print_r($campos);
			return mysql_query("UPDATE dmt_sessions SET id_category= '".$campos[0]."', title = '".$campos[1]."' WHERE id = ".$id);
		}
	}

	function search_sessions($field,$query){
		if($this->con->conectar()==true){
			//echo "SELECT * FROM dmt_opinions WHERE ".$field."=\"".$query."\"";
			return mysql_query("SELECT * FROM dmt_opinions WHERE ".$field."=\"".$query."\"");
		}
	}

	function show_sessions(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM dmt_sessions ORDER BY id DESC");
		}
	}

	function delete($id){
		if($this->con->conectar()==true){
			return mysql_query("DELETE FROM dmt_sessions WHERE id=".$id);
		}
	}

        function delete_cat($catId) {
		if($this->con->conectar()==true){
			return mysql_query("DELETE FROM dmt_sessions WHERE id_category=".$catId);
		}
        }
}
?>