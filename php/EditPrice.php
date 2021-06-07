<?php
include('config.php');
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
