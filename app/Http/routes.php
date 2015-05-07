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
Route::group(['prefix' => 'admin'], function(){
    // categories
    Route::group(['prefix' => 'categories'], function(){
        Route::get('', ['as' => 'admin.categories.index', 'uses' => 'AdminCategoriesController@index']);
        Route::post('', ['as' => 'admin.categories.store', 'uses' => 'AdminCategoriesController@store']);
        Route::get('/create', ['as' => 'admin.categories.create', 'uses' => 'AdminCategoriesController@create']);
        Route::get('/{id}/destroy', ['as' => 'admin.categories.destroy', 'uses' => 'AdminCategoriesController@destroy'])->where('id','[0-9]+');
        Route::get('/{id}/edit', ['as' => 'admin.categories.edit', 'uses' => 'AdminCategoriesController@edit'])->where('id','[0-9]+');
        Route::put('/{id}/update', ['as' => 'admin.categories.update', 'uses' => 'AdminCategoriesController@update'])->where('id','[0-9]+');
    });

    // products
    Route::group(['prefix' => 'products'], function(){
        Route::get('', ['as' => 'admin.products.index', 'uses' => 'AdminProductsController@index']);
        Route::post('', ['as' => 'admin.products.store', 'uses' => 'AdminProductsController@store']);
        Route::get('/create', ['as' => 'admin.products.create', 'uses' => 'AdminProductsController@create']);
        Route::get('/{id}/destroy', ['as' => 'admin.products.destroy', 'uses' => 'AdminProductsController@destroy'])->where('id','[0-9]+');
        Route::get('/{id}/edit', ['as' => 'admin.products.edit', 'uses' => 'AdminProductsController@edit'])->where('id','[0-9]+');
        Route::put('/{id}/update', ['as' => 'admin.products.update', 'uses' => 'AdminProductsController@update'])->where('id','[0-9]+');
    });
});

Route::get('/', 'WelcomeController@index');

Route::get('/exemplo', 'WelcomeController@exemplo');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'categories'], function(){
    Route::get('', ['as' => 'categories.index', 'uses' => 'CategoriesController@index']);
    Route::post('', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
    Route::get('/create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
    Route::get('/{id}/destroy', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
    Route::get('/{id}/edit', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
    Route::put('/{id}/update', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);
});
