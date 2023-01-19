<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Repositories\UserRepository;

use App\Models\trainee;
use App\Models\company;
use Illuminate\Support\Facades\Validator;
use App\Models\oppourtunity;
use App\Models\requestedopportunity;
use Illuminate\Validation\Rule;
use Alert;

use Hash;
use Session;
use \App\Enum\fileNameEnum;
use File;
use Response;
use Carbon\Carbon;


class BushraController extends Controller
{

    //Company
    public function EditPerInfComp(){
    return view('Company/personalInfoCompanyEdit');
    }

    public function updateCompany(Request $request){

        $company_id = session()->get('logincompId');
        $company = Company::findOrFail($company_id);

        Validator::make($request->all() , [

            'Registration' => 'required',
            'website' => 'required|url',
            'orgnizationEmail' => ['required' , 'email' , Rule::unique('company')->ignore($company)],
            'OrganizationPhone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|numeric',
            'description' => 'required',
            'SupervisorName' => 'required|max:20',
            'Address' => 'required',
            'SupervisorPhone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',

        ])->validate();


        $company->update($request->all());

        Alert::success('', 'Company Information Updated Successfully');


        return redirect()->route('company.show' , $company->id);


        //$company = Company::findOrfail($id);


    }

    //Trainee

    //committee
    public function updateOpportunityStatus(Request $request,$id){

        $opportunity = oppourtunity::findOrFail($id);

        if($request->status == 'accept'){

            $opportunity->update([
                'status' => 'accept',
            ]);
            Alert::success('', 'Opportunity Has Been Accepted');
            return redirect()->back();

        }elseif($request->status == 'reject'){

            $opportunity->update([
                'status' => 'reject',
            ]);

            Alert::success('', 'Opportunity Has Been Rejected');
            return redirect()->back();

        }elseif($request->status == 'need_modification'){

            Validator::make($request->all() , [
                'note' => 'required',
            ])->validate();

            $opportunity->update([
                'status' => 'need_modification',
                'note'  => $request->note,
            ]);

            Alert::success('', 'Opportunity Has Been Sent To Modification');
            return redirect()->back();

        }
    }



    // Excute When student apply on opportunity
    public function opportunityApplySubmit(Request $request,$id){

        $opportunity = oppourtunity::findOrFail($id);

        requestedopportunity::create([
            'statusbycommittee' => 'pending',
            'statusbycompany' => 'pending',
            'statusbytrainee'  => 'pending',
            'trainee_id' => session()->get('loginId'),
            'opportunity_id' => $opportunity->id,
            'company_id' => $opportunity->company->id,
        ]);

        Alert::success('', 'Opportunity has been applied for');
        return redirect()->route('opportunity.confirm' , $opportunity->id);

    }

    // Excute When student Confirm opportunity
    public function confirmOpportunity(Request $request,$id){

        $req_opportunity = requestedopportunity::findOrFail($id);

        $req_opportunity->update([
            'statusbytrainee' => 'accept',
            'statusbycompany' => 'accept',
        ]);

        Alert::success('', 'Opportunity has been Confirmed');
        return redirect()->back();

    }
    
        //download files
    public function downloade($id){
        $data = oppourtunity::where('id', $id)->value('PtPlan');
        $filepath = storage_path("app/public/files/{$data}");
        return \Response::download($filepath);
    }

}

    



