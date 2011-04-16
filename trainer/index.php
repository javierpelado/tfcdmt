<?php
session_name('dmt');
// Starting the session

session_set_cookie_params(7 * 24 * 60 * 60);
// Making the cookie live for 1 week

session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <title>Data Mining Trainer</title>

        <?php
        if (!isset($_SESSION['id'])) {
/************************/
/*NO HAS INICIADO SESIÓN*/
/************************/
        ?>
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
<!--                <div id="topbar">
                    <div class="content">
                        <span class="login">
                            &iquest;Ya eres miembro? <a class="login-link" href="/login/">Entra</a>.      </span>
                        <table class="tbl-container">
                            <tbody>
                                <tr><td><span class="welcome"><b>&iexcl;Bienvenido!</b></span>&nbsp;</td></tr>
                            </tbody></table>
                    </div>
                </div> <!-- /topbar -->
                <script type="text/javascript">
                    var topbar = new topBar($("#main"));
                </script>

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
                <script type="text/javascript">
                    var title = new blueTitle("No tienes acceso");
                </script>


                <div id="container">

                    <div style="clear: both;"><div></div></div>


                    <div class="content">
                    </div>
                </div>

            <?php }
            else {
/*********************/
/*HAS INICIADO SESIÓN*/
/*********************/
 ?>
            <link rel="stylesheet" type="text/css" media="screen" href="/css/milk.1.css" />
            <link rel="stylesheet" type="text/css" media="screen" href="/css/app.14.ext.css" />
            <link rel="shortcut icon" href="/img/mineria2.png"/>

            <script src="/lib/jquery.js" type="text/javascript" charset="utf-8"></script>
            <script src="/lib/jquery.validate.js" type="text/javascript" charset="utf-8"></script>
            <script src="trainer.js" type="text/javascript" charset="utf-8"></script>
            <script src="/lib/elements.js" type="text/javascript" charset="utf-8"></script>
            <script src="/lib/jquery.dimensions.js" type="text/javascript" charset="utf-8"></script>
            <script src="/lib/jquery.jeditable.js" type="text/javascript" charset="utf-8"></script>
            <script src="/lib/jquery.dataTables.js" type="text/javascript" charset="utf-8"></script>
            <script src="/lib/dataTables.plug-ins.js" type="text/javascript" charset="utf-8"></script>
            <script src="/lib/jquery.corner.js" type="text/javascript" charset="utf-8"></script>


            <style type="text/css">
                pre { text-align: left; }
                .quickEditOverlay {
                    position: absolute;
                    background: url('/img/busy.gif') center no-repeat;
                    background-color: #fff;
                }

                .editable:hover {
                    cursor: pointer;
                    padding-bottom: 2px;
                    padding-top: 2px;
                    background-color: rgb(255,255,204);
                }
            </style>
            </head>
            <body>
                <div id="title" class="content" style="display: none"><div class="xtabs"><ul><li class="xtab_blue"><a href=""><span id="titlespan"></span></a></li></ul></div></div>
                <div id="content">
                    <div id="appheader">
                        <a href="/">
                            <div id="appheaderlogo" style="height: 83px; width: 188px; cursor: pointer; background:transparent url('/img/logo2.png');background-repeat: no-repeat;margin-top: 10px;"></div>
                        </a>
                        <div id="topnav" style="float: right;">
                            <span id="personName" style="position: relative; color: #999; font-weight:bold;"><?php echo $_SESSION['usr']; ?></span>
                            |<span id="viewSelector">
                            </span>
                        </div>
                        <div style="float: right; clear: right; padding-top: 7px;"><span id="datetime" style="white-space: nowrap; text-align: right; color: #A6A6A6; font-size: 10px;">domingo 21 de noviembre de 2010 | 14:38</span></div>
                    </div>
                </div>
                <form id="userdata" style="display: none">
                    <input class="textfield" id="username" name="username" type="text" value="<?php echo $_SESSION['usr'] ?>"></input>
                    <input class="textfield" id="userid" name="userid" type="text" value="<?php echo $_SESSION['id'] ?>"></input>
                </form>
            </body>
<?php } ?>
            </html>
