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
			$descrp = $_POST['desc'];
			$purpose = $_POST['use'];

            $image0=$_FILES["slip"]["name"];
            $file_path0='uploads/'.$image0;
            move_uploaded_file($_FILES["slip"]["tmp_name"],$file_path0);
            
            
			// include('config.php');
			// session_start();

			$tmpid=$_SESSION['id'];
			date_default_timezone_set("Asia/Kolkata");
			$date = date('d-m-Y H:i:A');

			// echo $tmpid;
			$sql = "insert into medicineslipodr(L_id,slip,descrp,purpose,date)values($tmpid,'$image0','$descrp','$purpose','$date')";

			// $result=mysqli_query($con,$sql) or die($sql);
			// echo $sql;

			unset($_POST);
			
			if(mysqli_query($con,$sql)){
				header("location:BuyMedicineSlip.php?err=ys");
				// echo '<h3>Request Succesfull</h3>';
				// exit;
			}
			else{
				header("location:BuyMedicineSlip.php?err=no");
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
				<p>Upload Slip or Image</p>
				<p>Description</p>
				<p>Disease or Symptom</p>
				<!-- <p>Dose 2</p> -->
			</div>
			<div class="mrgt1">
				<form action="BuyMedicineSlip.php" method="POST" enctype="multipart/form-data">
                    <input type="FILE"  onclick=ee() name='slip' required >
					<input type="text" name='desc' onclick=ee()  placeholder="Describe Count if it is not a slip">
					<input type="text" name="use"  onclick=ee()  placeholder="Optional">
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
			<a href="BuyMedicine.php"><input type="button" id="mi" value ="Try by Medicine Name "></a>
		</div>
	</div>
</body>
</html>