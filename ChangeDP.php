<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="css\registration.css" />

</head>
<style>
div.right_cont{
	/* background-color: rgb(232, 232, 232); */
}
form{
	margin:6%;
	
}
/* .content{
	margin-left:30;
} */
label{
	width: 70%;
}
img{
	border-radius:50%;
}
input[type="file"],[type=button]{
    background-color:  rgb(0, 138, 103);
    color: #fff;
    width: 40%;
    margin: 8px 0;
    border-radius: 10px;
}
</style>

<body>
<?php require("Leftbar.php"); ?> 
<div class="right_cont" style="{background-color: rgb(232, 232, 232);}">

	<?php require("Topbar.php"); ?> 
<center>
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
			<img src='<?php echo $image_src;  ?>' width="150" height="150" >

			<?php
		}

		?>	
		<br>
		<b><label style ="float:left" > Update DP :</label>  </b><br>
		<input type="FILE" name='1' required ><br>
        <input type="submit" value="Upload">
		<BR><h3 style="color:blue;"><a href="ViewProfile.php">🢀 Go Back</a></h3>

	</form>
	</center>
	</div>

</body>
</html>