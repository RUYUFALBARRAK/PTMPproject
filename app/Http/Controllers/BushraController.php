<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\trainee;
use App\Models\company;
use Illuminate\Support\Facades\Validator;
use Alert;
use App\Models\oppourtunity;
use Illuminate\Validation\Rule;

class BushraController extends Controller
{

    //Company
    public function EditPerInfComp(){
    return view('Company/personalInfoCompanyEdit');
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

            Alert::error('', 'Opportunity Has Been Rejected');
            return redirect()->back();

        }elseif($request->status == 'need_modification'){

            Validator::make($request->all() , [
                'note' => 'required',
            ])->validate();

            $opportunity->update([
                'status' => 'need_modification',
                'note'  => $request->note,
            ]);

            Alert::warning('', 'Opportunity Has Been Sent To Modification');
            return redirect()->back();

        }
    }

}
