<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Illuminate\Http\Response;

$router->get('/', function () use ($router) {
  return $router->app->version();
});

$router->get('/hello', function () {
  return 'Hello world!';
});

$name = "John";
$router->get('/hellosomeone', function () use ($name) {
  return "Hello $name";
});

$router->get('/ControllerSample/{name}', "ControllerSample@hello");

$router->get('/getAllUsers', "User@getAllUsers");