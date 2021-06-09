<?php
include('config.php');
$cbox = $_POST['cbox'];
$Urgency = $_POST['Urgency'];
date_default_timezone_set("Asia/Kolkata");
$date = date('d-m-Y H:i:A');
session_start();
$tmpid=$_SESSION['id'];
// echo $cbox,$Urgency,$tmpid;
$sql = "insert into mrequest(L_id,Reason,Urgency,Date) values($tmpid,'$cbox','$Urgency','$date')";


if(mysqli_query($con,$sql)){
    header("location:..\Medicalrequest.php?err=wrong");
    // echo '<h3>Request Succesfull</h3>';
}
else{
    header("location:..\MedicalRequest.php");
    echo '<h3>Some error occured..!</h3>';
}
?>
