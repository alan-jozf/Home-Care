<!DOCTYPE html>
<html lang="en">
<head>
	<title>Medical request</title>
	<link rel="stylesheet" type="text/css" href="css/profile.css" />
	<link rel="stylesheet" type="text/css" href="css/home.css" />
</head>

<body>
	<?php require("Topbar.php"); 
		include('php/config.php');
		?> 
    <div class="homepage">
		<div class="lst">
			<div class="top">
					<h2>New Medical Request</h2>
				</div>
			<form action="php\Mrequest.php" method='POST' enctype="multipart/form-data">
				<?php
					if(isset($_GET['err'])){
						if($_GET["err"]=="wrong"){
							echo "<h3 id='err' style='color:red'> Request Succesfull </h3><br>";
						}
					}
				?>
				<label class="mrh"> Symptoms</label>
				<select name="cbox" class="categ" required>
					<option value=""></option>
					<?php $query =mysqli_query($con,"SELECT * FROM test_symptom");
					while($row=mysqli_fetch_array($query))
					{ 
						?><option value="<?php echo $row['Description'];?>"><?php echo $row['Description'];?></option>
						<?php
						}?>
				</select>
				<br><label class="mrh"> Level of Urgency</label> 
				<select name ="Urgency" class="categ" required>
					<option value=""> </option>
					<option value="Severe">Severe</option>
					<option value="Moderate">Moderate</option>
					<option value="Moderate">Low</option>
				</select>
				<input class="sub" type="submit" value="Update"><br>
			</form>
		</div>

		<div class="snd">
			<div class="top">
				<h2>Helpline Numbers</h2>
			</div>
			<div class="news">
				<div class="rowc">
					<div class="icon">
						<img id="icon" src="images/verify.png">
					</div>
					<div class="right">
						<p> Health Ministry Helpline</p>
						<img id="phone" src="images/phone.png">
						<h5> 1075</h5>
					</div>
				</div>
				<div class="rowc">
					<div class="icon">
						<img id="icon" src="images/verify.png">
					</div>
					<div class="right">
						<p> Child Helpline</p>
						<img id="phone" src="images/phone.png">
						<h5> 1098</h5>
					</div>
				</div>
				<div class="rowc">
					<div class="icon">                          
						<img id="icon" src="images/verify.png">
					</div>
					<div class="right">
						<p> Senior Citizens Helpline</p>
						<img id="phone" src="images/phone.png">
						<h5> 14567</h5>
					</div>
				</div>
				<div class="rowc">
					<div class="icon">
						<img id="icon" src="images/verify.png">
					</div>
					<div class="right">
						<p> Regional Health Helpline</p>
						<img id="phone" src="images/phone.png">
						<h5> 8136815972</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>