<?php
if(!isset ($_REQUEST['username'])) die('You are not allowed to execute this file directly');
else {

    $valid = 'true';
    $user = trim(strtolower($_REQUEST['username']));
    require('../clases/member.class.php');

    $objCliente=new Member;
    if (mysql_fetch_row($objCliente->exists("usr",$user))) {
        $valid = 'false';
    }
    echo $valid;
}
?>