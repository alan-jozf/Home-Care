<!Doctype html>
<html>
<head>
	<title>Forgot Password</title>
	<link rel="stylesheet" type="text/css" href="css\lgn.css" />
	<style>

	</style>
</head>
<script>
	function myemail()
	{
		// window.alert('Done');

		var n=document.getElementById("email");
		var letter=/^([a-zA-Z0-9._-]{4,30})+@([a-zA-Z.-]{2,10})+\.([a-zA-Z]{2,4})$/;
			if(n.value == "")
			{
				n.placeholder ="Email id is empty";
			}
			else if(!n.value.match(letter))
			{
				n.value ="";
				n.placeholder ="Enter valid Email id";
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
				<h1>Enter Your Mail ID</h1></center>
				<form action="php/fpEmailValidation.php" method="POST">
					<div class="box">
					<center>
					<?php
						if(isset($_GET['err'])){
							if($_GET["err"]=="MailError"){
								echo "<h3 id='err' style='color:red'>Mail ID not found ! </h3>";
							}
						}
					?>

					<input type="text" placeholder="Enter email id" name ="email" id="email" onclick=ee() onblur="myemail()"required><br>
					<input type="submit" value="Send OTP">
					</center>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
