<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PTMPController;
use App\Http\Controllers\RazanController;
use App\Models\Review;

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
Route::get('/login', [PTMPController::class,'viewlogin'])-> name('login');
Route::post('Authlogin',[PTMPController::class,'Authlogin'])-> name('Authlogin');

Route::get('/instruction', [RazanController::class,'inst']);

Route::get('/traineeDetails', [RazanController::class,'details']);

Route::get('/viewReview', [RazanController::class,'viewReview']);

Route::get('/addReview', [RazanController::class,'addReview']);

Route::get('/reviews', [RazanController::class,'showReviews']);

Route::get('/DocumentPage', function () {
    return view('trainee/DocumentPage');
});

Route::get('/registerCompany', function () {
    return view('Company/registerCompany');
})-> name('regcompany');
Route::post('Authreg',[PTMPController::class,'Authreg'])-> name('Authreg');

Route::get('/loginCompany', function () {
    return view('Company/LoginForCompany');
})-> name('logincompany');

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
})-> name('traineeMainPage');

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
//stoped here
Route::get('/TrainingDocument', function () {
    return view('PTunit/TrainingDocument');
});
Route::get('/Announcements', function () {
    return view('PTcommittee/Announcements');
});
Route::get('/addAnnouncement', function () {
    return view('PTcommittee/addAnnouncement');
});
Route::get('/opportunityPageCompany', function () {
    return view('Company/opportunityPageCompany');
});
Route::get('/personalInfoCompanyEdit', function () {
    return view('Company/personalInfoCompanyEdit');
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
Route::get('/listOfTrainees', function () {
    return view('Company/listOfTrainees');
});
Route::get('/listOfTraineesRequests', function () {
    return view('Company/listOfTraineesRequests');
});
Route::get('/listOfStudents', function () {
    return view('PTcommittee/listOfStudents');
});

Route::get('/ReuqstIdentfaction', function () {
    return view('trainee/ReuqstIdentfaction');
});
Route::get('/listOfStudentsReqLetter', function () {
    return view('PTunit/listOfStudentsReqLetter');
});

Route::get('/listOfStudentsPTunit', function () {
    return view('PTunit/listOfStudentsPTunit');
});

/*Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/
