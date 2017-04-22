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



//SuperAdmin Routes















//Admin Routes
Route::get('/organization/return-view/admin-dashboard', 'Admin\AdminController@dashboard');
Route::get('/organization/return-view/farmers-details', 'Admin\AdminController@farmersDetails');
Route::get('/organization/return-view/farmers-produce', 'Admin\AdminController@farmersProduce');
Route::get('/organization/return-view/reports/select-by-date', 'Admin\AdminController@selectReportsByDate');
Route::get('/organization/return-view/admin-users', 'Admin\AdminController@adminUsers');
Route::get('/organization/return-view/admin-settings', 'Admin\AdminController@setting');




//Admin form processing Routes
Route::post('/search-farmer-details', 'Admin\AdminProcessingController@searchFarmer');  
Route::post('/organization/produce-details', 'Admin\AdminProcessingController@validateFormRequest');
Route::get('pdfview', array('as'=>'pdfview','uses'=>'Admin\AdminProcessingController@pdfview'));


//Farmer Routes
Route::get('/organization/return-view/user-dashboard', 'farmers\FarmerController@dashboard');
Route::get('/organization/return-view/user-details', 'farmers\FarmerController@farmersDetails');
Route::get('/organization/return-view/produce-records', 'farmers\FarmerController@farmersProduce');
Route::get('/organization/return-view/farmer-reports/select-by-date', 'farmers\FarmerController@selectReportsByDate');
Route::get('/organization/return-view/farmer-users', 'farmers\FarmerController@farmusers');
