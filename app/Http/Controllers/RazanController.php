<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Repositories\UserRepository;

use App\Models\review;
use App\Models\company;
use App\Models\trainee;
use App\Models\traineeExperience;
use App\Models\traineeInterests;
use App\Models\traineeLanguages;
use App\Models\traineeSkills;
use App\Models\requestedopportunity;
use App\Models\Sendsdocument;
use App\Models\oppourtunity;
use App\Models\cv;

use Hash;
use Session;
use Validator;
use \App\Enum\fileNameEnum;
use File;
use Response;
use Carbon\Carbon;


class RazanController extends Controller
{
    public function inst(){
        return view('trainee/instruction');
    }

    public function detailsForCommittee($id){  /* INCOMPLETE missing CV */
        $trainee = trainee::where('trainee_id', $id)->first();

        $academic = null;
        $certificate = null;
        $letter = null;

        if (cv::where( 'trainee_id' , $id)->where( 'documentName' , 'acdamicFile')->exists()) {
            $academic = cv::where( 'trainee_id' , $id)->where( 'documentName' , 'acdamicFile')->value('document');
            $aca = true;
        }
        else{
            $aca =false;
        }

        if (cv::where( 'trainee_id' , $id)->where( 'documentName' , 'certifactionFile')->exists()) {
            $certificate = cv::where( 'trainee_id' , $id)->where( 'documentName' , 'certifactionFile')->value('document');
            $cert =true;
        }
        else{
            $cert =false;
        }

        if (cv::where( 'trainee_id' , $id)->where( 'documentName' , 'identificationLetter')->exists()) {
            $letter = cv::where( 'trainee_id' , $id)->where( 'documentName' , 'identificationLetter')->first();
            $let =true;
        }
        else{
            $let =false;
        }


            ///////


        if (Sendsdocument::where( 'trainee_id' , $id)->where( 'doc_name' , 'EffectiveDateNotice')->exists()) {
            $effective = Sendsdocument::where( 'trainee_id' , $id)->where( 'doc_name' , 'EffectiveDateNotice')->value('document');
        }
        else{
            $effective = 0;
        }

        if (Sendsdocument::where( 'trainee_id' , $id)->where( 'doc_name' , 'report')->exists()) {
            $report = Sendsdocument::where( 'trainee_id' , $id)->where( 'doc_name' , 'report')->value('document');
        }
        else{
            $report = 0;
        }

        if (Sendsdocument::where( 'trainee_id' , $id)->where( 'doc_name' , 'TrainingSurvey')->exists()) {
            $survey = Sendsdocument::where( 'trainee_id' , $id)->where( 'doc_name' , 'TrainingSurvey')->value('document');
        }
        else{
            $survey = 0;
        }

        if (Sendsdocument::where( 'trainee_id' , $id)->where( 'doc_name' , 'Presentation')->exists()) {
            $presentation = Sendsdocument::where( 'trainee_id' , $id)->where( 'doc_name' , 'Presentation')->value('document');
        }
        else{
            $presentation = 0;
        }
        if (Sendsdocument::where( 'trainee_id' , $id)->where( 'doc_name' , 'TrainingPlan')->exists()) {
            $TrainingPlan = Sendsdocument::where( 'trainee_id' , $id)->where( 'doc_name' , 'TrainingPlan')->value('document');
        }
        else{
            $TrainingPlan = 0;
        }

        if (Sendsdocument::where( 'trainee_id' , $id)->where( 'doc_name' , 'EmployeeFeedback')->exists()) {
            $EmployeeFeedback = Sendsdocument::where( 'trainee_id' , $id)->where( 'doc_name' , 'EmployeeFeedback')->value('document');
        }
        else{
            $EmployeeFeedback = 0;
        }

        if (Sendsdocument::where( 'trainee_id' , $id)->where( 'doc_name' , 'FollowUp')->exists()) {
            $FollowUp = Sendsdocument::where( 'trainee_id' , $id)->where( 'doc_name' , 'FollowUp')->value('document');
        }
        else{
            $FollowUp = 0;
        }

        if (Sendsdocument::where( 'trainee_id' , $id)->where( 'doc_name' , 'TraineeEvaluation')->exists()) {
            $TraineeEvaluation = Sendsdocument::where( 'trainee_id' , $id)->where( 'doc_name' , 'TraineeEvaluation')->value('document');
        }
        else{
            $TraineeEvaluation = 0;
        }

        if (Sendsdocument::where( 'trainee_id' , $id)->where( 'doc_name' , 'Attendance')->exists()) {
            $Attendance = Sendsdocument::where( 'trainee_id' , $id)->where( 'doc_name' , 'Attendance')->value('document');
        }
        else{
            $Attendance = 0;
        }


        $experience = traineeExperience::where( 'trainee_id' , $id)->get();
        $interest = traineeInterests::where( 'trainee_id' , $id)->get();
        $language = traineeLanguages::where( 'trainee_id' , $id)->get();
        $skill = traineeSkills::where( 'trainee_id' , $id)->get();

        $int = trainee::join('opportunity', 'opportunity.id', '=', 'users.opportunity_id')->where('trainee_id', '=', $id)->value('opportunity.company_id');
        $companyInfo = company::where('id', $int)->first();

        $num = trainee::join('opportunity', 'opportunity.id', '=', 'users.opportunity_id')->where('trainee_id', '=', $id)->value('opportunity.id');
        $oppourtunity = oppourtunity::where('id', $num)->first();

        $status = trainee::where('trainee_id', $id)->value('status');


        return view('PTcommittee/traineeDetailsCommittee', [
            'trainee' => $trainee ,

            'aca' => $aca ,
            'cert' => $cert ,
            'let' => $let ,

            'certificate' => $certificate ,
            'letter' => $letter ,
            'academic' => $academic ,

            'effective' => $effective ,
            'report' => $report ,
            'survey' => $survey ,
            'presentation' => $presentation ,

            'TrainingPlan' => $TrainingPlan ,
            'FollowUp' => $FollowUp ,
            'Attendance' => $Attendance ,
            'TraineeEvaluation' => $TraineeEvaluation ,
            'EmployeeFeedback' => $EmployeeFeedback ,

            'companyInfo' => $companyInfo ,
            'oppourtunity' => $oppourtunity ,
            'status' => $status ,
            'experience' => $experience ,
            'interest' => $interest ,
            'language' => $language ,
            'skill' => $skill
        ]);
    }

