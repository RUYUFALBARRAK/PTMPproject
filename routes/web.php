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
    return view('instruction');
});

Route::get('/registerCompany', function () {
    return view('Company/registerCompany');
});

Route::get('/loginCompany', function () {
    return view('Company/LoginForCompany');
});

Route::get('/forgetPassword', function () {
    return view('Company/forgetPassword');
});
Route::get('/addOppourtunityForCompany', function () {
    return view('Company/addOpportunity');
});

Route::get('/DocumentPageCompany', function () {
    return view('Company/DocumentPageCompany');
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
Route::get('/opportunityPageCompany', function () {
    return view('Company/opportunityPageCompany');
});
Route::get('/personalInfoCompany', function () {
    return view('Company/personalInfoCompany');
});
Route::get('/opportunityPageTrainee', function () {
    return view('trainee/opportunityPageTrainee');
});
Route::get('/opportunityDetailsPageT', function () {
    return view('trainee/opportunityDetailsPageT');
});
Route::get('/opportunityPageCommittee', function () {
    return view('PTcommittee/opportunityPageCommittee');
});
Route::get('/opportunityDetailsPage', function () {
    return view('PTcommittee/opportunityDetailsPage');
});
Route::get('/opportunityRequestCommittee', function () {
    return view('PTcommittee/opportunityRequestCommittee');
});


/*Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/
