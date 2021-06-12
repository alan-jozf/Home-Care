<?php
require('pconfig.php');
include('config.php');
session_start();
require_once 'TwilioSMS/vendor/autoload.php';
use Twilio\Rest\Client;
$total = $_SESSION['total'];

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
	date_default_timezone_set("Asia/Kolkata");
	$date = date('d-m-Y H:i:A');


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
			$oid=mysqli_insert_id($con);


		}
		$queryE ="DELETE FROM cart WHERE L_id= $tmpid";
		$resultE =mysqli_query($con,$queryE);

				
		#SMS using Twilio
			// session_start();
			// include('config.php');
			$id     = $_SESSION["id"];
			$total  = $_SESSION['total'];
			$total 	= $total/100;
			date_default_timezone_set("Asia/Kolkata");
			$date = date('d-m-Y H:i:A');
			$query  = "select * from login where L_id=$id";
			$result = mysqli_query($con,$query);
			$login  = mysqli_fetch_array($result);
			$phone  = $login['PhoneNo'];
			$a	    = "+91";
			$phone  = $a.$phone;
			$body   = "Your order of Rs ".$total." on ".$date." is Successful - Home Care";

			// require_once 'TwilioSMS/vendor/autoload.php';
			// use Twilio\Rest\Client;
			// $sid=	'ACfe7629a58dee1146a63c91fa9e5aae75';
			// $token=	'42657316c6fc1a18df815437c7592022';
			$twilio = new Client('ACfe7629a58dee1146a63c91fa9e5aae75','92c61b0c450f2cc12aecbea0939051ee');

			// Uncomment bellow	$message for enable SMS

				$message = $twilio->messages
								->create($phone, // to
										["body" => $body, 
										"from" => "+18053015484"]
								);
				print($message->sid);
		
		// Bill generation to mail begins
			
		header("location:BillSentMail.php?dd=".$oid);
	}
	else{
		header("location:../Shopping.php");
	}

}
?>