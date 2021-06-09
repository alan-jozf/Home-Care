<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="css\Shopping.css" />

</head>
<style>

</style>

<body>
	<?php require("Leftbar.php"); ?> 
	<div class="right_cont" style="{background-color: rgb(232, 232, 232);}">

		<?php require("Topbar.php"); ?> 

		<br><h3 style="margin-left:4%;">Products</h3><br>
		<!-- <br><h3 style="margin-right:4%; align:right;">Cart</h3><br> -->
		
		<div class="grid">
			<!-- <div class="box"> </div>
			<div class="box"> </div>
			<div class="box"> </div>
			<div class="box"> </div> -->

			<?php

				include('php/config.php');
				$query="select * from product";
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
							<div class="Pimage"><img src="<?php echo $image_src;  ?>" width="200" height="200" ></div>
							<div class="pname"><h3 ><?php echo $row["name"]; ?></h3></div>
 							
							<?php 
								// $_SESSION['pname'] = $row["name"]; 
								// $_SESSION['pid'] = $row["P_id"]; 
							?> 

							<div class ="line">
								<div class="pprice"><?php echo "Rs: ".$row["price"]; ?></div>
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
