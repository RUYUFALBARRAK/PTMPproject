<?php

namespace App\Http\Controllers;
use Session;
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

        if (Session::has('logincompId')) {

           $trainee = DB::table('users')->join('requestedopportunity', 'requestedopportunity.trainee_id', '=', 'users.trainee_id')->join('opportunity', 'requestedopportunity.opportunity_id', '=', 'opportunity.id')->Where('opportunity.company_id', '=', session('logincompId'))->Where('statusbycompany', 'pending')->Where('users.status', 'Available')->get();
            // $trainee = DB::table('users')->join('opportunity', 'opportunity.id', '=', 'users.opportunity_id')->Where('statusFormCompany', 'accept')->Where('users.status', 'Ongoing')->get();


            return view('Company/listOfTraineesRequests', compact('trainee'));
        }
        
    }
    function listOfTraineesCompany()

    {
        if (Session::has('logincompId')) {


           $trainee =  DB::table('users')->join('requestedopportunity', 'requestedopportunity.trainee_id', '=', 'users.trainee_id')->join('opportunity', 'requestedopportunity.opportunity_id', '=', 'opportunity.id')->Where('opportunity.company_id', '=', session('logincompId'))->Where('statusFormCompany', 'accept')->Where('users.status', 'Ongoing')->get();
           //$trainee = DB::table('users')->join('opportunity', 'opportunity.id', '=', 'users.opportunity_id')->Where('statusFormCompany', 'accept')->Where('users.status', 'Ongoing')->get();
            return view('Company/listOfTrainees', compact('trainee'));
        }

    }
    function searchlistOfTraineesCompany()
    {
        if (Session::has('logincompId')) {

            $search_trainee = $_GET['query'];
            $traineesResult = DB::table('users')->join('requestedopportunity', 'requestedopportunity.trainee_id', '=', 'users.trainee_id')->join('opportunity', 'requestedopportunity.opportunity_id', '=', 'opportunity.id')->Where('opportunity.company_id', '=', session('logincompId'))->Where('statusFormCompany', 'accept')->Where('users.status', 'Ongoing')->where('name', 'LIKE', '%' . $search_trainee . '%')->orWhere('jobTitle', 'LIKE', '%' . $search_trainee . '%')->get();
            return view('Company/searchlistOfTraineesCompany', compact('traineesResult'));
        }
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
    public function searchlistOfStudentsReqLetter(){
        $search_trainee = $_GET['query'];

        $students =trainee::select("*")->where('name', 'LIKE', '%' . $search_trainee . '%' )-> orWhere ('trainee_id', 'LIKE', '%' . $search_trainee . '%')->get();

        return view('PTunit/searchlistOfStudentsReqLetter',compact('students'));
        
    }
    //company request
    public function search(){
        if (Session::has('logincompId')) {

            $search_trainee = $_GET['query'];
            $traineesResult =DB::table('users')->join('requestedopportunity', 'requestedopportunity.trainee_id', '=', 'users.trainee_id')->join('opportunity', 'requestedopportunity.opportunity_id', '=', 'opportunity.id')->Where('opportunity.company_id', '=', session('logincompId'))->Where('statusbycompany', 'pending')->Where('users.status', 'Available')->where('name', 'LIKE', '%' . $search_trainee . '%')->orWhere('jobTitle', 'LIKE', '%' . $search_trainee . '%')->get();
            return view('Company/searchTraineeRequest', compact('traineesResult'));

        }
        
    } //
    public function searchStudent(){

        $search_Student = $_GET['query'];
        $studentResult = trainee::select("*")->where('name', 'LIKE', '%' . $search_Student . '%' )-> orWhere ('trainee_id', 'LIKE', '%' . $search_Student . '%')->get();
        return view('PTcommittee/searchStudent', compact('studentResult'));
       
        
    } //
}
