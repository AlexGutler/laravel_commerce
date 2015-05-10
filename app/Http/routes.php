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

// Rotas admin
Route::group(['prefix' => 'admin', 'where' => ['id' => '[0-9]+']], function(){
    // categories routes
    Route::group(['prefix' => 'categories'], function(){
        Route::get('', ['as' => 'admin.categories.index', 'uses' => 'AdminCategoriesController@index']);
        Route::post('', ['as' => 'admin.categories.store', 'uses' => 'AdminCategoriesController@store']);
        Route::get('/create', ['as' => 'admin.categories.create', 'uses' => 'AdminCategoriesController@create']);
        Route::get('/{id}/destroy', ['as' => 'admin.categories.destroy', 'uses' => 'AdminCategoriesController@destroy']);
        Route::get('/{id}/edit', ['as' => 'admin.categories.edit', 'uses' => 'AdminCategoriesController@edit']);
        Route::put('/{id}/update', ['as' => 'admin.categories.update', 'uses' => 'AdminCategoriesController@update']);
    });

    // products routes
    Route::group(['prefix' => 'products'], function(){
        Route::get('', ['as' => 'admin.products.index', 'uses' => 'AdminProductsController@index']);
        Route::post('', ['as' => 'admin.products.store', 'uses' => 'AdminProductsController@store']);
        Route::get('/create', ['as' => 'admin.products.create', 'uses' => 'AdminProductsController@create']);
        Route::get('/{id}/destroy', ['as' => 'admin.products.destroy', 'uses' => 'AdminProductsController@destroy']);
        Route::get('/{id}/edit', ['as' => 'admin.products.edit', 'uses' => 'AdminProductsController@edit']);
        Route::put('/{id}/update', ['as' => 'admin.products.update', 'uses' => 'AdminProductsController@update']);

        //images
        Route::group(['prefix' => 'images'], function(){
            Route::get('{id}/product', ['as' => 'admin.products.images', 'uses' => 'AdminProductsController@images']);
            Route::get('/create/{id}/product', ['as' => 'admin.products.images.create', 'uses' => 'AdminProductsController@createImage']);
            Route::post('/store/{id}/product', ['as' => 'admin.products.images.store', 'uses' => 'AdminProductsController@storeImage']);
            Route::get('/destroy/{id}/image', ['as' => 'admin.products.images.destroy', 'uses' => 'AdminProductsController@destroyImage']);
        });

    });
});

Route::get('/', 'WelcomeController@index');

Route::get('/exemplo', 'WelcomeController@exemplo');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
