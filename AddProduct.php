<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="css/registration.css" />
</head>
<style>


</style>
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
    <div class="homepage">

    <form class="adpdtform" action="php\AddPrdt.php" method='POST' enctype="multipart/form-data">
		<h2 id="head">Add a New Porduct</h2>
		<?php
			if(isset($_GET['err'])){
				if($_GET["err"]=="done"){
					echo "<h3 id='err' style='color:red'>Product added successfully </h3>";
				}
			}
		?>
		<div class="formrow">
			<div class="formcol">
				<p>Name :</p>
				<input type="text" onclick=ee() name="name" required><br>
				<!-- <input type="text" placeholder="" name="hname"id="1"   onclick=ee() onblur="myhname()"required> -->
			</div>
			<div class="formcol">
				<p>Description :</p>
				<input type="text" onclick=ee() name="desc" required><br>
			</div>
		</div>
		<div class="formrow">
			<div class="formcol">
				<p>Category :</p>
				<select name ="category"  required>
					<option value="" onclick=ee() ></option>
					<?php $query =mysqli_query($con,"SELECT * FROM prodt_category");
					while($row=mysqli_fetch_array($query))
					{ 
						$val=$row['pcat_id'];
						?><option value="<?php echo $val;?>"><?php echo $row['category'];?></option>
						<?php
						}?>
				</select><br>		
			</div>
			<div class="formcol">
				<p>Image :</p>
				<input type="FILE"  onclick=ee() name='image' required >
			</div>
		</div>
		<div class="formrow">
			<div class="formcol">
				<p>Price :</p>
				<input type="number"  onclick=ee() name="price"  min=1 required><br>
			</div>
			<div class="formcol">
				<p>Quantity :</p>
				<input type="number"  onclick=ee() name="quantity" min=1 required><br>
			</div>
		</div>
		<div class="formrow">
			<input class="addpdt" type="submit" value="Add ">
		</div>

	</form>
	</div>

</body>
</html>