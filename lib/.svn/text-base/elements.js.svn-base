/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var V_CONTENT = null;
var V_TRAINER = null;
var V_STATUSBOX = null;
var V_Table = null;
var V_elements = {}; 
var G_polarityTable = null;
var G_polarityData = [];

var blueTitle = function blueTitle(title) {
    this.html = $('<div id="pageheader"></div> <!-- /pageheader -->');
    this.html.append('<div class="content"><h1>' + title + '</h1></div>');

    $('#main').append(this.html);
}

var trainer = function trainer() {
    V_CONTENT = $("#content");
    V_TRAINER = this;
    this.lastSelected = null;
    this.selected = null;
    this.contexts = [];

    this.addContext = function(cont) {
        this.contexts.push(cont);
    }

    this.addContext(new generalContext());
    this.addContext(new sessionContext());

    this.contexts[0].reset();
    this.lastSelected = this.selected = this.contexts[0];

    this.goBack = function() {
        this.selected = this.contexts[0];
        this.contexts[0].reset();
    }

    this.session = function(id) {
        this.selected = this.contexts[1];
        this.contexts[1].reset(id);
    }
}


var searchBox = function searchBox() {
    var sb = this;
    this.element = $('<div id="searchbox">\
                            <form onsubmit="" action="">\
                                <div id="searchboxwrap">\
                                    <table>\
                                        <tbody>\
                                            <tr>\
                                                <td style="width: 1px;">\
                                                    <div id="searchicon">\
                                                    </div>\
                                                </td>\
                                                <td>\
                                                    <input onfocus="this.select();" type="text" id="listFilter"/>\
                                                </td>\
                                            </tr>\
                                        </tbody>\
                                    </table>\
                                </div>\
                            </form>\
                        </div>\
                        <div id="searchoptions" style="display:none">\
                            <div id="searchoptionswrap">\
                                <form id="searchoptionsform" method="post" action="">\
                                    <table>\
                                        <tbody>\
                                            <tr>\
                                                <td class="formfield"><label for="search_mode">Modo de b\u00FAsqueda</label></td>\
                                        	<td class="formfield"><label for="search_lists">Buscar en</label></td>\
                                                <td class="formfield"><label for="num_search_results">N\u00FAmero de resultados</label></td>\
                                            </tr>\
                                            <tr>\
                                                <td class="formfield"><select id="search_mode" name="search_mode" class="textfield"><option value="0">Añadir</option><option value="1" selected>Nueva</option></select></td>\
                                                <td class="formfield"><select id="search_lists" name="search_lists" class="textfield"><option value="-1">Todas las listas</option><option value="-1" disabled="">---</option><option value="twitter" selected>Twitter</option><option value="fotolog">Fotolog</option></select></td>\
                                                <td class="formfield"><select id="num_search_results" name="num_search_results" class="textfield"><option value="10">10</option><option value="20">20</option><option value="30">30</option><option value="40">40</option><option value="50">50</option><option value="100">100</option></select></td>\
                                          </tr>\
                                          <tr>\
                                                <td colspan="4" style="padding-top: 6px; text-align: center;"><input id="search_begin" type="submit" value="Buscar" style="margin-left: -10px; margin-right: 4px;"><input id="search_cancel" type="submit" value="Cancelar"></td>\
                                          </tr>\
                                    </tbody>\
                                </table>\
                            </form>\
                        </div> <!-- /searchoptionswrap -->\
                    </div>\
                    <div id="searchtogglewrap" style="float:right"><a id="searchtoggle" href="#">Mostrar opciones de b\u00FAsqueda</a></div>');
    this.searchoptions = $('#searchoptions',this.element);
    $('#listFilter',sb.element).focus(function() {
        $('#searchtoggle',this.element).text('Ocultar opciones de b\u00FAsqueda');
        $(sb.element[2]).slideDown('slow');
    });
    this.searchoptions.toggle('slow');
    $('#searchtoggle',this.element).click(function() {
        $(sb.element[2]).slideToggle('slow');
        $(this).text($(this).text() == 'Ocultar opciones de b\u00FAsqueda' ? 'Mostrar opciones de b\u00FAsqueda' : 'Ocultar opciones de b\u00FAsqueda');
    });
    $("form",this.element).submit(function() {
        var query = $('#listFilter',sb.element).val();
        var target = $('#search_lists',sb.element).val();
        var numElems = $('#num_search_results',sb.element).val();
        var mode = $('#search_mode',sb.element).val();
        var url = target + '_search.php?q=' + query + '&n=' + numElems;
        V_elements['search'].getData(url,mode);
        $('#searchtoggle',sb.element).click();
        $('#listFilter',sb.element).blur();
        return false;
    });
}


var generalContext = function generalContext() {
    this.reset = function() {
        $(".appview").remove();
        V_STATUSBOX = this.statusbox = new statusBox();
        $("#searchbox").remove();
        //$("#title").toggle();
        this.viewselector = new viewSelector();
        this.viewselector.addView("Sesiones",new appViewSes(this.statusbox),true);
        this.viewselector.addView("Categor\u00EDas",new appViewCat(this.statusbox));
        this.viewselector.addView("Preferencias",new appViewSettings(this.statusbox));
        this.viewselector.addExit();
        this.viewselector.showDeafault();
    }
}

var sessionContext = function sessionContext() {

    this.reset = function(id) {
        $(".appview").remove();
        this.id = id;
        this.statusbox = V_STATUSBOX;
//        this.searchbox = new searchBox();
        this.viewselector = new viewSelector();
        this.viewselector.addView("Entrenamiento",new appViewTrain(this.statusbox),true);
        this.viewselector.addView("Preferencias",new appViewSettings(this.statusbox));
        //this.viewselector.addText(id);
        this.viewselector.addBack();
        this.viewselector.addExit();
        $("#titlespan").text(id);
        //$("#title").toggle();
        this.viewselector.showDeafault();
    }
}


var viewSelector = function viewSelector() {
    this.element = $("#viewSelector");
//    $("#appview").remove();
    this.element.empty();
    this.views = {};
    this.selectedView = null;
    var vs = this;
    this.defaultView = null;

    this.addView = function(name,appview,defaultView) {
        var view = $('<a href="">' + name + '</a>');
        this.views[name] = appview;
        this.element.append(" | ");
        this.element.append(view);
        vs.views[name].initialize();
        view.click(function() {
            if(name != vs.selectedView) {
                $('a',vs.element).css({
                    'text-decoration':'underline',
                    'color':'#0060BF',
                    'cursor':'pointer'
                });
//                if(vs.selectedView != null) vs.views[vs.selectedView].element.hide();
                vs.selectedView = name;
//                vs.views[name].initialize();
                $(".appview").hide();
                vs.views[name].element.show();
                view.css({
                    'text-decoration':'none',
                    'color':'black',
                    'cursor':'default'
                });
            };
            return false;
        });
        if(defaultView) vs.defaultView = view;
        else if(vs.defaultView == null) vs.defaultView = view;
    }

    this.showDeafault = function() {
        this.defaultView.click();
    }

    this.addText = function(text) {
        this.element.append(" | ");
        this.element.append('<span style="color:red;font-weight:bold;margin:10px">' + text + '</span>|');
    }

    this.addExit = function() {
        this.element.append(' | ');
        this.element.append('<a href="../?logoff">Cerrar Sesi\u00F3n</a>');
    }

    this.addBack = function() {
        this.element.append(' | ');
        var link = $('<a href="">Atr\u00E1s</a>');
        this.element.append(link);
        link.click(function() {
            V_TRAINER.goBack();
            return false;
        });
    }
}

var topBar = function topBar(div) {
    this.html = $('<div id="topbar"><div class="content"><span class="login">&iquest;Ya eres miembro? <a class="login-link" href="/login/">Entra</a>.      </span><table class="tbl-container"><tbody><tr><td><span class="welcome"><b>&iexcl;Bienvenido!</b></span>&nbsp;</td></tr></tbody></table></div></div> <!-- /topbar -->');

    div.append(this.html);
}

var statusBox = function statusBox() {
    this.element = $('<div id="statusbox" style="padding-left: 207px; height: 4,1em; display: none; "><div class="orange_rbroundbox"><div class="orange_rbtop"><div></div></div><div class="orange_rbcontent"><table style="margin:0; padding:0; width: 100%;"><tbody><tr><td style="padding-left: 6px; width: 10px;"><img style="vertical-align: bottom; text-align: right;" src="/img/ico/ico_info_org_org.gif" alt="Information"/></td><td style="padding-left: 6px; text-align: left;"><span id="statusboxtext" style="text-align: left; font-weight: bold;"><span>Cargando...</span></span></td><td style="padding-left: 6px; display: none; " id="statusboxbuttons"><span id="statusbutton_done"></span><span id="statusbutton_cancel"></span></td></tr></tbody></table></div><!-- /orange_rbcontent --><div class="orange_rbbot"><div></div></div></div><!-- /orange_rbroundbox --></div>');
    this.text = $("#statusboxtext",this.element);

    V_CONTENT.append(this.element);
    V_CONTENT.append('<div id="break"></div>');

    this.showMessage = function(text) {
        this.text.empty();
        this.text.append('<span>' + text + '</span>');
        this.element.fadeIn();
        setTimeout("$('#statusbox').fadeOut(1000)", 2000);
    }
}

