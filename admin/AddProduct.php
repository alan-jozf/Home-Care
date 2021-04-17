<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="..\css\registration.css" />
	<link rel="stylesheet" type="text/css" href="..\css\Home.css" />

</head>
<style>

form{
	margin-left:6%;
	margin-top:2%;
	
}

label{
	width: 20%;
}
input[type="file"],[type=button],[type=text],[type=number]{
    /* background-color:  rgb(0, 138, 103); */
    /* color: #fff; */
    width: 30%;
    margin: 8px 0;
	padding: 8px 20px;
    border-radius: 10px;
}
select{
	/* color: #fff; */
    width: 30%;
	padding: 8px 20px;
    margin: 8px 0;
    border-radius: 10px;

}
input[type=text] {
  width: 30%;
  padding: 8px 20px;
  margin: 8px 0;
  border-radius: 10px;
}
</style>
<script>
function ee()
	{
		document.getElementById('err').style.cssText="visibility: hidden";

	}
</script>
<body>
<?php require("Leftbar.php"); ?> 
<div class="right_cont" style="{background-color: rgb(232, 232, 232);}">

	<?php require("Topbar.php"); ?> 
    <form action="php\AddPrdt.php" method='POST' enctype="multipart/form-data">
		<h2>Add a New Porduct</h2><br>

		<?php
			if(isset($_GET['err'])){
				if($_GET["err"]=="done"){
					echo "<h3 id='err' style='color:red'>Product added successfully </h3>";
				}
			}
		?>

		<label>Name</label><br>
		<input type="text" onclick=ee() name="name" required><br>
		<label>Price</label><br>
		<input type="number"  onclick=ee() name="price"  min=1 required><br>
		<label>Quantity</label><br>
		<input type="number"  onclick=ee() name="quantity" min=1 required><br>
		<label>Category</label><br>
		<select name ="category"  required>
					<option value="" onclick=ee() ></option>
					<option value="Vegitable">Vegitable</option>
					<option value="Fruits">Fruits</option>
					<option value="Food">Food</option>
					<option value="Grocery">Grocery</option>
		</select><br>
		<label>Image</label><br>
		<input type="FILE"  onclick=ee() name='image' required >
		<input type="submit" value="Add ">

	</form>
	</div>

</body>
</html>