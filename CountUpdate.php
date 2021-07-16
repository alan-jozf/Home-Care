<!DOCTYPE html>
<html lang="en">
<head>
	<title>Count</title>
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
		if (isset($_POST['updt']))
		{
			$test = $_POST['test'];
			$conf = $_POST['conf'];
			$reco = $_POST['reco'];
			$deth = $_POST['deth'];
			$sdid=11;

			// include('config.php');
			// session_start();

			$tmpid=$_SESSION['id'];
			date_default_timezone_set("Asia/Kolkata");
			$date = date('d-m-Y');

			$quer1="select * from count where id='(select max(id) from count where sd_id=11)'";
			$resu1 =mysqli_query($con,$quer1) or die($sql);
            $row = mysqli_fetch_array($resu1);
			$acti= $row['active'];
			// $result=mysqli_query($con,$sql) or die($sql);
			// echo $sql;

			$active=$acti+$conf-$reco;

			$sql2 = "insert into count(sd_id,date,tested,confirmed,recovery,active)values($sdid,'$date','$test','$conf','$reco','$active')";

			unset($_POST);
			
			if(mysqli_query($con,$sql2)){
				header("location:CountUpdate.php?err=ys");
				exit;
			}
			else{
				header("location:CountUpdate.php?err=no");
			}
		}
	?>
    <div class="homepage">
		<div class="vlefttop">
			<h2>Count Update</h2><br>
			<?php
					date_default_timezone_set("Asia/Kolkata");
					$date = date('d-m-Y');
					echo "Status Today : ".$date;
				?>
		</div>
		<div class="bmlft">
			<div class="mlft1">
				<p>Tested </p>
				<p>Confirmed </p>
				<p>Recovery</p>
				<p>Death</p>
				<!-- <p>Dose 2</p> -->
			</div>
			<div class="mrgt1">
				<form action="CountUpdate.php" method="POST" >
					<input name="test" type="text" onclick=ee() required>
					<input name="conf" type="text" onclick=ee() required>
					<input name="reco" type="text" onclick=ee() required>
					<input name="deth" type="text" onclick=ee() required>
					<input type="SUBMIT" name="updt" value ="Update" id="mbn">
					<div class="box">
						<?php
							if(isset($_GET['err'])){
									if($_GET["err"]=="ys"){
									echo "<h3 id='err' style='color:red'>Update Succesfull ! </h3>";
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
	</div>
</body>

</html>

