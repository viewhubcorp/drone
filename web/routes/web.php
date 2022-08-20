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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();
Route::get('/settings/wifi', 'Setting@wifi_page')->name('setting.wifi_page');
Route::get('/setting/wifi/{bssid}', 'Setting@wifi_bssid')->name('setting.wifi_bssid');
Route::post('/setting/wifi/connect', 'Setting@wifi_connect')->name('setting.wifi_connect');
Route::get('/settings/wifi/on', 'Setting@wifi_on')->name('setting.wifi_on');
Route::get('/settings/wifi/off', 'Setting@wifi_off')->name('setting.wifi_off');
Route::get('/settings/wifi/disconnect', 'Setting@wifi_disconnect')->name('setting.wifi_disconnect');
Route::get('/settings/wifi/delete/{bssid}', 'Setting@wifi_delete')->name('setting.wifi_delete');
Route::get('/login/drone', 'HomeController@log')->name('log');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/pay', 'HomeController@panel')->name('pay.in');
Route::post('/pay', 'HomeController@payRedirect')->name('pay');
Route::get('/transactions', 'HomeController@transactionsIn')->name('transactions');
Route::get('/operator', 'Operator@operator')->name('azs_operator');
Route::get('/transaction/{type}', 'Operator@transaction')->name('azs_transaction');
Route::post('/add/transaction', 'Operator@add_transaction')->name('add_transaction');
Route::get('/delete/transaction/{id}', 'Operator@delete_transaction')->name('delete_transaction');

Route::get('/azs', 'Admin@azs_list')->name('azs_list');
Route::get('/azs/{id}', 'Admin@azs')->name('azs');
Route::get('/users', 'Admin@user_list')->name('user_list');
Route::get('/add/azs', 'Admin@add_azs')->name('add_azs');
Route::post('/save/azs', 'Admin@save_azs')->name('save_azs');
Route::get('/add/user', 'Admin@add_user')->name('add_user');
Route::post('/save/user', 'Admin@save_user')->name('save_user');

Route::post('/fuel/cost/{id}', 'Admin@fuel_cost')->name('fuel_cost');
Route::post('/incasation/{id}', 'Admin@incasation')->name('incasation');
Route::post('/prihod/{id}', 'Admin@prihod')->name('prihod');
Route::post('/wallet/{id}', 'Admin@wallet')->name('wallet');
Route::post('/ostat/{id}', 'Admin@ostat')->name('ostat');

Route::get('/prihods/{id}', 'Admin@prihods')->name('prihods');
Route::get('/incasations/{id}', 'Admin@incasations')->name('incasations');
Route::get('/user/{id}', 'Admin@user')->name('user');

