<?php
session_name('dmt');
// Starting the session

session_set_cookie_params(7*24*60*60);
// Making the cookie live for 1 week

session_start();

if(isset($_SESSION['id']) && !isset($_COOKIE['dmtRemember']) && !$_SESSION['rememberMe']) {
    // If you are logged in, but you don't have the dmtRemember cookie (browser restart)
    // and you have not checked the rememberMe checkbox:

    $_SESSION = array();
    session_destroy();

    // Destroy the session
}
else if (isset($_SESSION['id']))
{
    header("Location:/trainer/");
}

if(isset($_GET['logoff'])) {
    $_SESSION = array();
    session_destroy();

    header("Location:.");
    exit;
}


if(isset ($_POST['submit']) && ($_POST['submit'] == "Registrarse")) {
    require('clases/member.class.php');

    $_POST['email'] = mysql_real_escape_string($_POST['email']);
    $_POST['username'] = mysql_real_escape_string($_POST['username']);
    $_POST['password'] = mysql_real_escape_string($_POST['password']);
    $_POST['firstname'] = mysql_real_escape_string($_POST['firstname']);
    $_POST['lastname'] = mysql_real_escape_string($_POST['lastname']);


    $objCliente=new Member();

    if ( $objCliente->insert(array($_POST['username'],md5($_POST['password']),$_POST['firstname'],$_POST['lastname'],$_POST['email'])) == true) {
            $row = $objCliente->login($_POST['username'], $_POST['password']);
            $_SESSION['usr']= $_POST['username'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['rememberMe'] = $_POST['rememberMe'];

            // Store some data in the session

            setcookie('dmtRemember',$_POST['rememberMe']);
            header("Location:/trainer/");
    }else {
        echo 'Se produjo un error. Intente nuevamente';
    }
}

$error = array();

if(isset ($_POST['submit']) && ($_POST['submit'] == "Entrar")) {
    require('clases/member.class.php');

    $_POST['username'] = mysql_real_escape_string($_POST['username']);
    $_POST['password'] = mysql_real_escape_string($_POST['password']);
    $_POST['rememberMe'] = (int)$_POST['rememberMe'];


    $objCliente=new Member();

    if ( $row = $objCliente->login($_POST['username'], $_POST['password'])) {
            $_SESSION['usr']= $_POST['username'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['rememberMe'] = $_POST['rememberMe'];

            // Store some data in the session

            setcookie('dmtRemember',$_POST['rememberMe']);
            header("Location:/trainer/");
    }else {
        $error[] = "true";
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <title>Data Mining Trainer</title>

        <link rel="stylesheet" type="text/css" media="screen" href="/css/milk.css" />
        <link rel="shortcut icon" href="/img/mineria2.png"/>

        <script src="/lib/jquery.js" type="text/javascript"></script>
        <script src="/lib/jquery.validate.js" type="text/javascript"></script>
        <script src="/lib/elements.js" type="text/javascript"></script>

        <style type="text/css">
            pre { text-align: left; }
        </style>

    </head>
    <body>

        <div id="main">
            <div id="topbar">
                <div class="content">
                    <span class="login">
                        &iquest;Ya eres miembro? <a class="login-link" href="/login/">Entra</a>.      </span>
                    <table class="tbl-container">
                        <tbody>
                            <tr><td><span class="welcome"><b>&iexcl;Bienvenido!</b></span>&nbsp;</td></tr>
                        </tbody></table>
                </div>
            </div> <!-- /topbar -->


            <div id="topnav">
                <div class="logo">
                    <a href="/"><img src="/img/logo.png" alt="Remember The Milk" id="topnav-logo"/></a>
                </div>
                <div class="content">
                    <ul>
                        <li class="top-nav-home"><a href="/">Inicio</a></li>
                        <li class="top-nav-signup"><a href="/signup/">Registrarse</a></li>
                        <li class="top-nav-help"><a href="/help/">Ayuda</a></li>
                    </ul>
                </div>
            </div> <!-- /topnav -->
