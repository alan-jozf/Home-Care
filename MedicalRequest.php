<!DOCTYPE html>
<html lang="en">
<head>
	<title>Medical request</title>
	<link rel="stylesheet" type="text/css" href="css\profile.css" />

</head>
<style>

</style>

<body>
<?php require("Topbar.php"); ?> 
    <div class="homepage">

	<div class="lst">
    <form action="php\Mrequest.php" method='POST' enctype="multipart/form-data">

	<?php
		if(isset($_SESSION['id']))
		{
			$tmpid=$_SESSION['id'];
		}
		?>
		<br>
		<h1>New Medical Request</h1><br><br>
					<?php
						if(isset($_GET['err'])){
							if($_GET["err"]=="wrong"){
								echo "<h3 id='err' style='color:red'> Request Succesfull </h3><br>";
							}
						}
					?>
		<b><label style ="float:left " > Symptoms</label>  </b><br>
		<input type="checkbox" id="symtom"value="Cough" name="cbox">
		<label for="symtom">Cough</label><br>
		<input type="checkbox" id="symtom"value="Headache" name="cbox">
		<label for="symtom">Headache</label><br>
		<input type="checkbox" id="symtom"value="Feaver" name="cbox">
		<label for="symtom">Feaver</label><br>
		<br>
		<b><label style ="float:left " > Level of Urgency</label>  </b><br>
		<select name ="Urgency" style ="width:80% "  required>
				<option value="">Urgency :</option>
				<option value="Severe">Severe</option>
				<option value="Moderate">Moderate</option>
				<option value="Moderate">Low</option>
			</select>

        <input type="submit" value="Update"><br>
		<img src="images\callnow.jpg" />

	</form>
	
	<!-- <div class="snd">
		<td><img src="images\callnow.jpg" /></a></td>

	</div> -->
	</div>

</body>
</html>