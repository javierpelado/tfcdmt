<?php
//require('functions.php');
//if(isset($_POST['submit'])){
echo "añadiendo";
	require('clases/member.class.php');
echo "añadido";


	$objCliente=new Member();
echo "nuevo miembro";

//        if ( mysql_fetch_row($objCliente->mostrar_cliente($id)) == true){
//            echo 'Este twitt ya existe';
//        }
//	else
            if ( $objCliente->insert(array("jp","password","kk","devaca","hola@kk.com","127.0.0.1")) == true){
                    echo 'Datos guardados';
             }else{
                    echo 'Se produjo un error. Intente nuevamente';
             }
//}
//else{echo 'error de paso de parametros';}

function normalize($text) {
    $text = utf8_decode($text);
    return $text;
}
?>