var appViewSes = function appViewSes(statusbox) {
    var appview = this;
    this.info = "\u00BFQuieres crear, editar o borrar entrenamientos? Lo puedes hacer todo aqu\u00ED. Tambien puedes acceder a cualquier entrenamiento desde aqu\u00ED."

    this.initialize = function() {
//        $('#break').remove();
//        $("#appview").remove();
        this.element = $('<div id="appviewSes" class="appview" style="display:none"></div>');
//        V_CONTENT.append('<div id="break"></div>');
        V_CONTENT.append(this.element);
        this.selectedCategory = null;
        this.sessions = [];
        this.selectedSessions = [];
        this.categories = [];
        this.tabNames = {};
        this.selectedCategory = null;
        this.defaultTab = null;
        this.listbox = new listBox(this);
        this.listbox.addTools('0');
        this.listbox.elementsList();
        this.detailsbox = new detailsBox(appview);
        this.detailsbox.animate();
        this.emptySessions = new session(null,"0","Ning\u00FAn resultado encontrado",null,appview);
        this.getCategories();
        this.getSessions();
        this.addCategory('-', "Todo");
        this.defaultTab = this.selectedCategory;
        this.addCategory('0', "Sin Categor\u00EDa");

        this.detailsbox.category(this.selectedCategory.name,this.sessions.length);
    }
    
    this.getCategories = function () {
        $.getJSON('getSessions.php',{
            mode:"categories"
        },function(json,textStatus) {
            s = json;
            s.forEach(function(item){
                appview.addCategory(item['id'],item['name']);
            });
//            appview.listbox.addCC();
            appview.detailsbox.addInfo();
            appview.colors = (appview.categories.length - 2);
        });
    }

    this.getSessions = function () {
        $.getJSON('getSessions.php',{
            mode:"sessions"
        },function(json) {
            s = json;
            s.forEach(function(item){
                appview.sessions.push(new session(item['id'],item['id_category'],item['title'],getDateFormated(0,item['date']),appview));
            });
            appview.defaultTab.select();
        });
    }

    this.addCategory = function(id,name) {
        this.categories.push(new category(id,name,this));
        if(id == '0')  this.tabNames[id] = "";
        else this.tabNames[id] = name;
        this.selectedCategory = this.categories[this.categories.length - 1]
    }

    this.showCategory = function(category){
        var numSessions = 0;
        for(i in this.sessions) {
            if ((category.id == '-') || (this.sessions[i].category == category.id)) {
                this.sessions[i].show();
                numSessions++;
            }
            else this.sessions[i].hide();
        }
        if(numSessions == 0) this.emptySessions.show();
        else this.emptySessions.hide();
        this.selectedCategory = category;
        this.unselectAll();
        this.refreshDetails();
    }


    this.hover = function(s) {
        this.detailsbox.session(s);
    }

    this.refreshDetails = function() {
        if(this.selectedSessions.length > 1) this.detailsbox.sessions(this.selectedSessions.length);
        else if(this.selectedSessions.length == 1) this.detailsbox.session(this.selectedSessions[0]);
        else this.detailsbox.category(this.selectedCategory.name,this.sessions.length);
    }

    this.selectSession = function(s) {
        this.selectedSessions.push(s);
        this.refreshDetails();
    }

    this.unselectSession = function(s) {
        var stop = false;
        var i = 0;
        while(!stop && (i<this.selectedSessions.length)){
            if (this.selectedSessions[i] == s) {
                this.selectedSessions.splice(i,1);
                stop = true;
            }
            else i++;
        }
        this.refreshDetails();
    }

    this.selectAll = function() {
        for(i in this.sessions) {
            if((this.selectedCategory.id == "-") || (this.selectedCategory.id == this.sessions[i].category))
                this.sessions[i].select();
        }
    }

    this.unselectAll = function() {
        while(this.selectedSessions.length > 0) {
            this.selectedSessions[0].element.click();
        }
    }

    this.addSession = function(title) {
        var cat = this.selectedCategory.id;
        if (cat == "-") cat = "0";
        $.getJSON('modify.php',{
            mode:"insertS",
            cat:cat,
            title:title
        },function(json,textStatus) {
            if(textStatus == "success"){
                var s = new session(json,cat,title,getDateFormated(1),appview);
                appview.sessions.push(s);
                s.show();
                appview.emptySessions.hide();
                appview.refreshDetails();
                statusbox.showMessage('A\u00F1adida sesi\u00F3n con t\u00EDtulo "' + title + '" a la categor\u00EDa "' + appview.tabNames[cat] + '"');
            }
            else statusbox.showMessage('No ha sido posible realizar la operaci\u\u00F3n, int\u00E9ntelo otra vez por favor');
        });
    };

    this.deleteElements = function() {
        if (this.selectedSessions.length == 0) statusbox.showMessage("Tienes que seleccionar al menos una sesi\u00F3n para realizar esta operaci\u00F3n");
        while(this.selectedSessions.length > 0) {
            var aux = this.selectedSessions.pop();
            aux.hide();
            $.getJSON('modify.php',{
                mode:"deleteS",
                id:aux.id
            },function(textStatus) {
                if(textStatus != "success") statusbox.showMessage('No ha sido posible realizar la operaci\u00F3n, int\u00E9ntelo otra vez por favor');
            });

            for(i in this.sessions)
                if (this.sessions[i] == aux)
                    this.sessions.splice(i,1);
        }
        this.selectedCategory.select();
    };

    this.changeCategory = function(category) {
        if(this.selectedSessions != 0) {
            for(i in this.selectedSessions) {
                var aux = this.selectedSessions[i];
                $.getJSON('modify.php',{
                    mode:"updateS",
                    id:aux.id,
                    cat:category,
                    title:aux.title
                },function(textStatus) {
                    if(textStatus == "success") console.log(aux.id);
                });
                appview.selectedSessions[i].changeCategory(category);
            }
        }
        else statusbox.showMessage("Tienes que seleccionar al menos una sesi\u00F3n para realizar esta operaci\u00F3n");
        appview.selectedCategory.select();
    }

    this.openElement = function() {
        if (this.selectedSessions.length != 1) statusbox.showMessage("Tienes que seleccionar una, y s\u00F3lo una sesi\u00F3n para realizar esta operaci\u00F3n");
        else {
            V_TRAINER.session(this.selectedSessions[0].id);
        }
    }
}

var appViewCat = function appViewCat(statusbox) {
    var appview = this;
    this.info = "\u00BFQuieres crear, editar o borrar Categorías para clasificar entrenamientos? Lo puedes hacer todo aqu\u00ED."

    this.initialize = function() {
//        $('#break').remove();
//        $("#appview").remove();
        this.element = $('<div id="appviewCat" class="appview" style="display:none"></div>');
//        V_CONTENT.append('<div id="break"></div>');
        V_CONTENT.append(this.element);
        this.sessions = [];
        this.selectedSessions = [];
        this.tabNames = {};
        this.defaultTab = null;
        this.listbox = new listBox(this);
        this.listbox.addTools('1');
        this.listbox.elementsList();
        this.detailsbox = new detailsBox(this);
        this.detailsbox.animate();
        this.emptySessions = new session(null,"0","Ning\u00FAn resultado encontrado",null,appview);
        this.getSessions();
        this.addCategory('-', "Categor\u00EDas");

        this.detailsbox.category(this.defaultTab.name,this.sessions.length);
    }

    this.getSessions = function () {
        $.getJSON('getSessions.php',{
            mode:"categories"
        },function(json) {
            s = json;
            appview.colors = s.length;
            s.forEach(function(item){
                appview.sessions.push(new session(item['id'],item['id'],item['name'],"",appview));
            });
            appview.defaultTab.select();
        });
    }

    this.addCategory = function(id,name) {
        this.defaultTab = new category(id,name,this);
        this.tabNames['0'] = "";
    }

    this.showCategory = function(category){
        var numSessions = 0;
        for(i in this.sessions) {
            if ((category.id == '-') || (this.sessions[i].category == category.id)) {
                this.sessions[i].show();
                numSessions++;
            }
            else this.sessions[i].hide();
        }
        if(numSessions == 0) this.emptySessions.show();
        else this.emptySessions.hide();
        this.selectedCategory = category;
        this.unselectAll();
        this.refreshDetails();
    }

    this.hover = function(s) {
        this.detailsbox.session(s);
    }

    this.refreshDetails = function() {
        if(this.selectedSessions.length > 1) this.detailsbox.sessions(this.selectedSessions.length);
        else if(this.selectedSessions.length == 1) this.detailsbox.session(this.selectedSessions[0]);
        else this.detailsbox.category(this.selectedCategory.name,this.sessions.length);
    }

    this.selectSession = function(s) {
        this.selectedSessions.push(s);
        this.refreshDetails();
    }

    this.unselectSession = function(s) {
        var stop = false;
        var i = 0;
        while(!stop && (i<this.selectedSessions.length)){
            if (this.selectedSessions[i] == s) {
                this.selectedSessions.splice(i,1);
                stop = true;
            }
            else i++;
        }
        this.refreshDetails();
    }

    this.selectAll = function() {
        for(i in this.sessions) {
            if((this.selectedCategory.id == "-") || (this.selectedCategory.id == this.sessions[i].category))
                this.sessions[i].select();
        }
    }

    this.unselectAll = function() {
        while(this.selectedSessions.length > 0) {
            this.selectedSessions[0].element.click();
        }
    }

    this.addSession = function(title) {
        $.getJSON('modify.php',{
            mode:"insertC",
            title:title
        },function(json,textStatus) {
            if(textStatus == "success"){
                var s = new session(json,'0',title,"",appview);
                appview.sessions.push(s);
                s.show();
                appview.emptySessions.hide();
                appview.refreshDetails();
                statusbox.showMessage('A\u00F1adida sesi\u00F3n con t\u00EDtulo "' + title + '"');
            }
            else statusbox.showMessage('No ha sido posible realizar la operaci\u00F3n, int\u00E9ntelo otra vez por favor');
        });
    };

    this.deleteElements = function() {
        if (this.selectedSessions.length == 0) statusbox.showMessage("Tienes que seleccionar al menos una sesi\u00F3n para realizar esta operaci\u00F3n");
        while(this.selectedSessions.length > 0) {
            var aux = this.selectedSessions.pop();
            aux.hide();
            $.getJSON('modify.php',{
                mode:"deleteC",
                id:aux.id
            },function(textStatus) {
                if(textStatus != "success") statusbox.showMessage('No ha sido posible realizar la operaci\u00F3n, int\u00E9ntelo otra vez por favor');
            });

            for(i in this.sessions)
                if (this.sessions[i] == aux)
                    this.sessions.splice(i,1);
        }
        this.selectedCategory.select();
    };

    this.changeCategory = function(category) {
        if(this.selectedSessions != 0) {
            for(i in this.selectedSessions) {
                var aux = this.selectedSessions[i];
                $.getJSON('modify.php',{
                    mode:"update",
                    id:aux.id,
                    cat:category,
                    title:aux.title
                },function(textStatus) {
                    if(textStatus == "success") console.log(aux.id);
                });
                appview.selectedSessions[i].changeCategory(category);
            }
        }
        else statusbox.showMessage("Tienes que seleccionar al menos una sesi\u00F3n para realizar esta operaci\u00F3n");
        appview.selectedCategory.select();
    }
}

