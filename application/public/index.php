<?php

use Phalcon\Di\FactoryDefault;
use Phalcon\Loader;
use Phalcon\Mvc\Application;
use Phalcon\Url as UrlProvider;
use Phalcon\Mvc\View;


define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');
require APP_PATH . "/../vendor/autoload.php";
// Register an autoloader
$loader = new Loader();
$loader->registerDirs(
	[
		APP_PATH . '/controllers/',
		APP_PATH . '/models/'
	]
)->register();

$loader->registerClasses(
	[
		'App\Providers\Btc\BtcRequest' => APP_PATH . '/providers/btc/BtcRequest.php',
		'App\Models\Btc' => APP_PATH . '/models/Btc.php',
	]
)->register();

$loader->registerFiles([APP_PATH . '/vendor/autoload.php']);

// Create a DI
$di = new FactoryDefault();

// Setting up the view component
$di['view'] = function () {
	$view = new View();
	$view->setViewsDir(APP_PATH . '/views/');

	return $view;
};

// Setup a base URI so that all generated URIs include the "tutorial" folder
$di['url'] = function () {
	$url = new UrlProvider();
	$url->setBaseUri('/');

	return $url;
};


// Handle the request
try {
	$application = new Application($di);
	$request = new Phalcon\Http\Request();
	echo $application->handle($request->getURI())->getContent();
} catch (Exception $e) {
	echo "Exception: ", $e->getMessage();
}
