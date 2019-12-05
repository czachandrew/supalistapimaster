<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@show');

Route::get('/home', 'HomeController@show');

Route::get('/redirect', function(){
    $query = http_build_query([
        'client_id' => '1',
        'redirect_uri' => '/test',
        'response_type' => 'token',
        'scope' => ''
    ]);
    return redirect('/oauth/authorize?'.$query);
});

Route::get('/lists', 'UserListController@list')->middleware('client');

Route::post('/items', 'ListItemController@create')->middleware('client');
