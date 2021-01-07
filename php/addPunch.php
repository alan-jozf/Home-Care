<?php
#include("Db_connection.php");
$con = mysqli_connect("localhost","root","","care_app")or die("failed");
$name = $_POST['name'];
$hname = $_POST['hname'];
$subdist= $_POST['subdist'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$pword = $_POST['pword'];
$type='pnchOfficr';


$query="insert into login(PhoneNo,email,password,user_type) values('$phone','$email','$pword','$type')";
mysqli_query($con,$query);
$id=mysqli_insert_id($con);

$sql = "insert into punchayat_officer(L_id,name,sd_id,hname,dob,gender) values($id,'$name',$subdist,'$hname','$dob','$gender')";


if(mysqli_query($con,$sql)){
    header("location:../Login.php");
}
else{
    header("location:../Registration_PunchayatOfficer.php");
}
?>
