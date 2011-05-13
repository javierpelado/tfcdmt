<?php
if (!isset($_POST['value'])) {
    echo"<h1> [:(] Error de paso de parametros</h1>";
}else {
    if($_POST['type'] == "session") {
    require('../clases/session.class.php');
    //print_r($_POST);
    $id = $_POST['id'];
    $cat=$_POST['cat'];
    $title = $_POST['value'];
    $sessionObj = new Session();
    $mysql_sessions = $sessionObj->refresh(array($cat,$title),$id);
    }
    else {
    require('../clases/category.class.php');
    //print_r($_POST);
    $id = $_POST['id'];
    $cat=$_POST['cat'];
    $title = $_POST['value'];
    $sessionObj = new Category();
    $mysql_sessions = $sessionObj->refresh($id,$title);
        
    }
    if($mysql_sessions) echo $title;
}
?>
