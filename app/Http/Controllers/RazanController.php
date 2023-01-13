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

    public function details(){
        return view('trainee/traineeDetails');
    }

    public function showReviews(){

        $companyInfo = company::where( 'id' , '3')->first(); /* NEED to change id */

         $reviews = review::join('users', 'users.trainee_id', '=', '_review.trainee_id')->where('company_id', '3')->orderBy('Create_at' , 'desc')->get(); /* NEED to change id */

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
            'review'=>'required | max:300'
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
