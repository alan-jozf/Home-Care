<?php
	require('php/pconfig.php');
	?>
<!DOCTYPE html>
<html>

<head>
	<title>registration Form </title>
	<link rel="stylesheet" type="text/css" href="css/registration.css" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
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

	</script>

<body><b>

<?php require("Leftbar.php"); ?>
	
	<div class="right_cont">

    <?php require("Topbar.php"); ?> 

	<form action="php\addUser.php" method="POST" >

    <div class="maindiv">
        <h1> <center>Register as a User</center></h1>
        <div class="division1">
            <input type="text" placeholder="Full name :" name="name" id="0"  onblur="myname()" required>

            <select onChange="getsubdist(this.value);"  name="dist" id="dist" class="form-control" >
				<option value="">District</option>
				<?php $query =mysqli_query($con,"SELECT * FROM district");
				while($row=mysqli_fetch_array($query))
				{ ?>
					<option value="<?php echo $row['dt_id'];?>"><?php echo $row['dt_name'];?></option>
					<?php
					}
					?>
		</select>

        <input type="date" id="d" name="dob" value="" min="1960-10-10" max="2001-10-10" required>

        <input type="text" placeholder="Email :"name="email"id="3" onblur="mymail()"required>

        <input type="password" placeholder="Password:"name="pword" id="4" onblur="mypword()"required>

        </div>
        <div class="division2">
            <input type="text" placeholder="Housename/ Flat No. :" name="hname"id="1"  onblur="myhname()"required>

            <select name="subdist" id="subdist" class="form-control" require>
					<option value="">Sub District:</option>
			</select>

			<select name ="gender"  required>
				<option value="">Gender :</option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				<option value="DontKnow">Others</option>
			</select>
				
            <input type="text" placeholder="Mobile no :"name="phone" id="2"  onblur="mymob()"required>

            <input type="password"  placeholder=" Confirm password:" id="5" onblur="mypword2()"required><br><br>


		</div>
		<center><input type="submit" name="submit" value="Submit"/><br>
					<?php
						if(isset($_GET['err'])){
							if($_GET["err"]=="wrong"){
								echo "<h3 id='err' style='color:red'>Mobile Number already exist ! </h3>";
							}
						}
					?>
		<label >Already Registered ? <a href="Login.php"> LOGIN</a></center></label><br><br>

    </div>
	</b>
</form>
</div>
</body>
</html>
