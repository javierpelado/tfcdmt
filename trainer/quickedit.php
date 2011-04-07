<?php
if (!isset($_POST['value'])) {
    echo"<h1> [:(] Error de paso de parametros</h1>";
}else {
    require('../clases/session.class.php');
    require('../clases/category.class.php');
    //print_r($_POST);
    $id = $_POST['id'];
    $cat=$_POST['cat'];
    $title = $_POST['value'];
    $sessionObj = new Session();
    $mysql_sessions = $sessionObj->refresh(array($cat,$title),$id);
    if($mysql_sessions) echo $title;
}
?>
