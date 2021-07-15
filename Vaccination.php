<!DOCTYPE html>
<html lang="en">
<head>
	<title>Vaccine Approving</title>
	<link rel="stylesheet" type="text/css" href="css/vaccine.css" />
</head>

<body>
	<?php require("Topbar.php"); 
		include('php/config.php');
		?> 
    <div class="homepage">
		<?php
		if (isset($_POST['search']))
		{
			$mobile = $_POST['search'];
			$mobile = preg_replace("#[^0-9a-z]#i","",$mobile);
			$_SESSION['search']=$mobile;
			unset($_POST);
			header("location:Vaccination.php");
		}
		elseif (isset($_POST['aadhaar']))
		{
			$aadhaar = $_POST['aadhaar'];
			$mobile=$_SESSION['search'];

			$sql1="select * from login where PhoneNo='$mobile'";
			$result1=mysqli_query($con,$sql1);
			$row1=mysqli_fetch_array($result1);
            $tmpid=$row1['L_id'];

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
				header("location:Vaccination.php?err=ys");
				// echo '<h3>Request Succesfull</h3>';
				exit;
			}
			else{
				header("location:Vaccination.php?err=no");
				// echo '<h3>Some error occured..!</h3>';
			}
		}
		elseif(isset($_GET['aprov'])){
			
            $vuid = $_GET['aprov'];
            unset($_GET);

            $sqlv1="select * from v_status where L_id='$vuid'";
            $resultv1=mysqli_query($con,$sqlv1);
            $rowv1=mysqli_fetch_array($resultv1)or die($sqlv1);
			echo $sqlv1;
			
				// $result=mysqli_query($con,$sql) or die($sql);
				// echo $sql;
            $vdate=$rowv1['slot'];
			$hpvs_id=$rowv1['hpvs_id'];

			if($rowv1['dose1']==NULL){
				$sqlv2="update v_status SET dose1='$vdate' where L_id='$vuid'";
				$resultv2=mysqli_query($con,$sqlv2);
				// $rowv2=mysqli_fetch_array($resultv2);
			}
			elseif($rowv1['dose2']==NULL){
				$sqlv2="update v_status SET dose2='$vdate' where L_id='$vuid'";
				$resultv2=mysqli_query($con,$sqlv2);
				// $rowv2=mysqli_fetch_array($resultv2);
			}
			
			$sqlv2="update v_status SET slot=NULL where L_id='$vuid'";
			$resultv2=mysqli_query($con,$sqlv2);

            $sqlv6="select * from hospital_vdaily where hpvs_id='$hpvs_id'";
            $resultv6=mysqli_query($con,$sqlv6);
            $rowv6=mysqli_fetch_array($resultv6);
			$complt=$rowv6['completed']+1;

            $sqlv3="update hospital_vdaily SET slot='$complt' where hpvs_id='$hpvs_id'";
            $resultv3=mysqli_query($con,$sqlv3);
            // $rowv3=mysqli_fetch_array($resultv3);
			
			$_SESSION['search']='';

            header("location:Vaccination.php?err=apr");
		}
		elseif(isset($_GET['back'])){
			$_SESSION['search']='';
            header("location:Vaccination.php?err=back");
		}
		elseif(isset($_SESSION['search'])){
			$mobile=$_SESSION['search'];

			$sql1="select * from login where PhoneNo='$mobile'";
			$result1=mysqli_query($con,$sql1);
			if(mysqli_num_rows($result1)>0){
				$row1=mysqli_fetch_array($result1);
				$uid=$row1['L_id'];

				$sql2="select * from v_status where L_id='$uid'";
				$result2=mysqli_query($con,$sql2);
				$row2=mysqli_fetch_array($result2);
				// $result=mysqli_query($con,$sql) or die($sql);
				// echo $sql;
				?>
				<div class="vlefttop">
				<h2>Account Details</h2>
				<?php
	
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
							<form action="Vaccination.php" method="POST" >
								<input name='aadhaar' type='text'  required>
								<input type='submit' name='adadhr' value ='Add Aadhaar'>
							</form>
							<?php
						}
						$sql3="select * from user where L_id='$uid'";
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
								?>
								<a href="Vaccination.php?aprov=<?php echo $uid;?>"><input type="button" value ="Approve" ></a>
								<?php
							}
							else{
								echo "<p> Not Sheduled </p>" ;
								?>
								<a href="Shedule.php?mstaff=<?php echo $uid;?>"><input type="button" value ="Shedule" ></a>
								<?php
							}
						}
						else{
							echo "<p> Not Sheduled </p>" ;
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
									?>
									<a href="Vaccination.php?aprov=<?php echo $uid;?>"><input type="button" value ="Approve" ></a>
									<?php
								}
								else{
									echo "<p> Not Sheduled </p>" ;
									?>
									<a href="Shedule.php?mstaff=<?php echo $uid;?>"><input type="button" value ="Shedule" ></a>
									<?php
								}
							}
						}
					?><br><br>
					<a href="Vaccination.php?back=1">
						<input style="background-color:#555;color:white;border:0px;border-radius:10px;"
							type="button" value ="Search Another" >
					</a>

				</div>
				<?php
			}
			else{

				?>
				<br><h2 class="thead">Vaccination Approval</h2><br>
				<form method="post" action="Vaccination.php">
					<input style="max-height:35px;"type="text" id="search"name="search" placeholder="Search with Mobile Number">
					<input type="submit" value="Search">
				</form>
				<?php
				if(isset($_GET['err'])){
					if($_GET["err"]=="apr"){
						?><h4 style="margin:50px;width:80%">Vaccination is Approved</h4><?php
					}
					elseif($_GET["err"]=="back"){
					}
				}
				else{
					?>
					<h4 style="margin:50px;width:80%">No Results</h4>
					<?php
				}
			}	
		}
		else{
			?>
			<br><h2 class="thead">Vaccination Approval</h2><br>
			<form method="post" action="Vaccination.php">
				<input style="max-height:35px;"type="text" id="search"name="search" placeholder="Search with Mobile Number">
				<input type="submit" value="Search">
			</form>
			<?php
		}
		?>

	</div>
</body>
</html>