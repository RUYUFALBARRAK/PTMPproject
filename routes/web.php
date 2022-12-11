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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
});

Route::get('/instruction', function () {
    return view('trainee/instruction');
});

Route::get('/addReview', function () {
    return view('trainee/addReview');
});

Route::get('/viewReview', function () {
    return view('trainee/viewReview');
});

Route::get('/reviews', function () {
    return view('trainee/reviews');
});

Route::get('/traineeDetails', function () {
    //$students = ptmp::all();
    return view('trainee/traineeDetails');
});

Route::get('/loginCompany', function () {
    return view('Company/LoginForCompany');
});
Route::get('/addOppourtunityForCompany', function () {
    return view('Company/addOpportunity');
});

Route::get('/traineeMainPage', function () {
    return view('trainee/triningTap');
});

Route::get('/CVPage', function () {
    return view('trainee/CV-Tap');
});

Route::get('/listOfCompany', function () {
    return view('PTunit/listOfCompany');
});
Route::get('/Company', function () {
    return view('PTunit/companyDetails');
});
Route::get('/CompanyRegestration', function () {
    return view('PTunit/regestrationRequest');
});
Route::get('/listOfCompanyRequest', function () {
    return view('PTunit/listOfCompanyRequest');
});

Route::get('/triningTap', function () {
    return view('trainee/triningTap');
});




/*Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/
