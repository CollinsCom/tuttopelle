<?php
include_once('conexion.php');
echo '<script type="text/javascript" src="js/jquery.jscrollpane.js"></script>';
echo '<script type="text/javascript" src="js/libs.js"></script>';
echo '<script type="text/javascript" src="js/jquery.mousewheel.js"></script>';
echo '<link rel="stylesheet" href="css/jquery-ui.css" type="text/css" media="screen" />';
$mod = $_GET[modelo];
$cat = $_GET[categoria];
$est = $_GET[estilo];
$n_modelo;
$nombreArch;
$nombreArch1;
$description1;
$link = conectar();
$query = "SELECT modelo, composicion, txtDescription FROM modelos WHERE estilo = '".$est."' AND categoria = '".$cat."' AND mostrar = true GROUP BY modelo ORDER BY id_modelo ASC;";
$modelos = mysql_query($query,$link);
echo '<div id="thumb" rel="'.$cat.'">';
echo '<div class="contenedor" style="height: 410px; width: 125px;">';
// $first = true;
while ($modelo = mysql_fetch_array($modelos)) {					
	if($modelo[composicion] == "modulares"){
		$catT= $modelo[composicion];
	}else{
		$catT= $cat;
	}
	$nombreArch = $catT.$modelo[modelo];
	// if($mod == $modelo[modelo])
	if($modelo[modelo] == $mod){
		$n_modelo = $modelo[modelo];
		$description = $modelo[txtDescription];
		$nombreArch1 = $nombreArch;
		echo '<h3>'.$modelo[modelo].'</h3>';
		echo '<img nomArc="'.$nombreArch.'" title="'.$modelo[txtDescription].'" src="data:image/jpg;base64, '.base64_encode(file_get_contents("images/colecciones/tmb/tmb_".$nombreArch.".jpg")).'" alt="'.$modelo[modelo].'" class="tmb" style="border:1px solid white">';
		$first = false;
	}else{
		echo '<h3>'.$modelo[modelo].'</h3>';
		echo '<img nomArc="'.$nombreArch.'" title="'.$modelo[txtDescription].'" src="data:image/jpg;base64, '.base64_encode(file_get_contents("images/colecciones/tmb/tmb_".$nombreArch.".jpg")).'" alt="'.$modelo[modelo].'" class="tmb">';
	}
}
$encode_img = base64_encode(file_get_contents("images/colecciones/vinetas/vineta_".$nombreArch1.".png"));
?>
</div>
</div>
<p id="regresar" >Regresar</a>
<div id="principal">
	<img  src='images/colecciones/modelos/<?php echo $nombreArch1; ?>.jpg' alt="<?php echo $n_modelo;?>" title="<?php echo $nombreArch1.".jpg"; ?>">
	<div id="frase"><?php echo $description; ?></div>
</div>
<div id="vinetas">
	<hgroup>
		<h1 id="nombreModelo"><?php echo $n_modelo;?></h1>
		<h2 class="estilo"><?php echo $est;?></h2>
		<!-- <h3 id="claveComposicion"></h3> -->
	</hgroup>
	<img id="vineta" src="data:image/png;base64,<?php echo $encode_img; ?>" alt="Vi&ntilde;eta <?php echo $n_modelo;?>" onerror="this.src='images/colecciones/vinetas/vineta.png';">	
	<span>Si deseas más información de este modelo, descarga la ficha técnica</span>
	<div id="ft"><img src="images/icon_pdf.png" alt="icono pdf"><a href="fichas/FT_<?php echo $nombreArch1; ?>.pdf" target=_blank>FT_<?php echo $n_modelo; ?>.pdf</a></div>
</div>