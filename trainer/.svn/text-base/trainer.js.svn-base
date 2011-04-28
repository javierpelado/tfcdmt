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
    
/*    $("#appheaderlogo").qtip({
   content: {text:'An example tooltip',
       title: {
         text: 'About me'
      }},
   position: {
      my: 'center', 
      at: 'right center',
      adjust: {x:100}
   },
   hide: {
    event:'click',
      target: $('#keyclose')
   },
show: {
    event:'click',
      target: $('#keyclose')
   },
   style: {
      tip: true,
      classes: 'ui-tooltip-blue'
   }
});*/
    
   window.createGrowl = function(persistent,text,mode) {
      // Use the last visible jGrowl qtip as our positioning target
      var mode_color = {
          'alerta':'ui-tooltip-cream',
          'info':'ui-tooltip-blue',
          'error':'ui-tooltip-red'         
      };
      var target = $('.qtip.jgrowl:visible:last');
 
      // Create your jGrowl qTip...
      $(document.body).qtip({
         // Any content config you want here really.... go wild!
         content: {
            text: text,
            title: {
               text: mode,
               button: true
            }
         },
         position: {
            my: 'top right', // Not really important...
            at: (target.length ? 'bottom' : 'top') + ' right', // If target is window use 'top right' instead of 'bottom right'
            target: target.length ? target : $(window), // Use our target declared above
            adjust: { y: 5} // Add some vertical spacing
         },
         show: {
            event: false, // Don't show it on a regular event
            ready: true, // Show it when ready (rendered)
            effect: function() { $(this).stop(0,1).fadeIn(1000); }, // Matches the hide effect
            
            // Custom option for use with the .get()/.set() API, awesome!
            persistent: persistent
         },
         hide: {
            event: false, // Don't hide it on a regular event
            effect: function(api) { 
               // Do a regular fadeOut, but add some spice!
               $(this).stop(0,1).fadeOut(1000).queue(function() {
                  // Destroy this tooltip after fading out
                  api.destroy();
 
                  // Update positions
                  updateGrowls();
               })
            }
         },
         style: {
            classes: 'jgrowl ui-tooltip-rounded ui-tooltip-shadow ' + mode_color[mode], // Some nice visual classes
            tip: false // No tips for this one (optional ofcourse)
         },
         events: {
            render: function(event, api) {
               // Trigger the timer (below) on render
               timer.call(api.elements.tooltip, event);
            }
         }
      })
      .removeData('qtip');
   };
 
   // Make it a window property see we can call it outside via updateGrowls() at any point
   window.updateGrowls = function() {
      // Loop over each jGrowl qTip
      var each = $('.qtip.jgrowl:not(:animated)');
      each.each(function(i) {
         var api = $(this).data('qtip');
 
         // Set the target option directly to prevent reposition() from being called twice.
         api.options.position.target = !i ? $(window) : each.eq(i - 1);
         api.set('position.at', (!i ? 'top' : 'bottom') + ' right');
      });
   };
 
   // Setup our timer function
   function timer(event) {
      var api = $(this).data('qtip'),
         lifespan = 5000; // 5 second lifespan
      
      // If persistent is set to true, don't do anything.
      if(api.get('show.persistent') === true) { return; }
 
      // Otherwise, start/clear the timer depending on event type
      clearTimeout(api.timer);
      if(event.type !== 'mouseover') {
         api.timer = setTimeout(api.hide, lifespan);
      }
   }
 
   // Utilise delegate so we don't have to rebind for every qTip!
   $(document).delegate('.qtip.jgrowl', 'mouseover mouseout', timer);
   createGrowl(false);
   
   $(window).scroll(function()
{
    
    
updateGrowls();    

/*    $('.qtip.jgrowl:not(:animated)').each(function(i) {
        
    });
  $('#message_box').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 350});*/

});


});






