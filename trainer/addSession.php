<?php
if(isset($_POST['submit']) && ($_POST['submit'] == 'newSession')){
    require('../clases/session.class.php');
    require('../clases/category.class.php');
    $sessionObj = new Session();

	$title = normalize(htmlspecialchars(trim($_POST['title'])));
        if($_POST['category'] != "") {
            echo $_POST['category'];
            $category = normalize(htmlspecialchars(trim($_POST['category'])));
            $fields = array($category,$title);
        }
        else $fields = array($title);


	if ( $sessionObj->insert($fields) == true){
                    echo 'Sesi&oacute;n guardada';
             }else{
                    echo 'Se produjo un error. Intente nuevamente';
             }
}else{echo 'error de paso de parametros';}

function normalize($text) {
    $text = utf8_decode($text);
    return $text;
}



?>
