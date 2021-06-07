<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="..\css\registration.css" />

</head>
<style>

table{
	margin-left:4%;
	/* margin-top:1%; */
	/* border-collapse: collapse;	 */
}

label{
	width: 70%;
}
input[type="text"]{
    background-color:  rgb(0, 138, 103);
    color: #fff;
    width: 25%;
    margin: -5% 0 0 6%;
    border-radius: 10px;
}input[type=submit]{
    background-color:  rgb(0, 138, 103);
    color: #fff;
    width: 8%;
    margin: 8px 0 15px 1%;
    border-radius: 10px;
}
</style>

<body>

<!-- Home page begins -->
	<?php require("Leftbar.php"); ?> 
	<div class="right_cont" style="{background-color: rgb(232, 232, 232);}">

		<?php require("Topbar.php"); ?> 

		<br><h1 style="margin-left:4%;">Product List</h1>

		<form method="post" action="ViewProduct.php">
			<input type="text" name="search" placeholder="Search in List">
			<input type="submit" value="Search">
		</form>

			<!-- search function -->
			<?php
				include('php/config.php');
                
				// $output ='';
				$counter = 0;

				//collect
				if (isset($_POST['search']))
				{
					$searchq = $_POST['search'];
					$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
					// $query = mysql_query("SELECT * FROM product WHERE name LIKE '%$searchq%' OR category LIKE '%$searchq%'") or die("could not search");
					$query = "SELECT * FROM product WHERE name LIKE '%$searchq%' OR category LIKE '%$searchq%' ORDER BY quantity ";
					$result =mysqli_query($con,$query);
					$count = mysqli_num_rows($result);
					if($count == 0)
					{
						?>
						</table><br><br><tab>
						<?php
						// $output = 'There was no search results!';
						echo  'There was no search results!';
					}
					else{
							?>
								<table class="cart" cellpadding="5" cellspacing="10">
								<tbody>
								<tr>
									<th style="text-align:left;" width="40px">No</th>
									<th style="text-align:left;" width="100px">Image</th>
									<th style="text-align:left;" width="100px">Name</th>
									<th style="text-align:left;" width="100px">Category</th>
									<th style="text-align:left;" width="100px">Price</th>
									<th style="text-align:left;" width="100px">Quantity</th>
									<th style="text-align:left;" width="100px">Edit</th>
									<th style="text-align:left;" width="100px">Delete</th>
								</tr>
							<?php
							while($row=mysqli_fetch_array($result))  
							{
								?>
								<tr>
									<td><?php echo ++$counter ?></td>
									<?php 
										$pid =$row['P_id'];
										$image = $row['image'];
										$image_src = "../uploads/".$image;?>
									<td><img src='<?php echo $image_src;  ?>' width="50" height="50" ></td>
									<td><?php echo $row['name'] ?></td>
									<td><?php echo $row['category'] ?></td>
									<td><?php echo $row['price'] ?></td>
									<td><?php echo $row['quantity'] ?></td>
									<td><a href="EditProduct.php?dd=<?php echo $pid ?>">Edit</a></td>
									<td><a href="php/DeleteProduct.php?dd=<?php echo $pid ?>"><img src="../images\icon-delete.png" /></a></td>

								</tr>
								<?php
							}
						}
				}
				// Normal case 
				else
				{
					$query = "SELECT * FROM product ORDER BY quantity";
					$result =mysqli_query($con,$query);
					$count = mysqli_num_rows($result);
					?>
						<table class="cart" cellpadding="5" cellspacing="10">
						<tbody>
						<tr>
							<th style="text-align:left;" width="40px">No</th>
							<th style="text-align:left;" width="100px">Image</th>
							<th style="text-align:left;" width="100px">Name</th>
							<th style="text-align:left;" width="100px">Category</th>
							<th style="text-align:left;" width="100px">Price</th>
							<th style="text-align:left;" width="100px">Quantity</th>
							<th style="text-align:left;" width="100px">Edit</th>
							<th style="text-align:left;" width="100px">Delete</th>
						</tr>
					<?php
					while($row=mysqli_fetch_array($result))  
					{
						?>
							<tr>
								<td><?php echo ++$counter ?></td>
								<?php 
									$pid =$row['P_id'];
									$image = $row['image'];
									$image_src = "../uploads/".$image;?>
								<td><img src='<?php echo $image_src;  ?>' width="50" height="50" ></td>
								<td><?php echo $row['name'] ?></td>
								<td><?php echo $row['category'] ?></td>
								<td><?php echo $row['price'] ?></td>						
								<td><?php echo $row['quantity'] ?></td>
								<td><a href="EditProduct.php?dd=<?php echo $pid ?>">Edit</a></td>
								<td><a href="php/DeleteProduct.php?dd=<?php echo $pid ?>"><img src="../images\icon-delete.png" /></a></td>
							</tr> 
						<?php
					}
				}
			?> 		
		</form>
	</div>
</body>
</html>