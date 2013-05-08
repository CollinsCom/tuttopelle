<?php

function conectar(){
	//datos servidor collins
	define ('DB_USER', 'jorge');
	define ('DB_PASSWORD', 'collins123');
	define ('DB_HOST', 'collinscom.com');
	define ('DB_NAME', 'tutto_pelle');

	//datos servidor tutto pelle
	// define ( "SERVER", 'localhost' );
	// define ( "DB_NAME", 'tuttoPelle2011' );
	// define ( "DB_USER", 'tuttoPelle' );
	// define ( "DB_PWD", 'admDB2011' );

	$link = @mysql_connect (DB_HOST, DB_USER, DB_PASSWORD) OR die ('Could not connect to MySQL: ' . mysql_error() );
	@mysql_select_db (DB_NAME) OR die ('Could not select the database: ' . mysql_error() );
	mysql_set_charset('utf8',$link);
	
	return $link;
}

/*
para phpMyAdmin
https://p3nlmysqladm001.secureserver.net/grid50/3061/index.php?uniqueDnsEntry=isactaz123.db.9117586.hostedresource.com
*/
?>