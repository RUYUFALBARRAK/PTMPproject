<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\trainee;
use App\Models\company;
use App\Models\document;
use App\Models\oppourtunity;
use \App\Enum\companyStatus;
use Validator;
use DB;
use File;
use Response;
use Illuminate\Validation\Rule;
use Alert;


class companyController extends Controller
{
    function Authlogincompany(Request $request){
        $request->validate([
            'orgnizationEmail' => 'required|email',
            'password' => 'required|required|min:6',
        ]);
    
        $company= company::where('orgnizationEmail','=',$request->orgnizationEmail)->first();
        if($company){
            if(Hash::check($request->password ,$company->password)){
                    $request->session()->put('logincompId',$company->id);
                    return redirect()->route('company.show' , $company->id);
            } else{
                return back()->with('fail','email or password worng');
            }
        }else{
            return back()->with('fail','the account is not registered');
        }

    }
        function viewreg(){
            $doc= document::where('documentName','=','TrainingSpecifications.pdf')->first();
       return view('company/registerCompany',compact('doc'));
    }


    function Authreg(Request $request){
        $request->validate([
            'orgnizationName' => 'required|regex:/^[A-Za-z\-\s]+$/|max:50',
            'website' => 'required|url',
            'orgnizationEmail' => 'required|email|unique:company',
            'OrganizationPhone' => 'required|regex:/(966)[0-9]{9}/|numeric|digits:12|numeric',
            'Registration' => 'required|digits:10',
            'description' => 'required|max:250|regex:/^[A-Za-z\-\s]+$/',
            'SupervisorName' => 'required|regex:/^[A-Za-z\-\s]+$/',
            'city' => 'required',
            'SupervisorPhone' => 'required|regex:/(966)[0-9]{9}/|numeric|digits:12|numeric',
            'SupervisorEmail' => 'required|confirmed',
            'SupervisorEmail_confirmation' => 'required|email',
            'password' => 'required|confirmed|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/',
            'SupervisorFax' => 'required|regex:/(966)[0-9]{9}/|numeric',
            'Address' => 'required',
            'password_confirmation' => 'required|min:8',
            'logoImage'=> 'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ],
         [
            'unique' => 'The email already been registered.',
            'password.regex'  => 'Password must contain at least 8 number and both uppercase and lowercase letters.',
        ]
    );
 


      /*  
          $res= $company->save();
          if($res){
                return back()->with('success','you have sign up successfully');
          }else{
            return back()->with('fail','something wrong');}*/
            if(request()->hasfile('logoImage')){
                $avatarName = $request->logoImage->getClientOriginalName();
                $request->logoImage->storeAs('images', $avatarName,'public');
            }
     $company= new company();
        $company->orgnizationName= $request['orgnizationName'];
        $company->website= $request['website'];
        $company->orgnizationEmail= $request['orgnizationEmail'];
        $company->OrganizationPhone= $request['OrganizationPhone'];
        $company->Registration= $request['Registration'];
        $company->description= $request['description'];
        $company->logoImage= $request->logoImage->getClientOriginalName();
        $company->country= $request['city'];
        $company->SupervisorName= $request['SupervisorName'];
        $company->SupervisorPhone= $request['SupervisorPhone'];
        $company->SupervisorEmail= $request['SupervisorEmail'];
        $company->password=Hash::make( $request['password']);
        $company->SupervisorFax= $request['SupervisorFax'];
        $company->Address= $request['Address'];
   
    $company->save();
            return redirect('loginCompany')->with('correctReg','the account is registered successfully' );;
          
    }

   /* public function create(array $data)
    {
      return company::create([
        'orgnizationName' => $data['orgnizationName'],
        'website' => $data['website'],
        'SupervisorName' => $data['SupervisorName'],
        'logoImage'=>$data['logoImage'],
        'orgnizationEmail' => $data['orgnizationEmail'],
        'Registration' => $data['Registration'],
        'OrganizationPhone' => $data['OrganizationPhone'],
        'description' => $data['description'],
        'country' => $data['country'],
        'SupervisorPhone' => $data['SupervisorPhone'],
        'SupervisorEmail' => $data['SupervisorEmail'],
        'SupervisorFax' => $data['SupervisorFax'],
        'Address' => $data['Address'],
        'password' => Hash::make($data['password'])
      ]);
    } */

    function Authopportunity(Request $request){
        if(request()->has('Start_at'))
            $request->validate([
            'jobTitle' => 'required|regex:/^[A-Za-z\-\s]+$/',
            'workHours' => 'required|numeric',
            'supervisorPhone' => 'required|regex:/(966)[0-9]{9}/|numeric|digits:12',
            'supervisorName' => 'required|regex:/^[A-Za-z\-\s]+$/',
            'Start_at' => 'required|date',
            'end_at' => 'required|date|after:Start_at',
            'address' => 'required',
            'AppDeadline' => 'required|date|before_or_equal:Start_at',
            'requirement' => 'required',
            'numberOfTrainee' => 'required|numeric',
            'RoleDescription' => 'required|regex:/^[A-Za-z\-\s]+$/',   
            'majors' => 'required', 
            'incentive' => 'required', 
            'uploudedfile' => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt', 
        ]);
             if(request()->hasfile('uploudedfile')){
                $fileName =$request->uploudedfile->getClientOriginalName();
                $request->uploudedfile->storeAs('files', $fileName,'public');
            }      
        $oppourtunity= new oppourtunity();
        $oppourtunity->jobTitle= $request['jobTitle'];
        $oppourtunity->workHours= $request['workHours'];
        $oppourtunity->supervisorPhone= $request['supervisorPhone'];
        $oppourtunity->supervisorName= $request['supervisorName'];
        $oppourtunity->Start_at= $request['Start_at'];
        $oppourtunity->end_at= $request['end_at'];
        $oppourtunity->PtPlan= $request->uploudedfile->getClientOriginalName();
        $oppourtunity->address= $request['address'];
        $oppourtunity->AppDeadline= $request['AppDeadline'];
        $oppourtunity->requirement= $request['requirement'];
        $oppourtunity->numberOfTrainee= $request['numberOfTrainee'];
        $oppourtunity->RoleDescription= $request['RoleDescription'];
        $oppourtunity->majors=$request['majors'];
        $oppourtunity->incentive= $request['incentive'];
        $oppourtunity->company_id= company::where('id','=',session('logincompId'))->first()->id;
   
    $oppourtunity->save();
            return redirect('addOppourtunityForCompany')->with('success','Successfully added opportunity!');
    }
  function EditAuthopportunity(Request $request,$oppo){

        if(request()->has('Start_at'))
            $request->validate([
            'jobTitle' => 'required|regex:/^[A-Za-z\-\s]+$/',
            'workHours' => 'required|numeric',
            'supervisorPhone' => 'required|regex:/(966)[0-9]{9}/|numeric|digits:12',
            'supervisorName' => 'required|regex:/^[A-Za-z\-\s]+$/',
            'Start_at' => 'required|date',
            'end_at' => 'required|date|after:Start_at',
            'address' => 'required',
            'AppDeadline' => 'required|date|before_or_equal:Start_at',
            'requirement' => 'required',
            'numberOfTrainee' => 'required|numeric',
            'RoleDescription' => 'required|regex:/^[A-Za-z\-\s]+$/',   
            'majors' => 'required', 
            'incentive' => 'required', 
            'uploudedfile' => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt', 
        ]);
             if(request()->hasfile('uploudedfile')){
                $fileName =$request->uploudedfile->getClientOriginalName();
                $request->uploudedfile->storeAs('files', $fileName,'public');
            }      
            $oppo=oppourtunity::where('id','=',$oppo)->first();
             $oppo->update([
            'jobTitle' => $request->has('jobTitle')?$request['jobTitle']: $oppo->jobTitle,
            'workHours' => $request->has('workHours')? $request['workHours']: $oppo->workHours,
            'supervisorPhone' => $request->has('supervisorPhone')? $request['supervisorPhone']: $oppo->supervisorPhone,
            'supervisorName' => $request->has('supervisorName')? $request['supervisorName']: $oppo->supervisorName,
            'Start_at' => $request->has('Start_at')? $request['Start_at']: $oppo->Start_at,
            'end_at' => $request->has('end_at')? $request['end_at']: $oppo->end_at,
            'address' => $request->has('address')? $request['address']: $oppo->address,
            'AppDeadline' => $request->has('AppDeadline')? $request['AppDeadline']: $oppo->AppDeadline,
            'requirement' => $request->has('requirement')?$request['requirement']: $oppo->requirement,
            'numberOfTrainee' => $request->has('numberOfTrainee')? $request['numberOfTrainee']: $oppo->numberOfTrainee,
            'RoleDescription' => $request->has('RoleDescription')? $request['RoleDescription']: $oppo->RoleDescription,   
            'majors' => $request->has('majors')?$request['majors']: $oppo->majors, 
            'incentive' => $request->has('incentive')? $request['incentive']: $oppo->incentive, 
            'uploudedfile' => $request->has('uploudedfile')? $request->uploudedfile->getClientOriginalName(): $oppo->PtPlan, 
        ]);

            return back()->with('success','Successfully added opportunity!');
    }

    function addOpportunityview(){
        
        if(Session::has('logincompId')){
        $data=['loginIdcompUser'=> company::where('id','=',session('logincompId'))->first()];
        return view('Company/addOpportunity', ['action' => 'add', 'data'=>$data]);}
        return redirect('loginCompany');
    }
        function EditOpportunityview($oppo){
        
        if(Session::has('logincompId')){
        $data= company::where('id','=',session('logincompId'))->first();
        $oppo=oppourtunity::where('id','=',$oppo)->first();
        return view('Company/addOpportunity', ['action' => 'edit', 'oppo'=>$oppo,'loginIdcompUser'=>$data]);}
        return redirect('loginCompany');
    }
function listOfcompany(){
    $company= DB::table('company')->where('status', 'accept')->get(); //DB::table('company')->whereIn('status', ['reject','accept'])->get();
    return view('PTunit/listOfCompany',compact('company'));
}
function listOfCompanyRequest(){
    $companyRequest = DB::table('company')->where('status', 'Pending')->get();
     return view('PTunit/listOfCompanyRequest',compact('companyRequest'));
}
function CompanyDetails($id){
    //view('PTunit/company',compact('id'));
    $company =['company'=> DB::table('company')->where('id', $id)->get()];
    return view("PTunit/companyDetails",$company);//view('PTunit/companyDetails',compact('company')); //view('PTunit/companyDetails');
}

function deleteCompany($id){
        $companyD = company::FindorFail($id);
        $Has_opportunity= oppourtunity::where('company_id','=',$id)->exists();
        $opportunity_has_trainee=oppourtunity::where('company_id','=',$id)->where('numberOfTraineeAssigned','>',0)->count();
         $company =['company'=> DB::table('company')->where('id', $id)->get()];
        if($Has_opportunity>0){
            if($opportunity_has_trainee>0){
              return  back()->with('popupNO','company Can not be deleted There are trainee applay in try again next time');
            }else{
                   $data = [
                "subject"=>"PTMP Mail",
                "body"=>"Sorry, your company was deleted for some reasons please contact with PTMP service if you are interested",
                ];
                 Mail::to($companyD->orgnizationEmail)->send(new SendMail($data));
                $companyD->delete();
                return  back()->with('popupSure','company has opportunity Are you Sure you want to delete it? ');
            }
          
        }else{
             $data = [
                "subject"=>"PTMP Mail",
                "body"=>"Sorry, your company was deleted for some reasons please contact with PTMP service if you are interested",
                ];
                 Mail::to($companyD->orgnizationEmail)->send(new SendMail($data));
            $companyD->delete();
             return  back()->with('popupSure','company has opportunity Are you Sure you want to delete it? ');
        }
        return back(); 
}

function CompanyRegestrationDetails($id){
    $company =['company'=> DB::table('company')->where('id', $id)->get()];
    return view("PTunit/regestrationRequest",$company);
}
function rejectCompany($id){
        $companyRequest = company::FindorFail($id);
             $data = [
                "subject"=>"PTMP Mail",
                "body"=>"Sorry, your company was rejected for some reasons please contact with PTMP service if you are interested",
                ];
                 Mail::to($companyD->orgnizationEmail)->send(new SendMail($data));
        $companyRequest->delete();
return redirect('/listOfCompanyRequest')->with('msgcompanyRejected','company was rejected successfully');  
}
function AcceptCompany($id){
        $companyRequest = company::FindorFail($id);
        $companyRequest->status=companyStatus::accept;
        $companyRequest->update();
    return redirect('/listOfCompanyRequest')->with('msgcompanyAccepted','company was accepted successfully');  
}

}
