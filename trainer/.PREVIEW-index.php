<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_name('dmt');
// Starting the session

session_set_cookie_params(7 * 24 * 60 * 60);
// Making the cookie live for 1 week

session_start();
?><html xmlns="http://www.w3.org/1999/xhtml" ><head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
        <title>Data Mining Trainer</title>

        <?php
        if (!isset($_SESSION['id'])) {
/************************/
/*NO HAS INICIADO SESIÓN*/
/************************/
        ?>
            <link rel="stylesheet" type="text/css" media="screen" href="/css/milk.css" />
            <link rel="shortcut icon" href="/img/mineria2.png" />

            <script src="/lib/jquery.js" type="text/javascript" ></script>
            <script src="/lib/jquery.validate.js" type="text/javascript" ></script>
            <script src="/lib/elements.js" type="text/javascript" ></script>

            <style type="text/css" >
pre {
	text-align:left;
}

</style>

        </head><body onload="" class=" sf3" >

            <div id="main" >
                <div id="topbar" >
                    <div class="content" >
                        <span class="login" >
                            &iquest;Ya eres miembro? <a class="login-link" href="/login/" >Entra</a>.      </span>
                        <table class="tbl-container" >
                            <tbody>
                                <tr><td><span class="welcome" ><b>&iexcl;Bienvenido!</b></span>&nbsp;</td></tr>
                            </tbody></table>
                    </div>
                </div> <!-- /topbar -->


                <div id="topnav" >
                    <div class="logo" >
                        <a href="/" ><img src="/img/logo.png" alt="Remember The Milk" id="topnav-logo" /></a>
                    </div>
                    <div class="content" >
                        <ul>
                            <li class="top-nav-home" ><a href="/" >Inicio</a></li>
                            <li class="top-nav-signup" ><a href="/signup/" >Registrarse</a></li>
                            <li class="top-nav-help" ><a href="/help/" >Ayuda</a></li>
                        </ul>
                    </div>
                </div> <!-- /topnav -->
                <script type="text/javascript" >
                    var title = new blueTitle("No tienes acceso");
                </script>


                <div id="container" >

                    <div style="clear:both; " ><div></div></div>


                    <div class="content" >
                    </div>
                </div>

            <?php }
            else {
/*********************/
/*HAS INICIADO SESIÓN*/
/*********************/
 ?>
            <link rel="stylesheet" type="text/css" media="screen" href="/css/milk.1.css" />
            <link rel="stylesheet" type="text/css" media="screen" href="/css/app.14.css" />
            <link rel="shortcut icon" href="/img/mineria2.png" />

            <script src="/lib/jquery.js" type="text/javascript" charset="utf-8" ></script>
            <script src="/lib/jquery.validate.js" type="text/javascript" charset="utf-8" ></script>
            <script src="trainer.js" type="text/javascript" charset="utf-8" ></script>
            <script src="/lib/elements.js" type="text/javascript" charset="utf-8" ></script>
            <script src="/lib/jquery.dimensions.js" type="text/javascript" charset="utf-8" ></script>
            <script src="/lib/jquery.quickedit.0.1.js" type="text/javascript" charset="utf-8" ></script>
            <script src="/lib/jquery.jeditable.js" type="text/javascript" charset="utf-8" ></script>

            <style type="text/css" >
pre {
	text-align:left;
}

.quickEditOverlay {
	position:absolute;
	background-image:url(../../../../../../img/busy.gif);
	background-repeat-x:no-repeat;
	background-repeat-y:no-repeat;
	background-repeat:no-repeat;
	background-attachment:initial;
	background-position:50% 50%;
	background-position-x:50%;
	background-position-y:50%;
	background-origin:initial;
	background-clip:initial;
	background-color:#FFFFFF;
}

.editable:hover {
	cursor:pointer;
	padding-bottom:2px;
	padding-top:2px;
	background-color:#FFFFCC;
}

</style>
            
            
                <div id="content" >
                    <div id="appheader" >
                        <a href="/" >
                            <div id="appheaderlogo" style="position:absolute; height:83px; width:188px; cursor:pointer; background-image:url(../../../../../../img/logo2.png); background-attachment:initial; background-position:initial initial; background-position-x:initial; background-position-y:initial; background-origin:initial; background-clip:initial; background-color:transparent; background-repeat-x:no-repeat; background-repeat-y:no-repeat; background-repeat:no-repeat; margin-top:10px; " ></div>
                        </a>
                        <div id="topnav" style="float:right; " >
                            <span id="personName" style="position:relative; color:#999999; font-weight:bold; " ><?php echo $_SESSION['usr']; ?></span>
                            |<span id="viewSelector" >
                                <span style="font-weight:bold; " >Sesiones</span> |
                                <a href="#section.locations" >Categor&iacute;as</a> |
                                <a href="#section.settings" >Preferencias</a> |
                                <a href="/help/" target="_blank" >Ayuda</a> |
                                <a href="../?logoff" >Salir</a>
                            </span>
                        </div>
                        <div style="float:right; clear:right; padding-top:7px; " ><span id="datetime" style="white-space:nowrap; text-align:right; color:#A6A6A6; font-size:10px; " >domingo 21 de noviembre de 2010 | 14:38</span></div>
                        <div id="searchbox" >
                            <form onsubmit="control.updateListFilter(); return false;" action="" >
                                <div id="searchboxwrap" >
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td style="width:1px; " >
                                                    <div id="searchicon" >
                                                    </div>
                                                </td>
                                                <td>
                                                    <input onfocus="this.select();" type="text" id="listFilter" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="searchtogglewrap" ><a id="searchtoggle" href="#" onclick="tasksView.toggleSearchOptions(); return false;" >Mostrar opciones de b&uacute;squeda</a></div>
                            </form>
                        </div>
                    </div>
                    <div id="statusbox" style="padding-left:207px; display:none; " >
                        <div class="orange_rbroundbox" >
                            <div class="orange_rbtop" ><div></div></div>
                            <div class="orange_rbcontent" >
                                <table style="width:100%; margin:0; padding:0; " >
                                    <tbody>
                                        <tr>
                                            <td style="padding-left:6px; width:10px; " >
                                                <img style="vertical-align:bottom; text-align:right; " src="/img/ico/ico_info_org_org.gif" alt="Information" />
                                            </td>
                                            <td style="padding-left:6px; text-align:left; " >
                                                <span id="statusboxtext" style="text-align:left; font-weight:bold; " ><span>Cargando...</span></span>
                                            </td>
                                            <td style="padding-left:6px; display:none; " id="statusboxbuttons" >
                                                <span id="statusbutton_done" ></span>
                                                <span id="statusbutton_cancel" ></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!-- /orange_rbcontent -->
                            <div class="orange_rbbot" ><div></div></div>
                        </div><!-- /orange_rbroundbox -->
                    </div>
                    <div id="break" ></div>
                    <div id="appview" style="" >
                    </div>
                </div>
            
<?php } ?>
            
</div></body></html>