    public function detailsForCompany($id){ /* INCOMPLETE */
        $trainee = trainee::where('trainee_id', $id)->first();

        $academic = null;
        $certificate = null;
        $letter = null;

        if (cv::where( 'trainee_id' , $id)->where( 'documentName' , 'acdamicFile')->exists()) {
            $academic = cv::where( 'trainee_id' , $id)->where( 'documentName' , 'acdamicFile')->value('document');
            $aca = true;
        }
        else{
            $aca =false;
        }

        if (cv::where( 'trainee_id' , $id)->where( 'documentName' , 'certifactionFile')->exists()) {
            $certificate = cv::where( 'trainee_id' , $id)->where( 'documentName' , 'certifactionFile')->value('document');
            $cert =true;
        }
        else{
            $cert =false;
        }

        if (cv::where( 'trainee_id' , $id)->where( 'documentName' , 'identificationLetter')->exists()) {
            $letter = cv::where( 'trainee_id' , $id)->where( 'documentName' , 'identificationLetter')->first();
            $let =true;
        }
        else{
            $let =false;
        }


        $experience = traineeExperience::where( 'trainee_id' , $id)->get();
        $interest = traineeInterests::where( 'trainee_id' , $id)->get();
        $language = traineeLanguages::where( 'trainee_id' , $id)->get();
        $skill = traineeSkills::where( 'trainee_id' , $id)->get();

            $trainingPlan= 0;
            $followUp=0;
            $attendance=0;
            $traineeEvaluation=0;
            $employeeFeedback=0;

        $find =Sendsdocument::where('trainee_id', '=', $id )->get();
        foreach($find as $find){

        if($find->doc_name==fileNameEnum::TrainingPlan){
            $trainingPlan=Sendsdocument::where('trainee_id', '=', $id)->where('doc_name', '=', 'TrainingPlan')->value('document');
        }
         if($find->doc_name==fileNameEnum::FollowUp){
            $followUp=Sendsdocument::where('trainee_id', '=', $id)->where('doc_name', '=', 'FollowUp')->value('document');
        }
         if($find->doc_name==fileNameEnum::Attendance){
            $attendance=Sendsdocument::where('trainee_id', '=', $id)->where('doc_name', '=', 'Attendance')->value('document');
        }
        if($find->doc_name==fileNameEnum::TraineeEvaluation){
            $traineeEvaluation=Sendsdocument::where('trainee_id', '=', $id)->where('doc_name', '=', 'TraineeEvaluation')->value('document');
        }
        if($find->doc_name==fileNameEnum::EmployeeFeedback){
            $employeeFeedback=Sendsdocument::where('trainee_id', '=', $id)->where('doc_name', '=', 'EmployeeFeedback')->value('document');
        }}

        return view('Company/traineeDetailsCompany', [
            'trainee' => $trainee ,

            'aca' => $aca ,
            'cert' => $cert ,
            'let' => $let ,

            'certificate' => $certificate ,
            'letter' => $letter ,
            'academic' => $academic ,

            'experience' => $experience ,
            'interest' => $interest ,
            'language' => $language ,
            'skill' => $skill,

            'trainingPlan' => $trainingPlan,
            'followUp' => $followUp,
            'attendance' => $attendance,
            'traineeEvaluation' => $traineeEvaluation,
            'employeeFeedback' => $employeeFeedback
        ]);
    }


