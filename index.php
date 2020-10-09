<?php

	namespace Core;
    session_start();

//    phpinfo();
//    exit;

	error_reporting(E_ALL);
	ini_set('display_errors', 'on');


    $config = require_once __DIR__ . '/config.inc.php';

        spl_autoload_register(function($class) {

            $path = $_SERVER['DOCUMENT_ROOT'].'/project/assets/functions/*';
            foreach(glob($path) as $file) {
                require_once $file;
            }

        $path = $_SERVER['DOCUMENT_ROOT'].'/core/*';
        foreach(glob($path) as $file) {
            require_once $file;
        }

        $path = $_SERVER['DOCUMENT_ROOT'].'/project/controllers/*';
        foreach(glob($path) as $file) {
            require_once $file;
        }

        $path = $_SERVER['DOCUMENT_ROOT'].'/project/models/*';
        foreach(glob($path) as $file) {
            require_once $file;
        }

	});

    $app = new Application($config);

    $routes = require $_SERVER['DOCUMENT_ROOT'] . '/project/config/routes.php';

	$track = ( new Router )      -> getTrack($routes, $_SERVER['REQUEST_URI']);
	$page  = ( new Dispatcher )  -> getPage($track);


	echo (new View) -> render($page);
