  
<?php

$con=mysqli_connect("localhost","root","","care_app") or die("failed");

$cid  = $_GET['dd'];
session_start();
$tmpid=$_SESSION['id'];


$sql = "DELETE FROM cart WHERE C_id= $cid";
if(mysqli_query($con,$sql)){
    header("Location:..\Cart.php");
}
else{
    header("location:..\Home.php");

}

?>