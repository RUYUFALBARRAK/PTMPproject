<?php

use App\Http\Controllers\BushraController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PTMPController;
use App\Http\Controllers\RazanController;
use App\Models\Review;
use App\Http\Controllers\companyController;
use App\Http\Controllers\khawlahController;
use App\Models\oppourtunity;
use App\Models\requestedopportunity;

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
Route::get('/registerCompany', [companyController::class,'viewreg'])-> name('regcompany');
Route::post('Authreg',[companyController::class,'Authreg'])-> name('Authreg');
Route::post('Authlogincompany',[companyController::class,'Authlogincompany'])-> name('Authlogincompany');
Route::get('/loginCompany', function () {return view('Company/LoginForCompany');})-> name('logincompany');

Route::get('/forgetPassword', function () {
    return view('Company/forgetPassword');
});

Route::group(['middleware'=>'isloggedin'], function(){

    Route::get('/instruction', [RazanController::class,'inst']);
    Route::get('/viewReview', [RazanController::class,'viewReview']);
    Route::delete('/traineeMainPage', [RazanController::class,'destroy'])-> name('destroy');
    Route::get('/addReview', [RazanController::class,'addReview'])-> name('addReview');
    Route::post('/traineeMainPage', [RazanController::class,'add'])-> name('add');
    Route::get('/reviews', [RazanController::class,'showReviews']);
    Route::get('/DocumentPage', function () {
    return view('trainee/DocumentPage', ['docs' => \App\Models\document::where('uploaded_for', '=', 'trainee')->orWhere('uploaded_for', '=', 'both')->get()]);
});
Route::get('/traineeDetailsUnit/{id}', [RazanController::class,'detailsForUnit'])-> name('detailsForUnit');
Route::get('/traineeDetailsCommittee/{id}', [RazanController::class,'detailsForCommittee'])-> name('detailsForCommittee');
Route::get('/traineeDetailsCompany/{id}', [RazanController::class,'detailsForCompany'])-> name('detailsForCompany');
Route::get('/traineeDetailsRequest/{id}', [RazanController::class,'Request'])-> name('Request');
Route::post('/action/{id}', [RazanController::class,'action'])-> name('action');
Route::get('/download/{id}', [RazanController::class,'download'])-> name('download');
Route::post('/companyUpload/{id}', [RazanController::class,'companyUpload'])-> name('companyUpload');
Route::post('Authopportunity',[companyController::class,'Authopportunity'])-> name('Authopportunity');
Route::get('/addOppourtunityForCompany', [companyController::class,'addOpportunityview'])->name('addOppourtunityForCompany');

Route::get('/DocumentPageCompany', function () {
    return view('Company/DocumentPageCompany', ['docs' => \App\Models\document::where('uploaded_for', '=', 'company')->orWhere('uploaded_for', '=', 'both')->get()]);
});

Route::get('/traineeMainPage', [PTMPController::class,'ViewMainpage'])-> name('traineeMainPage');
Route::post('/uploadfile', [PTMPController::class,'uploadfile'])-> name('uploadfile');
Route::get('/logout', [PTMPController::class,'logout']);
Route::get('/CVPage',[PTMPController::class,'CVshow']);
Route::get('/listOfCompany',[companyController::class,'listOfcompany']);
Route::get('/searchlistOfCompany',[companyController::class,'searchCompanyList']);
Route::get('/searchlistOfCompanyRequest',[companyController::class,'searchCompanyRequestList']);
Route::get('/company-delete.{id}',[companyController::class,'deleteCompany'])->name('deleteCompanyPTunit');
Route::get('/Company.{id}',[companyController::class,'CompanyDetails'])->name('CompanyDetails');
Route::get('/CompanyRegestration.{id}', [companyController::class,'CompanyRegestrationDetails'])->name('regestrationRequest');
Route::get('/company-accept.{id}', [companyController::class,'AcceptCompany'])->name('accept');
Route::get('/company-reject.{id}', [companyController::class,'rejectCompany'])->name('reject');
Route::get('/listOfCompanyRequest', [companyController::class,'listOfCompanyRequest']);
//stoped here
Route::post('/TrainingDocument', [\App\Http\Controllers\BalqeesController::class, 'uploadDoc'])->name('upload_doc');
Route::post('/TrainingDocument/delete', [\App\Http\Controllers\BalqeesController::class, 'deleteDoc'])->name('delete_doc');
Route::get('/TrainingDocument', function () {
    return view('PTunit/TrainingDocument', ['docs' => \App\Models\document::all()]);
})->name('training_doc');


// Announcements committee
Route::get('/AnnouncementsCommittee', function () {
    return view('PTcommittee/Announcements', ['announcements' => \App\Models\announcement::all()]);
})->name('announcements');

Route::post('/AnnouncementsCommittee/delete', [\App\Http\Controllers\BalqeesController::class, 'deleteAnnouncement'])->name('delete_announcement');

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

// Announcements trainee
Route::get('/AnnouncementsTrainee', function () {
    return view('trainee.Announcements', ['announcements' => \App\Models\announcement::all()]);
})->name('announcements_trainee');





Route::get('/opportunityPageCompany', function () {
    $company_id = session()->get('logincompId');
    $opportunities = oppourtunity::where('company_id' , $company_id)->get();
    return view('Company/opportunityPageCompany' , compact('opportunities'));
});

// Route::get('/personalInfoCompanyEdit', function () {
//     return view('Company/personalInfoCompanyEdit');
// });

Route::get('/personalInfoCompanyEdit', function () {
    $company_id = session()->get('logincompId');
    $company = App\Models\company::findOrFail($company_id);
    return view('Company/personalInfoCompanyEdit' , compact('company'));
})->name('company.edit');

Route::post('/personalInfoCompanyUpdate', [BushraController::class , 'updateCompany'])->name('company.update');

Route::get('/personalInfoCompany', function () {
    $company_id = session()->get('logincompId');
    $company = App\Models\company::findOrFail($company_id);
    return view('Company/personalInfoCompany' , compact('company'));
})->name('company.show');

Route::get('/opportunityPageTrainee', function () {
    $opportunities = oppourtunity::where('status' , 'accept')->get();
    return view('trainee/opportunityPageTrainee' , compact('opportunities'));
});
Route::get('/opportunityDetailsPageT/{id}', function ($id) {
    $opportunity = oppourtunity::findOrFail($id);
    $has_opportunity = requestedopportunity::where('trainee_id' , session()->get('loginId'))->where('statusbytrainee','accept')->get();
    return view('trainee/opportunityDetailsPageT' , compact('opportunity' , 'has_opportunity'));
})->name('opportunity.confirm');

Route::post('/trainee/opportunityDetailsPageT/{id}' , [BushraController::class , 'confirmOpportunity'])->name('opportunity.confirm.submit');

Route::get('/opportunityDetailsApply/{id}', function ($id) {
    $has_opportunity = requestedopportunity::where('trainee_id' , session()->get('loginId'))->where('statusbytrainee','accept')->get();

    $opportunity = oppourtunity::findOrFail($id);
    return view('trainee/opportunityDetailsApply' , compact('opportunity' , 'has_opportunity'));
})->name('opportunity.apply');

Route::post('/opportunityDetailsApply/{id}', [BushraController::class , 'opportunityApplySubmit'])->name('opportunity.apply.submit');



//Company see its opportunities Details:
Route::get('/opportunityDetails/{id}', function ($id) {
    $opportunity = oppourtunity::findOrFail($id);
    return view('Company/opportunityDetails' , compact('opportunity'));
})->name('opportunityDetails.show');




Route::get('/opportunityPageCommittee', function () {
    $opportunities = oppourtunity::where('status' , 'accept')->get();
    return view('PTcommittee/opportunityPageCommittee' , compact('opportunities'));
});


//Opportunities details from committee side
Route::get('/acceptedOpportunityDetails/{id}', function ($id) {
    $opportunity = oppourtunity::findOrFail($id);
    return view('PTcommittee/acceptedOpportunityDetails' , compact('opportunity'));
})->name('accOpportunity.details');

Route::get('/opportunityDetailsPage/{id}', function ($id) {
    $opportunity = oppourtunity::findOrFail($id);
    return view('PTcommittee/opportunityDetailsPage' , compact('opportunity'));
})->name('opportunity.details');

Route::post('/opportunityUpdateStatus/{id}' , [BushraController::class , 'updateOpportunityStatus'])->name('opportunity.update_status');


Route::get('/opportunityRequestCommittee', function () {
    $opportunities = oppourtunity::where('status' , 'pending')->get();
    return view('PTcommittee/opportunityRequestCommittee' , compact('opportunities'));
});

Route::get('/viewDetails', function () {
    return view('PTcommittee/viewDetails');
});
Route::get('/listOfTrainees', [khawlahController::class,'listOfTraineesCompany']);
Route::get('/searchlistOfTraineesCompany', [khawlahController::class,'searchlistOfTraineesCompany']);


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

Route::get('/listOfStudentsPTunit', [khawlahController::class,'studentListPT']);
Route::get('/searchlistOfStudentsPTunit', [khawlahController::class,'searchstudentListPT']);


Route::post('/addSkill', [PTMPController::class,'addSkill'])-> name('addSkill');
Route::get('/deleteSkills/{id}', [PTMPController::class,'deleteSkills'])-> name('deleteskills');
Route::post('/addLanguages', [PTMPController::class,'addLanguages'])-> name('addLanguages');
Route::get('/deleteLanguages/{id}', [PTMPController::class,'deleteLanguages'])-> name('deleteLanguages');
Route::post('/addInterests', [PTMPController::class,'addInterests'])-> name('addInterests');
Route::get('/deleteInterests/{id}', [PTMPController::class,'deleteInterests'])-> name('deleteInterests');
Route::post('/addExperience', [PTMPController::class,'addExperience'])-> name('addExperience');
Route::get('/deleteExperience/{id}', [PTMPController::class,'deleteExperience'])-> name('deleteExperience');
Route::post('/addfile', [PTMPController::class,'addfile'])-> name('addfile');
});





/*Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/
