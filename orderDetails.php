<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="css/orderdetails.css" />
</head>
<body>
	<?php require("Topbar.php"); 
	include('php/config.php');
	if(isset($_SESSION['id']))
	{	
		?> 
		<div class="homepage">
			<h1 class="odhead">Order Details</h1>
			<div class="odleft">
				<?php
				$counter = 0;
				$tmpid=$_SESSION['id'];
				$oid=$_GET['dd'];

				$query1="select Date from myorder where O_id = $oid";
				$result1 =mysqli_query($con,$query1);
				$row1=mysqli_fetch_array($result1);
				$date= $row1['Date'];
				echo "<h4>Order Date: ".$date."</h5>";
				$gtotal =0;
				$namearray=array();
				$totalarray=array();

				$query="select * from myorder where L_id = $tmpid and Date='$date'";
				$result =mysqli_query($con,$query);
				while($row=mysqli_fetch_array($result))  
				{	
					$id=$row['P_id'];
					$quer="select * from product where P_id=$id";
					$resl =mysqli_query($con,$quer);
					$ro=mysqli_fetch_array($resl);
					$image = $ro['image'];
					$image_src = "uploads/".$image;?>
							
					<div class="odbox">
						<div class="odbox1">
							<img id="odimg" src='<?php echo $image_src;  ?>'>
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
			</div>
			<div class="odrght">
				<h4>Order Summary</h4>
				<div class="odrgbox">
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
						echo "<h4>Order Total</h4>";?><br>
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
							echo "<h4>: ".number_format((float)$gtotal, 2, '.', '')."</h4>";?><br>

					</DIV>
				</div>
			</div>
			<!-- <div class="odtrd">
					<p>Shipment Details</p>
			</div> -->
		</div>
		<?php
	}
	else{
		header("location:Login.php");
	}?>
</body>
</html>