<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register the API routes for your application as
| the routes are automatically authenticated using the API guard and
| loaded automatically by this application's RouteServiceProvider.
|
*/



Route::group([
    'middleware' => ['auth:api']
], function () {


    //Route::post('items', 'ListItemController@create');

    
    //
});

Route::get('items/{item}/delete', 'ListItemController@delete')->middleware('client');

Route::post('items', 'ListItemController@create')->middleware('client');

Route::get('lists', 'UserListController@list')->middleware('client'); 

Route::get('lists/{list}', 'UserListController@load')->middleware('client');

Route::post('lists', 'UserListController@create')->middleware('client');

Route::get('lists/{list}/delete', 'UserListController@delete')->middleware('client');

Route::get('items/{item}/complete', 'ListItemController@complete')->middleware('client');
