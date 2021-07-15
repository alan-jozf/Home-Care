<!DOCTYPE html>
<html lang="en">
<head>
	<title>Vaccine Booking</title>
	<link rel="stylesheet" type="text/css" href="css/vaccine.css" />
</head>

<body>
	<?php require("Topbar.php"); 
		include('php/config.php');
		?> 
	<?php
		if (isset($_POST['adadhr']))
		{
			$aadhaar = $_POST['aadhaar'];
			$tmpid=$_SESSION['id'];

			// date_default_timezone_set("Asia/Kolkata");
			// $date = date('d-m-Y H:i:A');

			$sql1="select * from login where L_id='$tmpid'";
			$result1=mysqli_query($con,$sql1);
			$row1=mysqli_fetch_array($result1);

			$sql2="select * from v_status where L_id='$tmpid'";
			$result2=mysqli_query($con,$sql2);
			$row2=mysqli_fetch_array($result2);

			echo $aadhaar ;
			$sql = "insert into v_status(L_id,aadhaar)values($tmpid,'$aadhaar')";

			// $result=mysqli_query($con,$sql) or die($sql);
			// echo $sql;

			unset($_POST);
			// $_POST = array(); 
			
			if(mysqli_query($con,$sql)){
				header("location:VaccineBooking.php?err=ys");
				// echo '<h3>Request Succesfull</h3>';
				exit;
			}
			else{
				header("location:VaccineBooking.php?err=no");
				// echo '<h3>Some error occured..!</h3>';
			}
		}
	?>
    <div class="homepage">
		<div class="vlefttop">
			<h2>Account Details</h2>
			<?php
				// $tmpid=$_SESSION['id'];
				$sql1="select * from login where L_id='$tmpid'";
				$result1=mysqli_query($con,$sql1);
				$row1=mysqli_fetch_array($result1);

				$sql2="select * from v_status where L_id='$tmpid'";
				$result2=mysqli_query($con,$sql2);
				$row2=mysqli_fetch_array($result2);

				if(mysqli_num_rows($result2)>0){
					if($row2['dose2'] != NULL){
						echo "<input id='d2v' type='button' value ='Vaccinated'>" ;
						echo  "<input id='d2v' type='button' value ='	Gnerate Certificate'>" ;
					}
					elseif($row2['dose1'] != NULL){
						echo "<input id='d1v' type='button' value ='Dose 1 Vaccinated'>" ;
						echo  "<input id='d1v' type='button' value ='	Gnerate Certificate'>" ;
					}
					else{
						echo "<input id='nov' type='button' value ='Not Vaccinated'>" ;
					}
				}
				else{
					echo "<input id='nov' type='button' value ='Not Vaccinated'>" ;
				}
			?>
		</div>
		<div class="vlft">
			<p>Registered Mobile Number</p>
			<p>Aadhaar ID Number</p>
			<p>Year of Birth</p>
			<p>Dose 1</p>			
			<?php
				if(mysqli_num_rows($result2)>0){
					if($row2['dose1'] != NULL){
						echo "<p>Dose 2</p>" ;
					}
				}
			?>
		</div>
		<div class="vrgt">
			<p>8136815972</p>
			<?php
				if(mysqli_num_rows($result2)>0){
					echo "<p>". $row2['aadhaar']. "</p>" ;
				}
				else{
					?>
					<form action="VaccineBooking.php" method="POST" >
						<input name='aadhaar' type='text'  >
						<input type='submit' name='adadhr' value ='Add Aadhaar'>
					</form>
					<?php
				}
			?>
			<?php
				$sql3="select * from user where L_id='$tmpid'";
				$result3=mysqli_query($con,$sql3);
				$row3=mysqli_fetch_array($result3);
				$date = $row3['dob'];
				$year = date('Y', strtotime($date));
				echo "<p>".$year. "</p>" ;
			?>
			<!-- <p>dose1 </p> -->
			<?php
				if(mysqli_num_rows($result2)>0){
					if($row2['dose1'] != NULL){
						echo "<p>". $row2['dose1']. "</p>" ;
						// <p>: 15/07/2021 10:00 am</p>
					}
					elseif($row2['slot'] != NULL){
						echo "<p>". $row2['slot']. "</p>" ;
						// <p>: 15/07/2021 10:00 am</p>
					}
					else{
						echo "<p> Not Sheduled </p>" ;
						?>
						<a href="Shedule.php"><input type="button" value ="Shedule" ></a>
						<?php
					}
				}
				else{
					echo "<p> Not Sheduled </p>" ;
					?>
					<a href="Shedule.php"><input type="button" value ="Shedule" ></a>
					<?php
				}
			?>
			<!-- <p>dose 2</p> -->
			<?php
				if(mysqli_num_rows($result2)>0){
					if($row2['dose1'] != NULL){
						if($row2['dose2'] != NULL){
							echo "<p>". $row2['dose2']. "</p>" ;
						}
						elseif($row2['slot'] != NULL){
							echo "<p>". $row2['slot']. "</p>" ;
						}
						else{
							echo "<p> Not Sheduled </p>" ;
							?>
							<a href="Shedule.php"><input type="button" value ="Shedule" ></a>
							<?php
						}
					}
				}
			?>
			
			<?php
				if(isset($_GET['err'])){
					if($_GET["err"]=="ano"){
						echo "<h5 style='margin-top:20px;color:red;'>Add Aadhaar ID...! </h5>";
					}
					if($_GET["err"]=="bk"){
						echo "<h5 style='margin-top:20px;color:red;'>Slot is selected </h5>";
					}
				}
			?>
		</div>

	</div>
</body>
</html>