var appViewSettings = function appViewSettings(statusbox) {

    this.statusbox = statusbox;
    var appview = this;
    this.info = "\u00BFQuieres cambiar tu nombre o apellido? \u00BFDirecci\u00F3n de correo electr\u00F3nico? \u00BFContrase\u00F1a? \u00BFZona de hora? Lo puedes hacer todo aqu\u00ED."

    this.initialize = function() {
//        $('#break').remove();
//        $("#appview").remove();
        this.element = $('<div id="appviewSettings" class="appview" style="display:none"></div>');
//        V_CONTENT.append('<div id="break"></div>');
        V_CONTENT.append(this.element);
        this.defaultTab = null;
        this.listbox = new listBox(this);
        this.listbox.settings();
        this.detailsbox = new detailsBox(this);
        this.detailsbox.animate();
        this.addCategory('-', "General");

        this.detailsbox.general("Preferencias Generales");
    }

    this.addCategory = function(id,name) {
        this.defaultTab = new category(id,name,this);
    }
}


var appViewTrain = function appViewTrain(statusbox) {

    this.statusbox = statusbox;
    this.tabs = [];
    this.tab_list = {};
    this.defaultTab = null;
    this.selectedTab = null;
    this.workContainer = {};
    this.workElements = [];
    var appview = this;

    this.initialize = function() {
        this.element = $('<div id="appviewTrain" class="appview" style="display:none"></div>');
        V_CONTENT.append(this.element);
        this.defaultTab = null;
        this.listbox = new listBox(this,'trainer');
//        this.tabs.push(new trainTab('B\u00FAsqueda',this));
//        this.tabs.push(new trainTab('Entrenamiento',this));
        this.listbox.addWrap('B\u00FAsqueda','search');
        this.listbox.addWrap('Entrenamiento','polarity');
        $(".listwrap",this.element).hide();
        this.defaultTab = this.tabs[0];
        this.workContainer['aaData'] = this.workElements;
        console.log(V_TRAINER.contexts[1].id);
//        this.defaultTab.select();
    }

    this.deleteElements = function() {
        var selectedElements = V_Table.fnGetSelected('xtr_select');
        for ( var i=0 ; i<selectedElements.length ; i++ )
        {
            V_Table.fnDeleteRow(selectedElements[i],false,false);
            $(selectedElements[i]).remove();
        }
    }

    this.selectAll = function() {
        $(".xtr",$(".listwrap:visible")).addClass("xtr_select");
        $(".xtd_check img",$(".listwrap:visible")).show();
    }

    this.unselectAll = function() {
        $(".xtr",$(".listwrap:visible")).removeClass("xtr_select");
        $(".xtd_check img",$(".listwrap:visible")).hide();
    }

    this.add2work = function() {
        var selectedData = [];
        $('.xtr_select >.xtd_opinion', V_Table).each(function() {
                selectedData.push($(this).text());
        });
        console.log(selectedData);
        //console.log(G_polarityTable.fnGetNodes());
//        var selectedData = V_Table.fnGetData();
//        var selectedElements = V_Table.fnGetSelected('xtr_select');
        for ( var i=0 ; i<selectedData.length ; i++ )
        {
            $.getJSON('opinions.php',{
                mode:"insert",
                text:selectedData[i],
                id_session:V_TRAINER.contexts[1].id,
                i:i
            },function(textStatus,i) {
                console.log("texto --> " + textStatus);
                console.log(textStatus == true);
                console.log("i:" + i + " = sd-1:" + (selectedData.length - 1));
                if(textStatus) {
                //    G_polarityData.push(["","",selectedData[i][2]]);
                //    console.log(selectedData[i][2]);
                }
                if(textStatus == (selectedData.length - 1)) {
                    G_polarityTable.fnReloadAjax();
                    $(".dataTables_processing").hide();
                    appview.deleteElements();
                }
            });
            //            this.workElements.push(["","",selectedData[i][2]]);

            console.log(this.workContainer);
            console.log(G_polarityData);
        }
//        G_polarityTable.fnClearTable();
    //console.log(JSON.stringify(this.workContainer));
        
    }
    
    this.showTab = function(tab) {
        if(tab != this.selectedTab) {
            if(tab == this.tabs[0]) {                
                this.listbox.addTools('1');
                this.listbox.searchList();
            }
            if(tab == this.tabs[1]) {
                this.listbox.addTools('1');
                this.listbox.searchList();
//                this.listbox.addTools('2');
//                this.listbox.polarityList();
            }
            this.selectedTab = tab;
        }
    }
    
    this.changePolarity = function(polarity) {
//        var selectedData = [];
        $('.xtr_select >.xtd_polarity', G_polarityTable).each(function() {
//                selectedData.push($(this).text());
            console.log(this);
            $("option",this).each(function() {
                if($(this).text() == polarity) $(this).attr('selected', 'selected').trigger('change');
            });
        });
        
    }


}


var listBox = function listBox(appview,type) {
    this.element = $('<div id="listbox"></div>');
    appview.element.append(this.element);
    this.list = new list(appview,type);
    this.appfooter = new appfooter();

    this.element.append(this.list.element);
    this.element.append(this.appfooter.element);

    this.addTab = function(name,category) {
        return this.list.addTab(name, category);
    }

    this.loading = function(mode) {
        this.list.loading(mode);
    }

    this.addTools = function(type) {
        this.list.addTools(type);
    }

    this.elementsList = function() {
        this.list.elementsList();
    }

    this.searchList = function() {
        this.list.searchList();
    }

    this.settings = function() {
        this.list.settings();
    }
    
    this.addWrap = function(name,type) {
        this.list.addWrap(name,type);
    }
}

var list = function list(appview,type) {
    this.element = $('<div id="list"></div>');
    this.listtabs = new listTabs();
    this.listwrap = new listWrap(appview,type);
    this.listwraps = {};

    this.element.append(this.listtabs.element);
    if(type == 'trainer') {
//        this.searchbox = new searchBox();
        this.element.css('width', '980px');
        //this.listtabs.addTab("B\u00FAsqueda");
//        this.listtabs.addDummyTab("B\u00FAsqueda");
    }
    this.element.append(this.listwrap.element);

    this.addWrap = function(name,type) {
        var temp = new listWrap(appview,type);
        this.listwraps[this.listtabs.addTab(name,temp)] = temp;
        eval('temp.' + type + 'List()');
        this.element.append(temp.element);
        temp.showTools(type);
    }

    this.addTab = function(name,category) {
        return this.listtabs.addTab(name, category);
    }

    this.loading = function(mode) {
        this.listwrap.loading(mode);
    }

    this.addTools = function(type) {
        this.listwrap.showTools(type);
    }

    this.elementsList = function() {
        this.listwrap.elementsList();
    }

    this.searchList = function() {
        this.listwrap.searchList();
    }

    this.settings = function() {
        this.listwrap.settings();
    };

}

