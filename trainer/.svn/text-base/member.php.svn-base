<?php
if (!isset($_GET['mode'])) {
    echo"<h1> [:(] Error de paso de parametros</h1>";
}else{
    require('../clases/member.class.php');
    if ($_GET['mode'] == "delete") {
/*        $id=$_GET['id'];
        $sessionObj = new Session();
        $mysql_sessions = $sessionObj->delete($id);*/
    }
    if($_GET['mode'] == "update") {
        $id = $_GET['id'];
        $data = $_GET;//json_decode($_GET['data'],true);
        print_r($data);
        //print_r($_GET);
        $memberObj = new Member();
        $mysql_member = $memberObj->refresh($data,$id);
        echo "success";//$mysql_member;
    }
    if($_GET['mode'] == "get") {
        $id = $_GET['id'];
        $memberObj = new Member();
        $mysql_member = $memberObj->show_member($id);
        echo json_encode(mysql_fetch_array($mysql_member));
    }
}
?>
