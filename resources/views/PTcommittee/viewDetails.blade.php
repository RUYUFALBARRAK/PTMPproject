@extends('PTcommittee.mainPage')

@section('content-training')
<div class="content">

  <div class="input-group">

    <div style="width:20%" class="input-group">
    <input type="search" class="form-control rounded" placeholder="Search..." aria-label="Search" aria-describedby="search-addon" />
    <button type="button" class="btn btn-outline-dark" >search</button>
    </div>
  </div>


<div style=" width:80%; margin-left: 82%; margin-top:-2.5%; " class="input-group">
    <div style="font-size: 14px; margin-top:0.6%;">
    Location&nbsp;
    </div>

    <div style="width:10%">
      <select id="inputLoc" class="form-select form-select-lg" >
        <option></option>
        <option></option>
        <option></option>
        <option></option>
        <option selected>All</option>
      </select>
    </div>
</div>

    <br><br>

    <table class="table-Bushra">
        <tr class="tr-Bushra">
            <td class="fisrt-col-Bushra">
                <img src="{{asset('img/SDAIA.png')}}" alt="Company logo" width="180%" hight="180%">
                <br><br>
            </td>

            <td class="second-col-Bushra">
                <h5>Software Engineer</h5>
                <h5>Jan. 16, 2022 - Aug. 11/2022 </h5>
            </td>

            <td class="td-Bushra">
                <a class="view-reveiws2" href="#">View Details</a>
            </td>

        </tr>

        <tr class="tr-Bushra">

            <td class="fisrt-col-Bushra">
             <img src="{{asset('img/ministryOfComm.png')}}" alt="Company logo" width="220%" hight="220%">
             <br><br>
            </td>

            <td class="second-col-Bushra">
                <h5>Product Manager</h5>
                <h5>Jan. 16, 2022 - Aug. 11/2022 </h5>
            </td>

            <td class="td-Bushra">
                <a class="view-reveiws2" href="#">View Details</a>
            </td>

        </tr>
    </table>

</div>

@endsection

