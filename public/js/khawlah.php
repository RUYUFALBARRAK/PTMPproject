<?php
use App\Models\trainee;
if(isset($_POST['status'])){
    $status = $_POST['status'];
    if( $status==""){
        $status=trainee::all();
    }else if($status=="Available"){
        $status = trainee::select("*")->where('status', 'Available');
    }else if($status=="Completed"){
        $status = trainee::select("*")->where('status', 'Completed');
    }else {
        $status = trainee::select("*")->where('status', 'Ongoing');

    }
    echo jason_encode($status);
}