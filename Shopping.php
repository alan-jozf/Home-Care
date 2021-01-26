<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT</title>
	<!-- <link rel="stylesheet" type="text/css" href="css\registration.css" /> -->

</head>
<style>

	.grid{
		margin-left: 80px;

	}
	.grid .box{
        position: relative;
        float: left;
        width:200px;
        height:180px;
        /* background-color:  rgb(232, 232, 232); */
        margin-top:20px;
        margin: 14px;
		border-radius: 2px;
		border: #E0E0E0 1px solid;

	}  
	.pname{
		margin-left:10px;
		width: 50px;
		font-size: 15px ;
	}
	.line{
		/* background-color:red; */
		width:100%;
		/* overflow: auto; */
		/* display: inline-block; */
		float: left; 
	}
	.pprice {
		position: relative;
		float: left; 
		/* display:inline; */
		padding: 5px 1px;
		width: 50px;
		margin-left:5px;
		font-size: 16px;
	}
	.pquantity {
		position: relative;
		float: left; 
		padding: 5px 10px;
		width: 30px;
		margin-top:1px;
		border-radius: 3px;
		font-size: 13px;
		height:20px;
		border: #E0E0E0 1px solid;
	}
	/* button{
		position: relative;
		float: left; 
		background-color:#f2ca65;
		padding: 5px 10px;
		margin-top:1px;
		margin-left:6px;
		width: 80px;
		height:30px;
		font-size: 13px;
		border: #E0E0E0 1px solid;

	} */
	.btn {
		position: relative;
		float: left; 
		background-color:#f2ca65;
		/* padding: 5px 10px; */
		margin-top:1px;
		margin-left:6px;
		width: 80px;
		height:30px;
		font-size: 13px;
		border: #E0E0E0 1px solid;
	}
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

				$con=mysqli_connect("localhost","root","","care_app")or die("couldn't connect");
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
							<div class="Pimage"><img src="<?php echo $image_src;  ?>" width="200" height="120" ></div>
							<div class="pname"><h3 ><?php echo $row["name"]; ?></h3></div>
 							
							<?php 
								// $_SESSION['pname'] = $row["name"]; 
								// $_SESSION['pid'] = $row["P_id"]; 
							?> 

							<div class ="line">
								<div class="pprice"><?php echo "Rs: ".$row["price"]; ?></div>
								<div><input  class="pquantity"type="number" name="quantity" value="1" min="1"/></div>
								
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
