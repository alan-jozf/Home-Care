<!DOCTYPE html>
<html lang="en">
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="css/profile.css" />

</head>
<body>
	<?php require("Topbar.php"); ?> 
    <div class="homepage">
		<form >
			<?php
            if(isset($_SESSION['id']))
            {
					// code for isset session
				
				include('php/config.php');
				$tmpid=$_SESSION['id'];
				$sql1 = "select image from dp where L_id=$tmpid";
				$result1 = mysqli_query($con,$sql1);
				if(mysqli_num_rows($result1)>0)
				{
					$row1 = mysqli_fetch_array($result1);
					$image = $row1['image'];
					$image_src = "uploads/".$image;
					?>
					<img class="prof" src='<?php echo $image_src;  ?>' >

					<?php
				}

				$query2="select * from login where L_id=$tmpid";
				$result2=mysqli_query($con,$query2);
				$login2 = mysqli_fetch_array($result2);
				
				$query3=  "select name from admin where L_id=$tmpid
					union select name from user where L_id=$tmpid
					union select name from medical_staff where L_id=$tmpid
					union select name from punchayat_officer where L_id=$tmpid
					union select name from volunteer where L_id=$tmpid";
				$result3=mysqli_query($con,$query3);
				$row3 = mysqli_fetch_array($result3);

				if($login2['user_type']!='admin'){
					$query4= "select pn_id from user where L_id=$tmpid
						union select pn_id from medical_staff where L_id=$tmpid
						union select pn_id from punchayat_officer where L_id=$tmpid
						union select pn_id from volunteer where L_id=$tmpid";
					$result4=mysqli_query($con,$query4);
					$row4 = mysqli_fetch_array($result4);
					$pid= $row4['pn_id'];

					$sql5="select pn_name from punchayat where pn_id=$pid";
					$result5=mysqli_query($con,$sql5) or die($sql5);
					$row5=mysqli_fetch_array($result5);
				}

				if($login2['user_type']=='user')
				{    $name="User" ;}
				if($login2['user_type']=='admin')
				{    $name="Admin" ;}
				if($login2['user_type']=='mstaff')
				{    $name="Medical Staff" ;}
				if($login2['user_type']=='pnchOfficr')
				{    $name="Punchayat Officer" ;}
				if($login2['user_type']=='volunteer')
				{    $name="Volunteer" ;}  

				?> 	
				<div class="type">
					<p><?php echo $name	?></p>
				</div>	
				<div class="cont">
					<div class="title">
						<p>Name 	</p>
						<p>Mobile  	</p>
						<p>Email  	</p>
						<?php
						if($login2['user_type']!='admin'){?>
							<p>Place  	</p><?php
						}?>
					</div>	
					<div class="ans">
						<p>: <?php echo $row3['name'] ?></p>
						<p>: <?php echo $login2['PhoneNo'] ?></p>
						<p>: <?php echo $login2['email'] ?></p>
						<?php
						if($login2['user_type']!='admin'){?>
							<p>: <?php echo $row5['pn_name'] ?></p><?php
						}?>
					</div>
				</div>
				<div class="bton">
					<a href="ChangeDP.php"><input type="button" value="Update DP"></a>
					<a href="ChangePassword.php"><input type="button" value="Update Password"></a>
				</div>
				<?php
			}
			else{
				header("location:Login.php");
			}?>
		</form>
	</div>
</body>
</html>