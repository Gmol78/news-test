<?php
/**
 * User: igor
 * Date: 19.09.18
 * Time: 12:20
 */

ini_set( 'error_reporting', E_ALL );
ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );

try {
	require_once '../core/autoload/news_autoload.php';

	$controller = new \controllers\ListPageController();

	$view = new \views\BaseView();

	$view->setTitle( 'новости' );


	$controller->process( $view );
} catch ( \exceptions\HttpException $exception ) {
	header($_SERVER['SERVER_PROTOCOL']." 404 Not Found");
	echo '404';
}
catch (\Exception $exception){
	echo $exception->getMessage();
}






