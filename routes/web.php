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

$router->post('provinces', 'AdministrativeAreaController@getProvinces');
$router->post('cities', 'AdministrativeAreaController@getCities');
$router->post('districts', 'AdministrativeAreaController@getDistricts');
$router->post('sub_districts', 'AdministrativeAreaController@getSubDistricts');