var listTabs = function listTabs() {
    this.element = $('<div id="listtabs" style="" class="xtabs"><ul></ul></div>');
    var that = this;

    this.addTab = function(name,father) {
        var tab = $('<li class="xtab_blue"><a href="">' + name + '</a></li>');
        $('ul',this.element).append(tab);
        $('a',tab).click(function() {
            $('li',that.element).removeClass("xtab_selected");
            $(this).parent().addClass("xtab_selected");
            //if(name == "Entrenamiento") $("#anadir").click();
            father.select();
            return false;
        });
        return tab;
    }

    this.addDummyTab = function(name) {
        var tab = $('<li class="xtab_blue"><a href="">' + name + '</a></li>');
        $('ul',this.element).append(tab);
    }
}

var listWrap = function listWrap(appview,type) {
    this.element = $('<div id="listwrap" class="listwrap"></div>');
    this.tools = new tools(appview);
    this.midcontent = new midcontent(appview,type);

    this.element.append('<div id="tools_spacer" style="border-top: 1px solid #CACACA;margin:0; clear: both; padding-top: 1.8em; border-left: 1px solid #CACAAC; border-right: 1px solid #CACACA;"></div>');
    this.element.append(this.tools.element);
    this.element.append(this.midcontent.element);

    this.loading = function(mode) {
        this.midcontent.load(mode);
    }
    
    this.select = function() {
        $(".listwrap").hide();
        this.element.show();
    }

    this.showTools = function(type) {
        this.tools.show();
        if(type == '0') {
            this.tools.addOpen();
            this.tools.addDelete();
            this.tools.addCC();
        }
        if(type == 'search') {
            this.tools.addDelete();
            this.tools.addA2W();
            this.tools.addSearch();
        }
        if(type == 'polarity') {
            this.tools.addCP();
        }
    }

    this.elementsList = function() {
        this.midcontent.elementsList();
    }

    this.searchList = function() {
        this.midcontent.searchList();
    }

    this.polarityList = function() {
        this.midcontent.polarityList();
    }

    this.settings = function() {
        this.midcontent.settings();
    };

}

var tools = function tools(appview) {
    this.element = $('<div id="tools" style="display:none"></div>');
    this.toolbox = null;


    this.show =function() {
        this.toolbox = new toolbox(appview);
        this.element.append(this.toolbox.element);
        this.element.show();
    };

    this.addOpen = function() {
        this.toolbox.addOpen();
    }

    this.addDelete = function() {
        this.toolbox.addDelete();
    }

    this.addA2W = function() {
        this.toolbox.addA2W();
    }

    this.addCC = function() {
        this.toolbox.addChangeCategory();
    }

    this.addCP = function() {
        this.toolbox.addChangePolarity();
    }
    
    this.addSearch = function() {
        this.toolbox.addSearch();
    }
}

var toolbox = function toolbox(appview){
    this.element = $('<div id="toolbox"></div>');
    this.actions = new actions(this.element,appview);
    this.selectors = new selectors(this.element,appview);


    this.element.append(this.actions.element);

    this.addOpen = function() {
        this.actions.addOpen();
    }

    this.addDelete = function() {
        this.actions.addDelete();
        this.element.append(this.selectors.element);
    }

    this.addA2W = function() {
        this.actions.addA2W();
    }

    this.addChangeCategory = function(){
        this.actions.addChangeCategory();
        for(i in appview.categories) {
            if(appview.categories[i].name != "Todo")
                this.actions.addOption(appview.categories[i].name,appview.categories[i].id);
        }
    }

    this.addChangePolarity = function(){
        this.actions.addChangePolarity();
        this.actions.addOption('POSITIVE',0);
        this.actions.addOption('NEGATIVE',1);
        this.actions.addOption('NEUTRAL',2);
    }
    
    this.addSearch = function() {
        this.search = new search(this.element,appview);
//        this.actions.addSearch();
    }
}



var actions = function actions(father,appview) {
    this.element = $('<div class="xtoolbox_actions"></div>');
    father.append(this.element);
    this.element.append('<form></form>');
    this.form = $('form', this.element);
    var a = this;

    this.addOpen = function (){
        var openButton = $('<input type="submit" class="xtoolbox_button" value="Abrir sesi\u00F3n">');
        a.form.append(openButton);
        openButton.click(function() {
//            alert(appview.selectedCategory.name);
            appview.openElement();
            return false;
        });
    }

    this.addDelete = function (){
        var deleteButton = $('<input type="submit" class="xtoolbox_button" value="Eliminar elemento/os">');
        a.form.append(deleteButton);
        deleteButton.click(function() {
            appview.deleteElements();
            return false;
        });
    }

    this.addA2W = function() {
        var addButton = $('<input id="anadir" type="submit" class="xtoolbox_button" value="A\u00F1adir elemento/os a conjunto de trabajo">');
        a.form.append(addButton);
        addButton.click(function() {
            appview.add2work();
            return false;
        });
    }

    this.addChangeCategory = function() {
        a.select = $('<select id="mas"></select>');
        a.select.append('<option>Cambiar de Categor\u00EDa</option>');
        a.select.append('<option disabled="">---</option>');
        a.form.append(a.select);
        a.select.change(function() {
            appview.changeCategory($(":selected", this).val());
        });
    }

    this.addChangePolarity = function() {
        a.select = $('<select id="mas"></select>');
        a.select.append('<option>Cambiar de Polaridad</option>');
        a.select.append('<option disabled="">---</option>');
        a.form.append(a.select);
        a.select.change(function() {
            appview.changePolarity($(":selected", this).text());
        });
    }

    this.addOption = function(option,id) {
        var o = $('<option value=' + id + '>' + option + '</option>');
        a.select.append(o);
    }

    this.addSearch = function() {
        var search = new searchBox();
        this.form.append(search.element);
    }
}

var selectors = function selectors(father,appview) {
    this.element = $('<div class="xtoolbox_selector"></div>');
    father.append(this.element);

    this.element.append('Seleccionar: <a id="selectAll" href=" ">Todas</a>, <a id="selectNone" href=" ">Ninguna</a>');
    $("#selectAll",this.element).click(function() {
        //check all the elements
        appview.selectAll();
        return false;
    });

    $("#selectNone",this.element).click(function() {
        appview.unselectAll();
        //uncheck all the elements
        return false;
    });
}

var search = function search(father,appview) {
    this.element = $('<div class="xtoolbox_search"></div>');
    this.searchbox = new searchBox();
    father.prepend(this.element);
    this.element.append(this.searchbox.element);

/*    this.element.append('Seleccionar: <a id="selectAll" href=" ">Todas</a>, <a id="selectNone" href=" ">Ninguna</a>');
    $("#selectAll",this.element).click(function() {
        //check all the elements
        appview.selectAll();
        return false;
    });

    $("#selectNone",this.element).click(function() {
        appview.unselectAll();
        //uncheck all the elements
        return false;
    });*/
}

var midcontent = function midcontent(appview) {
    this.element = $('<div id="midcontent"></div>');
    var div = $('<div style="border-left: 1px solid #CACACA; border-right: 1px solid #CACACA; margin: 0px; clear: both;"></div>');
    this.element.append(div);

    this.elementsList = function(){
        this.addBox = new addBox(div,appview);
        this.addBox.sessions();
        this.loading = new loading(div);
        this.elements = new elements(div);
    }

    this.searchList = function() {
        this.addBox = new addBox(div,appview);
        this.loading = new loading(div);
        //this.loading.loading('show');
        this.elements = new elements(div);
        this.elements.searchTable(['POSITIVE','NEGATIVE','NEUTRAL']);
        this.addBox.search(this.elements);
//        this.elements = new searchElements(div);
    }

    this.polarityList = function() {
        this.addBox = new addBox(div,appview);
        this.loading = new loading(div);
        this.elements = new elements(div);
        this.elements.polarityTable(['POSITIVE','NEGATIVE','NEUTRAL']);
        this.addBox.search(this.elements);
    }
    
    this.settings = function() {
        this.generalSettings = new settings(div,appview);
    }

    this.load = function(mode) {
        this.loading.loading(mode);
    }
}

