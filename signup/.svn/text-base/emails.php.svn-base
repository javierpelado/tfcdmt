<?php
if(!isset ($_REQUEST['email'])) die('You are not allowed to execute this file directly');
else {

    $valid = 'true';
    $email = trim(strtolower($_REQUEST['email']));
    require('../clases/member.class.php');

    $objCliente=new Member;
    if (mysql_fetch_row($objCliente->exists("email",$email))) {
        $valid = 'false';
    }
    echo $valid;
}
?>
