<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="css/table.css" />
</head>
<body>
<!-- Home page begins -->

<?php require("Topbar.php"); ?> 
    <div class="homepage">
		<h1 class="thead">Product List</h1>
		<form method="post" action="ViewProduct.php">
			<input type="text" name="search" placeholder=" Search in List">
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
					
					$query1 = "select pcat_id FROM prodt_category WHERE category LIKE '%$searchq%'";
					$result1 =mysqli_query($con,$query1)or die("could not search1");
					$count1 = mysqli_num_rows($result1);
					if($count1 > 0)
					{
						$prow = mysqli_fetch_array($result1);
						$pcatid = $prow['pcat_id'];
					}
					else
					{
						$pcatid = -1;
					}
					$query = "select * FROM product WHERE name LIKE '%$searchq%' or description like '%$searchq%' or pcat_id = '$pcatid' ORDER BY quantity";
					$result =mysqli_query($con,$query)or die($query."could not search2");
					$count = mysqli_num_rows($result);
					if($count == 0)
					{
						echo  '<p id="error">There is no search results!</p>';
					}
					else{
							?>
								<table class="cart" >
								<tbody>
								<tr>
									<th >No</th>
									<th >Image</th>
									<th >Name</th>
									<th >Description</th>
									<th >Category</th>
									<th >Price</th>
									<th >Quantity</th>
									<th >Edit</th>
									<th >Delete</th>
								</tr>
							<?php
							while($row=mysqli_fetch_array($result))  
							{
								$pcatid=$row['pcat_id'];
								$query2 = "SELECT * FROM prodt_category where pcat_id=$pcatid";
								$result2 =mysqli_query($con,$query2);
								$row2=mysqli_fetch_array($result2)
								?>
								<tr>
									<td><?php echo ++$counter ?></td>
									<?php 
										$pid =$row['P_id'];
										$image = $row['image'];
										$image_src = "uploads/".$image;?>
									<td><img src='<?php echo $image_src;  ?>' width="50" height="50" ></td>
									<td><?php echo $row['name'] ?></td>
									<td><?php echo $row['description'] ?></td>
									<td><?php echo $row2['category'] ?></td>
									<td><?php echo $row['price'] ?></td>
									<td><?php echo $row['quantity'] ?></td>
									<td><a href="EditProduct.php?dd=<?php echo $pid ?>">Edit</a></td>
									<td><a href="php/DeleteProduct.php?dd=<?php echo $pid ?>"><img src="images\icon-delete.png" /></a></td>

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
						<table class="cart" >
						<tbody>
						<tr>
							<th >No</th>
							<th >Image</th>
							<th >Name</th>
							<th >Description</th>
							<th >Category</th>
							<th >Price</th>
							<th >Quantity</th>
							<th >Edit</th>
							<th >Delete</th>
						</tr>
					<?php
					while($row=mysqli_fetch_array($result))  
					{
						$pcatid=$row['pcat_id'];
						$query2 = "SELECT * FROM prodt_category where pcat_id=$pcatid";
						$result2 =mysqli_query($con,$query2);
						$row2=mysqli_fetch_array($result2)
						?>
						<tr>
							<td><?php echo ++$counter ?></td>
							<?php 
								$pid =$row['P_id'];
								$image = $row['image'];
								$image_src = "uploads/".$image;?>
							<td><img src='<?php echo $image_src;  ?>' width="50" height="50" ></td>
							<td><?php echo $row['name'] ?></td>
							<td><?php echo $row['description'] ?></td>
							<td><?php echo $row2['category'] ?></td>
							<td><?php echo $row['price'] ?></td>						
							<td><?php echo $row['quantity'] ?></td>
							<td><a href="EditProduct.php?dd=<?php echo $pid ?>">Edit</a></td>
							<td><a href="php/DeleteProduct.php?dd=<?php echo $pid ?>"><img src="images\icon-delete.png" /></a></td>
						</tr> 
						<?php
					}
				}
			?> 		
		</form>
	</div>
</body>
</html>