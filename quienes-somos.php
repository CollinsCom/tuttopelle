<?php
include_once('funciones.php');
get_head('Quienes Somos','Tutto Pelle | Inicio');
quienesSomos();

// include_once('conexion.php');
// echo '<script type="text/javascript" src="js/libs.js"></script>';
// $link = conectar();
// $query = "SELECT * FROM quienesSomos WHERE seccion = '".$_GET[seccion]."' ORDER BY id ASC;";
// $reslt = mysql_query($query,$link);
// $seccion = mysql_fetch_array($reslt);
// list($w, $h) = explode(",",$seccion[cssInfo]);

// echo '<div id="texto" bg="'.$seccion[imgFondo].'" style="width:'.($w-20).'px; height:'.($h-20).'px;" ><h1>'.$seccion[titulo].'</h1>'.$seccion[contenido].'</div>'
?>
<script>
	// $.fancybox(['#texto'], {
	// 	// width: '.$w.',
	// 	// height: '.$h.',
	// 	// minWidth: '.$w.',
	// 	// minHeight: '.$h.',
	// 	scrolling: 'no',
	// 	fitToView: true,
	// 	autoSize: true,
	// 	openEffect: "fade",
	// 	closeEffect: "fade",
	// 	beforeClose: function() {
	// 	}
	// });
</script>
<?php
// // echo $seccion[seccion].$seccion[titulo].$seccion[contenido].$seccion[imgFondo].$seccion[cssInfo];
// echo '<div id="texto" bg="'.$seccion[imgFondo].'" style="width:'.($w-20).'px; height:'.($h-20).'px;" ><h1>'.$seccion[titulo].'</h1>'.$seccion[contenido].'</div>';
// echo '<script>';
// echo "	$.fancybox(['#texto'], {";
// echo '		width: '.$w.',';
// echo '		height: '.$h.',';
// echo '		minWidth: '.$w.',';
// echo '		minHeight: '.$h.',';
// echo "		scrolling: 'no',";
// echo '		fitToView: true,';
// echo '		autoSize: true,';
// echo '		openEffect: "fade",';
// echo '		closeEffect: "fade",';
// // echo '		helpers : {overlay : {css : {"background" : "rgba(77, 77, 76, 0.0)"}}},';
// // echo '		beforeLoad: function() {';
// // echo '			$("#bg_quienesSomos").fadeIn(1000);';
// // echo '			mostrarBg = 2;';
// // echo '			$("#fondo1").fadeOut(1000);';
// // echo '			$("#fondo2").fadeOut(1000);';
// // echo '		},';
// echo '		beforeClose: function() {';
// echo "			$('#bg_quienesSomos').fadeOut(1000);";
// // echo '			mostrarBg = 1;';
// echo '		}';
// echo '	});';
// echo '</script>';
?>