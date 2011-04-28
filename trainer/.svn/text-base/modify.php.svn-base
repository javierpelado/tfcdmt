<?php
if (!isset($_GET['mode'])) {
    echo"<h1> [:(] Error de paso de parametros</h1>";
}else{
    require('../clases/session.class.php');
    require('../clases/category.class.php');
    if ($_GET['mode'] == "deleteS") {
        $id=$_GET['id'];
        $sessionObj = new Session();
        $mysql_sessions = $sessionObj->delete($id);
        echo $mysql_sessions;
    }
    if($_GET['mode'] == "insertS") {
        $cat=$_GET['cat'];
        $title = $_GET['title'];
        $sessionObj = new Session();
        $mysql_sessions = $sessionObj->insert(array($cat,$title));
        echo mysql_insert_id();
    }
    if($_GET['mode'] == "updateS") {
        $id = $_GET['id'];
        $cat=$_GET['cat'];
        $title = $_GET['title'];
        $sessionObj = new Session();
        $mysql_sessions = $sessionObj->refresh(array($cat,$title),$id);
        echo json_encode($mysql_sessions);
    }
    if ($_GET['mode'] == "deleteC") {
        $id=$_GET['id'];
        $categoryObj = new Category();
        $mysql_sessions = $categoryObj->delete($id);
        $sessionObj = new Session();
        $mysql_sessions = $sessionObj->delete_cat($catId);
    }
    if($_GET['mode'] == "insertC") {
        //$cat=$_GET['cat'];
        $title = $_GET['title'];
        $categoryObj = new Category();
        $mysql_sessions = $categoryObj->insert(array($title));
        echo mysql_insert_id();
    }
    if($_GET['mode'] == "updateC") {
        $id = $_GET['id'];
        $title = $_GET['title'];
        $categoryObj = new Category();
        $mysql_sessions = $categoryObj->refresh(array($title),$id);
        echo json_encode($mysql_sessions);
    }
}
?>
