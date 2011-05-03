<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
$debug = false;
if(!$debug) {
    $opinions = array ();
//    $options = $_POST['configData'];
    $opinions = json_decode($_POST['opinions'],true);
    $id = $_POST['id_session'];
    $dir = 'files/'.$id;
    if(!is_dir($dir)) mkdir($dir);
    $name = date("Ymd_His");
    $fileName = $dir."/".$name.".arff";

    $header = "";
    if (true || !file_exists($fileName)) {
        $header = "@relation prueba

@attribute text String
@attribute class {POSITIVE,NEGATIVE,NEUTRAL}

@data\r\n";

    }
//    if($options['opinionfileover'] == "true") $file = fopen($fileName, "w");
//    else $file = fopen($fileName, "a");
    $file = fopen($fileName, "w");
    fputs($file, $header);
    foreach ($opinions as $opinion) {
        $opinionstr = "\"".str_replace("\n", " ", $opinion[0]).",\" ".$opinion[1]."\r\n";
        fputs($file, $opinionstr);
    }
    fclose($file);
    echo "<b>Saved as ".$fileName."</b>";
}
else {
/*    print_r($_POST['configData']);
    $options = $_POST['configData'];
    print_r($options);
    echo $options['opinionfilepath']."<br>";
    echo $options['opinionfileover']."<br>";*/
    print_r($_POST);
}
?>
