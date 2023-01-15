<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\trainee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    function listOfTraineesCompany(){
        $id = Auth::id(); 
        $trainee= DB::table('users')->join('opportunity', 'users.opportunity_id', '=', 'opportunity.id')->where('company_id',  $id)->Where('statusFormCompany', 'accept') ->get(); 
        return view('Company/listOfTrainees',compact('trainee'));
    }
    function searchlistOfTraineesCompany(){
        $id = Auth::id(); 
        $search_trainee = $_GET['query'];
        $traineesResult = DB::table('users')->join('opportunity', 'users.opportunity_id', '=', 'opportunity.id')->where('company_id',  $id)->Where('statusFormCompany', 'accept') ->where('name', 'LIKE', '%' . $search_trainee . '%' )-> orWhere ('trainee_id', 'LIKE', '%' . $search_trainee . '%')->get();
        return view('Company/searchlistOfTraineesCompany',compact('traineesResult'));
    }
    //pt committee
    public function studentList(){

        $students =trainee::select("*")->where('status', 'Available')-> orWhere ('status', 'Ongoing')->get();

        return view('PTcommittee/listOfStudents',compact('students'));
        
    }
    //PT unit
    public function studentListPT(){

        $students =trainee::select("*")->where('status', 'Available')-> orWhere ('status', 'Ongoing')->get();

        return view('PTunit/listOfStudentsPTunit',compact('students'));
        
    }
    public function searchstudentListPT(){
        $search_trainee = $_GET['query'];

        $students =trainee::select("*")->where('name', 'LIKE', '%' . $search_trainee . '%' )-> orWhere ('trainee_id', 'LIKE', '%' . $search_trainee . '%')->get();

        return view('PTunit/searchlistOfStudentsPTunit',compact('students'));
        
    }
    //company request
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
