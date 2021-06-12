<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="css\registration.css" />

</head>
<style>
	
	.odbox {
		padding: 10px ;
		display: flex;
		border: 1px solid black;
		width:25%;
		margin-left: 20px;
		}

	.odbox1 {
		/* width: 10%; */
		float: left;
		padding: 10px;
	}  
	.odcenter {
		position: absolute;
		left: 46%;
		top: 45%;
		width:25%;
		height:44%;
		border:1;
		border: 1px solid black;
		/* background-color:red; */
		}
	/* .odright {
		position: absolute;
		left: 70%;
		top: 35%;
		width:25%;
		height:25%;
		margin-left:3%;
		padding: 10px ;
		display: flex;
		background-color:red;
		} */
	#osmry{
		position: absolute;
		left: 46%;
		top: 36%;
	}
</style>


<body>
<?php require("Topbar.php"); ?> 
    <div class="homepage">


		<br><h1 style="margin-left:4%;">Order Details</h1><br>

		<div class=""></div>
			<?php
				include('php/config.php');
				$counter = 0;
				$tmpid=$_SESSION['id'];
				$oid=$_GET['dd'];

				$query1="select Date from myOrder where O_id = $oid";
				$result1 =mysqli_query($con,$query1);
				$row1=mysqli_fetch_array($result1);
				$date= $row1['Date'];
				echo "<h4>&emsp;&nbsp;Order Date: ".$date."</h5>";
				$gtotal =0;
				$namearray=array();
				$totalarray=array();

				$query="select * from myOrder where L_id = $tmpid and Date='$date'";
				$result =mysqli_query($con,$query);
				while($row=mysqli_fetch_array($result))  
				{	
					$id=$row['P_id'];
					$quer="select * from product where P_id=$id";
					$resl =mysqli_query($con,$quer);
					$ro=mysqli_fetch_array($resl);
					$image = $ro['image'];
					$image_src = "uploads/".$image;?><br><br>
					      
					<div class="odbox">
						<div class="odbox1">
							<img src='<?php echo $image_src;  ?>' width="100" height="80" >
						</div>
						<DIV class="odbox1">
							<?php 
							echo "Name" ;?><br><?php
							echo "Price" ;?><br><?php
							echo "Quantity";?><br><?php
							echo "Total";?><br>
						</DIV>						
						<DIV class="odbox1">
							<?php 
								array_push($namearray, $ro['name']);
							echo ": ".$ro['name'] ;?><br><?php
								// echo ": ".$namearray[$counter] ;
							echo ": ".$ro['price'] ;?><br><?php
							echo ": ".$row['quantity'];?><br><?php
								$total=$row['quantity']*$ro['price'];
								array_push($totalarray, $total);
							echo ": ".$total ;
								$gtotal += $total;
								$counter++ ; ?><br>
						</DIV>
					</div>
					<?php
				}?>
				
				<h3 id="osmry">Order Summary</h3><br>
				<div class="odcenter">
					<!-- <br><h1 id="osmry">Order Summary</h1><br> -->
						<DIV class="odbox1"><?php
							$x=0;
								while($x<$counter){
									echo $namearray[$x] ;
									$x++;?><br><?php
								}?><br><?php
							echo "Total";?><br><?php
							echo "GST";?><br><?php
							echo "Delivery Charge";?><br><?php
							echo "Discount";?><br><br><?php
							echo "<h3>Order Total</h3>";?><br>

						</DIV>						
						<DIV class="odbox1"><?php
								$x=0;
								while($x<$counter){
									echo ": ".$totalarray[$x] ;
									$x++;?><br><?php
								}?><br><?php
								echo ": ".number_format((float)$gtotal, 2, '.', '');?><br><?php
								echo ": ".number_format((float)$gtotal/12, 2, '.', '');?><br><?php
								echo ": ".number_format((float)$gtotal/10, 2, '.', '');?><br><?php
								echo ": ".number_format((float)$gtotal/12+$gtotal/10, 2, '.', '');?><br><br><?php
								echo "<h3>: ".number_format((float)$gtotal, 2, '.', '')."</h3>";?><br>

						</DIV>
				</div>
				<!-- <div class="odright">
						<p>Shipment Details</p>
				</div> -->

				<?php
			?>
	</div>
</body>
</html>