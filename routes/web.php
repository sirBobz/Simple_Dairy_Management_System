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

//Landing page = Login Page
Route::get('/', function () {
    return view('auth/login');
});

//Aunthetication Routes
Route::post('/register', 'Auth\RegisterController@register');
Auth::routes();



Route::get('/userAuth', 'Auth\AuthLogController@userAuth');
Route::get('register/verify/{token}', 'Auth\RegisterController@verify'); 

//Admin Routes
Route::get('/organization/return-view/admin-dashboard', 'admin\AdminController@dashboard');
Route::get('/organization/return-view/farmers-details', 'admin\AdminController@farmersDetails');
Route::get('/organization/return-view/farmers-produce', 'admin\AdminController@farmersProduce');
Route::get('/organization/return-view/reports/select-by-date', 'admin\AdminController@selectReportsByDate');
Route::get('/organization/return-view/admin-users', 'admin\AdminController@adminUsers');

//Admin form processing Routes
Route::post('/organization/updateFarmersProduce', 'admin\AdminProcessingController@updateProduce');



// //Farmer Routes
// Route::get('/organization/return-view/user-dashboard', 'HomeController@');
// Route::get('/organization/return-view/user-details', 'HomeController@');
// Route::get('/organization/return-view/produce-records', 'HomeController@');
// Route::get('/organization/return-view/user-reports/select-by-date', 'HomeController@');
// Route::get('/organization/return-view/users', 'HomeController@');

// //Farmer form processing routes
// Route::get('/organization/return-view/admin-dashboard', 'HomeController@');
// Route::get('/organization/return-view/admin-dashboard', 'HomeController@');
// Route::get('/organization/return-view/admin-dashboard', 'HomeController@');