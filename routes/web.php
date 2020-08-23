<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Routing\Router;

// Auth::routes();

Route::get('/', function () {
    return redirect()->route('login');
});


Route::get('sys_admin/auth/login', 'Auth\LoginController@getLogin')->name('login');
Route::post('sys_admin/auth/login', 'Auth\LoginController@postLogin')->name('login.post');

Route::group([
    // 'middleware' => config('admin.route.middleware'),
    'middleware' => [
        App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Encore\Admin\Middleware\Authenticate::class,
    ],
], function (Router $router) {
    $router->get('api/help/integration/usage/clientside', 'Api\DocsController@clientSideUsage');
    $router->post('api/help/integration/usage/clientside', 'Api\DocsController@storeProfile')->name('form-test-input.store');
    $router->get('api/ajax/get/{region_type}/{province_id}', 'Api\DocsController@populateRegionsByParentId');
});