<?php
include ( "includes/conexion.ini.php" );

$identificador = $_GET['identi'];

$sql = "SELECT * FROM coleccion WHERE siIDModelo = '$identificador'";
$qrs = mysql_query ( $sql ) or die ( mysql_error () );
while( $csr = mysql_fetch_object ( $qrs ) ){

	$infoArt = 'Modelo que solicita:<br><input name="theArticle" type="text" size="30" value="'.utf8_encode($csr->vcMLinea).' | '.$csr->vcMNombre.'"><br><br>';

}

$theName=$_POST['theName'];
$theCity=$_POST['theCity'];
$thePhone=$_POST['thePhone'];
$theMail=$_POST['theMail'];
$theComment=$_POST['theComment'];
$theArticle=$_POST['theArticle'];

if ( $_POST['sendMail'] == 'Enviar' ){
	mail ("contacto@collinscom.com", "Contacto Tutto Pelle", "From: $theMail");
	mail ("jackie@tuttopelle.com.mx", "Contacto Tutto Pelle", "Nombre: $theName\n\nCiudad: $theCity\n\nTeléfono: $thePhone\n\neMail: $theMail\n\nModelo que solicita: $theArticle\n\nComentarios: $theComment", "From: $theMail");
	mail ("aide.contreras@zarkin.com", "Contacto Tutto Pelle", "Nombre: $theName\n\nCiudad: $theCity\n\nTeléfono: $thePhone\n\neMail: $theMail\n\nModelo que solicita: $theArticle\n\nComentarios: $theComment", "From: $theMail");

//	mail ("hugo@collinscom.com", "Contacto Tutto Pelle", "Nombre: $theName\n\nCiudad: $theCity\n\nTeléfono: $thePhone\n\neMail: $theMail\n\nModelo que solicita: $theArticle\n\nComentarios: $theComment", "From: $theMail");
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Tutto Pelle.Especialistas en Muebles de Piel.</title>

<!--<link rel="stylesheet" type="text/css" href="css/tPelleStyle.css">-->

<link rel="stylesheet" type="text/css" href="css/tPelleStyle.css" media="screen, projection">
<!--[if lte IE 7]>
	<link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" />
<![endif]-->

</head>

<body>

<div id="mainCell">

	<div id="headerCell"><a href="/" target="_self"><img src="images/layout/spacer.gif" border="0" width="260" height="160"></a></div>

	<?PHP include( 'includes/mainMenu.php' ); ?>

	<div id="contentAreaCell">

		<div id="pathNavCell">

			<div id="snCell">
			<a href="http://www.facebook.com/tuttopellemx" target="_blank"><img src="images/layout/imgIcFacebook.jpg" border="0"></a>
			<a href="http://www.twitter.com/tuttopellemx" target="_blank"><img src="images/layout/imgIcTwitter.jpg" border="0"></a>
			</div>

		</div>

		<div id="mainFrame">

			<div id="mlCell">
			<p id="titles">Servicio a clientes.</p>
			<p id="txtBody">En <b>Tutto Pelle</b> queremos conocer su opini&oacute;n.<br>Por favor, utilice nuestro formulario de contacto para hacernos llegar sus dudas y/o comentarios.</p>
			<div>
			<form action="servicio-clientes.php" method="post" name="fContacto" id="fContacto">
				
				Nombre:<br><input name="theName" type="text" id="theName" size="30" maxlength="50"><br><br>
				Ciudad:<br><input name="theCity" type="text" size="30" id="theCity" maxlength="30"><br><br>
				Tel&eacute;fono:<br><input name="thePhone" type="text" id="thePhone" size="30" maxlength="12"><br><br>
				Correo electr&oacute;nico:<br><input name="theMail" type="text" id="theMail" size="30" maxlength="50"><br><br>
				<?PHP echo $infoArt; ?>
				Comentarios:<br><textarea name="theComment" id="theComment" cols="28" rows="5"></textarea><br><br>
				<input name="sendMail" type="submit" id="sendMail" value="Enviar"> | <input name="Reset" type="reset" value="Cancelar">
			</form>
			</div>

			</div>

		</div>

<!--		<div id="sprtrCell">&nbsp;</div>

		<div id="scndFrame">

			<div id="lCell"><p id="titles">Bienvenido a <b>Tutto Pelle</b> la &uacute;nica cadena especialista en Muebles de Piel en M&eacute;xico.</p><p id="txtBody">La mayor variedad de modelos y colores en piel que puede encontrar en el Pa&iacute;s.<br><br>Contamos con un mueble para cada estilo de vida. Lo invitamos a conocer nuestra colecci&oacute;n. Aqu&iacute; podr&aacute; encontrar todo acerca del cuidado de sus muebles y conocer m&aacute;s sobre la piel genuina.</p></div>
			<div id="rCell"><a href="#" target="_self"><img src="imgs/layout/imgSF-02.jpg" border="0"></a><br><p id="titles">Certificado de autenticidad</p><p id="txtBody">Tutto Pelle certifica que usted ha adquirido un aut&eacute;ntico mueble <b>Zarkin</b>, 100% tapizado en piel, elaborado bajo el m&aacute;s estricto control de calidad.<br><a href="#" target="_self"><b>M&aacute;s...</b></a></p></div>

		</div>-->

	</div>

	<div id="footerCell">

		<p id="legal">Derechos Reservados 2011 &reg; <b>Tutto Pelle</b> | Especialistas en Muebles de Piel | <a href="http://www.collinscom.com/" target="_blank"><b>Collinscom</b>.com</a></p><br>
		<img src="images/layout/logo-byZarkin.jpg" border="0">

	</div>

</div>

</body>
</html>