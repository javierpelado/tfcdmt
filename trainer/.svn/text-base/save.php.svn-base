<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$debug = false;
if (!$debug) {
    $opinions = array();
    $opinions = $_POST['opinions'];
    //print_r($_POST['opinions']);
    $id = $_POST['id_session'];
    $dir = 'files/' . $id;
    if (!is_dir($dir))
        mkdir($dir);
    $name = date("Ymd_His");
    $fileName = $dir . "/" . $name . ".arff";

    $header = "";
    if (true || !file_exists($fileName)) {
        $header = "@relation prueba

@attribute text String
@attribute class {POSITIVE,NEGATIVE,NEUTRAL}

@data\r\n";
    }
    $file = fopen($fileName, "w");
    fputs($file, $header);
    foreach ($opinions as $opinion) {
        $opinionstr = "\"" . str_replace("\n", " ", $opinion[0]) . ",\" " . $opinion[1] . "\r\n";
        //echo $opinionstr + "<br/>";
        fputs($file, $opinionstr);
    }
    fclose($file);

    $crc1 = file($fileName);

    /* LISTAR DIRECTORIO PARA BUSCAR ALGUN FICHERO IGUAL */
    $path = $_POST['dir'];
    $directorio = dir($path);
    $find = false;
    while (!$find && ($archivo = $directorio->read())) {
        if (strpos($archivo, '.') != 0) {
            $crc2 = file($dir . "/" . $archivo);
//            echo "tamaño del array de diferencia es ".sizeof(array_diff($crc1, $crc2))."\n";
//            echo "file1 => ".$fileName."  || numero de lineas => ".  sizeof($crc1)."\n";
//            echo "file2 => ".$archivo."  || numero de lineas => ".  sizeof($crc2)."\n";
            if (($name . ".arff" != $archivo) && (sizeof($crc1) == sizeof($crc2)) && (sizeof(array_diff($crc1, $crc2)) == 0)) {
            // No hay diferencias entre los archivos, y no estamos comparandolo consigo mismo
                    $find = true;
                    $name = substr($archivo,0,strlen($archivo) - 5);
                    $borrar = unlink($fileName);
  /*                  if($borrar){
                          echo "El archivo " . $fileName . " se eliminó correctamente <br>";
                    }else{
                          echo "Error al eliminar " . $fileName . "<br>";
                    }                                */
             }
        }
    }
    $directorio->close();

    echo $name;
}
else {
    /*    print_r($_POST['configData']);
      $options = $_POST['configData'];
      print_r($options);
      echo $options['opinionfilepath']."<br>";
      echo $options['opinionfileover']."<br>"; */
    //print_r($_POST);
    echo var_dump($_POST);
    echo $_POST['opinions'];
    echo json_decode($_POST['opinions'], true);
}
?>
