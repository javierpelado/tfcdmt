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
            <link rel="stylesheet" type="text/css" media="screen" href="/css/app.14.css" />
            <link rel="shortcut icon" href="/img/mineria2.png"/>

            <script src="/lib/jquery.js" type="text/javascript" charset="utf-8"></script>
            <script src="/lib/jquery.validate.js" type="text/javascript" charset="utf-8"></script>
            <script src="trainer.js" type="text/javascript" charset="utf-8"></script>
            <script src="/lib/elements.js" type="text/javascript" charset="utf-8"></script>
            <script src="/lib/jquery.dimensions.js" type="text/javascript" charset="utf-8"></script>
            <script src="/lib/jquery.quickedit.0.1.js" type="text/javascript" charset="utf-8"></script>
            <script src="/lib/jquery.jeditable.js" type="text/javascript" charset="utf-8"></script>

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
            <body onload="" class=" sf3">
                <div id="content">
                    <div id="appheader">
                        <a href="/">
                            <div id="appheaderlogo" style="position: absolute; height: 83px; width: 188px; cursor: pointer; background:transparent url('/img/logo2.png');background-repeat: no-repeat;margin-top: 10px;"></div>
                        </a>
                        <div id="topnav" style="float: right;">
                            <span id="personName" style="position: relative; color: #999; font-weight:bold;"><?php echo $_SESSION['usr']; ?></span>
                            |<span id="viewSelector">
                                <span style="font-weight: bold;">Sesiones</span> |
                                <a href="#section.locations">Categor&iacute;as</a> |
                                <a href="#section.settings">Preferencias</a> |
                                <a href="/help/" target="_blank">Ayuda</a> |
                                <a href="../?logoff">Salir</a>
                            </span>
                        </div>
                        <div style="float: right; clear: right; padding-top: 7px;"><span id="datetime" style="white-space: nowrap; text-align: right; color: #A6A6A6; font-size: 10px;">domingo 21 de noviembre de 2010 | 14:38</span></div>
                        <div id="searchbox">
                            <form onsubmit="control.updateListFilter(); return false;" action="">
                                <div id="searchboxwrap">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td style="width: 1px;">
                                                    <div id="searchicon">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input onfocus="this.select();" type="text" id="listFilter"/>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="searchtogglewrap"><a id="searchtoggle" href="#" onclick="tasksView.toggleSearchOptions(); return false;">Mostrar opciones de b&uacute;squeda</a></div>
                            </form>
                        </div>
                    </div>
                    <div id="statusbox" style="padding-left: 207px; height: 4,1em; display: none; ">
                        <div class="orange_rbroundbox">
                            <div class="orange_rbtop"><div></div></div>
                            <div class="orange_rbcontent">
                                <table style="margin:0; padding:0; width: 100%;">
                                    <tbody>
                                        <tr>
                                            <td style="padding-left: 6px; width: 10px;">
                                                <img style="vertical-align: bottom; text-align: right;" src="/img/ico/ico_info_org_org.gif" alt="Information"/>
                                            </td>
                                            <td style="padding-left: 6px; text-align: left;">
                                                <span id="statusboxtext" style="text-align: left; font-weight: bold;"><span>Cargando...</span></span>
                                            </td>
                                            <td style="padding-left: 6px; display: none; " id="statusboxbuttons">
                                                <span id="statusbutton_done"></span>
                                                <span id="statusbutton_cancel"></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!-- /orange_rbcontent -->
                            <div class="orange_rbbot"><div></div></div>
                        </div><!-- /orange_rbroundbox -->
                    </div>
                    <div id="break"></div>
                    <div id="appview" style="">
                        <div id="listbox">
                            <div id="list">
                                <div id="listtabs" style="" class="xtabs">
                                    <ul>
                                    </ul>
                                </div>
                                <div id="listwrap">
                                    <div id="tools_spacer" style="border-top: 1px solid #CACACA;margin:0; clear: both; padding-top: 1.8em; border-left: 1px solid #CACAAC; border-right: 1px solid #CACACA;"></div>
                                    <div id="tools" style="">
                                        <div id="tasksToolbox" style="visibility: visible; ">
                                            <div class="xtoolbox_actions">
                                                <form>
                                                    <div>
                                                        <input type="submit" class="xtoolbox_button" value="Abrir sesi&oacute;n"/>
                                                        <input type="submit" class="xtoolbox_button" value="Eliminar sesi&oacute;n/es"/>
                                                        <select id="mas">
                                                            <option>M&aacute;s acciones...</option>
                                                            <option disabled="">---</option>
                                                            <option>Duplicar Entrenamiento</option>
                                                            <option>Borrar Entrenamiento</option>
                                                            <option disabled="">---</option>
                                                            <option disabled="">Asignar categor&iacute;a...</option>
                                                            <option>..Dar prioridad 1</option>
                                                            <option>..Dar prioridad 2</option>
                                                            <option>..Dar prioridad 3</option>
                                                            <option>..Sin prioridad</option>
                                                            <option disabled="">---</option>
                                                            <option disabled="">Mover a...</option>
                                                            <option>..Lista "Buz&oacute;n de entrada"</option>
                                                            <option>..Lista "Alg&uacute;n D&iacute;a"</option>
                                                            <option>..Lista "En Espera"</option>
                                                            <option>..Lista "Estudios"</option>
                                                            <option>..Lista "Personal"</option>
                                                            <option>..Lista "Pr&oacute;ximo"</option>
                                                            <option>..Lista "Trabajo"</option>
                                                            <option disabled="">---</option>
                                                            <option disabled="">Deshacer la &uacute;ltima acci&oacute;n</option>
                                                        </select>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="xtoolbox_selector">Seleccionar: <a id="selectAll" href=" ">Todas</a>, <a href=" ">Ninguna</a></div>
                                        </div>
                                        <!--br />
                                        <br /-->
                                    </div>
                                    <div id="midcontent">
                                        <div style="border-left: 1px solid #CACACA; border-right: 1px solid #CACACA; margin: 0px; clear: both;">
                                            <div id="add-box" class="add-box ">
                                                <div class="ab1">
                                                    <div class="ab6"></div>
                                                    <div class="ab8"></div>
                                                    <div class="ab9">
                                                        <span class="ab2"></span><span class="ab4"></span>
                                                    </div>
                                                    <div class="ab7">
                                                        <div class="ab3"></div>
                                                        <span class="ab5"></span>
                                                    </div>
                                                    <table width="100%" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td width="*">
                                                                    <div class="add-field-wrap">
                                                                        <div class="add-field"><input type="text" id="add-text" name="add-text" value="" autocomplete="off"/></div>
                                                                    </div>
                                                                </td>
                                                                <td align="right" style="width: 180px; ">
                                                                    <div class="add-extra" unselectable="on"><span id="add-label">&laquo; Agregue una nueva sesi&oacute;n de entrenamiento</span></div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div> <!-- /add-box -->
                                            <div id="adding" style="display: none;">
                                                <table class="xtable xtable_adding">
                                                    <colgroup>
                                                        <col class="col_prio"/>
                                                        <col class="col_arr"/>
                                                        <col class="col_check"/>
                                                        <col class="col_text"/>
                                                        <col class="col_image"/>
                                                    </colgroup>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div id="loading" style="display: none; ">
                                                <table class="xtable xtable_loading">
                                                    <colgroup>
                                                        <col class="col_prio"/>
                                                        <col class="col_text"/>
                                                        <col class="col_image"/>
                                                    </colgroup>
                                                    <tbody>
                                                        <tr class="xtr">
                                                            <td class="xtd xtd_prio prioN">&nbsp;</td>
                                                            <td class="xtd xtd_text">Cargando...</td>
                                                            <td class="xtd xtd_image">
                                                                <img src="/img/busy.gif" alt="Cargando..."/>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div id="tasks" style="">
                                                <table class="xtable xtable_tags_left">
                                                    <colgroup>
                                                        <col class="col_prio"/>
                                                        <col class="col_arr"/>
                                                        <col class="col_check"/>
                                                        <col class="col_text"/>
                                                        <col class="col_date"/>
                                                        <col class="col_ico"/>
                                                    </colgroup>
                                                    <tbody>
                                                        <tr class="xtr">
                                                            <td class="xtd xtd_prio prioN">&nbsp;</td>
                                                            <td class="xtd xtd_arr"></td>
                                                            <td class="xtd xtd_check">
                                                                <form id="tasks_row_form_0" action="#">
                                                                    <div style="display: inline;">
                                                                        <input type="checkbox"/></div>
                                                                </form>
                                                            </td>
                                                            <td class="xtd xtd_text">
                                                                <span></span>
                                                                <span class="xtd_task_name">Ningun resultado encontrado.</span>
                                                            </td>
                                                            <td class="xtd xtd_date">&nbsp;</td>
                                                            <td class="xtd xtd_ico"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- /listwrap -->
                            </div> <!-- /list -->

                            <div id="debug"></div>

                            <div class="appfooter" style="display: none">

                                <div id="appfooter-news-list" class="appfooter-news">
                                    <div class="appfooter-news-content">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="icons"><span class="new">NUEVO</span><span class="ico"><a href="/upgrade/" target="_blank"><img src="/img/ico/ico_pro.gif" alt="Pro"/></a></span></td>
                                                    <td>&iquest;RTM ha hecho que sea m&aacute;s organizado y productivo? <a target="_blank" href="/upgrade/">Actualice a una Pro</a> y apoye a RTM.</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="appfootercontent">
                                    <a href="/about/" target="_blank">Acerca de...</a> | <a href="http://blog.rememberthemilk.com/" target="_blank">Blog</a> | <a href="/services/" target="_blank">Servicios</a> | <a href="/forums/" target="_blank">Foros</a> | <a href="/help/" target="_blank">Ayuda</a>  | <a href="/help/terms.rtm" target="_blank">Condiciones de uso</a> | <a href="/help/privacy.rtm" target="_blank">Pol&iacute;tica de privacidad</a>
                                </div> <!-- /appfootercontent -->
                            </div> <!-- /appfooter -->

                        </div> <!-- /listbox -->
                        <div id="detailsbox" style="left: 0px; top: 0px; ">
                            <div id="details">
                                <div id="detailstabs" style="" class="xtabs xtabs_grey">
                                    <ul>
                                        <li class="xtab_selected"><a href=" ">Categor&iacute;a</a></li>
                                    </ul>
                                </div>
                                <div id="tasktabs" style="display: none; " class="xtabs xtabs_grey">
                                    <ul>
                                        <li class="xtab_selected"><a href=" ">Tarea</a></li>
                                        <li><a href=" ">Notas</a></li>
                                    </ul>
                                </div>
                                <div id="contactsdetailstabs" style="display: none;" class="xtabs xtabs_grey">
                                    <ul>
                                        <li class="xtab_selected"><a href=" ">Contacto</a></li>
                                    </ul>
                                </div>
                                <div id="settingsdetailstabs" style="display: none;" class="xtabs xtabs_grey">
                                    <ul>
                                        <li class="xtab_selected"><a href=" ">General</a></li>
                                    </ul>
                                </div>
                                <div id="detailswrap">
                                    <div style="margin:0; padding-top:1.4em; clear:both;"></div>
                                    <div id="detailsoverflow" style="overflow-x: visible; overflow-y: visible; height: auto; ">
                                        <div id="listtoolbox" style="float: right; padding-right: 14px; ">
                                            <div id="printlist"><img class="noteaddicon" style="padding-left: 1px; padding-right:1px;" src="/img/ico/ico_print.gif" alt="Imprimir"/><a id="printlista" href="/print/javierpelado/9542669/" target="_blank" class="noteadd" style="font-weight: bold; padding-left: 4px; font-size: 0.95em; vertical-align: bottom;">Imprimir</a></div>
                                            <div id="exportlist" style="visibility: visible; "><img class="noteaddicon" style="padding-left: 2px; padding-right: 2px" src="/img/ico/ico_export.gif" alt="iCalendar"/><a href="webcal://www.rememberthemilk.com/icalendar/javierpelado/9542669/?tok=eJwVwgkKQjEMBcATFdKmzWuOk2aBL4Ki4vnFYcTEDbE5nQXk9K-Bh1dAk7zb5l5jFo6nCnBsm20qqlBQu9n3ytcz7xaPdr-en6ZrDhFthCEaXp0jfdY*I0nVD3tfNSP7WAYVnsYo184ihVjYUxVW8gOhdSw2" id="icalendarlista" class="noteadd" style="font-weight: bold; padding-left: 4px; font-size: 0.95em; vertical-align: bottom;">iCalendar</a></div>
                                            <div id="exportlistevents" style="visibility: visible; "><img class="noteaddicon" style="padding-left: 2px; padding-right: 2px" src="/img/ico/ico_export.gif" alt="iCalendar (Eventos)"/><a href="webcal://www.rememberthemilk.com/icalendar/javierpelado/9542669/events/?tok=eJwVwgkKQjEMBcATFdKmzWuOk2aBL4Ki4vnFYcTEDbE5nQXk9K-Bh1dAk7zb5l5jFo6nCnBsm20qqlBQu9n3ytcz7xaPdr-en6ZrDhFthCEaXp0jfdY*I0nVD3tfNSP7WAYVnsYo184ihVjYUxVW8gOhdSw2" id="icalendareventslista" class="noteadd" style="font-weight: bold; padding-left: 4px; font-size: 0.95em; vertical-align: bottom;">iCalendar<span style="margin-left: 17px; text-decoration: underline; display: block;">(Eventos)</span></a></div>
                                            <div id="atomlist" style="visibility: visible; "><img class="noteaddicon" src="/img/ico/ico_feed_blu.gif" alt="Atom" style="padding-left: 2px;"/><a href="https://www.rememberthemilk.com/atom/javierpelado/9542669/?tok=eJwVwgkKQjEMBcATFdKmzWuOk2aBL4Ki4vnFYcTEDbE5nQXk9K-Bh1dAk7zb5l5jFo6nCnBsm20qqlBQu9n3ytcz7xaPdr-en6ZrDhFthCEaXp0jfdY*I0nVD3tfNSP7WAYVnsYo184ihVjYUxVW8gOhdSw2" target="_blank" id="atomlista" class="noteadd" style="font-weight: bold; padding-left: 5px; font-size: 0.95em; vertical-align: bottom;">Atom</a></div>
                                            <div style="visibility: hidden; " id="permalist"><img class="noteaddicon" src="/img/ico/ico_link.gif" alt="Enlace permanente"/><a href="/home/javierpelado/9542669/" target="_blank" id="permalista" class="noteadd" style="font-weight: bold; padding-left: 4px; font-size: 0.95em; vertical-align: bottom;">Enlace permanente</a></div>
                                        </div>
                                        <div id="notetoolbox" style="float: right; padding-right: 14px; display: none; ">
                                            <div id="printlist"><img class="noteaddicon" style="padding-left: 1px; padding-right:1px;" src="/img/ico/ico_print.gif" alt="Imprimir"/><a id="printnote" href=" " target="_blank" class="noteadd" style="font-weight: bold; padding-left: 4px; font-size: 0.95em; vertical-align: bottom;">Imprimir</a></div>
                                        </div>
                                        <div id="detailscontent" style="padding-top: 0.4em;">
                                            <div id="detailstitle" style="word-wrap: break-word;">
                                                <span id="detailstitle_highlight">
                                                    <span class="field" id="detailstitle_span">Alg&uacute;n D&iacute;a</span><br/><span class="fieldcount">(4 tareas)</span>
                                                </span>
                                            </div>
                                            <div id="notesbox" style="display: none; ">
                                                <div id="addnote" style="text-align: right; display: none; ">
                                                    <img class="noteaddicon" src="/img/ico/ico_add_sm.gif" alt="Añadir Nota"/>
                                                    <a href=" " onclick="noteMgr.createNewNote(); return false;" class="noteadd" style="font-weight: bold; padding-left: 4px; font-size: 0.95em; vertical-align: bottom;" title="Añadir nota (y)">Añadir Nota</a>
                                                </div>
                                                <div class="notexbox" style="clear: right;">
                                                    <div id="notes">
                                                    </div>
                                                </div>
                                                <div id="noteclear" style="clear: both;"></div>
                                                <div id="notedetails">
                                                </div> <!-- /notedetails -->
                                            </div> <!-- /notesbox -->
                                            <div id="listdetailswrap">
                                                <div id="listdetails">
                                                    <div id="listdetailsbox" style="">
                                                        <div id="listsearchfor" style="display: none; "><span id="listsearchforval"></span></div>
                                                        <div id="listduetoday">0 pendientes para hoy</div>
                                                        <div id="listduetomorrow">0 pendientes mañana</div>
                                                        <div id="listoverdue">1 atrasadas</div>
                                                        <div id="listestimatedtime">1 hora estimado</div>
                                                        <div id="listcompleted"><a href=" " title="Mostrar tareas completadas" onclick="taskList.switchView(TaskList.TASK_LIST_VIEW_COMPLETED); return false;">1 completadas</a></div>
                                                    </div>
                                                </div> <!-- /listdetails -->
                                                <div id="listsharedetails" style="display: none; ">
                                                    <div>
                                                        <form id="shareform" action=" " method="get">
                                                            <input id="shareprivate" name="sharestate" type="radio" value="private"/><label style="padding-left: 5px; vertical-align: top;" for="shareprivate" id="shareprivatelabel">No compartir la lista</label><br/>
                                                            <input id="sharecontact" name="sharestate" type="radio" value="contact"/><label style="padding-left: 5px; vertical-align: top;" for="sharecontact" id="sharecontactlabel">Compartir con tu(s) contacto(s)</label><br/>
                                                            <div id="sharecontacts" style="display: none; padding-left: 20px; padding-top: 5px; padding-bottom: 5px;"></div>
                                                            <input style="margin-top: 10px; font-size: 0.9em;" id="shareset" name="shareset" type="submit" value="Compartir"/>
                                                        </form>
                                                        <span id="share-error-message" class="hidden">Esta lista no se puede compartir.</span>
                                                    </div>
                                                </div> <!-- /listsharedetails -->
                                                <div id="listpublishdetails" style="display: none; ">
                                                    <div>
                                                        <form id="publishform" action=" " method="get">
                                                            <input id="publishprivate" name="publishedstate" type="radio" value="private"/><label style="padding-left: 5px; vertical-align: top;" for="publishprivate" id="publishprivatelabel">No publiques</label><br/>
                                                            <input id="publishcontact" name="publishedstate" type="radio" value="contact"/><label style="padding-left: 5px; vertical-align: top;" for="publishcontact" id="publishcontactlabel">Publica a tu(s) contacto(s)</label><br/>
                                                            <div id="publishcontacts" style="display: none; padding-left: 20px; padding-top: 5px; padding-bottom: 5px;"></div>
                                                            <input id="publishpublic" name="publishedstate" type="radio" value="public"/><label style="padding-left: 5px; vertical-align: top;" for="publishpublic" id="publishpubliclabel">Haz esta lista p&uacute;blica</label><br/>
                                                            <input style="margin-top: 10px; font-size: 0.9em;" id="publishset" name="publishset" type="submit" value="Publica"/>
                                                        </form>
                                                        <div id="publishurl" style="display: none; padding-top: 10px;"></div>
                                                    </div>
                                                </div> <!-- /listpublishdetails -->

                                                <div id="listsavedetails" style="display: none; ">
                                                    <div>
                                                        <form id="saveform" autocomplete="off" action=" " method="get" onsubmit="el('listsaveset').onclick(); return false;">
                                                            <label for="savelistname" id="savelistnamelabel">Guardar Lista Inteligente como:</label>
                                                            <input style="margin-top: 10px;" id="savelistname" name="savelistname" type="text" value=""/><br/>
                                                            <input style="margin-top: 10px; font-size: 0.9em;" id="listsaveset" name="listsaveset" type="submit" value="Guardar"/>
                                                        </form>
                                                    </div>
                                                </div>

                                                <div id="taskdetails" style="display: none; ">
                                                    <div id="detailslist" style="display: none; "><span id="detailslist_highlight">Lista: <span class="field" id="detailslist_span">none</span></span></div>
                                                    <div id="detailsadded" style="display: none; "><span id="detailsadded_highlight">Añadido: <span class="field" id="detailsadded_span"></span></span></div>
                                                    <div id="detailscompleted" style="display: none; "><span id="detailscompleted_highlight">Completado: <span class="field" id="detailscompleted_span">nunca</span></span></div>
                                                    <div id="detailsdue" style="display: none; "><span id="detailsdue_highlight" title="Establecer fecha de vencimiento (d)">Vence: <span class="field" id="detailsdue_span">s&aacute;b 20 nov 10</span><a href=" " title="Establecer fecha de vencimiento (d)"><img class="field_img" src="https://www.rememberthemilk.com/img/ico/ico_calendar.gif" alt="Establecer fecha de vencimiento (d)"/></a></span></div>
                                                    <div id="detailsreoccur" style="display: none; "><span id="detailsreoccur_highlight" title="Activar Repeticiones (f)">Repite: <span class="field" id="detailsreoccur_span">nunca</span><a href=" " title="Activar Repeticiones (f)"><img class="field_img" src="https://www.rememberthemilk.com/img/ico/ico_recur.gif" alt="Activar Repeticiones (f)"/></a></span></div>
                                                    <div id="detailsduration" style="display: none; "><span id="detailsduration_highlight" title="Establece estimaci&oacute;n de tiempo (g)">Tiempo estimado: <span class="field" id="detailsduration_span">ninguno</span><a href=" " title="Establece estimaci&oacute;n de tiempo (g)"><img class="field_img" src="https://www.rememberthemilk.com/img/ico/ico_clock.gif" alt="Establece estimaci&oacute;n de tiempo (g)"/></a></span></div>
                                                    <div id="detailstags" style="display: none; ">
                                                        <span id="detailstags_highlight" title="Establecer Etiquetas (s)">Etiquetas:
                                                            <span class="field" id="detailstags_span">
                                                                <a onclick="el('listFilter').value = 'tag:lectura'; control.updateListFilter(); return false;" title="Mostrar lista para etiqueta lectura" id="task.tags.lectura" href="#section.tasks">lectura</a>
                                                            </span>
                                                            <a href=" " title="Establecer Etiquetas (s)">
                                                                <img class="field_img" src="https://www.rememberthemilk.com/img/ico/ico_tag.gif" alt="Establecer Etiquetas (s)"/></a>
                                                        </span>
                                                    </div>
                                                    <div id="detailslocation" style="display: none; "><span id="detailslocation_highlight" title="Asignar Ubicaci&oacute;n (l)">Ubicaci&oacute;n: <span class="field" id="detailslocation_span">ninguna</span><a href=" " title="Asignar Ubicaci&oacute;n (l)"><img class="field_img" src="https://www.rememberthemilk.com/img/ico/ico_globe.gif" alt="Asignar Ubicaci&oacute;n (l)"/></a></span></div>
                                                    <div id="detailsurl" style="display: none; "><span id="detailsurl_highlight" title="Establecer URL (u)">URL: <span class="field" id="detailsurl_span">ninguno</span><a href=" " title="Establecer URL (u)"><img class="field_img" src="https://www.rememberthemilk.com/img/ico/ico_link_gry.gif" alt="Establecer URL (u)"/></a></span></div>
                                                    <div id="detailspostponed" style="display: none; "><span id="detailspostponed_highlight">Pospuesta: <span class="field" id="detailspostponed_span">0 veces</span></span></div>
                                                    <div id="detailsshared" style="display: none; "><span id="detailsshared_highlight">Compartida con: <span class="field" id="detailsshared_span">nadie</span></span></div>
                                                    <div id="detailsnotes" style="display: none; "><span id="detailsnotes_highlight">Notas: <span class="field" id="detailsnotes_span">0</span></span></div>
                                                </div> <!-- /taskdetails -->
                                                <div id="contactdetails" style="display: none; ">
                                                    <div id="contactusername" style="display: none; "><span id="contactusername_highlight">Nombre de usuario: <span class="field" id="contactusername_span"></span></span></div>
                                                    <!-- div id="contactemail" style="display: none;"></div -->
                                                    <!-- div id="contactbday" style="display: none;"></div -->
                                                    <!-- div id="contactcountry" style="display: none;"></div -->
                                                    <div id="contactgroups" style="display: none; "><span id="contactgroups_highlight">En grupos: <span class="field" id="contactgroups_span">ninguno</span></span></div>
                                                    <br/>
                                                    <div id="contactsearch"></div>
                                                </div> <!-- /contactdetails -->
                                                <div id="groupdetails" style="display: none;">
                                                    <div id="groupmembers" style="display: none;"><span id="groupmembers_highlight">Miembros: <span class="field" id="groupmembers_span">ninguno</span></span></div>
                                                </div> <!-- /groupdetails -->
                                                <div id="settingslistdetails" style="display: none; margin-top: -13px;">
                                                    <div id="settings-lists-details-count"><span id="settings-lists-details-count_highlight"><span class="field" id="settings-lists-details-count_span"></span></span></div>
                                                    <br/>
                                                    <div id="settingslistincomplete"><span id="settingslistincomplete_highlight"><span class="field" id="settingslistincomplete_span">0 incompletas</span></span></div>
                                                    <div id="settingslistcompleted"><span id="settingslistcompleted_highlight"><span class="field" id="settingslistcompleted_span">0 completadas</span></span></div>
                                                    <br id="settingslistbreak"/>
                                                    <div id="settingslistdescription"><span id="settingslistdescription_highlight"><span class="field" id="settingslistdescription_span"></span></span></div>
                                                    <div id="settingslistfilter" style="display: none;"><span id="settingslistfilter_highlight" title="Editar">Se muestran las tareas que cumplen: <br/><span class="field" id="settingslistfilter_span"></span><a href=" " title="Editar"><img class="field_img" src="https://www.rememberthemilk.com/img/ico/ico_edit.gif" alt="Editar"/></a></span></div>
                                                    <div id="settingslistpending" style="display: none;"><span id="settingslistpending_highlight"><span class="field" id="settingslistpending_span"></span></span></div>
                                                </div> <!-- /settingslistdetails -->
                                                <div id="settings-tags-details" style="margin-top: -13px; display: none; ">
                                                    <div id="settings-tags-details-count" style="display: none; "><span id="settings-tags-details-count_highlight"><span class="field" id="settings-tags-details-count_span"></span></span></div>
                                                    <br/>
                                                    <div id="settings-tags-details-incomplete-count" style="display: none; "><span id="settings-tags-details-incomplete-count_highlight"><span class="field" id="settings-tags-details-incomplete-count_span">0 incompletas</span></span></div>
                                                    <div id="settings-tags-details-complete-count" style="display: none; "><span id="settings-tags-details-complete-count_highlight"><span class="field" id="settings-tags-details-complete-count_span">0 completadas</span></span></div>
                                                </div> <!-- /settings-tags-details -->
                                                <div id="settingslocationdetails" style="display: none; margin-top: -13px;">
                                                    <div id="settings-locations-details-count"><span id="settings-locations-details-count_highlight"><span class="field" id="settings-locations-details-count_span"></span></span></div>
                                                    <br/>
                                                    <div id="settings-locations-details-incomplete-count"><span id="settings-locations-details-incomplete-count_highlight"><span class="field" id="settings-locations-details-incomplete-count_span">0 incompletas</span></span></div>
                                                    <div id="settings-locations-details-complete-count"><span id="settings-locations-details-complete-count_highlight"><span class="field" id="settings-locations-details-complete-count_span">0 completadas</span></span></div>
                                                    <br/>
                                                    <div id="settingslocationdescription"><span id="settingslocationdescription_highlight"><span class="field" id="settingslocationdescription_span"></span></span></div>
                                                </div> <!-- /settingslocationdetails -->
                                            </div> <!-- /detailsbox -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="taskcloud_copy" class="taskcloud" style="padding-top: 1,3em; display: none; ">
                                <div class="taskcloudbox white_rbroundbox">
                                    <div class="white_rbtop"><div><div></div></div></div>
                                    <div class="white_rbcontentwrap"><div class="white_rbcontent">
                                            <div id="taskcloudcontent_copy" class="taskcloudcontent"><span class="listtag level5"><a href=" " onclick="taskCloud.showList('9542669'); return false;" title="4 tareas">alg&uacute;n d&iacute;a</a></span>
                                                <span class="listtag level9"><a href=" " onclick="taskCloud.showList('2065546'); return false;" title="4 tareas">buz&oacute;n de entrada</a></span>
                                                <span class="listtag level1"><a href=" " onclick="taskCloud.showList('9542667'); return false;" title="0 tareas">en espera</a></span>
                                                <span class="listtag level1"><a href=" " onclick="taskCloud.showList('2065550'); return false;" title="0 tareas">enviadas</a></span>
                                                <span class="listtag level3"><a href=" " onclick="taskCloud.showList('12602033'); return false;" title="1 tarea">estudios</a></span>
                                                <span class="tasktag level9"><a href=" " onclick="taskCloud.showTag('frikeando'); return false;" title="2 tareas">frikeando</a></span>
                                                <span class="tasktag level9"><a href=" " onclick="taskCloud.showTag('lectura'); return false;" title="2 tareas">lectura</a></span>
                                                <span class="listtag level7"><a href=" " onclick="taskCloud.showList('9542682'); return false;" title="4 tareas">personal</a></span>
                                                <span class="tasktag level5"><a href=" " onclick="taskCloud.showTag('propuestas'); return false;" title="1 tarea">propuestas</a></span>
                                                <span class="listtag level1"><a href=" " onclick="taskCloud.showList('9542668'); return false;" title="0 tareas">pr&oacute;ximo</a></span>
                                                <span class="tasktag level5"><a href=" " onclick="taskCloud.showTag('tel&eacute;fono'); return false;" title="1 tarea">tel&eacute;fono</a></span>
                                                <span class="tasktag level5"><a href=" " onclick="taskCloud.showTag('tfc'); return false;" title="1 tarea">tfc</a></span>
                                                <span class="tasktag level5"><a href=" " onclick="taskCloud.showTag('trabajo'); return false;" title="1 tarea">trabajo</a></span>
                                                <span class="listtag level3"><a href=" " onclick="taskCloud.showList('9542689'); return false;" title="1 tarea">trabajo</a></span>
                                                <span class="tasktag level5"><a href=" " onclick="taskCloud.showTag('tramites'); return false;" title="1 tarea">tramites</a></span></div> <!-- /taskcloudcontent -->
                                        </div><!-- /white_rbcontent -->
                                    </div><!-- /white_rbcontentwrap -->
                                    <div class="white_rbbot"><div><div></div></div></div>
                                </div><!-- /white_rbroundbox -->
                            </div> <!-- /taskcloud -->

                            <div id="onlinehelpwrap" style="margin-top: 13px; padding-top: 11px; display: none; ">
                                <div style="margin:0; clear:both;"></div>
                                <div id="onlinehelpcontent">
                                    <img alt="Help" src="/img/ico/ico_help_blu.gif" style="vertical-align: bottom;"/><span id="onlinehelptext" style="padding-left: 7px;"></span>
                                </div>
                            </div>

                            <div id="detailsstatuswrap" style="margin-top: 13px; padding-top: 11px; display: none; ">
                                <div style="margin:0; clear:both;"></div>
                                <div id="detailsstatuscontent">
                                    <img alt="Information" src="/img/ico/ico_info_blu.gif" style="vertical-align: bottom;"/><span id="detailsstatustext" style="padding-left: 7px;"></span>
                                </div>
                            </div>

                            <div id="keywrap" style="margin-top: 13px; padding-top: 11px; ">
                                <div style="margin:0; clear:both;"></div>
                                <div id="keycontent">
                                    <div>
                                        <img alt="Cierra la llave" title="Cierra la llave" id="keyclose" src="/img/ico/ico_cross_gry.gif" style="float: right;"/>
                                        <img alt="Clave" src="/img/ico/ico_key.gif" style="vertical-align: bottom;"/><span id="keytitle" style="padding-left: 7px; padding-top: 4px; vertical-align: bottom;">Clave</span>
                                    </div>
                                    <div id="keyinfo">
                                    <div style="padding-top: 1em;">
                                        Prioridades:<div style="padding-top: 0.6em;"><span class="keyprio prio1">1</span> <span class="keyprio prio2">2</span> <span class="keyprio prio3">3</span> <span class="keyprio prioN" style="color: #000000;">Ninguna</span></div>
                                    </div>
                                    <div style="padding-top: 0.5em;">
                                        Finaliza hoy: <b>negrita</b>
                                    </div>
                                    <div style="padding-top: 0.1em;">
                                        Atrasadas: <b><u>subrayado</u></b>
                                    </div>
                                    <div style="padding-top: 0.9em;">
                                        <a id="key-learn-keyboard" href="/help/answers/basics/keyboard.rtm" target="_blank">Aprender los atajos del teclado</a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </body>
<?php } ?>
            </html>
