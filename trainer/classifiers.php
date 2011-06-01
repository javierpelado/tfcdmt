<?php
if (!isset($_GET['mode'])) {
    echo"<h1> [:(] Error de paso de parametros</h1>";
}else{
    require('../clases/classifier.class.php');
    if ($_GET['mode'] == "get") {
        $id_session = $_GET['id_session'];
        $order = $_GET['group'];
        $sessionObj = new Classifier();
        $mysql_sessions = $sessionObj->search_classifiers('id_session',$id_session,$order);
        $sessions = array();
        while (($session = mysql_fetch_array($mysql_sessions)) != null) {
            if($order == 'traingroup') $sessions[] = array("","",$session['Filter'],$session['date'],$session['id'],$session['traingroup']);
            else $sessions[] = array("","",$session['traingroup'],$session['date'],$session['id'],$session['Filter']);
        }
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
