<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Vaccine</title>
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
		if (isset($_POST['addv']))
		{
			$new = $_POST['new'];
			$n=is_numeric($new);
			// include('config.php');
			// session_start();
			if($n==TRUE and $new>0){
				$tmpid=$_SESSION['id'];
				date_default_timezone_set("Asia/Kolkata");
				$date = date('d-m-Y');
				// echo $tmpid;
	
				unset($_POST);
	
				$sql1a = "SELECT * FROM hospital WHERE L_id = '$tmpid'";
				$result1a=mysqli_query($con,$sql1a);
				$row1a=mysqli_fetch_array($result1a);
				$rowCheck=mysqli_num_rows($result1a);
				//  echo $rowCheck;
	
				if($rowCheck>0){
					$count= $new + $row1a['stock'];
					$sql2a="update hospital SET stock = '$count' where L_id = '$tmpid'";
					if(mysqli_query($con,$sql2a)){
						header("location:Add_vaccine.php?err=ys");
					}
					else{
						header("location:Add_vaccine.php?err=no");
					}
				}
				else{
					$sql2m="select * from medical_staff where L_id='$tmpid'";
					$result2m=mysqli_query($con,$sql2m);
					$row2m=mysqli_fetch_array($result2m);
					$hname=$row2m['hname'];
					$pnid=$row2m['pn_id'];
	
					$sql2a="insert into hospital(hp_name,pn_id,L_id,stock) values('$hname',$pnid,$tmpid,$new)";
					if(mysqli_query($con,$sql2a)){
						header("location:Add_vaccine.php?err=ys");
					}
					else{
						header("location:Add_vaccine.php?err=no");
					}
				}

			}
			else{
				header("location:Add_vaccine.php?err=no");
			}

			// $result=mysqli_query($con,$sql2a) or die($sql2a);
			// echo $sql;
		}
	?>
    <div class="homepage">
		<div class="vlefttop">
			<?php
				$tmpid=$_SESSION['id'];

				date_default_timezone_set("Asia/Kolkata");
				$date = date('d-M-Y');
		
				$sql1="select * from login where L_id='$tmpid'";
				$result1=mysqli_query($con,$sql1);
				$row1=mysqli_fetch_array($result1);
		
				$sql2="select * from medical_staff where L_id='$tmpid'";
				$result2=mysqli_query($con,$sql2);
				$row2=mysqli_fetch_array($result2);

				echo "<h2>". $row2['hname']."</h2>";
			?>
		</div>
		<div class="bmlft">
			<div class="mlft1">
				<p>Total Dose Available</p>
				<p>Add New Dose Arrived</p>
				<p>Total Dose Booked</p>
				<p>Outstanding Dose </p>

			</div>
			<div class="mrgt1a">
				<form action="Add_vaccine.php" method="POST" >
					<?php
						$sql3="select * from hospital where L_id='$tmpid'";
						$result3=mysqli_query($con,$sql3);
						$rowCheck=mysqli_num_rows($result3);

						if($rowCheck>0){
							$row3=mysqli_fetch_array($result3);
							$h_id=$row3['hp_id'];
							$stock=$row3['stock'];
							echo "<p>". $row3['stock']."<p>";

							$sql3g="select sum(booked) from hospital_vdaily where hp_id = '$h_id'";
							$result3g=mysqli_query($con,$sql3g);
							$rowCheckc=mysqli_num_rows($result3g);
	
						}
						else{							
							echo "<p>0<p>";
						}
					?>
					<input name="new" type="text" onclick=ee() id="addos"  required >
					<input type="SUBMIT" name="addv" value ="Add" id="adbtn">
					<?php
					if($rowCheck>0){
						if($rowCheckc>0){
							$row3g = mysqli_fetch_array($result3g);
							$bal=$stock- $row3g[0];
							echo "<p>". $row3g[0]."</p>";
							echo "<p style='margin-top:11px;'>". $bal."</p>";
						}
						else{							
							echo "<p>0</p>";
							echo "<p style='margin-top:11px;'>0</p>";
						}
					}
					else{							
						echo "<p>0</p>";
						echo "<p style='margin-top:11px;'>0</p>";
					}
					?>

					<div class="box">
						<?php
							if(isset($_GET['err'])){
									if($_GET["err"]=="ys"){
									echo "<h3 id='err' style='color:red'>Vaccine Added Succesfully ! </h3>";
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

		<div class="barow3">
            <div class="adate">
			<?php
				$x = 0;
				do {
					$datev= date("d-M-Y", strtotime("+$x  day"));
					echo "<input type='button' value='".$datev."'>";
					$x++;
				} while ($x <= 5);
			?>
            </div>
            <div class="optrow1">
				<?php
					$x = 0;
					if($rowCheck>0){
						$stock= $row3['stock'];	
						$h_id=$row3['hp_id'];
						
						$sql3g="select sum(total) from hospital_vdaily where hp_id = '$h_id'";
						$result3g=mysqli_query($con,$sql3g);
						$row3g = mysqli_fetch_array($result3g);
						// echo $row3g[0];

						$sql1b = "SELECT * FROM hospital_vdaily WHERE hp_id = '$h_id'";
						$result1b=mysqli_query($con,$sql1b);
						$row1b=mysqli_fetch_array($result1b);
						$rowCheck2=mysqli_num_rows($result1b);

						if($rowCheck2>0){
							if($stock-$row3g[0]>200){
								$x = 0;
								do {
									$datev= date("d-M-Y", strtotime("+$x  day"));
									$diff= $stock-200;
									if($diff>0){
										$sql1k="update hospital_vdaily SET total = '200' where date = '$datev'and hp_id='$h_id'";
										$result1k=mysqli_query($con,$sql1k);
										$stock= $stock-200;	
									}
									$x++;
								} while ($x <= 5);

							}
							$x = 0;
							do {
								$datev= date("d-M-Y", strtotime("+$x  day"));
								?>
									<div class="avbty">
										<center>
										<p>Covishield</p>
										<?php
											$sql1e = "SELECT * FROM hospital_vdaily WHERE date = '$datev' and hp_id='$h_id'";
											$result1e=mysqli_query($con,$sql1e);
											$row1e=mysqli_fetch_array($result1e)or die($sql1e);
											// echo $sql1e;
											$bal=$row1e['total']-$row1e['booked'];

											echo "<button>".$bal."</button>";
												
										?>
										</center>
									</div>
								<?php
								$x++;
							} while ($x <= 5);
						}
						else{
							do {
								$datev= date("d-M-Y", strtotime("+$x  day"));
								?>
									<div class="avbty">
										<center>
										<p>Covishield</p>
										<?php
											$diff= $stock-200;

											if($diff>0){
												$sql2b="insert into hospital_vdaily(hp_id,date,total) values($h_id,'$datev','200')";
												$result2b=mysqli_query($con,$sql2b);
												
												echo "<button>200</button>";
												$stock= $stock-200;	

											}
											else{	
												$sql5b="insert into hospital_vdaily(hp_id,date,total) values($h_id,'$datev','0')";
												$result5b=mysqli_query($con,$sql5b);						
												echo "<button>0</button>";
											}
										?>
										<!-- <button>Full</button> -->
										</center>
									</div>
								<?php
								$x++;
							} while ($x <= 5);
						}
					}
					else{							
						do {
							?>
								<div class="avbty">
									<center>
										<p>Covishield</p>
										<button>0</button>
									</center>
								</div>
							<?php
							$x++;
						} while ($x <= 5);
					}
				?>
            </div>
        </div>
	</div>
</body>

</html>
