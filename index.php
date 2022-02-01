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


$router->get("/books/:id", "App\Controller\BookController@show");

$router->get("/book", "App\Controller\BookController@add");
$router->post("/book", "App\Controller\BookController@add");

$router->get("/book/:id", "App\Controller\BookController@modify");
$router->post("/book/:id", "App\Controller\BookController@modify");

$router->get("/note/:id", "App\Controller\NoteController@add");
$router->post("/note/:id", "App\Controller\NoteController@add");

$router->get("/deletebook/:id", "App\Controller\BookController@delete");
$router->get("/deletenote/:id", "App\Controller\NoteController@delete");

$router->run();