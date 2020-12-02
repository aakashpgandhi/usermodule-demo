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


// ***************************************** start Default Route Start **********************************************
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/home', 'HomeController@index')->name('home');
    Auth::routes();


// ***************************************** end Default Route Start **********************************************
// *********************************************** Start vendor ***************************************************
// Start  Here Vendor Route

// start here
Route::get('/login/vendor', 'Auth\LoginController@showVendorLoginForm')->name('login.vendor');
Route::post('/login/vendor', 'Auth\LoginController@vendorLogin');

Route::get('/register/vendor', 'Auth\RegisterController@showVendorRegisterForm');
Route::post('/register/vendor', 'Auth\RegisterController@createVendor')->name('register.vendor');
// end here


Route::group(['middleware' => 'auth:vendor'], function(){
    Route::get('/vendor/home', 'Vendor\DashboardController@index')->name('vendor-home');
    Route::get('profile/vendor', 'Vendor\DashboardController@profile')->name('vendor.profile');
    Route::post('profile/vendor', 'Vendor\DashboardController@profileSave')->name('profile.vendor');


});
// end Here Vendor Route

// *********************************************** End vendor ***************************************************
// *********************************************** Start Admin ***************************************************
// start Here Admin Route
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');

Route::group(['middleware' => 'auth:admin'], function(){

    Route::get('/admin/home', 'Admin\DashboardController@index')->name('admin-home');
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'],function (){


        # vendor route
        Route::post('vendor/{id}/delete','VendorController@delete')->name('vendor.delete');
        Route::resource('vendor','VendorController');
        Route::post('vendor/is_active','VendorController@is_active')->name('vendor.is_active');

    });
});


// start Here Admin Route

// *********************************************** End Admin ***************************************************
