<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Repositories\UserRepository;

use App\Models\trainee;
use App\Models\company;
use App\Models\Review;
use Illuminate\Support\Facades\Validator;
use Alert;
use App\Models\oppourtunity;
use App\Models\requestedopportunity;
use Illuminate\Validation\Rule;

use Hash;
use PhpParser\Node\Stmt\Expression;
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

    //committee
    public function updateOpportunityStatus(Request $request,$id){

        $opportunity = oppourtunity::findOrFail($id);

        if($request->status == 'accept'){

            $opportunity->update([
                'status' => 'accept',
            ]);
            
            Alert::success('', 'Opportunity Has Been Accepted');
            return redirect()->back();


        } elseif($request->status == 'reject'){

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

        $req_opportunity = requestedopportunity::where('opportunity_id' , $id)->where('trainee_id' , session()->get('loginId'))->first();

        $req_opportunity->update([
            'statusbytrainee' => 'accept',
            'statusbycompany' => 'accept',
            'numberOfTraineeAssigned'=>new Expression('numberOfTraineeAssigned + 1')
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

    public function opportunityTrainee(){
        $opportunities = oppourtunity::where('status' , 'accept')->where('numberOfTrainee','>=', 'numberOfTraineeAssigned')->get();
        $id = trainee::join('opportunity', 'opportunity.id', '=', 'users.opportunity_id')->where('trainee_id', '=', session('loginId'))->value('opportunity.company_id');
        $reviews = Review::get();
        return view('trainee/opportunityPageTrainee' , [
            'opportunities' => $opportunities ,
            'reviews' => $reviews
        ]);
    }
    public function searchopportunityPageTrainee(){
        $search_opp = $_GET['query'];
        $opportunities = oppourtunity::where('jobTitle', 'LIKE', '%' . $search_opp . '%' )->where('status' , 'accept')->where('numberOfTrainee','>=', 'numberOfTraineeAssigned')->get();
        $id = trainee::join('opportunity', 'opportunity.id', '=', 'users.opportunity_id')->where('trainee_id', '=', session('loginId'))->value('opportunity.company_id');
        $reviews = Review::get();
        return view('trainee/opportunityPageTrainee' , [
            'opportunities' => $opportunities ,
            'reviews' => $reviews
        ]);
    }


    public function deleteOpportunity(){
        //
    }
}
