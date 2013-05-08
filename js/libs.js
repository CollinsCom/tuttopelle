$(document).ready(function() {
	imgResize(".bg");
	$('nav').delay(500).fadeIn(1000);
	$('a#logo').delay(1000).animate({
		height: '200px'
	}, 500, function() {});

	$("nav ul").accordion({
		event: "click hoverintent",
		heightStyle: "content",
		collapsible: true,
		active: false
	});

//fancybox-------------------------------------------------------------------------------//
	$("a.coleccion").fancybox({
		maxWidth: "80%",
		minWidth: 950,
		maxHeight: "80%",
		minHeight: 450,
		fitToView: true,
		width: 950,
		height: 450,
		autoSize: true,
		closeClick: true,
		openEffect: 'fade',
		closeEffect: 'fade',
		top: 160,
		helpers : { 
		   overlay: {
		    css: {'background': 'url(css/images/bg_transparencia_0.4.png)'} 
		   } // overlay 
		  }, // helpers
		beforeLoad: function() {
			$("#bg_quienesSomos").fadeOut(1000);
		}
	});

	$("a.sucursal").fancybox({
		maxWidth: "80%",
		minWidth: 900,
		maxHeight: "80%",
		minHeight: 350,
		fitToView: true,
		width: 950,
		height: 300,
		autoSize: false,
		closeClick: true,
		openEffect: 'fade',
		closeEffect: 'fade',
		top: 160,		
		beforeClose: function() {
			$("#bg_sucursal").fadeOut('slow');
		}
	});
	$("a.sucursal").click(function() {
		var bgImg = $(this).attr("id");
		$("#bg_sucursal").css("background-image", "url(images/sucursales/" + bgImg + ")");
		$("#bg_sucursal").fadeIn(1000);
		$("#bg_quienesSomos").fadeOut(1000);
	});

	var w = 600;
	var h = 600;			
	var ident;
	$("a.quienesSomos").fancybox({
		width: w,
		height: h,
		minWidth: w,
		minHeight: h,
		autoDimensions: true,
		autoHeight : true,
		autoWidth  : true,
		scrolling: 'no',
		openEffect: "fade",
		closeEffect: "fade",
		beforeLoad: function() {
			this.minWidth  = w;  
			this.minHeight = h;
		},
		beforeClose: function() {
			$("#bg_quienesSomos").fadeOut('slow');
		}
	});
	$("a.quienesSomos").click(function() {
		var bgImg = $(this).attr("bg");
		w = $(this).attr("w");
		h = $(this).attr("h");		
		ident = $(this).attr("id");		
		$("#bg_quienesSomos").css("background-image", "url(images/quienesSomos/" + bgImg + ")");
		$("#bg_quienesSomos").fadeIn(1000);
		$("#bg_sucursal").fadeOut(1000);
	});

	$("a.contacto").fancybox({
		maxWidth: 600,
		minWidth: 600,
		maxHeight: 385,
		minHeight: 385,
		fitToView: true,
		width: 600,
		height: 385,
		autoSize: false,
		autoResize  : true,
		openEffect: 'fade',
		closeEffect: 'fade',
		top: 160,
		helpers : { 
		   overlay: {
		    css: {'background': 'url(css/images/bg_transparencia_0.4.png)'} // or your preferred hex color value
		   } // overlay 
		  } // helpers
	});
	
	$("#especiales").click(function() {
		$.fancybox(['images/especiales/mayo.jpg'], {
			maxWidth: "80%",
			minWidth: 900,
			maxHeight: "80%",
			minHeight: 430,
			fitToView: true,
			width: 900,
			height: 430,
			autoSize: false,
			closeClick: true,
			openEffect: 'fade',
			closeEffect: 'fade',
			top: 160,
			helpers : { 
		   overlay: {
		    css: {'background': 'url(css/images/bg_transparencia_0.4.png)'} // or your preferred hex color value
		   } // overlay 
		  } // helpers
		});
		$("#bg_quienesSomos").fadeOut(1000);
		// $("#fondo1").fadeIn(1000);
		// $("#fondo2").fadeIn(1000);
	});

	
	//fancyBox End----------------------------------------------------------------------------//
	
	$("div#estilos article").click(function() {
		$("#estilos").fadeOut(500);
		$('<div id="fancybox-loading" style="position:absolute; top:50%; left:50%"><div></div></div>').appendTo('body');
		var estilo = $(this).attr('est');
		var categoria = $("div#estilos").attr('cat');
		$.ajax({
			url:'estilos.php',
			data: 'categoria='+categoria+'&estilo='+estilo,
			cache:false,
			method:'get',
			dataType:'html',
			success:function(response){
				$('div#modelos').html(response).fadeIn(500);
				$('#fancybox-loading').remove();
				$("div#modelos div#thumb img.tmb").click(function() {
					var nameFile = $(this).attr('nomArc');
					// var categoria = $('div#thumb').attr('rel');
					var nombreModelo = $(this).attr('alt');
					var description = $(this).attr('title');		
					$(".tmb").css("border", "none");
					$(this).css("border", "1px solid white", "border-right", "0px solid #FFF", "background-color", "#FFF");
					$('div#principal, div#vinetas').fadeOut(500, function() {
						$('#principal img').attr('src', 'images/colecciones/modelos/' + nameFile + '.jpg', 'alt', nombreModelo, 'title', description);

						$('#principal div#frase').html('' + description);

						$('img#vineta').attr('src', 'images/colecciones/vinetas/vineta_' + nameFile + '.png');
						$('#nombreModelo').html(nombreModelo);
						$('#vineta').attr('src', 'images/colecciones/vinetas/vineta_' + nameFile + '.png');
						$('#ft a').attr('href', 'fichas/FT_' + nameFile + '.pdf');
						$('#ft a').html('FT_' + nombreModelo + '.pdf');

						$('div#principal, div#vinetas').fadeIn(500);
					});
				});
				$("p#regresar").click(function() {
					$("#modelos").fadeOut(500, function(){
						$("#estilos").fadeIn(500);
						$('.contenedor').fadeIn(500).jScrollPane();
					});
				});
				$('.contenedor').jScrollPane();
			}
		});
	});

	var fontOriginalSize = 11; // Aqui pones el tamaño de la letra del id "texto"
	var windowOriginalWidth = 1024;

	function recalcula() {
		var t = document.documentElement.clientWidth;
		var newSize = t*fontOriginalSize/windowOriginalWidth;
		el = document.getElementById('texto');
		el.style.fontSize = newSize;
	}
//rotacion del fondo
	var InfiniteRotator = {
		init: function() {
			//initial fade-in time (in milliseconds)
			var initialFadeIn = 1000;
			//interval between items (in milliseconds)
			var itemInterval = 5000;
			//cross-fade time (in milliseconds)
			var fadeTime = 2500;
			//count number of items
			var numberOfItems = $('.bg_img').length;
			//set current item
			var currentItem = 1;
			var nextItem = 2;
			//show first item
			$('.bg_img').eq(currentItem).fadeIn(initialFadeIn);
			//loop through the items
			var infiniteLoop = setInterval(function() {
					$('#fondo2 img').attr('src', 'css/images/bg' + currentItem + '.jpg').show().fadeOut(fadeTime);
					$('#fondo1 img').attr('src', 'css/images/bg' + nextItem + '.jpg');
					currentItem = nextItem;
					if (nextItem == 5) {
						nextItem = 1;
					} else {
						nextItem++;
					}
			}, itemInterval);
		}
	};
	InfiniteRotator.init();	
});


