<?php 
include_once('funciones.php');
get_head('Index','Tutto Pelle | 404');
get_header();
index();
?>
<link rel="stylesheet" href="css/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />
<style>
	.fancybox-inner{background: #4d4d45;}
	#404 h1{padding: 1em; text-align: center; text-transform: uppercase; font-weight: bold; font-size: 18px;}
</style>
<div id="404" style="display: none;">
	<img src="images/logo.png">
	<h1>archivo no encontrado</h1>
</div>
<?php
get_footer();
?>
<script>
$(document).ready(function() {
	$.fancybox(['#404'], {
		closeClick: true,
		openEffect: 'fade',
		closeEffect: 'fade',
		top: 160,
		helpers : { 
	 		overlay: {
	  		css: {'background': 'none'} // or your preferred hex color value
	 		} // overlay 
		}, // helpers
		beforeClose: function() {
			window.location.href = "./";
		}
	});	
});
</script>	
