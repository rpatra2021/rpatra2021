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

Route::get('/', function () { return view('welcome'); });

/** Websites routes started here */
Route::group(['namespace' => 'Web'], function () {
    Route::get('sales-estimate-save/{id?}', 'SalesEstimateController@saveSalesEstimateData');
    Route::post('sales-estimate-save/{id?}', 'SalesEstimateController@saveSalesEstimateData');

    Route::get('sales-order-save/{id?}', 'SalesOrderController@salesOrderDataSave');
    Route::post('sales-order-save/{id?}', 'SalesOrderController@salesOrderDataSave');
});

/** Those routes only for the developer user */
Route::group(['namespace' => 'Developer', 'prefix' => DEVELOPER_PREFIX], function () {
    Route::any('file-upload', 'TestController@fileUpload');
});
