<?php

session_start();
$tmpid=$_SESSION['id'];

$con = mysqli_connect("localhost","root","","care_app")or die("failed");

// to get value using session
// $Pid = $_SESSION['pid'];
// $name = $_SESSION['pname'];
// echo $Pid;

$Pid=$_GET['P_id'];
$quantity = $_POST['quantity'];

$sqa = "SELECT * FROM product WHERE P_id = '$Pid'";
$qura=mysqli_query($con,$sqa);
$row1=mysqli_fetch_array($qura);


$sqb = "SELECT * FROM cart WHERE L_id = '$tmpid' and P_id ='$Pid'";
$qurb=mysqli_query($con,$sqb);
$ro=mysqli_fetch_array($qurb);
$rowCheck=mysqli_num_rows($qurb);
//  echo $rowCheck;

if($rowCheck>0){
    $count= $quantity+ $ro['quantity'];
    $query="update cart SET quantity = '$count' where P_id ='$Pid' and L_id = '$tmpid'";
    if(mysqli_query($con,$query)){
        header("location:../Cart.php");
    }
    else{
        header("location:../Home.php");
    }
}
else{
    $query="insert into cart(L_id,P_id,quantity) values($tmpid,$Pid,$quantity)";
    if(mysqli_query($con,$query)){
        header("location:../Cart.php");
    }
    else{
        header("location:../Home.php");
    }
}
?>
