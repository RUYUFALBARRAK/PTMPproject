@extends('company.mainPage')

@section('content-training')

<div class='content'>
    <img src="{{ asset( $opportunity->company->logoImage ? 'storage/images/' . $opportunity->company->logoImage  : 'img/default_img.jpg') }}" alt="Company logo" class="logoCompany">
    <h3 class="spashlistB" style="margin-top: -4%;">{{ $opportunity->company->orgnizationName }}</h3>
    <br><br>

    <br><br><br>
    @if($opportunity->status=='need_modification')
        <div>
        <label for="validationTooltip01" style="color:#dadd28;" class="oppT-form-label">Modification:</label>
        <label for="validationTooltip01" class="oppD-form-label">{{ $opportunity->note }}</label>
        </div><br>
    @endif
    <div>
    <label for="validationTooltip01" class="oppT-form-label">job title:</label>
    <label for="validationTooltip01" class="oppD-form-label">{{ $opportunity->jobTitle }}</label>
    </div><br>
    <div>
    <label for="validationTooltip01" class="oppT-form-label">number Of Trainees Assigned:</label>
    <label for="validationTooltip01" class="oppD-form-label">{{ $opportunity->numberOfTraineeAssigned }}</label>
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
        &nbsp;
        <p><a class="linkB" href="{{url('/downloade/' .$opportunity->id)}}" style="color: blue;">{{ $opportunity->PtPlan }}</a>&nbsp;
        <a href=<span class="glyphicon glyphicon-download-alt "></span></a></p>
        </div><br><br>

        <a href="{{ url('/opportunityPageCompany') }}" class="btn btn-light">Back</a>

   

</div>


@endsection
