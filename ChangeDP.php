<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="css/profile.css" />

</head>
<style>


</style>

<body>
<?php require("Topbar.php"); ?> 
    <div class="homepage">
		<form action="php\UpdateDP.php" method='POST' enctype="multipart/form-data">
			<?php
			include('php/config.php');
			$tmpid=$_SESSION['id'];
			$sql = "select image from dp where L_id=$tmpid";
			$result = mysqli_query($con,$sql);
			if(mysqli_num_rows($result)>0)
			{
				$row = mysqli_fetch_array($result);
				$image = $row['image'];
				$image_src = "uploads/".$image;
				?>
				<img class="prof" src='<?php echo $image_src;  ?>' width="150" height="150" >

				<?php
			}

			?>	<br>
			<label class="hed"> Update DP :</label> <br>
			<input type="FILE" name='1' required ><br>
			<input type="submit" value="Upload">
			<h3 style="color:blue;"><a href="ViewProfile.php">🢀 Go Back</a></h3>
		</form>
	</div>
</body>
</html>