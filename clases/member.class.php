<?php 
include_once("conexion.class.php");

class Member{
 //constructor	
 	var $con;
 	function Member(){
 		$this->con=new DBManager;
 	}

	function insert($campos){
		if($this->con->conectar()==true){
//			print_r($campos);
//			echo 'INSERT INTO dmt_members (usr,pass,nb,ap,email,regIP,dt) VALUES ("'.$campos[0].'", "'.$campos[1].'","'.$campos[2].'","'.$campos[3].'","'.$campos[4].'","'.$_SERVER["REMOTE_ADDR"].'",NOW())';
			return mysql_query('INSERT INTO dmt_members (usr,pass,nb,ap,email,regIP,dt) VALUES ("'.$campos[0].'", "'.$campos[1].'","'.$campos[2].'","'.$campos[3].'","'.$campos[4].'","'.$_SERVER["REMOTE_ADDR"].'",NOW())');
		}
	}
	
	function refresh($campos,$id){
		if($this->con->conectar()==true){
			//print_r($campos);
                        //print_r($campos);
                        //echo "UPDATE dmt_members SET usr = '".$campos['username']."', nb = '".$campos['firstname']."', ap = '".$campos['lastname']."', email = '".$campos['email']."' WHERE id = ".$id;
                        //echo "UPDATE dmt_members SET usr = '".$campos['usr']."', nb = '".$campos['nb']."', ap = '".$campos['ap']."', email = '".$campos['email']."' WHERE id = ".$id;
			return mysql_query("UPDATE dmt_members SET usr = '".$campos['username']."', nb = '".$campos['firstname']."', ap = '".$campos['lastname']."', email = '".$campos['email']."' WHERE id = ".$campos['id']);
		}
	}
	
	function show_member($id){
		if($this->con->conectar()==true){
//                    echo "SELECT * FROM dmt_members WHERE id=".$id;
			return mysql_query("SELECT * FROM dmt_members WHERE id=".$id);
		}
	}

	function show_members(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM cliente ORDER BY id DESC");
		}
	}

	function delete($id){
		if($this->con->conectar()==true){
			return mysql_query("DELETE FROM cliente WHERE id=".$id);
		}
	}

        function exists($field,$value){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM dmt_members WHERE ".$field."='".$value."'");
		}
        }

        function login($username,$password) {
		if($this->con->conectar()==true){
			return mysql_fetch_array(mysql_query("SELECT * FROM dmt_members WHERE usr='".$username."' AND pass='".md5($password)."'"));
		}
        }
}
?>