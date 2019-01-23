<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('/', function (){
    return str_random(32);
});
                                    /* Accounts */
$router->post('/accounts', ['uses' => 'AccountsController@createAccounts']);
$router->get('/accounts', ['uses' => 'AccountsController@getAllAccounts']);
$router->put('/accounts', ['uses' => 'AccountsController@updateAccounts']);

                                    /* Systems */
$router->post('/systems', ['uses' => 'SystemsController@createSystems']);
$router->get('/systems', ['uses' => 'SystemsController@getSystems']);
$router->put('/systems', ['uses' => 'SystemsController@updateSystems']);
