@extends('trainee.mainPage')

@section('content-training')


<div class='content'>
    <img src="{{ asset( $opportunity->company->logoImage ? $opportunity->company->logoImage  : 'img/default_img.jpg') }}" alt="Company logo" class="logoCompany">
    <h3 class="spashlistB">{{ $opportunity->company->orgnizationName }}</h3>
    <br>

    <span class="rate2" style="margin-left: 84%; margin-top: -3%;">
    <span class="fa fa-star fa-lg checked"></span>
    <span class="fa fa-star fa-lg" style="color:#ccc; text-shadow: 0.5px 0.5px 0 #8f8420;"></span>
    <span class="fa fa-star fa-lg " style="color:#ccc; text-shadow: 0.5px 0.5px 0 #8f8420;"></span>
    <span class="fa fa-star fa-lg " style="color:#ccc; text-shadow: 0.5px 0.5px 0 #8f8420;"></span>
    <span class="fa fa-star fa-lg " style="color:#ccc; text-shadow: 0.5px 0.5px 0 #8f8420;"></span>
    </span>
    <br>
    <div class="view-reveiws2" style="margin-left: 84%; ">
        <a href="#">View Reviews</a>
    </div>
    <br><br><br>


    <div>
    <label for="validationTooltip01" class="oppT-form-label">job title:</label>
    <label for="validationTooltip01" class="oppD-form-label">{{ $opportunity->jobTitle }}</label>
    </div><br>

    <div>
    <label for="validationTooltip01" class="oppT-form-label">Start Date:</label>
    <label for="validationTooltip01" class="oppD-form-label">{{ Carbon\Carbon::parse($opportunity->Start_at)->toFormattedDateString() }}</label>
    </div><br>

    <div>
    <label for="validationTooltip01" class="oppT-form-label">End Date:</label>
    <label for="validationTooltip01" class="oppD-form-label">{{ Carbon\Carbon::parse($opportunity->end_at)->toFormattedDateString() }}</label>
    </div><br>

    <div>
    <label for="validationTooltip01" class="oppT-form-label">About the company:</label>
    <label for="validationTooltip01" class="oppD-form-label">{{ $opportunity->company->description }}</label>
    </div><br>

    <div>
    <label for="validationTooltip01" class="oppT-form-label">About the role:</label>
    <label for="validationTooltip01" class="oppD-form-label">{{ $opportunity->RoleDescription}}</label>
    </div><br>

    <div>
    <label for="validationTooltip01" class="oppT-form-label">Training Requirement:</label>
    <label for="validationTooltip01" class="oppD-form-label">{{ $opportunity->requirement }}</label>
    </div><br>

    <div>
    <label for="validationTooltip01" class="oppT-form-label">Incentive:</label>
    <label for="validationTooltip01" class="oppD-form-label">{{ $opportunity->incentive }}</label>
    </div><br>

    <div>
    <label for="validationTooltip01" class="oppT-form-label">Work Hours:</label>
    <label for="validationTooltip01" class="oppD-form-label">{{ $opportunity->workHours }}</label>
    </div><br>

    <div>
        <label for="validationTooltip01" class="oppT-form-label">Supervisor:</label>
        <label for="validationTooltip01" class="oppD-form-label">{{ $opportunity->supervisorName }}</label>
        </div><br>
    
        <div>
        <label for="validationTooltip01" class="oppT-form-label">Email:</label>
        <label for="validationTooltip01" class="oppD-form-label">{{ $opportunity->company->orgnizationEmail  }}</label>
        </div><br>
    
        <div>
        <label for="validationTooltip01" class="oppT-form-label">Phone Number:</label>
        <label for="validationTooltip01" class="oppD-form-label">{{ $opportunity->company->OrganizationPhone }}</label>
        </div><br>
    
        <div>
        <label for="validationTooltip01" class="oppT-form-label">Address:</label>
        <label for="validationTooltip01" class="oppD-form-label">{{ $opportunity->address }}</label>
        </div><br>
    
        <div>
            <label for="validationTooltip01" class="oppT-form-label">Application deadline:</label>
            <label for="validationTooltip01" class="oppD-form-label">{{ $opportunity->AppDeadline }}</label>
        </div><br><br>

        
        @php 
            $req_opportunity = \App\Models\requestedopportunity::where('opportunity_id' , $opportunity->id)->where('trainee_id' , session()->get('loginId'))->first();
        @endphp

        @if ($req_opportunity->statusbycompany == 'reject')
            <div>
                <label for="validationTooltip01" class="oppT-form-label">Status:</label>
                <label for="validationTooltip01" class="oppD-form-label text-danger">Rejected</label>
            </div><br><br>
        @endif

            <form action="#" method="post">
                @if ($req_opportunity->statusbycompany == 'accept')
                    <button type="submit" class="btn-conf">Confirm</button>
                @elseif($req_opportunity->statusbycompany == 'pending')
                    <button disabled type="submit" class="btn btn-secondary d-block mx-auto">Waitting for Approval..</button>                
                @endif
            </form>


            
        <div>

</div>

@endsection