    public function companyUpload(Request $request , $id){
        //$id = trainee::join('opportunity', 'opportunity.id', '=', 'users.opportunity_id')->where('company_id', '=', session('logincomid'))->value('users.trainee_id');

        $Sendsdocument= new Sendsdocument();
        if(request()->hasfile('employeeFeedback')!=null){
            $request->validate([
                'employeeFeedback' => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt',
            ]);
                $fileName = $request->employeeFeedback->getClientOriginalName();
                $request->employeeFeedback->storeAs('EmployeeFeedback', $fileName,'public');
                $Sendsdocument->doc_name= fileNameEnum::EmployeeFeedback;
                $Sendsdocument->document = Storage::url('EmployeeFeedback/'. $request->employeeFeedback->getClientOriginalName());
            }else if(request()->hasfile('traineeEvaluation')!=null){
             $request->validate([
                'traineeEvaluation' => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt',
            ]);
                $fileName = $request->traineeEvaluation->getClientOriginalName();
                $request->traineeEvaluation->storeAs('TraineeEvaluation', $fileName,'public');
                $Sendsdocument->doc_name= fileNameEnum::TraineeEvaluation;
                $Sendsdocument->document= Storage::url('TraineeEvaluation/'.$request->traineeEvaluation->getClientOriginalName());
        }else if(request()->hasfile('attendance')!=null){
            $request->validate([
                'attendance' => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt',
            ]);
                $Sendsdocument->doc_name= fileNameEnum::Attendance;
                $fileName = $request->attendance->getClientOriginalName();
                $request->attendance->storeAs('Attendance', $fileName,'public');
                $Sendsdocument->document= Storage::url('Attendance/'.$request->attendance->getClientOriginalName());
        }else if(request()->hasfile('followUp')!=null){
            $request->validate([
                'followUp' => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt',
            ]);
                $fileName = $request->followUp->getClientOriginalName();
                $request->followUp->storeAs('FollowUp', $fileName,'public');
                $Sendsdocument->document= Storage::url('FollowUp/'.$request->followUp->getClientOriginalName());
                $Sendsdocument->doc_name= fileNameEnum::FollowUp;
        }else if(request()->hasfile('trainingPlan')!=null){
            $request->validate([
                'trainingPlan' => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt',
            ]);
                $fileName = $request->trainingPlan->getClientOriginalName();
                $request->trainingPlan->storeAs('TrainingPlan', $fileName,'public');
                $Sendsdocument->document= Storage::url('TrainingPlan/'.$request->trainingPlan->getClientOriginalName());
                $Sendsdocument->doc_name= fileNameEnum::TrainingPlan;
        }

                $Sendsdocument->opportunity_id=trainee::where('trainee_id','=', $id)->first()->opportunity_id;
                $Sendsdocument->committee_id= trainee::where('trainee_id','=',$id)->first()->committee_id;
                $Sendsdocument->trainee_id= trainee::where('trainee_id','=',$id)->first()->trainee_id;
                $Sendsdocument->save();
                return back()->with('success','Successfully uploaded!');

    }


    public function Request($id){
        $trainee = trainee::where('trainee_id', $id)->first();

        $academic = null;
        $certificate = null;
        $letter = null;

        if (cv::where( 'trainee_id' , $id)->where( 'documentName' , 'acdamicFile')->exists()) {
            $academic = cv::where( 'trainee_id' , $id)->where( 'documentName' , 'acdamicFile')->value('document');
            $aca = true;
        }
        else{
            $aca =false;
        }

        if (cv::where( 'trainee_id' , $id)->where( 'documentName' , 'certifactionFile')->exists()) {
            $certificate = cv::where( 'trainee_id' , $id)->where( 'documentName' , 'certifactionFile')->value('document');
            $cert =true;
        }
        else{
            $cert =false;
        }

        if (cv::where( 'trainee_id' , $id)->where( 'documentName' , 'identificationLetter')->exists()) {
            $letter = cv::where( 'trainee_id' , $id)->where( 'documentName' , 'identificationLetter')->first();
            $let =true;
        }
        else{
            $let =false;
        }


        $experience = traineeExperience::where( 'trainee_id' , $id)->get();
        $interest = traineeInterests::where( 'trainee_id' , $id)->get();
        $language = traineeLanguages::where( 'trainee_id' , $id)->get();
        $skill = traineeSkills::where( 'trainee_id' , $id)->get();

        return view('Company/traineeDetailsRequest', [
            'trainee' => $trainee ,

            'aca' => $aca ,
            'cert' => $cert ,
            'let' => $let ,

            'certificate' => $certificate ,
            'letter' => $letter ,
            'academic' => $academic ,

            'experience' => $experience ,
            'interest' => $interest ,
            'language' => $language ,
            'skill' => $skill
        ]);
    }

