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
                    $request->session()->put('loginId',$company->id);
                    return redirect('traineeMainPage');
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
                $avatarName = time().'.'.request()->logoImage->getClientOriginalExtension();
                request()->logoImage->move(public_path('logoImage'), $avatarName);
            }
            $data = $request->all();
            $check = $this->create($data);
            return redirect('LoginForCompany');
          
    }

    public function create(array $data)
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
    } 

    function Authopportunity(Request $request){
                $request->validate([
            'jobTitle' => 'required',
            'workHours' => 'required|numeric',
            'orgnizationEmail' => 'required|email|unique:company',
            'supervisorPhone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|numeric',
            'supervisorName' => 'required',
            'Start_at' => 'required|date',
            'end_at' => 'required|date',
            'address' => 'required',
            'AppDeadline' => 'required|date',
            'requirement' => 'required',
            'numberOfTrainee' => 'required|numeric',
            'RoleDescription' => 'required'
           
            
        ]);
       
        $data = $request->all();
            $check = $this->createopportunity($data);
            return redirect('LoginForCompany');
    }
    function createopportunity(array $data){
        return oppourtunity::create([
        'jobTitle' => $data['jobTitle'],
        'workHours' => $data['workHours'],
        'orgnizationEmail' => $data['orgnizationEmail'],
        'supervisorPhone'=>$data['supervisorPhone'],
        'orgnizationEmail' => $data['orgnizationEmail'],
        'supervisorName' => $data['supervisorName'],
        'Start_at' => $data['Start_at'],
        'end_at' => $data['end_at'],
        'address' => $data['address'],
        'AppDeadline' => $data['AppDeadline'],
        'requirement' => $data['requirement'],
        'numberOfTrainee' => $data['numberOfTrainee'],
        'RoleDescription' => $data['RoleDescription'],
        
        
      ]);
    }
}
