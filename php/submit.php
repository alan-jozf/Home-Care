<?php
require('pconfig.php');
session_start();
$total = $_SESSION['total'];
// $tmpid=	$_SESSION['id'];

if(isset($_POST['stripeToken'])){
	\Stripe\Stripe::setVerifySslCerts(false);

	$token=$_POST['stripeToken'];

	$data=\Stripe\Charge::create(array(
		"amount"=>$total,
		"currency"=>"inr",
		"description"=>"Purchace with Home Care",
		"source"=>$token,
	));

	// echo "<pre>";
	// print_r($data);

	$tmpid=$_SESSION['id'];
	$date = date('m/d/Y');
	$con = mysqli_connect("localhost","root","","care_app")or die("failed");

	$queryA = "SELECT * FROM cart WHERE L_id = '$tmpid'";
	$resultA=mysqli_query($con,$queryA);
	$rowCheck=mysqli_num_rows($resultA);
	if($rowCheck>0){
		while($roA=mysqli_fetch_array($resultA))  
		{
			$Pid= $roA['P_id'];
			$queryB = "SELECT * FROM product where P_id ='$Pid'";
			$resultB = mysqli_query($con,$queryB);
			$roB=mysqli_fetch_array($resultB);

			$count= $roB['quantity'] - $roA['quantity'];
			$quantity= $roA['quantity'];
			$queryC ="update product SET quantity = '$count' where P_id ='$Pid'";
			$resultC =mysqli_query($con,$queryC);

			$queryD ="insert into myorder(L_id,P_id,quantity,Date) values($tmpid,$Pid,$quantity,'$date')";
			$resultD =mysqli_query($con,$queryD);
		}
		$queryE ="DELETE FROM cart WHERE L_id= $tmpid";
		$resultE =mysqli_query($con,$queryE);

		header("location:../myOrder.php");
	}
	else{
		header("location:../Shopping.php");
	}

}
?>