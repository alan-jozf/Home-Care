  
<?php

$con=mysqli_connect("localhost","root","","care_app") or die("failed");

$Oid  = $_GET['dd'];
session_start();
$tmpid=$_SESSION['id'];


$sql = "DELETE FROM myorder WHERE O_id= $Oid";
if(mysqli_query($con,$sql)){
    header("Location:..\myOrder.php");
}
else{
    header("location:..\Home.php");

}

?>