<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BikeController;
use App\Http\Controllers\Backend\BookingController as BackendBookingController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\InsuranceController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\UserController as BackendUserController;
use App\Http\Controllers\Frontend\BookingController;
use App\Http\Controllers\Frontend\FrontBikeController;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\UserProfile;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//Frontend Site- Boom Bom Boom




Route::prefix('/')->name('kbr.')->group(function(){


    //Login Login
    Route::get('/user/registration',[UserController::class,'registrationFrom'])->name('user.registration');
    Route::post('/user/register',[UserController::class,'register'])->name('user.register');
    Route::get('user/login',[UserController::class,'loginForm'])->name('user.login.form');
    Route::post('user/do-login',[UserController::class,'login'])->name('user.login');


    Route::group(['middleware' => 'auth'],function () {
    Route::get('user/logout',[UserController::class,'logout'])->name('user.logout');
    Route::post('/bike-booking',[BookingController::class,'booking'])->name('bike.booking');

    //user profile

    Route::get('/user/profile',[UserProfile::class,'index'])->name('user.profile.home');
    Route::get('/user/profile/edit/{id}',[UserProfile::class,'profileEdit'])->name('user.profile.edit');
    Route::put('/userprofile/update/{id}',[UserProfile::class,'profileUpdate'])->name('user.profile.update');
    Route::get('/user/booking/history',[UserProfile::class,'bookingHistory'])->name('user.booking.history');

//Update Password
    Route::get('/user/update-password',[UserProfile::class,'password'])->name('user.edit.password');
    Route::Post('/user/update-password',[UserProfile::class,'updatePassword'])->name('user.update.password');

    });


    //Route::get('/kbr',[FrontController::class,'master'])->name('master');
    Route::get('/',[FrontController::class,'home'])->name('home');
    Route::get('/about',[FrontController::class,'about'])->name('about');
    Route::get('/contuctus',[FrontController::class,'contuctus'])->name('contuctus');
    Route::get('/terms',[FrontController::class,'terms'])->name('terms');

    //bike
    Route::get('/our-bikes',[FrontBikeController::class,'bikes'])->name('bikes');
    Route::get('/bikes/singleview/{id}',[FrontBikeController::class,'singleview'])->name('bikes.singleview');



});













//Admin Routes

Route::get('/admin/login',[AdminController::class,'login'])->name('admin.login');
Route::post('/admin/do-login',[AdminController::class,'Dologin'])->name('admin.Dologin');


Route::group(['middleware' => 'admin-auth'],function () {
    Route::get('/admin',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');

//Bike routes
Route::get('/admin/bike/list',[BikeController::class,'index'])->name('admin.bike.list');
Route::get('/admin/bike/create',[BikeController::class,'create'])->name('admin.bike.create');
Route::post('/admin/bike/store',[BikeController::class,'store'])->name('admin.bike.store');
Route::get('/admin/bike/show/{id}',[BikeController::class,'show'])->name('admin.bike.show');//bike view route
Route::get('/admin/bike/edit/{id}',[BikeController::class,'edit'])->name('admin.bike.edit');
Route::put('/admin/bike/update/{id}',[BikeController::class,'update'])->name('admin.bike.update');
Route::delete('/admin/bike/delete/{id}',[BikeController::class,'delete'])->name('admin.bike.delete');//bike delete route
 //Customer Manage Route Group

Route::get('admin/user/lists',[BackendUserController::class,'index'])->name('admin.user.list');
Route::post('admin/user/create',[BackendUserController::class,'createCustomer'])->name('admin.user.create');
    Route::get('admin/user/show/{id}',[BackendUserController::class,'show'])->name('admin.user.show');
    Route::get('admin/user/edit/{id}',[BackendUserController::class,'editCustomer'])->name('admin.user.edit');
Route::put('admin/user/update/{id}',[BackendUserController::class,'updateCustomer'])->name('admin.user.update');
Route::get('admin/user/delete/{id}',[BackendUserController::class,'delete'])->name('admin.user.delete');

//Insurance Routes
Route::get('/admin/insurance/lists',[InsuranceController::class,'index'])->name('admin.insurance.list');
 Route::get('insurance/create',[InsuranceController::class,'create'])->name('admin.insurance.create');
Route::post('/admin/insurance/store',[InsuranceController::class,'store'])->name('admin.insurance.store');
Route::get('/admin/insurance/show/{id}',[InsuranceController::class,'show'])->name('admin.insurance.show');
 Route::get('/admin/insurance/edit/{id}',[InsuranceController::class,'edit'])->name('admin.insurance.edit');
Route::put('/admin/insurance/update/{id}',[InsuranceController::class,'update'])->name('admin.insurance.update');
Route::get('/admin/insurance/delete/{id}',[InsuranceController::class,'delete'])->name('admin.insurance.delete');

 //Booking Route Group
    Route::get('admin/booking/list',[BackendBookingController::class,'index'])->name('admin.booking.manage');
    Route::get('admin/booking/show/{id}',[BackendBookingController::class,'show'])->name('admin.booking.show');
    Route::get('admin/booking/delete/{id}',[BackendBookingController::class,'destroy'])->name('admin.booking.delete');
    Route::get('admin/booking/booking/{id}/{status}',[BackendBookingController::class,'updateStatus'])->name('admin.booking.status');
    //Payment In Per Booking
    Route::get('payment/{id}',[BackendBookingController::class,'paymentShow'])->name('admin.booking.payment');
    Route::get('payment/show-form/{id}',[BackendBookingController::class,'paymentShowFrom'])->name('admin.booking.payment.show');
    Route::post('payment/create',[BackendBookingController::class,'paymentCreate'])->name('admin.booking.payment.create');

    //Payment Route

    Route::get('admin/payment/lists',[PaymentController::class,'index'])->name('admin.payment.list');
    Route::get('admin/payment/show/{id}',[PaymentController::class,'show'])->name('admin.payment.show');

      //Report Route
     Route::get('/admin/report/booking',[ReportController::class,'bookingReport'])->name('admin.report.booking');


});



