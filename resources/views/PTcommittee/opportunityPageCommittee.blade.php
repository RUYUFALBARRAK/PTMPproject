@extends('PTcommittee.mainPage')

@section('content-training')
<div class="content">

<form method="GET" action="{{url('/opportunityPageCommittee')}}">
  <div style="width:50%" class="input-group">
  <input type="search" class="form-control rounded" name="query" placeholder="Search for opportunity name..." aria-label="Search" aria-describedby="search-addon" />
  <button type="submit" class="btn btn-outline-dark">Search</button>
</div>
</form>


    <div class="form-group col-md-2 state-menu" style="margin-top: -2.5%;">
      <select id="inputLocationCommettii" class="form-select ">
        <option selected>Location</option>
        <option >Riyadh</option>
        <option>Jeddah</option>
        <option>Dammam</option>
        <option>All</option>
      </select>
    </div>

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

        <td class="td-Bushra" >

            <span class="rate2-Bushra">
            <span class="fa fa-star fa-lg checked"></span>
            <span class="fa fa-star fa-lg" style="color:#ccc; text-shadow: 0.5px 0.5px 0 #8f8420;"></span>
            <span class="fa fa-star fa-lg " style="color:#ccc; text-shadow: 0.5px 0.5px 0 #8f8420;"></span>
            <span class="fa fa-star fa-lg " style="color:#ccc; text-shadow: 0.5px 0.5px 0 #8f8420;"></span>
            <span class="fa fa-star fa-lg " style="color:#ccc; text-shadow: 0.5px 0.5px 0 #8f8420;"></span>
            </span>
            <br>
    
            <a class="view-reveiws2" href="#">View Reviews</a>

        </td>

     
        <td class="td-Bushra"><button class="btn-delete" type="submit">Delete </button></td>
    
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

      <td class="td-Bushra">
            <span class="rate2-Bushra">
            <span class="fa fa-star fa-lg checked"></span>
            <span class="fa fa-star fa-lg" style="color:#ccc; text-shadow: 33% 33% 0% #8f8420;"></span>
            <span class="fa fa-star fa-lg " style="color:#ccc; text-shadow: 33% 33% 0% #8f8420;"></span>
            <span class="fa fa-star fa-lg " style="color:#ccc; text-shadow: 33% 33% 0% #8f8420;"></span>
            <span class="fa fa-star fa-lg " style="color:#ccc; text-shadow: 33% 33% 0% #8f8420;"></span>
            </span>
            <br>
           
            <a class="view-reveiws2" href="#">View Reviews</a>
          
      </td>

      <td class="td-Bushra"><button class="btn-delete" type="submit">Delete </button></td>


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

<td class="td-Bushra">
    <span class="rate2-Bushra">
    <span class="fa fa-star fa-lg checked"></span>
    <span class="fa fa-star fa-lg" style="color:#ccc; text-shadow: 33% 33% 0% #8f8420;"></span>
    <span class="fa fa-star fa-lg " style="color:#ccc; text-shadow: 33% 33% 0% #8f8420;"></span>
    <span class="fa fa-star fa-lg " style="color:#ccc; text-shadow: 33% 33% 0% #8f8420;"></span>
    <span class="fa fa-star fa-lg " style="color:#ccc; text-shadow: 33% 33% 0% #8f8420;"></span>
    </span>
    <br>
   
    <a class="view-reveiws2" href="#">View Reviews</a>
  
</td>

<td class="td-Bushra"><button class="btn-delete" type="submit">Delete </button></td>


</tr>


  </table>


</div>

@endsection

