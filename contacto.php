<?php
include ( "conexion.php" );

$identificador = $_GET['identi'];
$link = conectar();
$query = "SELECT * FROM coleccion WHERE siIDModelo = '$identificador'";
$qrs = mysql_query($query,$link);
while($csr = mysql_fetch_object ($qrs)){
	$infoArt = 'Modelo que solicita:<br><input name="theArticle" type="text" size="30" value="'.utf8_encode($csr->vcMLinea).' | '.$csr->vcMNombre.'"><br><br>';
}

$theName=$_POST['theName'];
$theCity=$_POST['theCity'];
$thePhone=$_POST['thePhone'];
$theMail=$_POST['theMail'];
$theComment=$_POST['theComment'];
$theArticle=$_POST['theArticle'];

if ( $_POST['sendMail'] == 'Enviar' ){
	// mail ("contacto@collinscom.com", "Contacto Tutto Pelle", "From: $theMail");
	mail ("jorge.rojas@collinscom.com", "Contacto Tutto Pelle", "Nombre: $theName\n\nCiudad: $theCity\n\nTeléfono: $thePhone\n\neMail: $theMail\n\nModelo que solicita: $theArticle\n\nComentarios: $theComment", "From: $theMail");
	mail ("sandra.delrio@tuttopelle.com.mx", "Contacto Tutto Pelle", "Nombre: $theName\n\nCiudad: $theCity\n\nTeléfono: $thePhone\n\neMail: $theMail\n\nModelo que solicita: $theArticle\n\nComentarios: $theComment", "From: $theMail");
	mail ("alberto.garibai@tuttopelle.com.mx", "Contacto Tutto Pelle", "Nombre: $theName\n\nCiudad: $theCity\n\nTeléfono: $thePhone\n\neMail: $theMail\n\nModelo que solicita: $theArticle\n\nComentarios: $theComment", "From: $theMail");	

	//	mail ("hugo@collinscom.com", "Contacto Tutto Pelle", "Nombre: $theName\n\nCiudad: $theCity\n\nTeléfono: $thePhone\n\neMail: $theMail\n\nModelo que solicita: $theArticle\n\nComentarios: $theComment", "From: $theMail");
	echo "<script>parent.$.fancybox.close()</script>";
}

?>
<script type="text/javascript" src="css/style.css"></script>
<style>
*{
	color: #ffffff;
	font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
	font-size: 13px;
	letter-spacing: 1px;
	text-decoration: none;
	-webkit-text-size-adjust:none;
	outline:none !important;
}

input, textarea{
	color: #000000;
}
h2{
	font-size: 20px;
	text-transform: uppercase;
	padding-left: 10px;
	font-weight: normal;
}
p{
	padding-left: 10px;
}
</style>
<body style="padding: 15px; background-image: url(http://sitios.collinscom.com/tuttopelle/css/images/bg_transparencia.png);">
	<div id="mainFrame">
		<div id="mlCell">
			<h2 id="titles">Servicio a clientes</h2>
			<p id="txtBody">En <b>Tutto Pelle</b> queremos conocer su opini&oacute;n.<br>Por favor, utilice nuestro formulario de contacto para hacernos llegar sus dudas y/o comentarios.</p>
			<div>
				<form action="contacto.php" method="post" name="fContacto" id="fContacto">				
					<div style="padding: 10px; float: left; width: 45%;">
						Nombre:<br><input name="theName" type="text" id="theName" size="30" maxlength="50"><br><br>
						Ciudad:<br><input name="theCity" type="text" size="30" id="theCity" maxlength="30"><br><br>
						Tel&eacute;fono:<br><input name="thePhone" type="text" id="thePhone" size="30" maxlength="12"><br><br>
					</div>
					<div style="padding: 10px; float: right; width: 45%;">
						Correo electr&oacute;nico:<br><input name="theMail" type="text" id="theMail" size="30" maxlength="50"><br><br>
						<?PHP echo $infoArt; ?>
						Comentarios:<br><textarea name="theComment" id="theComment" cols="28" rows="5"></textarea><br><br>
						<input name="sendMail" type="submit" id="sendMail" value="Enviar"> | <input name="Reset" type="reset" value="Cancelar">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

