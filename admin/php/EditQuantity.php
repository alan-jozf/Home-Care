
<?php
$con = mysqli_connect("localhost","root","","care_app")or die("failed");
$quantity = $_POST['quantity'];
$pid  = $_GET['dd'];

$query="update product SET quantity = '$quantity' where P_id ='$pid'";

if(mysqli_query($con,$query)){
    header("location:../ViewProduct.php");
}
else{
    header("location:../../Home.php");
}
?>
