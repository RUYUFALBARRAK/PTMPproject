<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class RazanController extends Controller
{
    public function inst(){
        return view('trainee/instruction');
    }

    public function details(){
        return view('trainee/traineeDetails');
    }

    public function showReviews(){
        $reviews = Review::all();

        return view('trainee/reviews',[
            'trainee/reviews' => $reviews ,
        ]);
    }

    public function addReview(){
        return view('trainee/addReview');
    }

    public function viewReview(){
        return view('trainee/viewReview');
    }
}
