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
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'auth.admin'], 'where' => ['id' => '[0-9]+']], function(){
    // categories routes
    Route::group(['prefix' => 'categories'], function(){
        Route::get('/', ['as' => 'admin.categories.index', 'uses' => 'AdminCategoriesController@index']);
        Route::post('/', ['as' => 'admin.categories.store', 'uses' => 'AdminCategoriesController@store']);
        Route::get('/create', ['as' => 'admin.categories.create', 'uses' => 'AdminCategoriesController@create']);
        Route::get('/{id}/destroy', ['as' => 'admin.categories.destroy', 'uses' => 'AdminCategoriesController@destroy']);
        Route::get('/{id}/edit', ['as' => 'admin.categories.edit', 'uses' => 'AdminCategoriesController@edit']);
        Route::put('/{id}/update', ['as' => 'admin.categories.update', 'uses' => 'AdminCategoriesController@update']);
    });

    // products routes
    Route::group(['prefix' => 'products'], function(){
        Route::get('/', ['as' => 'admin.products.index', 'uses' => 'AdminProductsController@index']);
        Route::post('/', ['as' => 'admin.products.store', 'uses' => 'AdminProductsController@store']);
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

    Route::group(['prefix' => 'orders'], function(){
        Route::get('/', ['as' => 'admin.orders.index', 'uses' => 'AdminOrdersController@index']);
        Route::get('/{id}/edit', ['as' => 'admin.orders.edit', 'uses' => 'AdminOrdersController@edit']);
        Route::put('/{id}/update', ['as' => 'admin.orders.update_status', 'uses' => 'AdminOrdersController@updateStatus']);
    });
});

/* store */
Route::get('/', 'StoreController@index');
Route::get('/category/{category}', ['as' => 'category.list', 'uses' => 'StoreController@categoryList'])->where(['category' => '[A-Za-z]+']);
Route::get('/category/{id}', ['as' => 'store.category', 'uses' => 'StoreController@category'])->where(['id' => '[0-9]+']);
Route::get('/product/{id}', ['as' => 'store.product', 'uses' => 'StoreController@product'])->where(['id' => '[0-9]+']);
Route::get('/tag/{id}', ['as' => 'store.tag', 'uses' => 'StoreController@tag'])->where(['id' => '[0-9]+']);
Route::get('/cart', ['as' => 'cart', 'uses' => 'CartController@index']);
Route::get('/cart/add/{id}', ['as' => 'cart.add', 'uses' => 'CartController@add'])->where(['id' => '[0-9]+']);
Route::get('/cart/remove/{id}', ['as' => 'cart.remove', 'uses' => 'CartController@remove'])->where(['id' => '[0-9]+']);
Route::get('/cart/up/{id}', ['as' => 'cart.up', 'uses' => 'CartController@up'])->where(['id' => '[0-9]+']);
Route::get('/cart/down/{id}', ['as' => 'cart.down', 'uses' => 'CartController@down'])->where(['id' => '[0-9]+']);
Route::get('/cart/destroy/{id}', ['as' => 'cart.destroy', 'uses' => 'CartController@destroy'])->where(['id' => '[0-9]+']);

Route::group(['middleware'=>'auth'], function(){
    Route::get('/checkout/placeorder', ['as' => 'checkout.place', 'uses' => 'CheckoutController@place']);
    Route::get('/account/orders', ['as' => 'account.orders', 'uses' => 'UserController@orders']);

    Route::group(['prefix' => '/ControlPanel/panel'], function(){
        Route::get('/home', ['as' => 'panel.home', 'uses' => 'UserController@home']);
        Route::get('/LastOrders', ['as' => 'panel.last_orders', 'uses' => 'UserController@lastOrders']);
        Route::get('/OpenedOrders', ['as' => 'panel.opened_orders', 'uses' => 'UserController@openedOrders']);
        Route::get('/DeliveredOrders', ['as' => 'panel.delivered_orders', 'uses' => 'UserController@deliveredOrders']);
        Route::get('/OrdersByNumber', ['as' => 'panel.orders_by_number', 'uses' => 'UserController@ordersByNumber']);
        Route::get('/OrdersByDate', ['as' => 'panel.orders_by_date', 'uses' => 'UserController@ordersByDate']);
        Route::get('/AllOrders', ['as' => 'panel.all_orders', 'uses' => 'UserController@allOrders']);
    });

});

//Route::get('pagseguro', 'CheckoutController@pagSeguro');
Route::get('/paymentreturn/', ['as' => 'paymentreturn', 'uses' => 'CheckoutController@paymentReturn']);

//Route::get('/exemplo', 'WelcomeController@exemplo');
Route::get('/home', 'StoreController@index');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
    'teste' => 'TesteController'
]);

Route::get('evento', function(){
    // Fomas de disparar o evento
//    \Illuminate\Support\Facades\Event::fire(new \CodeCommerce\Events\CheckoutEvent());
//    event(new \CodeCommerce\Events\CheckoutEvent());
});