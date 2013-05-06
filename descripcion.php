<?php
include ( "includes/conexion.ini.php" );

$identificador = $_GET['identi'];

$sql = "SELECT * FROM coleccion WHERE siIDModelo = '$identificador'";
$qrs = mysql_query ( $sql ) or die ( mysql_error () );
while( $csr = mysql_fetch_object ( $qrs ) ){

	$identiCateg = utf8_encode( $csr->vcMLinea );
	$identiTitle = utf8_encode( $csr->vcMNombre );
	$identiCompo = utf8_encode( $csr->vcMComp );
	$identiColor = utf8_encode( $csr->vcMColor );
	$identiImage = $csr->vcMImg;
	$identiCarac = utf8_encode( $csr->txMCaracteristicas );
	$identiMedid = $csr->vcMImg."-medidas.jpg";

	$paginador = $csr->vcMLinea;

	$clrs_alt = utf8_encode($csr->vcMLinea);
	$mdls_alt = utf8_encode($csr->vcMNombre);

	if($clrs_alt == "Minimalistas" || $clrs_alt == "Recámaras" || $clrs_alt == "Reclinables" || $clrs_alt == "Relax" || $clrs_alt == "Robotics" || $clrs_alt == "Sofá-camas" || $clrs_alt == "Piel-Tela" || $clrs_alt == "Zetta" || $clrs_alt == "Accesorios" || $mdls_alt == "Bianca" || $mdls_alt == "Pionini"){
		$identiCalte = "";
	}else{
		$identiCAlte = "<p>Color(es):</p><a href='#' id='btColOpt01'><img src='images/coleccion/".$csr->vcMImg."A.jpg' border='1' width='60'></a><a href='#' id='btColOpt02'><img src='images/coleccion/".$csr->vcMImg."B.jpg' border='1' width='60'></a><a href='#' id='btColOpt03'><img src='images/coleccion/".$csr->vcMImg."C.jpg' border='1' width='60'></a><a href='#' id='btColOpt04'><img src='images/coleccion/".$csr->vcMImg."D.jpg' border='1' width='60'></a><br><hr>";
	}
}

$history = $_SERVER['HTTP_REFERER'];

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Tutto Pelle.Especialistas en Muebles de Piel.</title>

<link rel="stylesheet" type="text/css" href="css/tPelleStyle.css" media="screen, projection">
<!--[if lte IE 7]>
	<link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" />
<![endif]-->

</head>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.js"></script>

<script type="text/javascript">
$(document).ready(function() {
// Handler for .ready() called.


$('#btColOpt01').click(function() {
/*alert('imagen01');*/
	$("#imgColOpt01").show();
	$("#imgColOpt02").hide();
	$("#imgColOpt03").hide();
	$("#imgColOpt04").hide();
}

);


$("#btColOpt02").click(function(){

	$("#imgColOpt01").hide();
	$("#imgColOpt02").show();
	$("#imgColOpt03").hide();
	$("#imgColOpt04").hide();
}

);

$("#btColOpt03").click(function(){

	$("#imgColOpt01").hide();
	$("#imgColOpt02").hide();
	$("#imgColOpt03").show();
	$("#imgColOpt04").hide();
}

);

$("#btColOpt04").click(function(){

	$("#imgColOpt01").hide();
	$("#imgColOpt02").hide();
	$("#imgColOpt03").hide();
	$("#imgColOpt04").show();
}

);

});
</script>

<body>

<div id="mainCell">

	<div id="headerCell"><a href="./" target="_self"><img src="images/layout/spacer.gif" border="0" width="260" height="160"></a></div>

	<?PHP include( 'includes/mainMenu.php' ); ?>

	<div id="contentAreaCell">

		<div id="pathNavCell">

			<div id="titleColle"><b><?PHP echo $identiCateg; ?></b></div>
			<!--<div id="titleArtic"><b><?PHP echo $identiTitle; ?></b></div>-->

			<div id="snCell">
			<a href="http://www.facebook.com/tuttopellemx" target="_blank"><img src="images/layout/imgIcFacebook.jpg" border="0"></a>
			<a href="http://www.twitter.com/tuttopellemx" target="_blank"><img src="images/layout/imgIcTwitter.jpg" border="0"></a>
			</div>

		</div>

		<div id="mainFrame">

			<div id="mrCell">

				<?PHP //echo $identiCAlte; ?>
				<p>Medidas:</p><img src="images/coleccion/<?PHP echo $identiMedid; ?>" border="0" width="140" height="320"><hr>
				<p>&iquest;Desea m&aacute;s informaci&oacute;n acerca de este modelo?<br>Haga click <a href="servicio-clientes.php?identi=<?PHP echo $identificador ?>" target="_blank"><b>aqu&iacute;</b></a></p>

			</div>
			<div id="mlCell">

<?PHP
$ant = mysql_query("SELECT * FROM coleccion WHERE vcMLinea='$paginador' AND siIDModelo < $identificador ORDER BY siIDModelo DESC LIMIT 0,1") or die(mysql_error());
$sig = mysql_query("SELECT * FROM coleccion WHERE vcMLinea='$paginador' AND siIDModelo > $identificador ORDER BY siIDModelo ASC LIMIT 0,1") or die(mysql_error());

$numAnt = mysql_num_rows($ant);
$numSig = mysql_num_rows($sig);

if($numAnt > 0){

	while($as=mysql_fetch_array($ant)){
	extract($as);

	?><a href="descripcion.php?identi=<?php echo $siIDModelo?>">Anterior</a><?PHP
	}
}

if($numAnt > 0 && $numSig > 0){
	echo " | ";
}

if($numSig > 0){

	while($as=mysql_fetch_array($sig)){

	extract($as);

	?><a href="descripcion.php?identi=<?PHP echo $siIDModelo?>">Siguiente</a><?PHP

	}
}

?>

				<img style="display:block;" id="imgColOpt01" src="images/coleccion/<?PHP echo $identiImage."A.jpg"; ?>" border="0" width="720" height="360">
				<img style="display:none;" id="imgColOpt02" src="images/coleccion/<?PHP echo $identiImage."B.jpg"; ?>" border="0" width="720" height="360">
				<img style="display:none;" id="imgColOpt03" src="images/coleccion/<?PHP echo $identiImage."C.jpg"; ?>" border="0" width="720" height="360">
				<img style="display:none;" id="imgColOpt04" src="images/coleccion/<?PHP echo $identiImage."D.jpg"; ?>" border="0" width="720" height="360">

				<p id="titles"><?PHP echo $identiTitle; ?></p><hr><?PHP echo nl2br($identiCarac); ?>
			</div>

		</div>

	</div>

	<div id="footerCell">

		<p id="legal">Derechos Reservados 2011 &reg; <b>Tutto Pelle</b> | Especialistas en Muebles de Piel | <a href="http://www.collinscom.com/" target="_blank"><b>Collinscom</b>.com</a></p><br>
		<img src="images/layout/logo-byZarkin.jpg" border="0">

	</div>

</div>

</body>
</html>