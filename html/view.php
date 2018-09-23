<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 22.09.18
 * Time: 9:57
 */

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

try {

	require_once '../core/autoload/news_autoload.php';

	$controller = new \controllers\SinglePageController();

	$view = new \views\BaseView();

	$view->setTitle( 'новость' );

	$controller->process( $view );
}
catch ( \exceptions\HttpException $exception ) {
	header($_SERVER['SERVER_PROTOCOL']." 404 Not Found");
	echo '404';
}
catch (\Exception $exception){
	echo $exception->getMessage();
}

