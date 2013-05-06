<?php

// Definicion de constantes...
	define ( "SERVER", 'localhost' );
	define ( "DB_NAME", 'tuttoPelle2011' );
	define ( "DB_USER", 'tuttoPelle' );
	define ( "DB_PWD", 'admDB2011' );

// Conexion al motor de base de datos...
	$conexion = mysql_connect ( SERVER, DB_USER, DB_PWD ) or die ( mysql_error () );
// Seleccion de la base de datos... 
	mysql_select_db ( DB_NAME, $conexion ) or die ( mysql_error() );

?>
