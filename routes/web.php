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

Route::get('/organization/return-view/change-password', function() {return view('auth.passwords.change-password'); });
Route::post('/organization/return-view/change-password', 'Auth\UpdatePasswordController@update');


Route::get('/milk-details/chart/data', 'shared\ChartsController@ChartData');




//SuperAdmin Routes
Route::get('/organization/return-view/super-admin-dashboard', 'SuperAdmin\SuperAdminController@dashboard');
Route::get('/organization/return-view/user-admin-details', 'SuperAdmin\SuperAdminController@userAdmin');
Route::get('/organization/return-view/super-admin/farmers-produce', 'SuperAdmin\SuperAdminController@produce');
Route::get('/organization/return-view/super-admin/reports/select-by-date', 'SuperAdmin\SuperAdminController@dashboard');
Route::get('/organization/return-view/super-admin/users', 'SuperAdmin\SuperAdminController@users');
Route::get('/organization/return-view/settings', 'SuperAdmin\SuperAdminController@settings');

Route::get('/organization/return-view/user-admin-famers', 'SuperAdmin\SuperAdminController@farmers');




Route::post('/register/new-milk-rate', 'SuperAdmin\SuperAdminProcessingController@validateFormRequest');


//Admin Routes
Route::get('/organization/return-view/admin-dashboard', 'Admin\AdminController@dashboard');
Route::get('/organization/return-view/farmers-details', 'Admin\AdminController@farmersDetails');
Route::get('/organization/return-view/farmers-produce', 'Admin\AdminController@farmersProduce');
Route::get('/organization/return-view/reports/select-by-date', 'Admin\AdminController@selectReportsByDate');
Route::get('/organization/return-view/admin-users', 'Admin\AdminController@adminUsers');
Route::get('/organization/return-view/admin-settings', 'Admin\AdminController@setting');




//Admin form processing Routes
Route::post('/register/new-farmer', 'Admin\AdminProcessingController@RegisterFarmer');  
Route::post('/organization/produce-details', 'Admin\AdminProcessingController@validateFormRequest');
Route::get('pdfview', array('as'=>'pdfview','uses'=>'Admin\AdminProcessingController@pdfview'));
Route::post('organization/return-view/delete-farmer-produce/{id}','Admin\AdminProcessingController@deleteProduceRecord');


//Farmer Routes
Route::get('/organization/return-view/user-dashboard', 'farmers\FarmerController@dashboard');
Route::get('/organization/return-view/user-details', 'farmers\FarmerController@farmersDetails');
Route::get('/organization/return-view/produce-records', 'farmers\FarmerController@farmersProduce');
Route::get('/organization/return-view/farmer-reports/select-by-date', 'farmers\FarmerController@selectReportsByDate');
Route::get('/organization/return-view/farmer-users', 'farmers\FarmerController@farmusers');



Route::get('/organization/return-view/pdf-view', array('as'=>'pdfview','uses'=>'farmers\FarmerProcessingController@pdfview'));








