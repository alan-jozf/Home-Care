<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="css\Shopping.css" />

</head>
<style>

</style>

<body>
	<?php require("Topbar.php"); 
		include('php/config.php');
		?> 
    <div class="homepage">
		<div class="header">
			<h2 id="heads">Category</h2>
			<select class="categ" >
				<option value=""></option>
				<?php $query =mysqli_query($con,"SELECT * FROM prodt_category");
				while($row=mysqli_fetch_array($query))
				{ 
					$val=$row['pcat_id'];
					?><option value="<?php echo $val;?>"><?php echo $row['category'];?></option>
					<?php
					}?>
			</select>
		</div>
		<div class="grid">
			<!-- <div class="box"> </div>
			<div class="box"> </div>
			<div class="box"> </div>
			<div class="box"> </div> -->
			<?php
				$query="select * from product";
				// $query="select * from product where pcat_id=$val";
				$result =mysqli_query($con,$query);
				// $row=mysqli_fetch_array($result);
				// echo count($row);
				while($row=mysqli_fetch_array($result))  
				{?>
					<div class="box"> 
						<form action="php\addToCart.php?P_id=<?php echo $row['P_id']?>" method="POST" >
							<?php
								$image = $row['image'];
								$image_src = "uploads/".$image;
								?>
							<div class="Pimage"><img id="pdt" src="<?php echo $image_src;  ?>" ></div>
							<div class ="line">
								<div class="pname"><h3 ><?php echo $row["name"]; ?></h3></div>
								<div class="pdic"><h5><?php echo " (". $row["description"]. ")"; ?></h5></div>
							</div>
							<div class="pprice"><h4 ><?php echo "Rs: ".$row["price"];  ?></h4></div> 
							<div class ="line">
								<!-- <div class="pprice"></div> -->	
								<?php
								$mx=$row['quantity'];?>
								<div><input  class="pquantity"type="number" name="quantity" value="1" min="1" max= "<?php echo $mx?>"/></div>
								
										<!-- <a href="php/addToCart.php?P_id=
														<?php echo $row['P_id']?>
													"><button>Add To Cart</button></a> -->
								
								<div> <input class="btn" type="submit" value="Add to Cart"  /></div>
							</div> 
						</form>
					</div>					
					<?php
				}
			?> 	
		</div>
	</div>
</body>
</html>
