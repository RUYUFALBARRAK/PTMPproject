<?php

namespace App\Http\Controllers;
use Dotenv\Validator;
use Session;
use Illuminate\Http\Request;
use App\Models\trainee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

namespace App\Http\Controllers;

use App\Models\announcement;
use App\Models\document;
use App\Models\trainee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Session;
class khawlahController extends Controller
{
    public function traineeList(){
        return view('Company/listOfTraineesRequests');
    }

 
//comppany
    public function viewtraineeList(){

        if (Session::has('logincompId')) {

            $trainee = DB::table('users')->join('requestedopportunity', 'requestedopportunity.trainee_id', '=', 'users.trainee_id')->join('opportunity', 'requestedopportunity.opportunity_id', '=', 'opportunity.id')->Where('opportunity.company_id', '=', session('logincompId'))->Where('statusbycompany', 'pending')->Where('users.status', 'Available')->get();

            return view('Company/listOfTraineesRequests', compact('trainee'));
        }
        
    }
    function listOfTraineesCompany()

    {
        if (Session::has('logincompId')) {


            $trainee =  DB::table('users')->join('requestedopportunity', 'requestedopportunity.trainee_id', '=', 'users.trainee_id')->join('opportunity', 'requestedopportunity.opportunity_id', '=', 'opportunity.id')->Where('opportunity.company_id', '=', session('logincompId'))->Where('statusFormCompany', 'accept')->Where('users.status', 'Ongoing')->get();
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
       
        
    }
    public function uploadRegulation(Request $request)
    {
        $inputs = Validator::make($request->only(['uploudedfile']), [
            'uploudedfile' => ['required', 'file', 'mimes:docx,pdf,doc', 'max:16384'],
        ]);
        if ($inputs->fails()) {
            return response()->json([
               'success' => false,
                'message' => collect($inputs->errors())->mapWithKeys(function($err) {
                    return $err;
                }),
                'theme' => 'danger',
            ], 400);
        }
        $inputs = $inputs->getData();
        if (!$request->file('uploudedfile')) {
            return response()->json([
                'success' => false,
                'message' => 'Please upload the file.',
                'theme' => 'danger',
            ], 400);
        }
        $file = $request->file('uploudedfile');
        $currentFileSize = $file->getSize();
        $currentFileName = $file->getClientOriginalName();
        $documentFromNameAndSize = document::where([['size', '=', $currentFileSize], ['documentName', '=', $currentFileName]])->first();
        if($documentFromNameAndSize) {
            return response()->json([
                'success' => false,
                'message' => 'Document already exist.',
                'theme' => 'danger',
            ], 400);
        }
        $filename = Str::random(32).'.'.$file->guessClientExtension();
        $dirpath = 'docs';
        $filepath = public_path($dirpath);
        $file->move($filepath, $filename);
        $doc = new document();
        $doc->documentName = $currentFileName;
        $doc->document = $filename;
      
        $doc->size = $currentFileSize;
        try {
            $doc->unit_id = auth()->user()->trainee_id;
        } catch (\Throwable $th) {
            $doc->unit_id = null;
        }
        if($doc->save()) {
            return response()->json([
                'success' => true,
                'message' => 'File uploaded & saved successfully.',
                'theme' => 'success',
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Error while saving.',
                'theme' => 'danger',
            ], 400);
        }
    }

}
