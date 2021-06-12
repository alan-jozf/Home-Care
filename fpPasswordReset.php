
<!Doctype html>
<html>
<head>
	<title>Forgot Password</title>
	<link rel="stylesheet" type="text/css" href="css\lgn.css" />
	<style>

	</style>
</head>
<script>

		// function email_id(id)
		// {
        //     elem=document.getElementById(id);
        //     patt=/^(?=.*[!@#$%^&*(),.?":{}|<>\ ])(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        //     if(elem.value.trim()=="" || !elem.value.match(patt))
        //     {   
        //         passw=false;
        //         elem.value="";
        //         elem.placeholder="Invalid password";
        //         elem.style.cssText="border: 1px solid red";
        //     }
        //     else{
        //         passw=true;
        //         elem.style.cssText="border:none";
        //     }
        // }

		// <input type="password" id="pass" class="inputs" name="password" placeholder="New password" onblur="email_id(this.id)"/>

		function pass()
		{
			var n=document.getElementById("p1");
			var letter=/^(?=.*[!@#$%^&*(),.?":{}|<>\ )(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
			if(n.value == "")
			{
				n.placeholder ="Password is empty";
			}
			else if(!n.value.match(letter))
			{
				n.value ="";
				n.placeholder ="Atleast 1 caps, 1 small, 1 num, 1 special character ";
			}
		}

		function check()
		{
			var n1=document.getElementById("p1");
			var n2=document.getElementById("p2");
			if(n2.value == "")
			{
				n2.placeholder ="Password is empty";
			}
			else if(n1.value!=n2.value)
			{
				n2.value ="";
				n2.placeholder ="Password doesn't match...!! ";
			}
		}
	
</script>

<body>
<?php require("Topbar.php"); ?> 
    <div class="homepage">

		<?php
			if(isset($_SESSION['login']))
			{
		?>

		<div class="full">
			<div class="l2">
				<center>
				<h1>Create New Password </h1></center>
				<form action="php/fpPasswordUpdation.php" method="POST">
					<div class="box">
					<center>
					<!-- <p>Enter a new password including uppercase, lowercase,numbers and special charecters with minimum of 8 length</p> -->
					<!-- <input type="password" id="pass" class="inputs" name="password" placeholder="New password" onblur="email_id(this.id)"/> -->

					<input type="password" placeholder="Enter New Password" name ="password" id="p1"  onblur="pass()"required><br>
					<input type="password" placeholder="Confirm Password" name ="pass2" id="p2"  onblur="check()"required><br>
					<!-- <a href="ForgotPassword.php">Resend</a> -->
					<input type="submit" value="Reset Password">
					</center>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>

<?php
    }
    else{
        header("location:fpEnterMail.php");
    }

?>