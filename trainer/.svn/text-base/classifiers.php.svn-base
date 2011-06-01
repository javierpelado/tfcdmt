<?php
if (!isset($_GET['mode'])) {
    echo"<h1> [:(] Error de paso de parametros</h1>";
}else{
    require('../clases/opinion.class.php');
    if ($_GET['mode'] == "get") {
        $id_session = $_GET['id_session'];
        $sessionObj = new Opinion();
        $mysql_sessions = $sessionObj->search_opinions('id_session',$id_session);
        $sessions = array();
        while (($session = mysql_fetch_array($mysql_sessions)) != null)
            $sessions[] = array("","",$session['text'],"",$session['id'],$session['polarity']);
        $data['aaData'] = $sessions;
        echo json_encode($data);
    }
    if ($_GET['mode'] == "delete") {
        $id=$_GET['id_session'];
        $text = $_GET['text'];
        $opinionObj = new Opinion();
        $mysql_opinion = $opinionObj->delete($id,$text);
        echo $mysql_opinion;
    }
    if($_GET['mode'] == "insert") {
        $session=$_GET['id_session'];
        $text = $_GET['text'];
        $opinionObj = new Opinion();
        $mysql_sessions = $opinionObj->insert(array($text,$session,"POSITIVE"));
        //echo mysql_insert_id();
        //echo json_encode($mysql_sessions);
        echo $_GET['i'];
    }
    if($_GET['mode'] == "update") {
        //print_r($_GET);
        $id = $_GET['id'];
        $polarity = $_GET['polarity'];
        $categoryObj = new Opinion();
        $mysql_sessions = $categoryObj->refresh($polarity,$id);
        echo json_encode($mysql_sessions);
    }
}
?>