//cambiar tamaño de fondo dependiento dlel tamaño de la pantalla
function imgResize(selector){
 var winW = $(window).width();	
	var winH = $(window).height();	
	var marginH = 0;	
	var marginW = 0;	
	var x = winW/16;	

	if((9*x) < winH){		
		h = winH;		
		w = (winH/9)*16;		
		marginW=(w-winW)/2;				
	}else{		
		w = winW;		
		h = (winW/16)*9;		
		marginH=(h-winH)/2;				
	}
	$(selector).css({
		"width" : function() {return w;},
		"height"  : function() {return h;},
		"margin" : function() {			
			return "-"+marginH+"px -"+marginW+"px";
		}
	});
}

$(window).resize(function(){imgResize(".bg");});

// hoverintent
$.event.special.hoverintent = {
    setup: function() {
      $( this ).bind( "mouseover", jQuery.event.special.hoverintent.handler );
    },
    teardown: function() {
      $( this ).unbind( "mouseover", jQuery.event.special.hoverintent.handler );
    },
    handler: function( event ) {
      var currentX, currentY, timeout,
        args = arguments,
        target = $( event.target ),
        previousX = event.pageX,
        previousY = event.pageY;
 
      function track( event ) {
        currentX = event.pageX;
        currentY = event.pageY;
      };
 
      function clear() {
        target
          .unbind( "mousemove", track )
          .unbind( "mouseout", clear );
        clearTimeout( timeout );
      }
 
      function handler() {
        var prop,
          orig = event;
 
        if ( ( Math.abs( previousX - currentX ) +
            Math.abs( previousY - currentY ) ) < 7 ) {
          clear();
 
          event = $.Event( "hoverintent" );
          for ( prop in orig ) {
            if ( !( prop in event ) ) {
              event[ prop ] = orig[ prop ];
            }
          }
          // Prevent accessing the original event since the new event
          // is fired asynchronously and the old event is no longer
          // usable (#6028)
          delete event.originalEvent;
 
          target.trigger( event );
        } else {
          previousX = currentX;
          previousY = currentY;
          timeout = setTimeout( handler, 100 );
        }
      }
 
      timeout = setTimeout( handler, 100 );
      target.bind({
        mousemove: track,
        mouseout: clear
      });
    }
  };