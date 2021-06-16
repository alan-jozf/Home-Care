<?php
	require('php/config.php');
	?>
<!DOCTYPE html>
<html>

<head>
	<title> User Registration</title>
	<link rel="stylesheet" type="text/css" href="css/registration.css" />
     <!-- <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script> -->
	<!-- Ajax script allready called on topbar -->
</head>
<style>

</style>
	<script>
		function getsubdist(val) {
			$.ajax({
			type: "POST",
			url: "php/get_subdist.php",
			data:'pas_id='+val,
			success: function(data){
				$("#subdist").html(data);
			}
			});
		}
		function getpunchayat(val) {
			$.ajax({
			type: "POST",
			url: "php/get_punchayat.php",
			data:'pas_id='+val,
			success: function(data){
				$("#punchayat").html(data);
			}
			});
		}
		
		function myname()
		{
			var n=document.getElementById("0");
			var letter=/[A-Z a-z]{3,}$/;
			if(n.value == "")
			{
				n.placeholder ="Name is empty";
			}
			else if(!n.value.match(letter))
			{
				n.value ="";
				n.placeholder ="Enter valid name";
			}
		}

		function myhname()
		{
			var n=document.getElementById("1");
			var letter=/[A-Z a-z]{5,}$/;
			if(n.value == "")
			{
				n.placeholder ="Housename is empty";
			}
			else if(!n.value.match(letter))
			{
				n.value ="";
				n.placeholder ="Enter valid Housename";
			}
		}

		function mymob()
		{
			var n=document.getElementById("2");
			var letter=/^([6-9]{1})+([0-9]{9})$/;
			if(n.value == "")
			{
				n.placeholder ="Mobile no is empty";
			}
			else if(!n.value.match(letter))
			{
				n.value ="";
				n.placeholder ="Enter valid Mobile no";
			}
		}

		function mymail()
		{
			var n=document.getElementById("3");
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

		function mypword()
		{
			var n=document.getElementById("4");
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

		function mypword2()
		{
			var n1=document.getElementById("4");
			var n2=document.getElementById("5");
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
		function ee()
		{
			document.getElementById('err').style.cssText="visibility: hidden";
		}

	</script>

<body>
<?php require("Topbar.php"); ?> 
    <div class="homepage">
		<form action="php\addUser.php" method="POST" >
			<h1 id="head">User Registration</h1>
			<div class="formrow">
				<div class="formcol1">
					<p>Name :</p>
					<input type="text" placeholder="" name="name" id="0"   onclick=ee() onblur="myname()" required>
				</div>
			</div>
			<div class="formrow">
				<div class="formcol">
					<p>House Name :</p>
					<input type="text" placeholder="" name="hname"id="1"   onclick=ee() onblur="myhname()"required>
				</div>
				<div class="formcol">
					<p>Gender :</p>
					<select name ="gender"  required>
						<option value=""></option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						<option value="DontKnow">Others</option>
					</select>
				</div>
				<div class="formcol">
					<p>Date of Birth :</p>
					<input type="date" id="d" name="dob" value=""  min="1960-10-10" max="2001-10-10" required>
				</div>
			</div>
			<div class="formrow">
				<div class="formcol">
					<p>District :</p>
					<select onChange="getsubdist(this.value);"  name="dist" id="dist" class="form-control" >
						<option value=""></option>
						<?php $query =mysqli_query($con,"SELECT * FROM district");
						while($row=mysqli_fetch_array($query))
						{ ?>
							<option value="<?php echo $row['dt_id'];?>"><?php echo $row['dt_name'];?></option>
							<?php
							}
							?>
					</select>
				</div>
				<div class="formcol">
					<p>Sub District :</p>
					<select onChange="getpunchayat(this.value);"  name="subdist" id="subdist" class="form-control" required>
						<option value=""></option>
					</select>
				</div>
				<div class="formcol">
					<p>Punchayat :</p>
					<select name="punchayat" id="punchayat" class="form-control" required>
						<option value=""></option>
					</select>
				</div>
			</div>
			<div class="formrow">
				<div class="formcol">
					<p>Email :</p>
					<input type="text" placeholder=""name="email"id="3"  onclick=ee() onblur="mymail()"required>
				</div>
				<div class="formcol">
					<p>Mobile :</p>
					<input type="text" placeholder=""name="phone" id="2"   onclick=ee() onblur="mymob()"required>
				</div>
				<div class="formcol">
					
				</div>
			</div>
			<div class="formrow">
				<div class="formcol">
					<p>Password :</p>
					<input type="password" placeholder=""name="pword" id="4" onblur="mypword()"required>
				</div>
				<div class="formcol">
					<p>Confirm Password :</p>
					<input type="password"  placeholder="" id="5" onblur="mypword2()"required>
				</div>
				<div class="formcol">
					<input type="submit" name="submit" value="Submit"/><br>
				</div>
			</div>
			<div class="formrow">
				<div class="formcol">
					<center><br><label >Have an account ?   <a href="Login.php">Sign in.!</a></label></center>
				</div>
			</div>
			<div class="formrow">
				<div class="formcol">
					<center><?php
						if(isset($_GET['err'])){
							if($_GET["err"]=="wrong"){
								echo "<br><label id='err' style='color:red'>Mobile Number already exist ! </label>";
							}
						}?>
					</center>
				</div>
			</div>
		</form>
	</div>
</body>
</html>
