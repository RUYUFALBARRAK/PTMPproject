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

    
   

function ViewMainpage(){
    if(Session::has('loginId')){
    $data=['loginIdUser'=> trainee::where('trainee_id','=',session('loginId'))->first()];}
    return view('trainee/triningTap',$data);
}


function logout(Request $request){
$logout= $request->session()->flush();
return redirect('login');
}

function uploadfile(Request $request){
            if(request()->hasfile('Presentation')||request()->hasfile('TrainingSurvey')||request()->hasfile('report')||request()->hasfile('EffectiveDateNotice')){
                $avatarName = time().'.'.request()->logoImage->getClientOriginalExtension();
                request()->logoImage->move(public_path('logoImage'), $avatarName);
            }
            $data = $request->all();
            $check = $this->create($data);
            return redirect('LoginForCompany');

}
}
