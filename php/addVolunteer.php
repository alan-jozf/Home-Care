<?php
include('config.php');
$name = $_POST['name'];
$hname = $_POST['hname'];
$punchayat= $_POST['punchayat'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$pword = $_POST['pword'];
$type='volunteer';


$arr=str_split($pword);
$a='';
$i=1;
foreach($arr as $value)
{
    $i=$i+2;
    $a= $a .sprintf("%03d", ord("$value")+$i);
}
$pword= md5($a); 


$query="insert into login(PhoneNo,email,password,user_type) values('$phone','$email','$pword','$type')";
mysqli_query($con,$query);
$id=mysqli_insert_id($con);

$sql = "insert into volunteer(L_id,name,pn_id,hname,dob,gender) values($id,'$name',$punchayat,'$hname','$dob','$gender')";


if(mysqli_query($con,$sql)){
    header("location:../Login.php");
}
else{
    header("location:../Registration_Volunteer.php");
}
?>
