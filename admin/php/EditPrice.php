<?php
#include("Db_connection.php");
$con = mysqli_connect("localhost","root","","care_app")or die("failed");
$price = $_POST['price'];
$pid  = $_GET['dd'];

$query="update product SET price = '$price' where P_id ='$pid'";

if(mysqli_query($con,$query)){
    header("location:../ViewProduct.php");
}
else{
    header("location:../../Home.php");
}
?>
