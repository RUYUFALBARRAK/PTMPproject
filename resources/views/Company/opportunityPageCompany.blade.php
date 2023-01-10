@extends('company.mainPage')

@section('content-training')
<div class="content">

  <div class="input-group">

    <div style="width:20%" class="input-group">
    <h1>Opportunities</h1>
    </div>
  </div>

   
    <div class="form-group col-md-2 state-menu" style="margin-left:40%">
      <select id="inputLocationCompany" class="form-select">
        <option selected>Status..</option>
        <option>Accepted</option>
        <option>Rejected</option>
        <option>Pending</option>
        <option>Needs Modification</option>
        <option>All</option>
      </select>
    </div>


    
   <a href="addOppourtunityForCompany"> <button class="btn btn-primary"  type="button"
    style=" margin-left:75%; margin-top:-6%; font-size:140%;
    background-color: #388087;">Add training opportunity</button></a>
  



    <br><br>

    <table class="table-Bushra">
      <tr class="tr-Bushra">
          <td class="fisrt-col-Bushra">
              <img src="img/SDAIA.png" alt="Company logo" width="180%" hight="180%">
              <br><br>
          </td>

          <td class="second-col-Bushra">
              <h5>Software Engineer</h5>
              <h5>Jan. 16, 2022 - Aug. 11/2022 </h5>
          </td>

        <td>
          <h4 class="opportunityStateB2">Accepted</h4>
        </td>
      
      </tr> 
    

      <tr class="tr-Bushra">

          <td class="fisrt-col-Bushra">
            <img src="img/ministryOfComm.png" alt="Company logo" width="220%" hight="220%">
            <br><br>
          </td>

          <td class="second-col-Bushra">
          <h5>Product Manager</h5>
          <h5>Jan. 16, 2022 - Aug. 11/2022 </h5>
          </td>

        <td>
          <h4 class="opportunityStateB2">Needs Modification</h4>
        </td>

      </tr>

  </table>
    
   
</div>

@endsection

