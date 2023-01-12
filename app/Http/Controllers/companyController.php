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
                    return redirect('personalInfoCompany');
            } else{
                return back()->with('fail','email or password worng');
            }
        }else{
            return back()->with('fail','the account is not registered');
        }

    }
        function viewreg(){
       return view('company/registerCompany');
    }


    function Authreg(Request $request){
        $request->validate([
            'orgnizationName' => 'required',
            'website' => 'required|url',
            'orgnizationEmail' => 'required|email|unique:company',
            'OrganizationPhone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|numeric',
            'Registration' => 'required',
            'description' => 'required',
            'SupervisorName' => 'required',
            'city' => 'required',
            'country' => 'required',
            'SupervisorPhone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'SupervisorEmail' => 'required',
            'SupervisorEmailConfirm' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'SupervisorFax' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|numeric',
            'Address' => 'required',
            'password_confirmation' => 'required|min:6',
            'logoImage'=> 'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
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
        $company->country= $request['country'];
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
            'jobTitle' => 'required',
            'workHours' => 'required|numeric',
            'supervisorPhone' => 'required|regex:/(05)[0-9]{8}/|numeric|digits:10',
            'supervisorName' => 'required',
            'Start_at' => 'required|date',
            'end_at' => 'required|date|after:Start_at',
            'address' => 'required',
            'AppDeadline' => 'required|date|before_or_equal:Start_at',
            'requirement' => 'required',
            'numberOfTrainee' => 'required|numeric',
            'RoleDescription' => 'required',   
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
   /* function createopportunity(array $data){
        
        return oppourtunity::create([
        'jobTitle' => $data['jobTitle'],
        'workHours' => $data['workHours'],
        'supervisorPhone'=>$data['supervisorPhone'],
        'supervisorName' => $data['supervisorName'],
        'Start_at' => $data['Start_at'],
        'end_at' => $data['end_at'],
        'address' => $data['address'],
        'AppDeadline' => $data['AppDeadline'],
        'requirement' => $data['requirement'],
        'numberOfTrainee' => $data['numberOfTrainee'],
        'RoleDescription' => $data['RoleDescription'],
        'majors' => $data['majors'],
        'incentive' => $data['incentive'],
        'PtPlan' => $data['uploudedfile'],
      ]);

    }*/

    function addOpportunityview(){
        
        if(Session::has('logincompId')){
        $data=['loginIdcompUser'=> company::where('id','=',session('logincompId'))->first()];}
        return view('Company/addOpportunity',$data);
    }



    public function updateCompany(Request $request, $id){

        $company = Company::findOrFail($id);

        Validator::make($request->all() , [

            'Registration' => 'required',
            'website' => 'required|url',
            'orgnizationEmail' => ['required' , 'email' , Rule::unique('company')->ignore($company)],
            'OrganizationPhone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|numeric',
            'description' => 'required',
            'SupervisorName' => 'required',
            'Address' => 'required',
            'SupervisorPhone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',

        ])->validate();


        $company->update($request->all());

        Alert::success('', 'Company Information Updated Successfully');


        return redirect()->route('company.show' , $company->id);


        //$company = Company::findOrfail($id);


    }
}
