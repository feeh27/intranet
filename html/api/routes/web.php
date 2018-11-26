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
    //$router->get('/', ['uses' => 'UserController@permissions']);
});

$router->get('/home', ['as' => 'home','uses' => 'IndexController@home']);

$router->post('/auth/login', 'JWTAuthController@loginPost');

/* Rotas acessíveis somente com autenticação */
//$router->group(['middleware' => ['auth:api', 'jwt.refresh']], function() use ($router) {
$router->group(['middleware' => ['jwt.auth', 'jwt.refresh']], function() use ($router) {
    /* */

    $entities = [
        'profiles'     => ['name' => 'Profile'     , 'uri' => 'profiles'    ],
        'users'        => ['name' => 'User'        , 'uri' => 'users'       ],
        'groups'       => ['name' => 'Group'       , 'uri' => 'groups'      ],
        'groupprofile' => ['name' => 'GroupProfile', 'uri' => 'groupprofile'],
        'methods'      => ['name' => 'Method'      , 'uri' => 'methods'     ],
        'modules'      => ['name' => 'Module'      , 'uri' => 'modules'     ],
        'groupmodule'  => ['name' => 'GroupModule' , 'uri' => 'groupmodule' ],
    ];

    foreach ($entities as $entity) {
        $router->group(['prefix' => $entity['uri']], function () use ($router, $entity) {
            $router->get('/', ['uses' => $entity['name'].'Controller@get']);

            $router->post('/', ['uses' => $entity['name'].'Controller@create']);

            $router->group(['prefix' => '{id:[0-9]+}'], function () use ($router, $entity) {

                $router->get('/', ['uses' => $entity['name'].'Controller@getById']);

                $router->put('/', ['uses' => $entity['name'].'Controller@update']);

                $router->patch('/', ['uses' => $entity['name'].'Controller@update']);

                $router->delete('/', ['uses' => $entity['name'].'Controller@delete']);
            });

            $router->patch('restore/{id:[0-9]+}', ['uses' => $entity['name'].'Controller@restore']);
        });
    }

    /* * /
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
    /* */


    $router->get('/auth/logout', 'JWTAuthController@logout');
    /* * /
    $router->get('/auth/logout', function() {
        Tymon\JWTAuth\JWTAuth::parseToken()->invalidate();
    });
    /* */

    $router->get('/mypermissions', ['uses' => 'UserController@permissions']);
    /**/
});
