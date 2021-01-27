  
<?php

$con=mysqli_connect("localhost","root","","care_app") or die("failed");

$Oid  = $_GET['dd'];
session_start();
$tmpid=$_SESSION['id'];


$queryA = "SELECT * FROM myorder WHERE O_id = '$Oid'";
$resultA=mysqli_query($con,$queryA);
$roA=mysqli_fetch_array($resultA);
$Pid= $roA['P_id'];
// $quantity= $roA['quantity'];


$queryB = "SELECT * FROM product where P_id ='$Pid'";
$resultB = mysqli_query($con,$queryB);
$roB=mysqli_fetch_array($resultB);
$count= $roB['quantity'] + $roA['quantity'];


$queryC ="update product SET quantity = '$count' where P_id ='$Pid'";
$resultC =mysqli_query($con,$queryC);


$sql = "DELETE FROM myorder WHERE O_id= $Oid";
if(mysqli_query($con,$sql)){
    header("Location:..\myOrder.php");
}
else{
    header("location:..\Home.php");

}

?>