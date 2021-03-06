<?php

// Routes
define("DIR_ROOT", __DIR__);
define("SYSTEM", DIR_ROOT . "/system/");
define("MODEL", DIR_ROOT . "/src/model/");
define("CONTROLLER", DIR_ROOT . "/src/controller/");
define("VIEW", DIR_ROOT . "/src/view/");

// Engine
require SYSTEM . "engine/Router.php";
require SYSTEM . "engine/Controller.php";
require SYSTEM . "engine/SessionSecureHandler.php";
require SYSTEM . "engine/Errors.php";
require SYSTEM . "engine/AutoLoader.php";

// AutoLoader
$loader = new Psr4AutoLoaderClass();
$loader->register();
$loader->addNamespace('Controller', DIR_ROOT.'/controller');
$loader->addNamespace('Model', DIR_ROOT.'/model');
$loader->addNamespace('Library', DIR_ROOT.'/system/library');

// Startup
require SYSTEM . "startup.php";

// Controller
$Controller = new Controller($router->controller);
$Controller->execController();
