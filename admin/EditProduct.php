<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="../css\registration.css" />

</head>
<style>
div.right_cont{
	/* background-color: rgb(232, 232, 232);; */
}
form{
	margin:1%;
	
}
label{
	width: 70%;
}
img{
	/* border-radius:50%; */
}
h2{
	margin:5% 0 3% 8%;
}
input[type="number"],[type=submit],[type=file]{
    background-color:  rgb(0, 138, 103);
    color: #fff;
	/* width: 10%; */
	align:left;
    margin: 8px 0;
    border-radius: 10px;
}
form{
	align:left;
}
.cart input[type="submit"]{
	width:100%;
}
table{
	margin-left:5%;
}
</style>

<body>
<?php require("Leftbar.php"); ?> 
<div class="right_cont" style="{background-color: rgb(232, 232, 232);}">

	<?php require("Topbar.php"); ?> 

		<a href="ViewProduct.php">🢀 Go Back</a></td>
		<?php
			include('php/config.php');
			$pid  = $_GET['dd'];
			$query="select * from product where P_id=$pid";
			$reslt =mysqli_query($con,$query);
			$row=mysqli_fetch_array($reslt);
			$image = $row['image'];
			$image_src = "../uploads/".$image;
		?>
		<h2><?php echo $row['name'] ?></h2>
		<table class="cart" cellpadding="5" cellspacing="10">
				<tr>
					<th style="text-align:left;" width="100px">Column</th>
					<th style="text-align:left;" width="150px">Current value</th>
					<th style="text-align:left;" width="200px">Input</th>
					<th style="text-align:left;" width="100px"></th>
				</tr>
			<form method="post" action="php/EditImage.php?dd=<?php echo $pid ?>" enctype="multipart/form-data">
				<tr>
					<td><h4><?php echo "Image" ?></h4></td>
					<td><img src='<?php echo $image_src;  ?>' width="70" height="70" ></td>
					<td><input type="FILE" name="image" required></td>
					<td><input type="submit" value="Update"></td>
				</tr>	
			</form>
			<form method="post" action="php/EditPrice.php?dd=<?php echo $pid ?>">
				<tr>
					<td><h4><?php echo "Price" ?></h4></td>
					<td><h4><?php echo $row['price'] ?></h4></td>
					<td><input type="number" name="price" placeholder="Update Price" required></td>
					<td><input type="submit" value="Update"></td>
				</tr>	
			</form>
			<form method="post" action="php/EditQuantity.php?dd=<?php echo $pid ?>">
				<tr> 
					<td><h4><?php echo "Quantity" ?></h4></td>
					<td><h4><?php echo $row['quantity'] ?></h4></td>
					<td><input type="number" name="quantity" placeholder="Update Quantity" required></td>
					<td><input type="submit" value="Update"></td>
				</tr>	
			</form>




		</table>
	</div>
</body>
</html>

			<!--Code for all updation in single page using GET and Isset 
				end up in errror with 			
				$pid  = $_GET['dd']; 
				but the value is available before the first update to ths page itself

			<form method="post" action="EditProduct.php">
				<tr>
				<?php
					if (isset($_POST['price']))
					{
						$price = $_POST['price'];
						$query="update product SET price = '$price' where P_id ='$pid'";
						$result =mysqli_query($con,$query);
					}
					?>
					<td><h4><?php echo "Price" ?></h4></td>
					<td><h4><?php echo $row['price'] ?></h4></td>
					<td><input type="number" name="price" placeholder="Set new price"></td>
					<td><input type="submit" value="Update"></td>
				</tr>	
			</form> -->