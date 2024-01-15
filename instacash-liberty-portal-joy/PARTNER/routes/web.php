<?php

use App\Http\Controllers\BillerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PaymentCycleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomerPaymentController;
use App\Http\Controllers\LogOutController;
// use App\Http\Controllers\TariffController;
// use App\Http\Controllers\TariffController;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerNextOfKinController;

use App\Http\Controllers\PolicyController;
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

// Protected Routes (Require Authentication)
Route::middleware(['auth'])->group(function () {
});

Route::get('/', function () {
    return view('login');
});




    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route::post('/submit_login_code', 'YourController@submitLoginCode')->name('submit_login_code');
    Route::get('/logout', 'LogOutController');

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
  
// Display a list of payment cycles
Route::get('/tariffs', [TariffController::class, 'index'])->name('tariff.index');
Route::get('/tariffs', [TariffController::class, 'index'])->name('tariff.index');


Route::resource('tariffs', 'TariffController');


// Show the form to create a new payment cycle
Route::get('/tariffs/create', [TariffController::class, 'create'])->name('tariff.create');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

// routes/web.php
// routes/web.php or routes/api.php
Route::post('/customer/update-policy', 'CustomerController@updatePolicy');



Route::get('/policies/create', [PolicyController::class, 'create'])->name('policies.create');
Route::post('/policies/store', [PolicyController::class, 'store'])->name('policies.store');
Route::post('/policies/store', [PolicyController::class, 'store'])->name('policies.store');
Route::post('/customernexofkinphone', [CustomerNextOfKinController::class, 'getNextofKinByPhone'])->name('customernexofkinphone')->middleware('web');

// Store a newly created payment cycle in the database
Route::post('/tariffs', [TariffController::class, 'store'])->name('tariff.store');

// Route::put('/tariffs/{id}', [TariffController::class, 'update'])->name('tariff.update');

// web.php

Route::get('/tariffs', [TariffController::class, 'index'])->name('tariffs.index');
Route::get('/tariffs', 'TariffController@index')->name('tariff.index');

// Store a newly created payment cycle in the database

// // Update the specified payment cycle in the database
Route::put('/tariffs/{id}', [TariffController::class, 'update'])->name('tariff.update');
// Define the route for editing a payment plan
Route::get('/tariffs/{id}/edit', [TariffController::class, 'edit'])->name('tariff.edit');


Route::get('/customernextofkin', 'CustomerNextOfKinController@show');
Route::get('/customernextofkin', 'CustomerNextOfKinController@getData')->name('customernextofkin');
// Route::post('/updatecustomerpolicy', [CustomerController::class, 'updatePolicy'])->name('updatecustomerpolicy');

// Delete the specified payment cycle from the database
Route::delete('/tariffs/{id}', [TariffController::class, 'destroy'])->name('tariff.destroy');


// Route::post('/customer/save-policy', 'CustomerController@savePolicy')->name('save-policy');
// Route::post('/customer/update-policy', 'CustomerController@updatePolicy')->name('customer.update-policy');
Route::post('/customer/update-policy', [CustomerController::class, 'updatePolicy']);

    // Other protected routes...

    // Route::get('/customers', [CustomerController::class, 'show']);
    // Route::post('/customers', [CustomerController::class, 'store']);
    
    
    // Route::get('/customers', [CustomerController::class, 'index']);
    
    // Route::get('/customers/{customer}', [CustomerController::class, 'show']);
    // Route::post('/customers', [CustomerController::class, 'store']);
    // Route::put('/customers/{customer}', [CustomerController::class, 'update']);
    // Route::delete('/customers/{customer}', [CustomerController::class, 'destroy']);

    Route::get('/payment-cycles', [PaymentCycleController::class, 'index']);
    Route::get('/payment-cycles/{paymentCycle}', [PaymentCycleController::class, 'show']);

    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/', function () { return view('/home');});


    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

   
    // In routes/web.php or routes/api.php
Route::get('/customernextofkin/{customerId}', 'CustomerNextOfKinController@show');

    Route::get('topmenu', function () {  return view('/topmenu');});
    Route::get('side_nav', function () {  return view('/side_nav');});
    
    /*--------------Dashboad------------------------------------*/
    
    Route::get('/dashboard', 'DashboardController');
    // Route::get('dashboard1', function () {  return view('/dashboard1');});
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    
    /*--------------------------------------------------*/

    // Correct route definition
    // Route::resource('customers', CustomerController::class);

    Route::get('customers', [CustomerController::class, 'index']);
    Route::get('customers/{customer}', [CustomerController::class, 'show']);
    Route::post('customers', [CustomerController::class, 'store']);
    Route::put('customers/{customer}', [CustomerController::class, 'update']);
    Route::delete('customers/{customer}', [CustomerController::class, 'destroy']);
    
    



    
/*-----------------------customer---------------------------*/
Route::get('customers_statement', function () {  return view('/customers.customers_statement');});
Route::get('customers_statement',[CustomerController::class,'index']);
Route::get('customer_payment',[CustomerPaymentController::class,'index']);
Route::get('biller_account',[CustomerController::class,'reports']);
Route::get('biller_statement',[CustomerPaymentController::class,'reports']);
// Add this route at the end of the file
Route::post('/save-policy', 'CustomerController@savePolicy')->name('save.policy');

//Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');

// Route::get('/tariffs', [TariffController::class, 'index'])->name('tariff.index');
Route::get('/customers/statement', [CustomerController::class, 'index']);
// Route::get('', [CustomerController::class,'']);
    
    /*-----------------------Billers---------------------------*/
    
    // Route::get('biller_statement', function () {  return view('/biller.biller_statement');});
    // Route::get('biller_account', function () {  return view('index');});
// Guest Routes (No Authentication Required)
// Route::middleware(['guest'])->group(function () {
//     Route::get('/', function () {
//         return view('/home');
//     });


// routes/web.php

Route::resource('tariff', TariffController::class);
// Route::get('tariff/{id}/approve', 'TariffController@approve')->name('tariff.approve')->middleware('auth'); // Add this line


Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    
Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.changePassword');
Route::post('/profile/update-name', [ProfileController::class, 'updateName'])->name('profile.updateName');
Route::post('/profile/update-email', [ProfileController::class, 'updateEmail'])->name('profile.updateEmail');
Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])
->name('profile.changePassword');

Route::post('/profile/change-email', [ProfileController::class, 'changeEmail'])
->name('profile.changeEmail');

    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');


