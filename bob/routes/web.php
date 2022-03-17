<?php

use Illuminate\Support\Facades\Route;

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

Route::any('/', 'LoginController@index');
Route::any('/login-form-save','LoginController@loginForm');
Route::any('/logout','LoginController@logout');

Route::any('/dashboard','DashboardController@index');

Route::any('/add-store','StoreController@addStore');
Route::any('/emailCheck','StoreController@emailCheck');
Route::any('/add-store-save','StoreController@addStoreSave');
Route::any('/store-list','StoreController@getStoreList');
Route::any('/edit-store','StoreController@editstore');
Route::any('/edit-store-save','StoreController@editstoresave');
Route::any('/delete-store','StoreController@deletestore');
Route::any('/search-store-detail','StoreController@search');
Route::any('/getMultipleManager','StoreController@getMultipleManager');
Route::any('/viewManagerList','StoreController@viewManagerList');
Route::any('/updateManagerList','StoreController@updateManagerList');

Route::any('/add-user','UserController@addUser');
Route::any('/user-list','UserController@userList');
Route::any('/edit-user','UserController@edituser');
Route::any('/edit-user-save','UserController@editusersave');
Route::any('/delete-user','UserController@deleteuser');
Route::any('/search-user-detail','UserController@search');


Route::any('/add-sale','SalesController@addSale');
Route::any('/search-sales-report','SalesController@searchSalesReport');
Route::any('/add-sale-save','SalesController@addSaleSave');
Route::any('/get-sale','SalesController@getSale');
Route::any('/search-sale-detail','SalesController@searchSaleDetail');
Route::any('/editsale','SalesController@editsale');
Route::any('/edit-sale-save','SalesController@editSaleSave');
Route::any('/viewscroffPopup','SalesController@viewscroffPopup');

Route::any('/add-vendor','VendorController@addVendor');
Route::any('/vendors-list','VendorController@getVendorList');
Route::any('/edit-vendor','VendorController@editVendor');
Route::any('/edit-vendor-save','VendorController@editVendorsave');
Route::any('/delete-vendor','VendorController@deleteVendor');
Route::any('/search-Vendor-detail','VendorController@searchvendor');

Route::any('/log-list','SettingController@logList');

Route::any('/receive-order','LottoScrOffController@receiveOrder');
Route::any('/add-scr-off','LottoScrOffController@addScrOff');
Route::any('getGameDetail','LottoScrOffController@getGameDetail');
Route::any('/activate-scr-off','LottoScrOffController@ativateScrOff');
Route::any('/getSerialDetail','LottoScrOffController@getSerialDetail');
Route::any('/checkSerialNumber','LottoScrOffController@checkSerialNumber');
Route::any('/list-scr-off','LottoScrOffController@listScrOff');
Route::any('/search-scr-list','LottoScrOffController@searchSCRList');
Route::any('/search-scr','LottoScrOffController@searchScr');
Route::any('/edit-SCR','LottoScrOffController@editScrDetail');
Route::any('/edit-scr-off-save','LottoScrOffController@editScrOffSave');
Route::any('/receive-order-list','LottoScrOffController@receiveOrderList') ;
Route::any('/search-order','LottoScrOffController@searchOrder');
Route::any('/edit-Order','LottoScrOffController@editOrderDetail');
Route::any('/edit-receive-order-save','LottoScrOffController@editOrderSave');
Route::any('/saveEntry','LottoScrOffController@saveEntry');

Route::any('/report','ReportController@selectDateForReport');
Route::any('/showWeeklyReport','ReportController@showWeeklyReport');
Route::any('/getMangerList','ReportController@getMangerList');