<?php
if (!isset($_GET['mode'])) {
    echo"<h1> [:(] Error de paso de parametros</h1>";
}else{
    require('../clases/session.class.php');
    require('../clases/category.class.php');
    if ($_GET['mode'] == "search") {
        $cat=$_GET['category'];
        $sessionObj = new Session();
        if($cat != '-') $mysql_sessions = $sessionObj->search_sessions("id_category", $cat);
        else $mysql_sessions = $sessionObj->show_sessions();
        $sessions = array();
        while (($session = mysql_fetch_array($mysql_sessions)) != null)
            $sessions[] = $session;
        $data = $sessions;
    }
    if($_GET['mode'] == "categories") {
        $categoryObj = new Category();
        $mysql_categories = $categoryObj->show_categories();
        $categories = array();
        //print_r($sessions);
        while (($category = mysql_fetch_array($mysql_categories)) != null)
            $categories[] = $category;

        $data = $categories;
    }
    echo json_encode($data);
}
?>
