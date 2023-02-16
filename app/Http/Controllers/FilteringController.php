<?php

namespace App\Http\Controllers;

use App\Models\oppourtunity;
use App\Models\Review;
use App\Models\trainee;
use Illuminate\Http\Request;

class FilteringController extends Controller
{

    public function studentList()
    {

        $students = trainee::select("*")->where(function ($q) {
            if (request()->status) {
                $q->where('status', request()->status);
            }
        })->get();

        return view('PTcommittee/listOfStudents', compact('students'));

    }


    public function opportunityTrainee(Request $request)
    {
        $opportunities = oppourtunity::where('status', 'accept')->where('numberOfTrainee', '>=', 'numberOfTraineeAssigned')->where(function ($q) use ($request) {
            if ($request->address) {
                // put in session
                session(['address' => $request->address]);
                $q->where('address', 'LIKE', '%' . $request->address . '%');
            }else{
                session(['address' => ' ']);
            }

            if ($request->status && $request->status != "all") {
                // put in session
                session(['status' => $request->status]);
                if ($request->status == "available") {
                    // isn't have relation trainee
                    $q->whereDoesntHave("trainee");
                } else {
                    $q->whereHas("trainee", function ($q) use ($request) {
                        $q->where("statusFormCompany", $request->status);
                    });
                }
            }else{
                session(['status' => 'all']);
            }


        })->get();
        $id = trainee::join('opportunity', 'opportunity.id', '=', 'users.opportunity_id')->where('trainee_id', '=', session('loginId'))->value('opportunity.company_id');
        $reviews = Review::get();
        // return $opportunities;
        return view('trainee/opportunityPageTrainee', [
            'opportunities' => $opportunities,
            'reviews' => $reviews,
        ]);
    }

}
