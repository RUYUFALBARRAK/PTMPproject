<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Repositories\UserRepository;

use App\Models\review;
use App\Models\company;
use App\Models\trainee;
use App\Models\traineeExperience;
use App\Models\traineeInterests;
use App\Models\traineeLanguages;
use App\Models\traineeSkills;
use App\Models\Sendsdocument;
use App\Models\oppourtunity;

use Hash;
use Session;
use Validator;
use File;
use Response;
use Carbon\Carbon;


class RazanController extends Controller
{
    public function inst(){
        return view('trainee/instruction');
    }

    public function detailsForCommittee($id){  /* INCOMPLETE */
        $trainee = trainee::where('trainee_id', $id)->first();

        $files = trainee::join('cv', 'cv.trainee_id', '=', 'users.trainee_id')->where( 'users.trainee_id', $id)->get();

        $experience = traineeExperience::where( 'trainee_id' , $id)->value('Experience');
        $interest = traineeInterests::where( 'trainee_id' , $id)->value('interests');
        $language = traineeLanguages::where( 'trainee_id' , $id)->value('languages');
        $skill = traineeSkills::where( 'trainee_id' , $id)->value('skills');

        $int = trainee::join('opportunity', 'opportunity.id', '=', 'users.opportunity_id')->where('trainee_id', '=', $id)->value('opportunity.company_id');
        $companyInfo = company::where('id', $int)->first();

        $documents = Sendsdocument::where( 'trainee_id' , $id)->get(); /*NEED TO PASS IT TO VIEW + UPLOADED DOCS*/

        $num = trainee::join('opportunity', 'opportunity.id', '=', 'users.opportunity_id')->where('trainee_id', '=', $id)->value('opportunity.id');
        $oppourtunity = oppourtunity::where('id', $num)->first();

        $status = trainee::where('trainee_id', $id)->value('statusFormCompany');


        return view('PTcommittee/traineeDetailsCommittee', [
            'trainee' => $trainee ,
            'companyInfo' => $companyInfo ,
            'oppourtunity' => $oppourtunity ,
            'status' => $status ,
            'experience' => $experience ,
            'interest' => $interest ,
            'language' => $language ,
            'skill' => $skill
        ]);
    }

    public function detailsForCompany($id){
        $trainee = trainee::where('trainee_id', $id)->first();

        $files = trainee::join('cv', 'cv.trainee_id', '=', 'users.trainee_id')->where( 'users.trainee_id', $id)->get();

        $experience = traineeExperience::where( 'trainee_id' , $id)->value('Experience');
        $interest = traineeInterests::where( 'trainee_id' , $id)->value('interests');
        $language = traineeLanguages::where( 'trainee_id' , $id)->value('languages');
        $skill = traineeSkills::where( 'trainee_id' , $id)->value('skills');

        return view('Company/traineeDetailsCompany', [
            'trainee' => $trainee ,
            'experience' => $experience ,
            'interest' => $interest ,
            'language' => $language ,
            'skill' => $skill
        ]);
    }

    public function detailsForUnit($id){
        $trainee = trainee::where('trainee_id', $id)->first();

        $files = trainee::join('cv', 'cv.trainee_id', '=', 'users.trainee_id')->where( 'users.trainee_id', $id)->get();

        $experience = traineeExperience::where( 'trainee_id' , '=', $id)->value('Experience');
        $interest = traineeInterests::where( 'trainee_id' , $id)->value('interests');
        $language = traineeLanguages::where( 'trainee_id' , $id)->value('languages');
        $skill = traineeSkills::where( 'trainee_id' , $id)->value('skills');

        return view('PTunit/traineeDetailsUnit', [
            'trainee' => $trainee ,
            'experience' => $experience ,
            'interest' => $interest ,
            'language' => $language ,
            'skill' => $skill
        ]);
    }

    public function showReviews($id){

        $companyInfo = company::where( 'id' , $id)->first();

         $reviews = review::join('users', 'users.trainee_id', '=', '_review.trainee_id')->where('company_id', $id)->orderBy('Create_at' , 'desc')->get();

        return view('trainee/reviews',[
            'reviews' => $reviews ,
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
}
