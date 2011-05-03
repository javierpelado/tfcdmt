<?php

if (!isset($_POST['mode'])) {
    echo"<h1> [:(] Error de paso de parametros</h1>";
} else {
    require('../clases/opinion.class.php');
    $session = $_POST['id_session'];
    $path = "files/" . $session . "/" . $_POST['path'];
    $opinionObj = new Opinion();
    $file = fopen($path, 'r');
    $opinions = array();
    $head = true;
    while (!feof($file)) {
        $buffer = fgets($file, 4096);
        $buffer = str_replace("\n", "", $buffer);
        $buffer = str_replace("\r", "", $buffer);
        if (!$head && ($buffer != "")) {
            $opinion = explode(",\" ", $buffer);
            $opinion[0] = str_replace('"', "", $opinion[0]);
            $opinion[1] = str_replace('"', "", $opinion[1]);
            $mysql_sessions = $opinionObj->insert(array($opinion[0], $session, $opinion[1]));
        }
        if ($buffer == "@data")
            $head = false;
    }
}
?>
