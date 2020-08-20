<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('/new_request/customer', Modules\CustomerController::class);
    $router->resource('/new_request/master-company', Modules\CompanyController::class);

    // $router->get('/customer_request/{key}', 'Modules\RequestController@index')->name('customers');
    // $router->get('/reports/{key}', 'Modules\ReportController@index')->name('reports');

    $router->resource('/compare', Custom\CompareController::class);
    $router->get('/compare-golden-record/{u_id}', 'Custom\CompareController@goldenRecord')->name('compare-golden-record');
    $router->resource('/edited_staging', Custom\EditedStagingController::class);
    $router->resource('/edited_certified', Custom\EditedCertifiedController::class);
    $router->get('/detail/{key}', 'Custom\DetailController@index')->name('detail');
    $router->get('/detail_certified/{u_id}', 'Custom\DetailController@certified')->name('detail_certified');
    
    // Config
    $router->resource('/email/config', Extensions\EmailConfigController::class)->names('emailConfig');
    $router->resource('/email/template', Extensions\EmailTemplateController::class)->names('emailTemplate');
    $router->any('/config_updateConfigField', 'Extensions\EmailConfigController@updateConfigField')->name('updateConfigField');

    $router->resource('/api/acces_config', Modules\ApiPageController::class);
    $router->resource('/lookup/references', Modules\LookupController::class);
});
