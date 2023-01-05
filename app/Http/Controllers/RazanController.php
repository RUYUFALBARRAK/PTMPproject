<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Hash;
use Session;

use App\Models\review;
use App\Models\trainee;
use App\Models\company;

use Validator;
use File;
use Response;


class RazanController extends Controller
{
    public function inst(){
        return view('trainee/instruction');
    }

    public function details(){
        return view('trainee/traineeDetails');
    }

    public function showReviews(){

        $companyInfo = company::where( 'id' , '3')->first(); /* need to change id */

        $reviews = review::join('company', 'company.id', '=', '_review.company_id')->where('company_id', '3')->orderBy('Create_at' , 'desc')->get();

        /* CHANGE AFTER ADDING FOREIGN KEY */
        /* $reviews = review::join('users', 'users.trainee_id', '=', '_review.trainee_id')->where('company_id', '3')->orderBy('Create_at' , 'desc')->get()get(); /* CHANGE AFTER ADDING FOREIGN KEY */

        return view('trainee/reviews',[
            'reviews' => $reviews ,
            'companyInfo' => $companyInfo
        ]);
    }

    public function viewReview(){

        $review = review::join('users', 'users.trainee_id', '=', '_review.trainee_id')->where('_review.trainee_id', '3')->first();

        return view('trainee/viewReview',[
            'review' => $review
        ]);
    }

    public function addReview(){
        return view('trainee/addReview');
    }

}
