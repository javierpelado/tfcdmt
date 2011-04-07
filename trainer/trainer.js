$(document).ready(function() {
    $('#datetime').text(getDateFormated(2));
    var setTime = setInterval("$('#datetime').text(getDateFormated(2));",60000);

    //$("#loading").show();
/*    var div = $("#content");
    var statusbox = new statusBox(div);
    var appviewsessions = new appViewSes(statusbox,div);
    var appviewcategories = new appViewCat(statusbox,div);
    var appviewsettings = new appViewSettings(statusbox,div);
    var viewselector = new viewSelector();
    viewselector.addView("Sesiones",appviewsessions);
    viewselector.addView("Categorías",appviewcategories);
    viewselector.addView("Preferencias",appviewsettings);
    viewselector.addExit();*/
var V_CONTENT = $("#content");

    var train = new trainer();
});






