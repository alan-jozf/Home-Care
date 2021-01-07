<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="css\registration.css" />

</head>
<style>
div.right_cont{
	background-color: rgb(232, 232, 232);;
}
form{
	margin:1%;
	
}
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
    <form >
	<?php
            if(isset($_SESSION['id']))
            {
				?>
	<?php
		$con=mysqli_connect("localhost","root","","care_app") or die("failed");
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
		<?php
            $id=$_SESSION["id"];
            $con=mysqli_connect("localhost","root","","care_app")or die("couldn't connect");
            $query="select * from login where L_id=$id";
            $result=mysqli_query($con,$query);
            $login = mysqli_fetch_array($result);

            $query="select name from admin where L_id=$id
			union select name from user where L_id=$id
			union select name from medical_staff where L_id=$id
			union select name from punchayat_officer where L_id=$id
            union select name from volunteer where L_id=$id";

            $result=mysqli_query($con,$query);
            $reg_table = mysqli_fetch_array($result);

        ?> 
        <br>
        <h2><?php echo $reg_table['name'] ?></h2><br>
        <h2><?php echo $login['PhoneNo'] ?></h2><br>
        <h2><?php echo $login['email'] ?></h2><br>
		<!-- <b><label style ="float:left" > Update DP :</label>  </b><br> -->
		<!-- <input type="FILE" name='1'><br> -->
		<a href="edit.php"><input type="button" value="Update DP"></a><br>
		<a href="profile.php"><input type="button" value="Update Password"></a>
		<?php
			}
			else{
                header("location:Login.php");
            }?>
	</form>
	
</center>	
	</div>
</body>
</html>