var addBox = function addBox(father,appview) {
    this.element = $('<div id="add-box" class="add-box "><div class="ab1"><div class="ab6"></div><div class="ab8"></div><div class="ab9"><span class="ab2"></span><span class="ab4"></span></div><div class="ab7"><div class="ab3"></div><span class="ab5"></span></div><table width="100%" cellspacing="0" cellpadding="0"><tbody><tr><td width="*"><div class="add-field-wrap"><div class="add-field"><input type="text" id="add-text" name="add-text" value="" autocomplete="off"></div></div></td><td align="right" style="width: 180px; "><div class="add-extra" unselectable="on"><span id="add-label">&laquo; Agregue un nuevo elemento a la lista</span></div></td></tr></tbody></table></div></div>');
    father.append(this.element);
    this.addText = $("#add-text",this.element);
    this.label = $("#add-label",this.element);
    var a = this;

    this.sessions = function() {
        this.addText.focus(function (){
            a.element.addClass("highlight");
            a.label.addClass("hidden");

        });
        this.addText.blur(function (){
            a.element.removeClass("highlight");
            a.label.removeClass("hidden");

        });

        this.addText.keypress(function(event) {
            if (event.keyCode == '13') {
                appview.addSession(a.addText.val());
                a.addText.val("");
                a.addText.blur();
            }
        });
    }

    this.search = function(elements) {
        this.addText.focus(function (){
            a.element.addClass("highlight");
            a.label.addClass("hidden");

        });
        this.addText.blur(function (){
            a.element.removeClass("highlight");
            a.label.removeClass("hidden");

        });

        this.addText.keypress(function(event) {
            if (event.keyCode == '13') {
                console.log(elements.table.dataTable().fnSettings().aoColumns.length);
                var data = [
                    "",
                    "",
                    a.addText.val()];
                for(i=3;i<elements.table.dataTable().fnSettings().aoColumns.length;i++) data.push("");
                console.log(data);
                elements.table.dataTable().fnAddData(data);
                a.addText.val("");
                a.addText.blur();
            }
        });
    }

}

var loading = function loading(div) {
    this.element = $('<div id="in_processing" style="display: none; "><table class="xtable xtable_loading"><colgroup><col class="col_prio"/><col class="col_text"/><col class="col_image"/></colgroup><tbody><tr class="xtr"><td class="xtd xtd_prio prioN">&nbsp;</td><td class="xtd xtd_text">Cargando...</td><td class="xtd xtd_image"><img src="/img/busy.gif" alt="Cargando..."/></td></tr></tbody></table></div>');
    div.append(this.element);

    this.loading = function(mode) {
        if(mode == 'show') this.element.show();
        else this.element.hide();
    }
}

var elements = function elements(father) {
    this.element = $('<div id="tasks"></div>');
    this.table = $('<table class="xtable xtable_tags_left"><colgroup><col class="col_prio"><col class="col_check"><col class="col_text"><col class="col_date"><col class="col_ico"></colgroup><tbody></tbody></table>');
    this.element.append(this.table);
    father.append(this.element);
    var e = this;
    
//    V_elements = this;
    
    this.getData = function(url,mode) {
        $("#in_processing",father).show();
        console.log(url);
        $.getJSON(url,//'twitter_search.php?q=hola&n=10', 
        function(json){
            e.searchData = json['aaData'];
            console.log(json);
            console.log(e.searchData)
            $("#in_processing",father).hide();
            if(mode == '1') e.table.fnClearTable();
            e.table.fnAddData(e.searchData);
        });
    }

    this.searchTable = function(options) {
        V_elements['search'] = e;
        $('colgroup',this.table).empty();
        $('colgroup',this.table).append('<col class="col_prio">');
        $('colgroup',this.table).append('<col class="col_check">');
        $('colgroup',this.table).append('<col class="col_text">');
        //        $('colgroup',this.table).append('<col class="col_date">');

        this.searchData = [];
        var sd = "";
        
        V_Table = e.table.dataTable({
            "bPaginate": false,
            "bLengthChange": true,
            "bFilter": false,
            "bSort": false,
            "bInfo": false,
            "bAutoWidth": false,
            'bProcessing':true,
            //                'bServerSide':true,
            'bDestroy':true,
            //                'bStateSave':true,
            "oLanguage": {
                "sProcessing": '<table class="xtable xtable_loading"><colgroup><col class="col_prio"/><col class="col_text"/><col class="col_image"/></colgroup><tbody><tr class="xtr"><td class="xtd xtd_prio prioN">&nbsp;</td><td class="xtd xtd_text">Cargando...</td><td class="xtd xtd_image"><img src="/img/busy.gif" alt="Cargando..."/></td></tr></tbody></table>',
                "sZeroRecords": '<table class="xtable xtable_tags_left xtable_empty"><colgroup><col class="col_prio"><col class="col_check"><col class="col_text"><col class="col_date"><col class="col_ico"></colgroup><tbody><tr class="xtr" style="display: table-row; "><td class="xtd xtd_prio prio2">&nbsp;</td><td class="xtd xtd_check" style="display: none"><form id="null" action="#" style="display:none"><div style="display: inline;"><input type="checkbox"></div></form></td><td class="xtd xtd_text"><span class="xtd_tag"></span><span class="xtd_task_name">Ningún resultado encontrado</span></td><td class="xtd xtd_date"></td><td class="xtd xtd_ico"></td></tr><tr class="xtr" style="display: none; "><td class="xtd xtd_prio prio0">&nbsp;</td><td class="xtd xtd_check"><img id="70" src="/img/ico/ico_check_blu.gif" style="display: none; "><form id="70" action="#" style="display:none"><div style="display: inline;"><input type="checkbox"></div></form></td><td class="xtd xtd_text"><span class="xtd_tag">opinion</span><span class="xtd_task_name">opinion1</span></td><td class="xtd xtd_date">Martes 5 de Abril de 2011</td><td class="xtd xtd_ico"><img alt="editar" src="/img/ico/ico_edit.gif" style="display: none; "></td></tr><tr class="xtr" style="display: none; "><td class="xtd xtd_prio prio1">&nbsp;</td><td class="xtd xtd_check"><img id="69" src="/img/ico/ico_check_blu.gif" style="display: none; "><form id="69" action="#" style="display:none"><div style="display: inline;"><input type="checkbox"></div></form></td><td class="xtd xtd_text"><span class="xtd_tag">bulling</span><span class="xtd_task_name">bulling1</span></td><td class="xtd xtd_date">Martes 5 de Abril de 2011</td><td class="xtd xtd_ico"><img alt="editar" src="/img/ico/ico_edit.gif" style="display: none; "></td></tr><tr class="xtr xtr_select" style="display: none; "><td class="xtd xtd_prio prioN">&nbsp;</td><td class="xtd xtd_check"><img id="68" src="/img/ico/ico_check_blu.gif" style=""><form id="68" action="#" style="display:none"><div style="display: inline;"><input type="checkbox"></div></form></td><td class="xtd xtd_text"><span class="xtd_tag"></span><span class="xtd_task_name">prueba1</span></td><td class="xtd xtd_date">Martes 5 de Abril de 2011</td><td class="xtd xtd_ico"><img alt="editar" src="/img/ico/ico_edit.gif" style="display: none; "></td></tr></tbody></table>'
            },
            "aoColumnDefs": [
            {
                "sClass":"xtd_prio prio2",
                "aTargets":[0]
            },
            {
                "sClass":"xtd_check",
                "aTargets":[1],
                "fnRender" : function ( oObj ) {
                    return '<img src="/img/ico/ico_check_blu.gif" style="display:none">';
                }
            },
            {
                "sClass":"xtd_opinion",
                "aTargets":[2]
            },

            /*            {
                "fnRender": function ( oObj ) {
                    ////console.log(oObj);
                    var select = '<span style="white-space: nowrap;"> <select class="polarity">';
                    for (i in options) select += '<option value="' + i  + '">' + options[i] + '</option>';
                    select += '</select></span>';
                    return select;
                },
                "sClass":"xtd_polarity",
                "aTargets":[2]
            },*/
            ],
            //            'sAjaxSource':'twitter_search.php?q=hola&n=10',
            'aaData' : e.searchData,
            "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
                $(nRow).addClass('xtr');
                $('td',nRow).addClass('xtd');
                $(nRow).hover(
                    function () {
                        $(this).addClass("xtr_hover");
                    },
                    function () {
                        $(this).removeClass("xtr_hover");
                    }
                    );
                console.log(nRow);
                $(nRow).unbind('click');
                $(nRow).click( function() {
                    $(this).toggleClass('xtr_select');
                    $('img',this).toggle();
                })
                return nRow;
            }
        });


    }
