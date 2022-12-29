<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Models\trainee;
use App\Models\company;
use App\Models\document;
use Validator;
use DB;
use File;
use Response;

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
        if($user){
            if($request->password == $user->password){
                    $request->session()->put('loginId',$user->trainee_id);
                    return redirect('traineeMainPage');
            } else{
                return back()->with('fail','id or password worng');
            }
        }else{
            return back()->with('fail','did not find the id');
        }
    }

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


}
