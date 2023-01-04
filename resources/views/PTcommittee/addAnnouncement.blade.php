@extends('PTcommittee.mainPage')


@section('content-training')
<h1 class="h11">Add Announcement</h1>
<div class="content1">
    <form class ="form-balqees"action="#">
    <label for="validationTooltip01" class="form-label"> Announcement Title: *  </label>
      <input type="text" class="form-control" placeholder="add title of your announcement here" name="announcement-title"><br>   
      <label for="validationTooltip01" class="form-label"> Announcement content: * </label>
      <textarea rows="5" class="form-control" placeholder="add your announcement content here " name="announcement-content"></textarea><br>
      
      <div>
<button class="add-but" type="submit">Add</button>
<button class="can-but" type="submit">Cancel</button>
</div>
</form>

</div>
@endsection
