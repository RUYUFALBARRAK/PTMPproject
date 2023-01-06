<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\trainee;

class khawlahController extends Controller
{
    public function traineeList(){
        return view('Company/listOfTraineesRequests');
    }

 
//comppany
    public function viewtraineeList(){

        $trainee = trainee::all();

        return view('Company/listOfTraineesRequests',compact('trainee'));
        
    }
    //pt committee
    public function studentList(){

        $students = trainee::all();

        return view('PTcommittee/listOfStudents',compact('students'));
        
    }
    public function search(){

        $search_trainee = $_GET['query'];
        $traineesResult = trainee::select("*")->where('name', 'LIKE', '%' . $search_trainee . '%' )-> orWhere ('Major', 'LIKE', '%' . $search_trainee . '%')->get();
        return view('Company/searchTraineeRequest',compact('traineesResult'));

       
        
    } //
    public function searchStudent(){

        $search_Student = $_GET['query'];
        $studentResult = trainee::select("*")->where('name', 'LIKE', '%' . $search_Student . '%' )-> orWhere ('trainee_id', 'LIKE', '%' . $search_Student . '%')->get();
        return view('PTcommittee/searchStudent', compact('studentResult'));
       
        
    } //
}
