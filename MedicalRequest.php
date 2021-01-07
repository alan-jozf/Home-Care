<!DOCTYPE html>
<html lang="en">
<head>
	<title>Medical request</title>
	<link rel="stylesheet" type="text/css" href="css\registration.css" />

</head>
<style>
div.right_cont{
	background-color: rgb(232, 232, 232);
}
form{
	margin:6%;
	width:30%;
}
/* .content{
	margin-left:30;
} */
label{
	width: 70%;
	/* size:20px; */
}
img{
	border-radius:50%;
}
input[type="file"],[type=button],[type=checkbox]{
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
    <form action="php\Mrequest.php" method='POST' enctype="multipart/form-data">

	<?php
		$con=mysqli_connect("localhost","root","","care_app") or die("failed");
		$tmpid=$_SESSION['id'];

		?>	
		<br>
		<h1>New Medical Request</h1><br><br>
		<b><label style ="float:left " > Symptoms</label>  </b><br>
		<input type="checkbox" id="symtom"value="Cough" name="cbox">
		<label for="symtom">Cough</label><br>
		<input type="checkbox" id="symtom"value="Headache" name="cbox">
		<label for="symtom">Headache</label><br>
		<input type="checkbox" id="symtom"value="Feaver" name="cbox">
		<label for="symtom">Feaver</label><br>
		<br>
		<b><label style ="float:left " > Level of Urgency</label>  </b><br>
		<select name ="Urgency"  required>
				<option value="">Urgency :</option>
				<option value="Severe">Severe</option>
				<option value="Moderate">Moderate</option>
				<option value="Moderate">Low</option>
			</select>

        <input type="submit" value="Update">
	</form>
	</div>

</body>
</html>