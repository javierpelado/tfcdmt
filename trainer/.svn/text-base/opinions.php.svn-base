<?php
if (!isset($_GET['mode'])) {
    echo"<h1> [:(] Error de paso de parametros</h1>";
}else{
    require('../clases/opinion.class.php');
    if ($_GET['mode'] == "delete") {
        $id=$_GET['id'];
        $categoryObj = new Category();
        $mysql_sessions = $categoryObj->delete($id);
        $sessionObj = new Session();
        $mysql_sessions = $sessionObj->delete_cat($catId);
    }
    if($_GET['mode'] == "insert") {
        //$cat=$_GET['cat'];
        $text = $_GET['text'];
        $opinionObj = new Opinion();
        $mysql_sessions = $opinionObj->insert(array($text));
        //echo mysql_insert_id();
        echo json_encode($mysql_sessions);
    }
    if($_GET['mode'] == "update") {
        $id = $_GET['id'];
        $title = $_GET['title'];
        $categoryObj = new Category();
        $mysql_sessions = $categoryObj->refresh(array($title),$id);
        echo json_encode($mysql_sessions);
    }
}
?>
