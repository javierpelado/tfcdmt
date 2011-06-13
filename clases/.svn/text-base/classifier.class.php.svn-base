<?php
include_once("conexion.class.php");

class classifier{
 //constructor
 	var $con;
 	function classifier(){
 		$this->con=new DBManager;
 	}

	function insert($campos){
		if($this->con->conectar()==true){
                    //print_r($campos);
                    //$campos[0] = $this->elimina_acentos($campos[0]);
                    if(sizeof($campos) > 1 ) {
                        if(!mysql_fetch_array($this->search_classifiers('text', $campos[0],$campos[1]))) {
//                            echo 'INSERT INTO `dmt_classifiers`(`id_session`,`id`,`text`,`polarity`) VALUES('.$campos[1].',NULL,"'.$campos[0].'","'.$campos[2].'")';
                            return mysql_query('INSERT INTO `dmt_classifiers`(`id_session`,`id`,`text`,`polarity`) VALUES('.$campos[1].',NULL,"'.$campos[0].'","'.$campos[2].'")');
                        }
                    }
                    else {
                        if(!mysql_fetch_array($this->search_sessions('text', $campos[0])))
                            return mysql_query('INSERT INTO `dmt_classifiers`(`id_session`,`id`,`text`,`polarity`) VALUES(NULL,NULL,"'.$campos[0].'","positive")');
                        else
                            return false;
                    }
//                       echo 'INSERT INTO `dmt_sessions`(`id`,`id_category`,`title`,`date`) VALUES(NULL,'.$campos[0].',"'.$campos[1].'",NOW())';
		}
	}

	function refresh($polarity,$id){
		if($this->con->conectar()==true){
			//print_r($campos);
                        //echo "UPDATE dmt_classifiers SET polarity= '".$polarity."' WHERE id = ".$id;
			return mysql_query("UPDATE dmt_classifiers SET polarity= '".$polarity."' WHERE id = ".$id);
		}
	}

	function search_classifiers($field,$query,$order,$session){
		if($this->con->conectar()==true){
			//echo "SELECT * FROM dmt_classifiers WHERE ".$field."=\"".$query."\"";
                    if($session == null)
			return mysql_query("SELECT * FROM dmt_classifiers WHERE ".$field."=\"".$query."\" ORDER BY ".$order);
                    else
			return mysql_query("SELECT * FROM dmt_classifiers WHERE ".$field."=\"".$query."\" AND id_session=\"".$session."\"");                        
		}
	}

	function show_classifiers(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM dmt_classifiers ORDER BY id DESC");
		}
	}

	function delete($id_session,$text){
		if($this->con->conectar()==true){
                    echo "DELETE FROM dmt_classifiers WHERE id_session=".$id_session." AND text=\"".$text."\"";
			return mysql_query("DELETE FROM dmt_classifiers WHERE id_session=".$id_session." AND text=\"".$text."\"");
		}
	}

        function delete_cat($catId) {
		if($this->con->conectar()==true){
			return mysql_query("DELETE FROM dmt_sessions WHERE id_category=".$catId);
		}
        }
        
        function elimina_acentos($cadena) {
            $tofind = "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ";
            $replac = "AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn";
            return(strtr($cadena, $tofind, $replac));
        }

}
?>