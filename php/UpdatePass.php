<?php
$con=mysqli_connect("localhost","root","","care_app")or die("couldn't connect");

$old=$_POST["old"];
// $old=md5($old);
$arr=str_split($old);
$a='';
$i=1;
foreach($arr as $value)
{
    $i=$i+2;
    $a= $a .sprintf("%03d", ord("$value")+$i);
}
$old= md5($a); 


$n=$_POST["new"];
// $n= md5($n);
$arr=str_split($n);
$a='';
$i=1;
foreach($arr as $value)
{
    $i=$i+2;
    $a= $a .sprintf("%03d", ord("$value")+$i);
}
$n= md5($a);


session_start();
$id=$_SESSION["id"];


$query="SELECT * FROM login WHERE L_id=$id";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);

if($old == $row['password']){
    $query="UPDATE login SET password='$n' WHERE L_id=$id";
    if(mysqli_query($con,$query)){
        header("Location:..\logout.php");
    }
    else{
        echo "query error";
    }
}
else{
    header("location:..\ChangePassword.php?err=wrongpass");
}

?>