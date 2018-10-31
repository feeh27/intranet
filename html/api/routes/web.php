<?php

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('auth/login', ['uses' => 'AuthController@authenticate']);


/* Rotas acessíveis somente com autenticação */
$router->group(['middleware' => 'jwt.auth'], function() use ($router) {

    $router->group(['prefix' => 'users'], function () use ($router) {

        $router->get('/', ['uses' => 'UserController@get']);

        $router->post('/', ['uses' => 'UserController@create']);

        $router->group(['prefix' => '{id:[0-9]+}'], function () use ($router) {

            $router->get('/', ['uses' => 'UserController@getById']);

            $router->put('/', ['uses' => 'UserController@update']);

            $router->patch('/', ['uses' => 'UserController@update']);

            $router->delete('/', ['uses' => 'UserController@delete']);
        });

        $router->patch('restore/{id:[0-9]+}', ['uses' => 'UserController@restore']);

    });
});