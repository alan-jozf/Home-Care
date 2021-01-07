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
	margin:6%;
	
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
           
					$id=$_SESSION["id"];
					$con=mysqli_connect("localhost","root","","care_app")or die("couldn't connect");
					$query="select * from mrequest";
					// $quer="select name from admin where L_id=$id";

					$result =mysqli_query($con,$query);
					while($row=mysqli_fetch_array($result))  
					{?>
						<h2><?php echo $row['L_id'] ?></h2><br>
						<h2><?php echo $row['Urgency'] ?></h2><br>
						<h2><?php echo $row['Reason'] ?></h2><br>
					<?php
					}
				?> 	

        <br>

	</form>
	
</center>	
	</div>
</body>
</html>