    public function action (Request $request,$id){

        $trainee = trainee::where('trainee_id', $id)->first();
        $docReq = requestedopportunity::where('trainee_id', $id)->Where('company_id', '=', session('logincompId'))->first();

        if($request->status == 'accept'){

            $docReq->update([
                'statusbycompany'=> 'accept'
            ]);

            $trainee->update([
                'statusFormCompany'=> 'accept'
            ]);
            return redirect('/listOfTraineesRequests')->with('msg','accept');
        }

        elseif($request->status == 'reject'){

            $trainee->update([
                'statusFormCompany'=> 'reject'
            ]);

            $docReq->update([
                'statusbycompany'=> 'reject'
            ]);
            return redirect('/listOfTraineesRequests')->with('msg','reject');
        }
    }


    public function detailsForUnit($id){
        $trainee = trainee::where('trainee_id', $id)->first();

        $academic = null;
        $certificate = null;
        $letter = null;

        if (cv::where( 'trainee_id' , $id)->where( 'documentName' , 'acdamicFile')->exists()) {
            $academic = cv::where( 'trainee_id' , $id)->where( 'documentName' , 'acdamicFile')->value('document');
            $aca = true;
        }
        else{
            $aca =false;
        }

        if (cv::where( 'trainee_id' , $id)->where( 'documentName' , 'certifactionFile')->exists()) {
            $certificate = cv::where( 'trainee_id' , $id)->where( 'documentName' , 'certifactionFile')->value('document');
            $cert =true;
        }
        else{
            $cert =false;
        }

        if (cv::where( 'trainee_id' , $id)->where( 'documentName' , 'identificationLetter')->exists()) {
            $letter = cv::where( 'trainee_id' , $id)->where( 'documentName' , 'identificationLetter')->first();
            $let =true;
        }
        else{
            $let =false;
        }


        $experience = traineeExperience::where( 'trainee_id' , $id)->get();
        $interest = traineeInterests::where( 'trainee_id' , $id)->get();
        $language = traineeLanguages::where( 'trainee_id' , $id)->get();
        $skill = traineeSkills::where( 'trainee_id' , $id)->get();

        return view('PTunit/traineeDetailsUnit', [
            'trainee' => $trainee ,

            'aca' => $aca ,
            'cert' => $cert ,
            'let' => $let ,

            'certificate' => $certificate ,
            'letter' => $letter ,
            'academic' => $academic ,

            'experience' => $experience ,
            'interest' => $interest ,
            'language' => $language ,
            'skill' => $skill
        ]);
    }


    public function LetterRequest($id)
    {
        $trainee = trainee::where('trainee_id', $id)->first();

        $academic = null;
        $certificate = null;
        $letter = null;

        if (cv::where('trainee_id', $id)->where('documentName', 'acdamicFile')->exists()) {
            $academic = cv::where('trainee_id', $id)->where('documentName', 'acdamicFile')->value('document');
            $aca = true;
        } else {
            $aca = false;
        }

        if (cv::where('trainee_id', $id)->where('documentName', 'certifactionFile')->exists()) {
            $certificate = cv::where('trainee_id', $id)->where('documentName', 'certifactionFile')->value('document');
            $cert = true;
        } else {
            $cert = false;
        }

        if (cv::where('trainee_id', $id)->where('documentName', 'identificationLetter')->exists()) {
            $letter = cv::where('trainee_id', $id)->where('documentName', 'identificationLetter')->first();
            $let = true;
        } else {
            $let = false;
        }


        $experience = traineeExperience::where('trainee_id', $id)->get();
        $interest = traineeInterests::where('trainee_id', $id)->get();
        $language = traineeLanguages::where('trainee_id', $id)->get();
        $skill = traineeSkills::where('trainee_id', $id)->get();

        $regulation = \App\Models\Sendsdocument::where('trainee_id', $id)
            ->where('doc_name', \App\Enum\fileNameEnum::identificationLetter)
            ->orderByDesc('created_at')
            ->first();
        $regulation = $regulation ? $regulation->document : null;

        $regulationToTrainee = \App\Models\Sendsdocument::where('trainee_id', $id)
            ->where('doc_name', \App\Enum\fileNameEnum::identificationLetterToTrainee)
            ->orderByDesc('created_at')
            ->first();
        $regulationToTrainee = $regulationToTrainee ? $regulationToTrainee->document : null;

        return view('PTunit/traineeDetailsLetter', [
            'trainee' => $trainee,

            'aca' => $aca,
            'cert' => $cert,
            'let' => $let,

            'certificate' => $certificate,
            'letter' => $letter,
            'academic' => $academic,

            'experience' => $experience,
            'interest' => $interest,
            'language' => $language,
            'skill' => $skill,

            'regulation' => $regulation,
            'regulationToTrainee' => $regulationToTrainee,
        ]);
    }

