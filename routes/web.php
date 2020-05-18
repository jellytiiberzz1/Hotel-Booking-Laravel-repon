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
Route::view('admin/login','admin.pages.login')->name('login.admin');
Route::post('admin/login','UserController@loginAdmin')->name('admin.login');

Route::get('getkindrooms','AjaxController@getKindRooms');
Route::group(['prefix'=>'admin', 'middleware' => 'adminMiddleware'],function (){
    Route::get('','AdminController@index');
    Route::get('logout','AdminController@logout');
    Route::resource('category','CategoryController');
    Route::post('updateCate/{id}','CategoryController@update');
    Route::resource('kindrooms','KindRoomsController');
    Route::resource('rooms','RoomsController');
    Route::post('updateRoom/{id}','RoomsController@update');
    Route::resource('serviceslug','ServiceSlugController');
    Route::resource('service','ServiceController');
    Route::post('updateService/{id}','ServiceController@update');
    Route::resource('member','MemberController');
    Route::resource('adminbooking','ReservationmanagerController');
});
Route::get('logout','UserController@logout');

Route::get('/','ShowController@index');
Route::get('rooms','ShowController@rooms');
Route::get('restaurant','ShowController@restaurant');
Route::get('about','ShowController@about');
Route::get('contact','ShowController@contact');
Route::post('/message','ShowController@contactPost');

Route::resource('booking','BookingsController');
Route::get('dat-{slug}','BookingsController@addBook')->name('addBook');
//Route::get('dat_phong','BookingsController@detail')->name('detail');
Route::resource('customer','CustomerController');

Route::get('chi-tiet-{slug}', 'ShowController@getDetail');
Route::get('/find','ShowController@findrooms');
Route::post('/updateuser','ShowController@updateInfo')->name('updateinformation');

Route::get('/editinfor','ShowController@infor');
Route::post('/edituser','UserController@updateUser');

Route::get('/reservation','UserController@reservation');





Route::get('callback/{social}','UserController@handleProviderCallback');
Route::get('login/{social}','UserController@redirectProvider')->name('login.social');
Route::post('login','UserController@loginClient')->name('login');
Route::post('register','UserController@registerClient')->name('register');
Route::get('logout','UserController@logout');
Route::get('callback/{social}','UserggController@handleProviderCallback');
Route::get('login/{social}','UserggController@redirectProvider')->name('login.social');
Route::get('logout','UserggController@logout');


//PayPal online
Route::get('Payment', 'PaymentController@index')->name('payment');
Route::post('paypal', 'PaymentController@payWithpaypal');
Route::get('status', 'PaymentController@getPaymentStatus');