//    V_Table = this.table;
    this.polarityTable = function(options) {
        V_elements['polarity'] = e;
        $('colgroup',this.table).empty();
        $('colgroup',this.table).append('<col class="col_prio">');
        $('colgroup',this.table).append('<col class="col_check">');
        $('colgroup',this.table).append('<col class="col_text">');
        $('colgroup',this.table).append('<col class="col_date">');

        G_polarityData = [["","","NO HAY REGISTROS",'']];
        var sd = "";
        
        G_polarityTable = e.table.dataTable({
            "bPaginate": false,
            "bLengthChange": true,
            "bFilter": false,
            "bSort": false,
            "bInfo": false,
            "bAutoWidth": false,
            'bProcessing':true,
            'bDestroy':true,
            "oLanguage": {
                "sProcessing": '<table class="xtable xtable_loading"><colgroup><col class="col_prio"/><col class="col_text"/><col class="col_image"/></colgroup><tbody><tr class="xtr"><td class="xtd xtd_prio prioN">&nbsp;</td><td class="xtd xtd_text">Cargando...</td><td class="xtd xtd_image"><img src="/img/busy.gif" alt="Cargando..."/></td></tr></tbody></table>',
                "sZeroRecords": '<table class="xtable xtable_tags_left xtable_empty"><colgroup><col class="col_prio"><col class="col_check"><col class="col_text"><col class="col_date"><col class="col_ico"></colgroup><tbody><tr class="xtr" style="display: table-row; "><td class="xtd xtd_prio prio2">&nbsp;</td><td class="xtd xtd_check" style="display: none"><form id="null" action="#" style="display:none"><div style="display: inline;"><input type="checkbox"></div></form></td><td class="xtd xtd_text"><span class="xtd_tag"></span><span class="xtd_task_name">Ningún resultado encontrado</span></td><td class="xtd xtd_date"></td><td class="xtd xtd_ico"></td></tr><tr class="xtr" style="display: none; "><td class="xtd xtd_prio prio0">&nbsp;</td><td class="xtd xtd_check"><img id="70" src="/img/ico/ico_check_blu.gif" style="display: none; "><form id="70" action="#" style="display:none"><div style="display: inline;"><input type="checkbox"></div></form></td><td class="xtd xtd_text"><span class="xtd_tag">opinion</span><span class="xtd_task_name">opinion1</span></td><td class="xtd xtd_date">Martes 5 de Abril de 2011</td><td class="xtd xtd_ico"><img alt="editar" src="/img/ico/ico_edit.gif" style="display: none; "></td></tr><tr class="xtr" style="display: none; "><td class="xtd xtd_prio prio1">&nbsp;</td><td class="xtd xtd_check"><img id="69" src="/img/ico/ico_check_blu.gif" style="display: none; "><form id="69" action="#" style="display:none"><div style="display: inline;"><input type="checkbox"></div></form></td><td class="xtd xtd_text"><span class="xtd_tag">bulling</span><span class="xtd_task_name">bulling1</span></td><td class="xtd xtd_date">Martes 5 de Abril de 2011</td><td class="xtd xtd_ico"><img alt="editar" src="/img/ico/ico_edit.gif" style="display: none; "></td></tr><tr class="xtr xtr_select" style="display: none; "><td class="xtd xtd_prio prioN">&nbsp;</td><td class="xtd xtd_check"><img id="68" src="/img/ico/ico_check_blu.gif" style=""><form id="68" action="#" style="display:none"><div style="display: inline;"><input type="checkbox"></div></form></td><td class="xtd xtd_text"><span class="xtd_tag"></span><span class="xtd_task_name">prueba1</span></td><td class="xtd xtd_date">Martes 5 de Abril de 2011</td><td class="xtd xtd_ico"><img alt="editar" src="/img/ico/ico_edit.gif" style="display: none; "></td></tr></tbody></table>'
            },
            "aoColumnDefs": [
            {
                "aTargets":[4],
                "bVisible":false
            },
            {
                "aTargets":[5],
                "bVisible":false
            },
            {
                "sClass":"xtd_prio prio2",
                "aTargets":[0]
            },
            {
                "sClass":"xtd_check",
                "aTargets":[1],
                "fnRender" : function ( oObj ) {
                    return '<img src="/img/ico/ico_check_blu.gif" style="display:none">';
                }
            },
            {
                "sClass":"xtd_opinion",
                "aTargets":[2]
            },
            {
                "fnRender": function ( oObj ) {
                    ////console.log(oObj);
                    var select = '<span style="white-space: nowrap;"> <select class="polarity">';
                    for (i in options) select += '<option value="' + i  + '">' + options[i] + '</option>';
                    select += '</select></span>';
                    return select;
                },
                "sClass":"xtd_polarity",
                "aTargets":[3]
            }
            ],
            'sAjaxSource':'opinions.php?mode=get&id_session=' + V_TRAINER.contexts[1].id,
            //'aaData' : G_polarityData,
            "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
                $(nRow).addClass('xtr');
                $('td',nRow).addClass('xtd');
                $(nRow).hover(
                    function () {
                        $(this).addClass("xtr_hover");
                    },
                    function () {
                        $(this).removeClass("xtr_hover");
                    }
                    );
                console.log(nRow);
//                console.log(aData);
                $(nRow).unbind('click');
                $(nRow).click( function() {
                    $(this).toggleClass('xtr_select');
                    $('img',this).toggle();
                });
                $('.xtd_prio',nRow).attr('class','xtd_prio xtd prio' + $('select',nRow).val());
                $('select',nRow).change(function() {
                    $('.xtd_prio',nRow).attr('class','xtd_prio xtd prio' + $(this).val());
                    $.getJSON("opinions.php",
                        {
                            "mode":"update",
                            "id":aData[4],
                            "polarity":$(":selected",this).text()
                        }, function(textStatus) {
                            console.log(textStatus);
                        })
                });
                $('select option',nRow).each(function() {
                    if($(this).text() == aData[5]) $(this).attr('selected', 'selected').trigger('change');
                    //console.log($(this).text() + " == " + aData[5]);
                });
                return nRow;
            }
        });


    }
}

var searchElements = function searchElements(father) {
    this.element = $('<div id="results"></div>');
    this.form = $('<form id="searchResults"></form>');
    this.table = $('<table id="table" class="xtable">\
                        <thead>\
                            <tr></tr>\
                        </thead>\
                        <tbody></tbody>\
                    </table>');
    this.form.append(this.table);
    this.element.append(this.form);
    this.table.dataTable({
        'bProcessing':true,
        "bFilter": false,
        "bAutoWidth": true,
        "bPaginate":false,
        "aoColumns": [
        {
            "sTitle":"Opini\u00F3n"
        },

        {
            "fnRender": function ( oObj ) {
                return '<span style="white-space: nowrap;"> <select class="polarity"><option value="POSITIVE">Positive</option><option value="NEGATIVE">Negative</option><option value="NEUTRAL" selected>Neutral</option></select>';
            },
            "sTitle":"Polaridad"
        },
        ],
        'sAjaxSource':'twitter_search.php?q=hola&n=100',
        "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
            $(nRow).addClass('xtr');

            return nRow;
        },
        "fnDrawCallback": function() {
            $('#table tr').click( function() {
                $(this).toggleClass('row_selected');
            })
        },
        "bSortClasses": false,
        "bJQueryUI":true,
        "sPaginationType":"full_numbers"
    });

//    this.table = $('<table class="xtable xtable_tags_left"><colgroup><col class="col_prio"><col class="col_arr"><col class="col_check"><col class="col_text"><col class="col_date"><col class="col_ico"></colgroup><tbody></tbody></table>');
//    this.element.append(this.table);
    father.append(this.element);
}


var settings = function settings(div,appview) {
    this.element = $('<div id="general"></div>');
    this.element.append('<div id="generalsettingswrap" class="contentboxwrap"></div>');
    this.settingsform = new settingsForm($("#generalsettingswrap",this.element),appview);

    div.append(this.element);
}

