<!Doctype html>
<html>
<head>
	<title>Forgot Password</title>
	<link rel="stylesheet" type="text/css" href="css\lgn.css" />
	<style>

	</style>
</head>
<script>
	function uname()
	{
		var n=document.getElementById("uname");
		if(n.value == "")
		{
			n.placeholder ="OTP is empty";
		}
	}
	function ee()
	{
		document.getElementById('err').style.cssText="visibility: hidden";

	}
</script>

<body>
<?php require("Leftbar.php"); ?>
<div class="right_cont">

    <?php require("Topbar.php"); ?> 

		<div class="full">
			<div class="l2">
				<center>
				<h1>Check Your Mail </h1></center>
				<form action="php/fpOtpValidation.php" method="POST">
					<div class="box">
					<center>

					<!-- <input type="text" placeholder="Enter OTP" name ="otp" id="otp" onclick=ee() onblur="uname()" required><br> -->

					<?php
						if(isset($_GET['err'])){
							echo '<input type="text" placeholder="Invalid OTP" name ="otp" id="otp" onclick=ee() onblur="uname()" required><br>';
						}
						else{
							echo '<input type="text" placeholder="Enter OTP" name ="otp" id="otp" onclick=ee() onblur="uname()" required><br>';
						}
            		?>

					<a href="php/fpEmailValidation.php">Resend</a>
					<input type="submit" value="Verify">
					</center>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>