<?php
include ( "conexion.php" );

$identificador = $_GET['identi'];
$link = conectar();
$query = "SELECT * FROM coleccion WHERE siIDModelo = '$identificador'";
$qrs = mysql_query($query,$link);
while($csr = mysql_fetch_object ($qrs)){
	$infoArt = 'Modelo que solicita:<br><input name="theArticle" type="text" size="30" value="'.utf8_encode($csr->vcMLinea).' | '.$csr->vcMNombre.'"><br><br>';
}


while($csr = mysql_fetch_object ($qrs)){
	$infoArt = 'Modelo que solicita:<br><input name="theArticle" type="text" size="30" value="'.utf8_encode($csr->vcMLinea).' | '.$csr->vcMNombre.'"><br><br>';
}

$theName    = $_POST['theName'];
$theCity    = $_POST['theCity'];
$thePhone   = $_POST['thePhone'];
$theMail    = $_POST['theMail'];
$theComment = $_POST['theComment'];
$theArticle = $_POST['theArticle'];
$mails=array(
	"sandra.delrio@zarkin.com", 
	"alberto.garibai@zarkin.com", 
	"jorge.rojas@collinscom.com"
	);

if ( $_POST['sendMail'] == 'Enviar' ){
	
	$query = "INSERT INTO contactos VALUES ( null , '$theName', '$theCity', '$thePhone', '$theMail', '$theArticle', '$theComment', null)";
	$qrs = mysql_query($query,$link);

	echo "</script>";
	for ($i=0; $i < count($mails); $i++) {
		// $destino = $mails[$i];
		mail ("$mails[$i]", "Contacto Tutto Pelle", "Nombre: $theName\n\nCiudad: $theCity\n\nTeléfono: $thePhone\n\neMail: $theMail\n\nModelo que solicita: $theArticle\n\nComentarios: $theComment", "From: $theMail");
		echo "console.log('se envio a: $mails[$i]');";
	}
	echo "</script>";
	
	// mail ("contacto@collinscom.com", "Contacto Tutto Pelle", "", "From: $theMail");
	
	// mail ("sandra.delrio@zarkin.com", "Contacto Tutto Pelle", "Nombre: $theName\n\nCiudad: $theCity\n\nTeléfono: $thePhone\n\neMail: $theMail\n\nModelo que solicita: $theArticle\n\nComentarios: $theComment", "From: $theMail");
	// mail ("alberto.garibai@zarkin.com", "Contacto Tutto Pelle", "Nombre: $theName\n\nCiudad: $theCity\n\nTeléfono: $thePhone\n\neMail: $theMail\n\nModelo que solicita: $theArticle\n\nComentarios: $theComment", "From: $theMail");
	echo "<script>parent.$.fancybox.close()</script>";
}else{
	echo "<script> console.log('El correo se enviara a:');";
	for ($i=0; $i < count($mails); $i++) { 
		echo " console.log('	".$mails[$i]."');";
	}
	echo "</script>";
}

?>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript" src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
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
label.error{
	display: inline-block;
	color: #bababa;
}
label.error:before{
	content: "*";
	color: red;
}
</style>
<script type="text/javascript">
$(function() {
	$('#sendMail').click(function(){
		$('#fContacto').validate({
			rules:{
				theName:{
					required:true
				},
				theCity:{
					required:true
				},
				thePhone:{
					number: true,
					rangelength: [7, 10]
				},
				theMail:{
					required: true,
					email: true
				},
				theComment:{
					required: true
				}
			},
			messages:{
				theName:{
					required:"¿Cuál es tu nombre?"
				},
				theCity:{
					required:"¿De donde nos visitas?"
				},
				thePhone:{
					number: "Tu telefono deben ser solo numeros.",
					rangelength: "El telefono debe tener entre 7 y 10 digitos"
				},
				theMail:{
					required: "¿Algun correo para contactarte?",
					email: "No es un correo valido."
				},
				theComment:{
					required: "¿Qué nos quieres compartir?"
				}
			}
		});
	});
});

</script>
<body style="padding: 15px; background-image: url(http://sitios.collinscom.com/tuttopelle/css/images/bg_transparencia.png);">
	<div id="mainFrame">
		<div id="mlCell">
			<h2 id="titles">Servicio a clientes</h2>
			<p id="txtBody">En <b>Tutto Pelle</b> queremos conocer su opini&oacute;n.<br>Por favor, utilice nuestro formulario de contacto para hacernos llegar sus dudas y/o comentarios.</p>
			<div>
				<form action="contacto.php" method="post" name="fContacto" id="fContacto">				
					<div style="padding: 10px; float: left; width: 45%;">
						Nombre:<br><input name="theName" type="name" id="theName" size="30" maxlength="50"><br><br>
						Ciudad:<br><input name="theCity" type="city" size="30" id="theCity" maxlength="30"><br><br>
						Tel&eacute;fono:<br><input name="thePhone" type="tel" id="thePhone" size="30" maxlength="12"><br><br>
					</div>
					<div style="padding: 10px; float: right; width: 45%;">
						Correo electr&oacute;nico:<br><input name="theMail" type="email" id="theMail" size="30" maxlength="50"><br><br>
						<?PHP echo $infoArt; ?>
						Comentarios:<br><textarea name="theComment" id="theComment" cols="28" rows="5"></textarea><br><br>
						<input name="sendMail" type="submit" id="sendMail" value="Enviar"> | <input name="Reset" type="reset" value="Cancelar">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