    public function showReviews($id){

        $companyInfo = company::where( 'id' , $id)->first();

        $logo = company::where( 'id' , $id)->value('logoImage');
        $imgPath = storage_path("app/public/images/{$logo}");

         $reviews = review::join('users', 'users.trainee_id', '=', '_review.trainee_id')->where('company_id', $id)->orderBy('Create_at' , 'desc')->get();

        return view('trainee/reviews',[
            'reviews' => $reviews ,
            'imgPath' => $imgPath ,
            'companyInfo' => $companyInfo
        ]);
    }

    public function viewReview(){

        $review = review::join('users', 'users.trainee_id', '=', '_review.trainee_id')->where('_review.trainee_id', '=', session('loginId'))->first();

        return view('trainee/viewReview',[
            'review' => $review
        ]);
    }

    public function addReview(){

        $id = trainee::join('opportunity', 'opportunity.id', '=', 'users.opportunity_id')->where('trainee_id', '=', session('loginId'))->value('opportunity.company_id');
        $comapnyInfo = company::where('id', $id)->first();


        return view('trainee/addReview',[
            'comapnyInfo' => $comapnyInfo
        ]);
    }

    public function add(Request $req){

        $req->validate([
            'review'=>'required | max:400'
        ]);

        $review = new review();

        $review -> star_rating = request('product_rating');
        $review -> review = request('review');
        $review -> Create_at = Carbon::now()->toDateTimeString();

        $review -> trainee_id = session('loginId');

        $id = trainee::join('opportunity', 'opportunity.id', '=', 'users.opportunity_id')->where('trainee_id', '=', session('loginId'))->value('opportunity.company_id');
        $review -> company_id = $id;

        $review->save();

       return redirect('/traineeMainPage')->with('msg','review');
    }

    public function destroy(){

        $review = review::where('trainee_id', '=', session('loginId'))->first();
        $review->delete();
        return redirect('/traineeMainPage')->with('msg','delete');
    }



    public function download ($id){
        $doc_name = Sendsdocument::where('id', $id)->value('doc_name');
        $path = Sendsdocument::where('id', $id)->value('document');

        if($doc_name == fileNameEnum::EffectiveDateNotice){
            $filepath = storage_path("app/public/EffectiveDateNoticeFiles/{$path}");
            return \Response::download($filepath);
        }

        elseif($doc_name == fileNameEnum::TrainingSurvey){
            $filepath = storage_path("app/public/TrainingSurveyFiles/{$path}");
            return \Response::download($filepath);
        }

        elseif($doc_name == fileNameEnum::report){
            $filepath = storage_path("app/public/reportFiles/{$path}");
            return \Response::download($filepath);
        }

        elseif($doc_name == fileNameEnum::Presentation){
            $filepath = storage_path("app/public/PresentationFiles/{$path}");
            return \Response::download($filepath);
        }

        if($doc_name == fileNameEnum::TrainingPlan){
            $filepath = storage_path("app/public/TrainingPlan/{$path}");
            return \Response::download($filepath);
        }

        elseif($doc_name == fileNameEnum::FollowUp){
            $filepath = storage_path("app/public/FollowUp/{$path}");
            return \Response::download($filepath);
        }

        elseif($doc_name == fileNameEnum::Attendance){
            $filepath = storage_path("app/public/Attendance/{$path}");
            return \Response::download($filepath);
        }

        elseif($doc_name == fileNameEnum::TraineeEvaluation){
            $filepath = storage_path("app/public/TraineeEvaluation/{$path}");
            return \Response::download($filepath);
        }

        elseif($doc_name == fileNameEnum::EmployeeFeedback){
            $filepath = storage_path("app/public/EmployeeFeedback/{$path}");
            return \Response::download($filepath);
        }

    }
}
