<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PTMPController;
use App\Http\Controllers\RazanController;
use App\Models\Review;
use App\Http\Controllers\companyController;
use App\Http\Controllers\khawlahController;
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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/login', [PTMPController::class,'viewlogin'])-> name('login');
Route::post('Authlogin',[PTMPController::class,'Authlogin'])-> name('Authlogin');

Route::get('/instruction', [RazanController::class,'inst']);

Route::get('/traineeDetails', [RazanController::class,'details']);

Route::get('/viewReview', [RazanController::class,'viewReview']);
Route::delete('/traineeMainPage/{id}', [RazanController::class,'destroy'])-> name('destroy');

Route::get('/addReview', [RazanController::class,'addReview'])-> name('addReview');
Route::post('/traineeMainPage', [RazanController::class,'add'])-> name('add');

Route::get('/reviews', [RazanController::class,'showReviews']);

Route::get('/DocumentPage', function () {
    return view('trainee/DocumentPage', ['docs' => \App\Models\document::where('uploaded_for', '=', 'trainee')->orWhere('uploaded_for', '=', 'both')->get()]);
});

Route::get('/registerCompany', [companyController::class,'viewreg'])-> name('regcompany');
Route::post('Authreg',[companyController::class,'Authreg'])-> name('Authreg');
Route::post('Authopportunity',[companyController::class,'Authopportunity'])-> name('Authopportunity');

Route::get('/loginCompany', function () {
    return view('Company/LoginForCompany');
})-> name('logincompany');
Route::post('Authlogincompany',[companyController::class,'Authlogincompany'])-> name('Authlogincompany');

Route::get('/forgetPassword', function () {
    return view('Company/forgetPassword');
});
Route::get('/addOppourtunityForCompany', [companyController::class,'addOpportunityview'])->name('addOppourtunityForCompany');

Route::get('/DocumentPageCompany', function () {
    return view('Company/DocumentPageCompany', ['docs' => \App\Models\document::where('uploaded_for', '=', 'company')->orWhere('uploaded_for', '=', 'both')->get()]);
});


Route::get('/traineeMainPage', [PTMPController::class,'ViewMainpage'])-> name('traineeMainPage')->middleware('isloggedin');
Route::post('/uploadfile', [PTMPController::class,'uploadfile'])-> name('uploadfile')->middleware('isloggedin');
Route::get('/logout', [PTMPController::class,'logout']);
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
Route::post('/TrainingDocument', [\App\Http\Controllers\BalqeesController::class, 'uploadDoc'])->name('upload_doc');
Route::post('/TrainingDocument/delete', [\App\Http\Controllers\BalqeesController::class, 'deleteDoc'])->name('delete_doc');
Route::get('/TrainingDocument', function () {
    return view('PTunit/TrainingDocument', ['docs' => \App\Models\document::all()]);
})->name('training_doc');


Route::get('/Announcements', function () {
    return view('PTcommittee/Announcements', ['announcements' => \App\Models\announcement::all()]);
})->name('announcements');

Route::post('/Announcements/delete', [\App\Http\Controllers\BalqeesController::class, 'deleteAnnouncement'])->name('delete_announcement');

// Edit announcement
Route::get('/EditAnnouncements{announcement}', function(\App\Models\announcement $announcement){
    return view('PTcommittee.addAnnouncement', ['announcement' => $announcement, 'action' => 'edit']);
})->name('edit_announcement');
Route::post('/EditAnnouncements{announcement}', [\App\Http\Controllers\BalqeesController::class, 'editAnnouncement'])->name('do_edit_announcement');

// add announcement
Route::get('/addAnnouncement', function () {
    return view('PTcommittee/addAnnouncement', ['action' => 'add']);
})->name('add_announcement');
Route::post('/addAnnouncement', [\App\Http\Controllers\BalqeesController::class, 'addAnnouncement'])->name('do_add_announcement');


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
Route::get('/viewDetails', function () {
    return view('PTcommittee/viewDetails');
});

Route::get('/listOfTraineesRequests', [khawlahController::class,'viewtraineeList']);
Route::get('/searchTraineeRequest', [khawlahController::class,'search']);
//2:07
Route::get('/listOfStudents', [khawlahController::class,'studentList']);

Route::get('/searchStudent', [khawlahController::class,'searchStudent']);




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
