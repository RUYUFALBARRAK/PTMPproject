<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\trainee;
use App\Models\company;
use App\Models\document;
use App\Models\Sendsdocument;
use App\Models\committee;
use App\Models\traineeSkills ;
use App\Models\traineeLanguages;
use App\Models\traineeInterests;
use App\Models\traineeExperience;
use App\Models\unit;
use App\Models\oppourtunity;
use App\Models\cv;
use \App\Enum\fileNameEnum;
use Validator;
use DB;
use File;
use Response;
use Illuminate\Support\Str;

class PTMPController extends Controller
{
    function viewlogin(){
        return view('login');
    }


    function Authlogin(Request $request){
        $request->validate([
            'id' => 'required|numeric',
            'password' => 'required|required|min:6',
        ]);
        /*$credentials = $request->only('trainee_id', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('traineeMainPage')
                        ->with('message', 'Signed in!');
        }*/
        $user= trainee::where('trainee_id','=',$request->id)->first();
        $committee=committee::where('committee_id','=',$request->id)->first();
        $unit=unit::where('unit_id','=',$request->id)->first();
        

        if($user||$committee||$unit){
                if($user){
                    if(($request->password == $user->password)){
                    $request->session()->put('loginId',$user->trainee_id);
                    return redirect('traineeMainPage');}
                    else{
                        return back()->with('fail','id or password worng');
                    }
                }else if($committee){
                    if(($request->password == $committee->password)){
                    $request->session()->put('loginId',$committee->committee_id);
                    return redirect('listOfStudents');}
                    else{
                        return back()->with('fail','id or password worng');
                    }
                }else if ($unit){
                    if(($request->password == $unit->password)){
                    $request->session()->put('loginId',$unit->unit_id);
                    return redirect('listOfStudentsPTunit');}
                    else{
                        return back()->with('fail','id or password worng');
                    }
                } 
             
        }else{
            return back()->with('fail','did not find the id');
        }
    }

    
   

function ViewMainpage(){
    if(Session::has('loginId')){
        $TrainingSurvey= false;
        $Presentation=false;
        $report=false;
        $EffectiveDateNotice=false;
    $find =Sendsdocument::whereHas('trainee',function($q){
    $q->where('trainee_id', '=', session('loginId'));})->get();
    foreach($find as $find){
    if($find->doc_name==fileNameEnum::TrainingSurvey){
        $TrainingSurvey=true;
    }
     if($find->doc_name==fileNameEnum::Presentation){
        $Presentation=true;
    }
     if($find->doc_name==fileNameEnum::report){
        $report=true;
    }
    if($find->doc_name==fileNameEnum::EffectiveDateNotice){
        $EffectiveDateNotice=true;
    }}
    $data=['loginIdUser'=>  trainee::where('trainee_id','=',session('loginId'))->first(),// trainee::with('oppourtunity')->get()->first(),
   // 'file'=> trainee::with('Sendsdocument')->get()->first()
   'TrainingSurvey'=> $TrainingSurvey,
   'Presentation'=> $Presentation,
   'report'=> $report,
   'EffectiveDateNotice'=> $EffectiveDateNotice,
];
}
   //$data['file'][1]['doc_name'];
    return  view('trainee/triningTap',$data);
}


function logout(Request $request){
$logout= $request->session()->flush();
return redirect('welcome');
}

function uploadfile(Request $request){
    $Sendsdocument= new Sendsdocument();
    if(request()->hasfile('Presentation')!=null){
        $request->validate([
            'Presentation' => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt',
        ]);
            $fileName = $request->Presentation->getClientOriginalName();
            $request->Presentation->storeAs('PresentationFiles', $fileName,'public');
            $Sendsdocument->doc_name= fileNameEnum::Presentation;
            $Sendsdocument->document =$request->Presentation->getClientOriginalName();
    }else if(request()->hasfile('TrainingSurvey')!=null){
         $request->validate([
            'TrainingSurvey' => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt',
        ]);
            $fileName = $request->TrainingSurvey->getClientOriginalName();
            $request->TrainingSurvey->storeAs('TrainingSurveyFiles', $fileName,'public');
            $Sendsdocument->doc_name= fileNameEnum::TrainingSurvey;
            $Sendsdocument->document= $request->TrainingSurvey->getClientOriginalName();
    }else if(request()->hasfile('report')!=null){
        $request->validate([
            'report' => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt',
        ]);
            $Sendsdocument->doc_name= fileNameEnum::report;
            $fileName = $request->report->getClientOriginalName();
            $request->report->storeAs('reportFiles', $fileName,'public');
            $Sendsdocument->document= $request->report->getClientOriginalName();
    }else if(request()->hasfile('EffectiveDateNotice')!=null){
        $request->validate([
            'EffectiveDateNotice' => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt',
        ]);
            $fileName = $request->EffectiveDateNotice->getClientOriginalName();
            $request->EffectiveDateNotice->storeAs('EffectiveDateNoticeFiles', $fileName,'public');
            $Sendsdocument->document= $request->EffectiveDateNotice->getClientOriginalName();
            $Sendsdocument->doc_name= fileNameEnum::EffectiveDateNotice;
    }

    
            $Sendsdocument->opportunity_id=trainee::where('trainee_id','=',session('loginId'))->first()->opportunity_id;
            $Sendsdocument->committee_id= trainee::where('trainee_id','=',session('loginId'))->first()->committee_id;
            $Sendsdocument->trainee_id= trainee::where('trainee_id','=',session('loginId'))->first()->trainee_id;
            $Sendsdocument->save();
            return redirect('traineeMainPage')->with('success','Successfully uploaded!');

}
function CVshow(){
     if(Session::has('loginId')){
         $data=['loginIdUser'=>  trainee::where('trainee_id','=',session('loginId'))->first(),
        'skills'=> traineeSkills::where('trainee_id','=',session('loginId'))->get(),
        'Languages'=> traineeLanguages::where('trainee_id','=',session('loginId'))->get(),
        'Interests'=> traineeInterests::where('trainee_id','=',session('loginId'))->get(),
        'Experience'=> traineeExperience::where('trainee_id','=',session('loginId'))->get(),
        
    ];
     }
  return view('trainee/CV-Tap',$data);
}

function addSkill(Request $request){
             $request->validate([
            'skills' => 'required|unique:traineeskills|max:30',
        ]);
$skills=explode(",",$request->skills);
foreach($skills as $skills){
$traineeSkills= new traineeSkills();
$traineeSkills->skills=$skills;
$traineeSkills->trainee_id=session('loginId');
$traineeSkills->save();
}        
return back();//Str::contains($request->skills, ',');
}
function deleteSkills($id){
        $skills = traineeSkills::FindorFail($id);
        $skills->delete();
        return back();

}
function addLanguages(Request $request){
     $request->validate([
        'Languages' => 'required|unique:traineelanguage|max:30',
        ]);
$Languages=explode(",",$request->Languages);
foreach($Languages as $Languages){
$traineeLanguages= new traineeLanguages();
$traineeLanguages->Languages=$Languages;
$traineeLanguages->trainee_id=session('loginId');
$traineeLanguages->save();
}        
return back();
}
function deleteLanguages($id){
        $Languages = traineeLanguages::FindorFail($id);
        $Languages->delete();
        return back();
}

function addInterests(Request $request){
$request->validate([
'Interests' => 'required|unique:traineeinterests|max:30',
]);
$Interests=explode(",",$request->Interests);
foreach($Interests as $Interests){
$traineeInterests= new traineeInterests();
$traineeInterests->Interests=$Interests;
$traineeInterests->trainee_id=session('loginId');
$traineeInterests->save();
}        
return back();
}
function deleteInterests($id){
        $Interests = traineeInterests::FindorFail($id);
        $Interests->delete();
        return back();
}
function addExperience(Request $request){
    $request->validate([
     'Experience' => 'required|unique:traineeexperience|max:30',
    ]);
$Experience=explode(",",$request->Experience);
foreach($Experience as $Experience){
$traineeExperience= new traineeExperience();
$traineeExperience->Experience=$Experience;
$traineeExperience->trainee_id=session('loginId');
$traineeExperience->save();
}        
return back();
}
function deleteExperience($id){
        $Experience = traineeExperience::FindorFail($id);
        $Experience->delete();
        return back();
}
function addfile(Request $request){

}
}
