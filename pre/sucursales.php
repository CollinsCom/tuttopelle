<?php
include ( "includes/conexion.ini.php" );

if ( isset( $_GET['siIdSucursal'] ) ){
	$sql = "SELECT * FROM sucursales WHERE siIdSucursal = '{$_GET['siIdSucursal']}'";
	$qrs = mysql_query ( $sql ) or die ( mysql_error () );
	$csr = mysql_fetch_object ( $qrs );	

	$siIdSucursal = $csr->siIdSucursal;
	$vcNSucursal = utf8_encode( $csr->vcNSucursal );
	$vcDireccion = utf8_encode( $csr->vcDireccion );
	$vcTels = utf8_encode( $csr->vcTels );
	$vcNCiudad = utf8_encode( $csr->vcNCiudad );
	$vcNEstado = utf8_encode( $csr->vcNEstado );
	$vcContacto = utf8_encode( $csr->vcContacto );
	$vcPImg = $csr->vcPImg;
	$vcMapa = $csr->vcMapa;
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

			<div id="mlCell" style="width:880px;">
			<div style="width:320px; padding:10px; float:right; clear:both;"><?PHP echo $vcMapa; ?></div>
			<p id="txtBody">Siempre cerca de usted, <b>Tutto Pelle</b> presente en las principales ciudades del pa&iacute;s.
							<br><br>
							<img src="images/sucursales/<?php echo $vcPImg ?>" border="0" width="480" height="320"><br><br>
							<b><?php echo $vcNSucursal ?></b><br>
							Direcci&oacute;n: <b><?php echo $vcDireccion ?></b><br>
							Tel&eacute;fono(s): <b><?php echo $vcTels ?></b><br>
							Ciudad: <b><?php echo $vcNCiudad ?></b><br>
							Estado: <b><?php echo $vcNEstado ?></b><hr></p>
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