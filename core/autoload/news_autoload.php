<?php

function news_autoload( $className ) {
	$root      = $_SERVER['DOCUMENT_ROOT'];
	$className = str_replace( '\\', DIRECTORY_SEPARATOR, $className );
	$path      = $root . '/../core/' . $className . '.php';
	if ( file_exists( $path ) ) {
		require_once $path;
	} else {
		die( 'Class [' . $className . '] not found' );
	}

}

spl_autoload_register( 'news_autoload' );
