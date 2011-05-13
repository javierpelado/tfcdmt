<?php
//print_r($_GET);
$path = $_GET['dir'];
$directorio = dir($path);
$files = array();
//echo "Directorio ".$path.":<br><br>";
while ($archivo = $directorio->read()) {
    if(strpos($archivo, '.') != 0) $files[] = $archivo;
}
$directorio->close();
echo json_encode($files);
?>