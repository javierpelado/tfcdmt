<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

$opinions = array ();
phpinfo();

echo var_dump($_POST);
$opinions = json_decode($_POST['opinions'],true);
foreach ($opinions as $opinion) var_dump($opinion);
$dir = $_POST['fileName'].$_POST['site'];
echo $dir."<br>";
if(!is_dir($dir)) mkdir($dir);
//$fileName = $dir."/".$_POST['query'].".arff";
$fileName = $dir."/".$_POST['query'].".arff";

$header = "";
if (!file_exists($fileName)) {
    $header = "@relation ".$_POST['query']."

@attribute text String
@attribute class {POSITIVE,NEGATIVE,NEUTRAL}

@data\r\n";

}
$file = fopen($fileName, "a");
fputs($file, $header);
foreach ($opinions as $opinion)
{
    $opinionstr = "\"".str_replace("\n", " ", $opinion[0]).",\" ".$opinion[1]."\r\n";
    fputs($file, $opinionstr);
}
fclose($file);
echo "<b>Saved as ".$fileName."</b>";
?>
