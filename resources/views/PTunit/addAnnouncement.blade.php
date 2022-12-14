<!-- @extends('trainee.mainPage') -->
@extends('layouts.layout')


@section('content-training')
<h1 class="h11">Add Announcement</h1>
<div class="content1">
    <form class ="form-balqees"action="#">
    <label for="validationTooltip01" class="form-label"> Announcement Title: *  </label>
      <input type="text" class="form-control" placeholder="add title of your announcement here" name="announcement-title"><br>
      <label for="validationTooltip01" class="form-label">Announcement Deadline: *  </label>
      <input type="date" min="2022-12-14" max="2023-12-31"> <br>     
      <label for="validationTooltip01" class="form-label"> Announcement content: * </label>
      <textarea rows="5" class="form-control" placeholder="add your announcement content here " name="announcement-content"></textarea><br>
      <br><br><br>
      <div>
<button class="btn-addannou" type="submit">Add</button>
<button class="btn-cancel" type="submit">Cancel</button>
</div>
</form>

</div>
@endsection
