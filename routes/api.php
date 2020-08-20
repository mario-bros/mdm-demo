<?php

use Illuminate\Http\Request;

Route::group(['namespace' => 'Api'], function () {
    Route::get('/users', 'MasterLookups@users')->name('api.users');
    Route::get('/city', 'MasterLookups@city')->name('api.city');
    Route::get('/village', 'MasterLookups@village')->name('api.village');
    Route::get('/district', 'MasterLookups@district')->name('api.district');

    Route::apiResources([
        '/customers' => 'CustomerController'
    ]);


    Route::group(['middleware' => 'api_with_auth'], function () {
        Route::post('/{business_unit}/customer/profile/store', 'BusinessUnitRawDataInputController@storeProfile');
        Route::post('/{business_unit}/customer/profile/search', 'BusinessUnitRawDataInputController@retrieveProfile');
     });

});
