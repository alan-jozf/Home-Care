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
$type='user';

// $pword = $_POST['pword'];
$arr=str_split($pword);
$a='';
$i=1;
foreach($arr as $value)
{
    $i=$i+2;
    $a= $a .sprintf("%03d", ord("$value")+$i);
}
$pword= md5($a); 


$sqc = "SELECT * FROM login WHERE PhoneNo = '$phone'";
$qury=mysqli_query($con,$sqc);
$rowCheck=mysqli_num_rows($qury);

if($rowCheck>0){
    header("location:..\Registration_User.php?err=wrong");
}
else{
    $query="insert into login(PhoneNo,email,password,user_type) values('$phone','$email','$pword','$type')";
    mysqli_query($con,$query);
    $id=mysqli_insert_id($con);
    
    $sql = "insert into user(L_id,name,pn_id,hname,dob,gender) values($id,'$name',$punchayat,'$hname','$dob','$gender')";
    if(mysqli_query($con,$sql)){
        header("location:../Login.php");
    }
    else{
        header("location:../Registration_User.php");
    }
}
?>