var settingsForm = function settingsForm(div,appview) {
    this.form = $('<form id="settingsform" autocomplete="off"></form>');
    div.append(this.form);
    this.userid = $("#userid").val();
    //console.log(this.userid);
    this.username = null;
    this.name = null;
    this.surname = null;
    this.email = null;
    var f = this;

    this.form.append('<table>\
			<tbody>\
                        <tr>\
				<td class="field"><input class="textfield" id="id" name="id" type="text" value="' + this.userid +'" style="display:none"></td>\
				<td class="field"><input class="textfield" id="mode" name="mode" type="text" value="update" style="display:none"></td>\
			</tr>\
                        <tr>\
				<td class="label"><label for="username">Nombre de Usuario</label></td>\
				<td class="field"><input class="textfield" id="username" name="username" type="text"></td>\
				<td class="status"><span id="usernameStatus"></span></td>\
			</tr>\
                        <tr>\
				<td class="label"><label for="firstname">Nombre</label></td>\
				<td class="field"><input class="textfield" id="firstname" name="firstname" type="text"></td>\
				<td class="status"><span id="firstnameStatus"></span></td>\
			</tr>\
			<tr>\
				<td class="label"><label for="lastname">Apellido</label></td>\
				<td class="field"><input class="textfield" id="lastname" name="lastname" type="text"></td>\
				<td class="status"><span id="lastnameStatus"></span></td>\
			</tr>\
			<tr>\
				<td class="label"><label for="password">Contrase\u00F1a</label></td>\
				<td class="field"><a id="settings-change-password" href="https://www.rememberthemilk.com/login/password.rtm" target="_blank">Cambiar tu contrase\u00F1a</a></td>\
				<td class="status"><span id="firstPasswordStatus"></span></td>\
			</tr>\
			<tr>\
				<td class="label"><label for="email">Direcci\u00F3n de correo electr\u00F3nico</label></td>\
				<td class="field"><input class="textfield" id="email" name="email" type="text"></td>\
				<td class="status"><span id="emailStatus"></span></td>\
			</tr>\
			<tr>\
				<td class="hiddenlabel"><label for="settingssubmit">Guardar Cambios</label></td>\
				<td class="field" colspan="2">\
				<input id="settingssubmit" name="settingssave" type="submit" value="Guardar Cambios" disabled="">\
				<label for="settingscancel" style="display: none;">Cancelar</label>\
				<input id="settingscancel" name="settingscancel" type="submit" value="Cancelar" disabled="">\
				</td>\
			</tr>\
			<tr>\
				<td class="label" style="padding-top: 10px;"><label for="closeaccount">Cerrar cuenta</label></td>\
				<td class="field" style="padding-top: 10px;"><a id="settings-close-account" href="https://www.rememberthemilk.com/login/delete.rtm" target="_blank">Haz clic aqu\u00ED si deseas cerrar tu cuenta</a></td>\
				<td class="status" style="padding-top: 10px;"></td>\
			</tr>\
			</tbody></table>');


    this.spyChange = function(element,value){
        element.keyup(function() {
/*            if(element.val() != value)
                //console.log(element.val() + "!=" + value);
            else //console.log(element.val() + "==" + value);*/
            if(f.changes()) {
                $("#settingssubmit").removeAttr("disabled");
                $("#settingscancel").removeAttr("disabled");
            }
            else {
                $("#settingssubmit").attr("disabled","disabled");
                $("#settingscancel").attr("disabled","disabled");
            }
        });
    }

    this.changes = function() {
        return (($("#username",f.element).val() != this.username) || ($("#firstname",f.element).val() != this.name) || ($("#lastname",f.element).val() != this.surname) || ($("#email",f.element).val() != this.email));
    }

    this.loadData = function() {
        $.getJSON('member.php',{
            mode:"get",
            id:this.userid
        },function(json) {
            //console.log("sdkjfhasfd");
            f.username = json['usr'];
            $("#username",f.form).val(f.username);
            f.spyChange($("#username",f.form),f.username);
            f.name = json['nb'];
            $("#firstname",f.form).val(f.name);
            f.spyChange($("#firstname",f.form),f.name);
            f.surname = json['ap'];
            $("#lastname",f.form).val(f.surname);
            f.spyChange($("#lastname",f.form),f.surname);
            f.email = json['email'];
            $("#email",f.form).val(f.email);
            f.spyChange($("#email",f.form),f.email);
        });

    }


    this.form.submit(function() {
        var data = {};
        data["usr"] = $("#username",f.form).val();
        data["nb"] = $("#firstname",f.form).val();
        data["ap"] = $("#lastname",f.form).val();
        data["email"] = $("#email",f.form).val();
        $.ajax({
            url: 'member.php',
            type: "GET",
            data: f.form.serialize(),
            beforeSend: function () {
                appview.statusbox.showMessage("Guardando...");
            },
            success: function(data) {
                //console.log(data);
                if(data == "success") {
                    appview.statusbox.showMessage("Configuraci\u00F3n guardada");
                    f.loadData();
                    $("#settingssubmit").attr("disabled","disabled");
                    $("#settingscancel").attr("disabled","disabled");
                }
                else appview.statusbox.showMessage("Ha ocurrido un error mientras se guardaba la configuraci\u00F3n");
            },
            error: function() {
                appview.statusbox.showMessage("Error de petici\u00F3n");
            }
        });
        return false;
    })

    this.loadData();

}

var appfooter = function appfooter() {
    this.element = $('<div class="appfooter" style="display: none"></div>');
}

var detailsBox = function detailsBox(appview) {
    this.element = $('<div id="detailsbox" style="left: 0px; top: 0px; "></div>');
    appview.element.append(this.element);
    this.details = $('<div id="details"></div>');
    this.element.append(this.details);
    this.detailstab = new detailstab(this.details,"Categor\u00EDa");
    this.detailswrap = new detailswrap(this.details);
    this.detailshelp = new detailshelp(appview);
    this.detailsKey = new detailskey(appview);


    this.animate = function() {
        var name = "#detailsbox";
        var menuYloc = null;

        menuYloc = parseInt($(name).css("top").substring(0,$(name).css("top").indexOf("px")))
        $(window).scroll(function () {
            var offset = (menuYloc+$(document).scrollTop())+"px";
            var y = $(this).scrollTop();

            if(y >= 100)
                $(name).animate({
                    top:y - 90
                },{
                    duration:500,
                    queue:false
                });
            else $(name).animate({
                top:0
            },{
                duration:500,
                queue:false
            });
        });
    }
    
    this.changeName = function(name) {
        this.detailstab.changeName(name);
    }

    this.general = function(name) {
        this.detailstab.changeName("Categor\u00EDa");
        this.detailswrap.showGeneral(name);
    }

    this.category = function (category,numSessions) {
        this.detailstab.changeName("Categor\u00EDa");
        this.detailswrap.showCategory(category,numSessions);
    }

    this.session = function(session) {
        this.detailstab.changeName("Sesi\u00F3n");
        this.detailswrap.showSession(session);
    }

    this.sessions = function(count) {
        this.detailstab.changeName("Sesiones");
        this.detailswrap.showSessions(count);
    }

    this.addInfo = function() {
        this.detailsKey.addinfo();
    };
}

var detailstab = function detailstab(father,name) {
    this.element = $('<div id="detailstabs" style="" class="xtabs xtabs_grey"></div>');
    this.tabs = $('<ul></ul>');
    this.selected = null;
    var t = this;

    father.append(this.element);
    this.element.append(this.tabs);

    this.add = function(name) {
        var tab = $('<li><a href=" ">' + name + '</a></li>');
        tab.click(function(){
            t.selected = this;
            $("li",t.tabs).removeClass("xtab_selected");
            tab.addClass("xtab_selected");
            return false;
        });
        t.tabs.append(tab);
        tab.click();
    }

    this.add("Categor\u00EDa");

    this.reset = function (name) {
        var tab = $('<li><a href=" ">' + name +'</a></li>');
        tab.click(function(){
            t.selected = this;
            $("li",t.tabs).removeClass("xtab_selected");
            tab.addClass("xtab_selected");
            return false;
        });
        t.tabs.empty();
        t.tabs.append(tab);
        tab.click();
    }

    this.changeName = function(newName) {
        $('a',this.selected).text(newName);
    }
}

var detailswrap = function detailswrap(father) {
    this.element = $('<div id=detailswrap></div>');
    father.append(this.element);
    this.element.append('<div style="margin:0; padding-top:1.4em; clear:both;"></div>');
    this.detailsoverflow = $('<div id="detailsoverflow" style="overflow-x: visible; overflow-y: visible; height: auto; "></div>');
    this.element.append(this.detailsoverflow);
    this.detailscontent = new detailscontent(this.detailsoverflow);

    this.showSession = function(session) {

        this.detailscontent.title.changeTitle(session.title);
        this.detailscontent.title.jeditable(session);
    };

    this.showSessions = function(count) {

        this.detailscontent.title.changeTitle("Selecci\u00F3n m\u00FAltiple");
        this.detailscontent.title.addCount(count,"Sesiones");
    };

    this.showCategory = function(category,numSessions) {

        this.detailscontent.title.changeTitle(category);
        this.detailscontent.title.addCount(numSessions,"Sesiones");
    };

    this.showGeneral = function(name) {

        this.detailscontent.title.changeTitle(name);
//        this.detailscontent.title.addCount(numSessions,"Sesiones");
    };
}

var detailscontent = function detailscontent(father) {
    this.element = $('<div id="detailscontent" style="padding-top: 0.4em;"></div>');
    father.append(this.element);
    this.title = new detailstitle(this.element);

}

var detailstitle = function detailstitle(father) {
    this.element = $('<div id="detailstitle" style="word-wrap: break-word;"></div>');
    this.title = $('<span id="detailstitle_highlight"><span class="field" id="detailstitle_span"></span></span>');
    this.fieldcount = $('<span class="fieldcount"></span>');
    this.editIcon = $('<img style="display:none" class="field_img" src="http://s2.rtmcdn.net/img/ico/ico_edit.gif" alt="Renombrar (r)">');
    this.title.append(this.editIcon);

    var t = this;
    
    father.append(this.element);
    
    this.changeTitle = function(title) {
        this.element.empty();
        this.element.append(this.title);
        $("#detailstitle_span",this.title).text(title);
        this.editIcon.hide();

        this.title.css("cursor", "pointer");
        this.title.removeClass("editable");
    }

    this.jeditable = function(session) {
        $("img",this.title).show();
        this.title.css("cursor", "pointer");
        this.title.addClass("editable");
        $("#detailstitle_span",this.element).editable("/trainer/quickedit.php",{
            indicator : '<img src="/img/loading.gif" alt= />',
            tooltip : 'Click to edit…',
            event : 'click', // Al hacer click //
            width : '80%',
            submitdata: {
                id:session.id,
                cat:session.category
            },
            callback: function(value,settings) {
                session.setTitle(value);
            }
        });
        $("#detailstitle_span",this.element).click(function() {
            t.editIcon.hide();
        });

        $("#detailstitle_span",this.element).blur(function() {
            t.editIcon.show();
        });

    }

    this.addCount = function(cont,type) {
        this.element.append('<br/>');
        this.element.append(this.fieldcount);
        this.fieldcount.text("(" + cont + " " + type + ")");
    }
}

