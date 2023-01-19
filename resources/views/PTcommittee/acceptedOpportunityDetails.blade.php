@extends('PTcommittee.mainPage')

@section('content-training')

<div class='content'>
    <img src="{{ asset( $opportunity->company->logoImage ? $opportunity->company->logoImage  : 'img/default_img.jpg') }}" alt="Company logo" class="logoCompany">
    <h3 class="spashlistB">{{ $opportunity->company->orgnizationName }}</h3>
    <br>

    
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
        </div><br>

        <div class="input-group" style="width: 100%;">
        <label for="validationTooltip01" class="oppT-form-label">PT Plan:</label>&nbsp;
        <p class="linkB">{{$download->PtPlan}}</p>
        <label class="linkB"><a href="{{ $download->getPlanURL()}}"></label>
        
        </div><br>

   

</div>


@endsection
