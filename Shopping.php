<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="css/Shopping.css" />
</head>
<body>
	<?php require("Topbar.php"); 
	include('php/config.php');
	if(isset($_SESSION['id']))
	{	
		$tmpid=$_SESSION['id'];
		$query="select * from login where L_id=$tmpid";
		$result=mysqli_query($con,$query);
		$login = mysqli_fetch_array($result);
		if($login['user_type']=='user')
		{
			?> 
			<div class="homepage">
				<div class="header">
					<h2 id="heads">Category</h2>
					<form method="post" action="Shopping.php">
						<select class="categ" name="category">
							<option value=""></option>
							<?php $query =mysqli_query($con,"SELECT * FROM prodt_category");
							while($row=mysqli_fetch_array($query))
							{ 
								$val=$row['pcat_id'];
								?><option value="<?php echo $val;?>"><?php echo $row['category'];?></option>
								<?php
								}?>
						</select>
						<input id="submt" type="submit" value="Find">
					</form>
				</div>
				<?php				
				if (isset($_POST['category']) && $_POST['category']!="" )
				{
					$ctg_id = $_POST['category'];
					?>
					<div class="grid">
						<?php
							$query="select * from product where pcat_id=$ctg_id";
							$result =mysqli_query($con,$query);
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
					</div><?php
					
				}

				else
				{
					?>
					<div class="grid">
						<!-- <div class="box"> </div>
						<div class="box"> </div>
						<div class="box"> </div>
						<div class="box"> </div> -->
						<?php
							$query="select * from product";
							$result =mysqli_query($con,$query);
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
					</div><?php
				}?>
			</div><?php
		}else{
			header("location:Login.php");
		}
	}
	else{
		header("location:Login.php");
	}?>
</body>
</html>
