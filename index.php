<?php

namespace App;

session_start();

require_once('vendor/autoload.php');

use Router\Router;
$router = new Router($_GET['url']);

$router->get("/", "App\Controller\AppController@index");

$router->get("/user", "App\Controller\UserController@add");
$router->post("/user", "App\Controller\UserController@add");

$router->get("/user/:id", "App\Controller\UserController@modify");
$router->post("/user/:id", "App\Controller\UserController@modify");

$router->get("/deleteuser/:id", "App\Controller\UserController@delete");

$router->run();