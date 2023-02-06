@extends('PTcommittee.mainPage')

@section('content-training')

<div class='content'>
    <img src="{{ asset( $opportunity->company->logoImage ? 'storage/images/' . $opportunity->company->logoImage  : 'img/default_img.jpg') }}" alt="Company logo" class="logoCompany">
    <h3 class="spashlistB" style="margin-top: -4%;">{{ $opportunity->company->orgnizationName }}</h3>
    <br><br>
    
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

    <br>
    <div>
    <label for="validationTooltip01" class="oppT-form-label">About the role:</label>
    <label for="validationTooltip01" class="oppD-form-label">{{ $opportunity->RoleDescription}}</label>
    </div><br>
    <br>

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
    </div><br>

    @if ($opportunity->status == 'pending')
    <form action="{{ route('opportunity.update_status',$opportunity->id) }}" method="POST">
        @csrf
        <div class="input-group" style="margin-bottom:3%;">
            <button type="submit" name="status" value="accept" class="btn btn-outline-success" style="font-size: 136%; margin-left: 42%;">Accept</button>&nbsp;&nbsp;
            <button type="submit" name="status" value="reject" class="btn btn-outline-danger" style="font-size: 136%;">Reject</button>&nbsp;&nbsp;
        </div>

        <h6 class="text-secondary" style="font-size: 120%;">This opportunity need modification ?</h6>
        <hr style="color: rgb(212, 212, 212)">
        
        <div style="margin-bottom:0.5%;">
            <input type="text" class="form-control" name="note" style="width:50%" placeholder="Enter here the needed modifications.." >
            
            @if ($errors->has('note'))
                <label for="validationTooltip01" class="oppT-form-label" style="color: red; font-size:12px">{{ $errors->first('note') }}</label>
            @endif
    
        </div>

        <div>
            <button type="submit" name="status" value="need_modification" class="btn btn-outline-warning" style="font-size: 120%;">Require Modification</button>
        </div>

    </form>
    <br> <br>
    {{-- <button type="button" class="btn-status" style="background-color:#dadd28; border:#dadd28; border-radius: 7px; width: 18%;">Need modification</button> --}}
    <div style="margin-bottom:2%;">
    </div>
    @elseif ($opportunity->status == 'accept')
    <div>
        <label for="validationTooltip01" class="oppT-form-label">Status:</label>
        <label for="validationTooltip01" class="oppD-form-label text-success">Accepted</label>
    </div><br>
    @elseif ($opportunity->status == 'reject')
    <div>
        <label for="validationTooltip01" class="oppT-form-label">Status:</label>
        <label for="validationTooltip01" class="oppD-form-label text-danger">Rejected</label>
    </div><br>
    @elseif($opportunity->status == 'need_modification')
    <div>
        <label for="validationTooltip01" class="oppT-form-label">Status:</label>
        <label for="validationTooltip01" class="oppD-form-label text-warning">Need Modification</label>
    </div><br>
    @endif

    <br><br>

    <a href="{{ url('/opportunityRequestCommittee') }}" class="btn btn-light">Back</a>
</div>
 

@endsection
