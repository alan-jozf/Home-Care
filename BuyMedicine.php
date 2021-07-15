<!DOCTYPE html>
<html lang="en">
<head>
	<title>Buy Medicine</title>
	<link rel="stylesheet" type="text/css" href="css/vaccine.css" />
</head>
<script>
	function ee()
	{
		document.getElementById('err').style.cssText="visibility: hidden";
	}
</script>
<body>
	<?php require("Topbar.php"); 
		include('php/config.php');
		?> 
	<?php
		if (isset($_POST['buyNow']))
		{
			$mdname = $_POST['mdname'];
			$qt = $_POST['qt'];
			$measure = $_POST['measure'];
			$descrp = $_POST['desc'];
			$purpose = $_POST['use'];

			// include('config.php');
			// session_start();

			$tmpid=$_SESSION['id'];
			date_default_timezone_set("Asia/Kolkata");
			$date = date('d-m-Y H:i:A');

			// echo $tmpid;
			$sql = "insert into medicineodr(L_id,mdname,qntty,measure,descrp,purpose,date)values($tmpid,'$mdname','$qt','$measure','$descrp','$purpose','$date')";

			// $result=mysqli_query($con,$sql) or die($sql);
			// echo $sql;

			unset($_POST);
			
			if(mysqli_query($con,$sql)){
				header("location:BuyMedicine.php?err=ys");
				// echo '<h3>Request Succesfull</h3>';
				exit;
			}
			else{
				header("location:BuyMedicine.php?err=no");
				// echo '<h3>Some error occured..!</h3>';
			}
		}
	?>
    <div class="homepage">
		<div class="vlefttop">
			<h2>Buy Medicine</h2>
		</div>
		<div class="bmlft">
			<div class="mlft1">
				<p>Medicine Name</p>
				<p>Measure of Quantity</p>
				<p>Description</p>
				<p>Disease or Symptom</p>
				<!-- <p>Dose 2</p> -->
			</div>
			<div class="mrgt1">
				<form action="BuyMedicine.php" method="POST" >
					<input name="mdname" type="text" onclick=ee() required>
					<input name="qt" type="text" id="qt" onclick=ee() required >
						<select Name="measure" onclick=ee() required> 
							<option value=""></option>
							<option value="Pills">Pills</option>
							<option value="g">g</option>
							<option value="ml">ml</option>
							<option value="box">box</option>
							<option value="slip">slip</option>
							<option value="day">day</option>
						</select>
					<input name="desc" type="text" placeholder="Optional" onclick=ee() >
					<input name="use" type="text" placeholder="Optional" onclick=ee()>
					<!-- <input type="button" value ="Add Another" onclick="getdiv()"> -->
					<input type="SUBMIT" name="buyNow" value ="Buy Now" id="mbn">
					<div class="box">
						<?php
							if(isset($_GET['err'])){
									if($_GET["err"]=="ys"){
									echo "<h3 id='err' style='color:red'>Request Succesfull ! </h3>";
								}
								if($_GET["err"]=="no"){
									echo "<h3 id='err' style='color:red'>Some error occured...! </h3>";
								}
							}
						?>
					</div>
				</form>
			</div>
		</div>
		<div class="bmrgt">
			<a href="BuyMedicineSlip.php"><input type="button" id="mi" value ="Try another method by upload Slip or Image "></a>
		</div>
	</div>
</body>

</html>