var detailshelp = function detailshelp(appview) {
    this.element = $('<div id="helpwrap" style="margin-top: 13px; padding-top: 11px; "></div>');
    this.element.append('<div style="margin:0; clear:both;"></div>');
    this.helpcontent = $('<div id="helpcontent"></div>');
    this.helpinfo = $('<span id="helptext" style="padding-left: 7px;"></div>');
    var h = this;

    this.element.append(this.helpcontent);
    $('#detailsbox',appview.element).append(this.element);

    this.helpcontent.append('<div><img alt="Cierra la llave" title="Ocultar ayuda" id="keyclose" src="/img/ico/ico_cross_gry.gif" style="float: right;"/><img alt="Clave" src="/img/ico/ico_help_blu.gif" style="vertical-align: bottom;"/></div>');
    this.helpcontent.append(this.helpinfo);

    var keyclose = $('#keyclose',this.keycontent);
    keyclose.toggle(function(){
        keyclose.attr('src',"/img/ico/ico_help_gry.gif");
        keyclose.attr('title',"Mostrar ayuda");
        h.helpinfo.toggle(1000);
    }, function(){
        keyclose.attr('src',"/img/ico/ico_cross_gry.gif");
        keyclose.attr('title',"Ocultar ayuda");
        h.helpinfo.toggle(1000);
    });

    this.addinfo = function(text) {
        this.helpinfo.text(text);
    }

//    this.addinfo("\u00BFQuieres cambiar tu nombre o apellido? \u00BFDirecci\u00F3n de correo electr\u00F3nico? \u00BFContrase\u00F1a? \u00BFZona de hora? Lo puedes hacer todo aqu\u00ED.");
    this.addinfo(appview.info);
}

var detailskey = function detailskey(appview) {
    this.element = $('<div id="keywrap" style="margin-top: 13px; padding-top: 11px; "></div>');
    this.element.append('<div style="margin:0; clear:both;"></div>');
    this.keycontent = $('<div id="keycontent"></div>');
    this.keyinfo = $('<div id="keyinfo"></div>');
    var k = this;

    this.element.append(this.keycontent);
    $('#detailsbox',appview.element).append(this.element);

    this.keycontent.append('<div><img alt="Cierra la llave" title="Ocultar ayuda" id="keyclose" src="/img/ico/ico_cross_gry.gif" style="float: right;"/><img alt="Clave" src="/img/ico/ico_key.gif" style="vertical-align: bottom;"/><span id="keytitle" style="padding-left: 7px; padding-top: 4px; vertical-align: bottom;">Clave</span></div>');
    this.keycontent.append(this.keyinfo);

    var keyclose = $('#keyclose',this.keycontent);
    keyclose.toggle(function(){
        keyclose.attr('src',"/img/ico/ico_help_gry.gif");
        keyclose.attr('title',"Mostrar ayuda");
        k.keyinfo.toggle(1000);
    }, function(){
        keyclose.attr('src',"/img/ico/ico_cross_gry.gif");
        keyclose.attr('title',"Ocultar ayuda");
        k.keyinfo.toggle(1000);
    });

    this.addinfo = function() {
        var categories = $('<div style="padding-top: 0.6em;"></div>');
        for (i in appview.categories) {
            var aux = appview.categories[i];
            if(aux.id > 0)
                categories.append('<span class="keyprio prio' + ((parseFloat(appview.categories[i].id) % (appview.categories.length - 2))) + '">' + appview.tabNames[aux.id] + '</span>');
        }
        var catCont = $('<div style="padding-top: 1em;"></div>');
        catCont.append('Categor\u00EDas:');
        catCont.append(categories);
        k.keyinfo.append(catCont);
    }
}

var category = function category (id,name,appview) {
    /*CONSTRUCTOR*/
    this.name = name;
    this.id = id;
    this.tab = appview.listbox.addTab(this.name,this);


    this.select = function() {
        $(".xtab_selected",$("#listbox")).removeClass("xtab_selected");
        this.tab.addClass("xtab_selected");
        appview.showCategory(this);
    }
}




var session = function session(id,category,title,date,appview) {
    this.title = title;
    this.category = category;
    this.id = id;
    this.date = date;
    this.element = $('<tr></tr>');
    this.selected = false;
    var s = this;


    this.create = function() {
        this.element.addClass("xtr");
        var color = "N";
        if(this.category != "0")
            color = ((parseFloat(this.category) % appview.colors));
        this.element.append('<td class="xtd xtd_prio prio' + color + '">&nbsp;</td>');
        //this.element.append('<td class="xtd xtd_arr"></td>');
        this.element.append('<td class="xtd xtd_check"><img id="' + id + '" src="/img/ico/ico_check_blu.gif" style="display: none; "><form id="' + id + '" action="#" style="display:none"><div style="display: inline;"><input type="checkbox"></div></form></td>');
        this.element.append('<td class="xtd xtd_text"><span class="xtd_tag">' + appview.tabNames[this.category] + '</span><span class="xtd_task_name">' + title +'</span></td>');
        this.element.append('<td class="xtd xtd_date">' + date + '</td>');
        this.element.append('<td class="xtd xtd_ico"><img alt="editar" src="/img/ico/ico_edit.gif" style="display: none; "></td>');
        $('#tasks > table > tbody:last',appview.element).append(this.element);
        this.element.hover(
            function () {
                $(this).addClass("xtr_hover");
                $(".xtd_ico img",this).show();
                appview.hover(s);
            },
            function () {
                $(this).removeClass("xtr_hover");
                $(".xtd_ico img",this).hide();
                appview.refreshDetails();
            }
            );
        this.element.click(function() {
            $(this).toggleClass("xtr_select");
            $(".xtd_check img",this).toggle();
            if (s.selected)
            {
                s.selected = false;
                appview.unselectSession(s);
            }
            else
            {
                s.selected = true;
                appview.selectSession(s);
            }
        });
        this.element.css("display", "none");
    }

    this.createEmpty = function() {
        this.element.addClass("xtr");
        this.element.append('<td class="xtd xtd_prio prio' + this.category + '">&nbsp;</td>');
        //this.element.append('<td class="xtd xtd_arr"></td>');
        this.element.append('<td class="xtd xtd_check" style="display: none"><form id="' + id + '" action="#" style="display:none"><div style="display: inline;"><input type="checkbox"></div></form></td>');
        this.element.append('<td class="xtd xtd_text"><span class="xtd_tag"></span><span class="xtd_task_name">' + title +'</span></td>');
        this.element.append('<td class="xtd xtd_date"></td>');
        this.element.append('<td class="xtd xtd_ico"></td>');
        $('#tasks > table > tbody:last').append(this.element);
        this.element.css("display", "none");
    }

    if(this.id != null) this.create();
    else this.createEmpty();


    this.show = function() {
        this.element.css("display","table-row");
        if(this.id == null) $("#tasks > table").addClass("xtable_empty");
        return false;
    }
    this.hide = function() {
        this.element.hide();
        if(this.id == null) $("#tasks > table").removeClass("xtable_empty");
    }

    this.select = function() {
        if(!this.selected) $(this.element).click();
    }

    this.setTitle = function(title) {
        this.title = title;
        $('.xtd_task_name',this.element).text(title);
    };

    this.changeCategory = function(cat) {
        $(".xtd_prio",this.element).removeClass("prio" + this.category);
        this.category = cat;
        $(".xtd_prio",this.element).addClass("prio" + this.category);
        $(".xtd_tag",this.element).text(appview.tabNames[this.category]);

    }
}

var trainTab = function trainTab(name,appview) {
    /*CONSTRUCTOR*/
    this.name = name;
    this.tab = appview.listbox.addTab(this.name,this);


    this.select = function() {
        $(".xtab_selected",appview.element).removeClass("xtab_selected");
        this.tab.addClass("xtab_selected");
        appview.showTab(this);
    }
}

function getDateFormated(format,strdate) {
    var fecha;
    if(format == 0) fecha = new Date(strdate)
    else if (format > 0) fecha = new Date();
    var diames=fecha.getDate();
    var diasemana=fecha.getDay();
    var mes=fecha.getMonth() +1 ;
    var ano=fecha.getFullYear();

    var textosemana = new Array (7);
    textosemana[0]="Domingo";
    textosemana[1]="Lunes";
    textosemana[2]="Martes";
    textosemana[3]="Mi\u00e9rcoles";
    textosemana[4]="Jueves";
    textosemana[5]="Viernes";
    textosemana[6]="S\u00e1bado";

    var textomes = new Array (12);
    textomes[1]="Enero";
    textomes[2]="Febrero";
    textomes[3]="Marzo";
    textomes[4]="Abril";
    textomes[5]="Mayo";
    textomes[6]="Junio";
    textomes[7]="Julio";
    textomes[7]="Agosto";
    textomes[9]="Septiembre";
    textomes[10]="Octubre";
    textomes[11]="Noviembre";
    textomes[12]="Diciembre";

    var minutes = fecha.getMinutes();
    if (minutes < 10) minutes = "0" + minutes;

    textofecha = textosemana[diasemana] + " " + diames + " de " + textomes[mes] + " de " + ano;
    if (format == 2) textofecha = textofecha + " | " + fecha.getHours() + ":" + minutes;
    return textofecha;
}
