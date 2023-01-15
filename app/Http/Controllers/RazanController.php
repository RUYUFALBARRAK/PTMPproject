<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Repositories\UserRepository;

use App\Models\review;
use App\Models\trainee;
use App\Models\company;

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

    public function detailsForCommittee($id){
        $trainee = trainee::join('cv', 'cv.trainee_id', '=', 'users.trainee_id')->where( 'users.trainee_id', $id)->first();
        return view('PTcommittee/traineeDetailsCommittee', ['trainee' => $trainee]);
    }

    public function detailsForCompany($id){
        $trainee = trainee::join('cv', 'cv.trainee_id', '=', 'users.trainee_id')->where( 'users.trainee_id', $id)->first();
        return view('Company/traineeDetailsCompany', ['trainee' => $trainee]);
    }

    public function detailsForUnit($id){
        $trainee = trainee::join('cv', 'cv.trainee_id', '=', 'users.trainee_id')->where( 'users.trainee_id', $id)->first();
        return view('PTunit/traineeDetailsUnit', ['trainee' => $trainee]);
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

       return redirect('/traineeMainPage'); /* ->with('msg','review was submitted successfully') */
    }

    public function destroy(){

        $review = review::where('trainee_id', '=', session('loginId'))->first();
        $review->delete();
        return redirect('/traineeMainPage');
    }
}
