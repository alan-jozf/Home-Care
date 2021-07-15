<!DOCTYPE html>
<html lang="en">
<head>
	<title>Order History</title>
	<link rel="stylesheet" type="text/css" href="css/table.css" />
	<link rel="stylesheet" type="text/css" href="css/orderdetails.css" />
</head>
<body>
	<?php require("Topbar.php"); 
		include('php/config.php');
		// header("location:myOrder.php?oid=sh");

			?> 
    <div class="homepage">
		
		<form action="myOrder.php?oid=sh" method="POST">
			<button name="oh" class="hbtn">Shopping History</button>
		</form><br>
		<form action="myOrder.php?oid=mh" method="POST">
			<button name="oh" class="hbtn">Medicine History</button>
		</form><br>
		<?php
		
        if (isset($_GET['oid'])){
            $oid = $_GET['oid'];
            unset($_GET);
		}
		elseif (isset($_GET['smd'])){
			$oid = 'no_oid';

            $smd = $_GET['smd'];
            unset($_GET);
			$tmpid=$_SESSION['id'];
			$query="select * from medicineslipodr where mds_id = $smd";
			$result =mysqli_query($con,$query)or die(	$query);
			$row=mysqli_fetch_array($result); 
			$image = $row['slip'];
			$image_src = "uploads/".$image;
			?>
			<br>
			<a class="thead" href="myOrder.php?oid=ph">
				<img src="images\backarrow.png"  style="float:left;margin-top:4px;" width="20" height="20" >
				<h5>Go Back</h5>
			</a>
			<img id="single"src='<?php echo $image_src;  ?>' width="400" height="400" >
			<?php
		}
	
		elseif (isset($_GET['dmd'])){
			$oid = 'no_oid';

            $smd = $_GET['dmd'];
            unset($_GET);
			$tmpid=$_SESSION['id'];

			$sql = "DELETE FROM medicineodr WHERE bm_id= $smd";
			if(mysqli_query($con,$sql)){
				header("Location:myOrder.php?oid=mh");
			}
			else{
				header("location:Home.php");
			}
		}
		elseif (isset($_GET['dpd'])){
			$oid = 'no_oid';

            $smd = $_GET['dpd'];
            unset($_GET);
			$tmpid=$_SESSION['id'];

			$sql = "DELETE FROM medicineslipodr WHERE mds_id= $smd";
			if(mysqli_query($con,$sql)){
				header("Location:myOrder.php?oid=ph");
			}
			else{
				header("location:Home.php");
			}
		}
		else{
			$oid = 'sh';
		}

		// above if else creating oid for showing categorry ////////////////////////////////

		if ($oid=='sh'){
			?>
			<table >
				<thead>
					<tr >
						<th >No</th>
						<th >Image</th>
						<th >Name</th>
						<th >Price</th>
						<th >Quantinty</th>
						<th >Total</th>
						<th >Date</th>								
						<th >Delete</th>
					</tr>
				</thead>

				<tbody>

				<?php
					$counter = 0;
					$tmpid=$_SESSION['id'];

					$query="select * from myorder where L_id = $tmpid";
					$result =mysqli_query($con,$query)or die(	$query);
					while($row=mysqli_fetch_array($result))  
					{	
						$id=$row['P_id'];
						$Oid=$row['O_id'];

						$quer="select * from product where P_id=$id";
						$resl =mysqli_query($con,$quer);
						$ro=mysqli_fetch_array($resl);

							$image = $ro['image'];
							$image_src = "uploads/".$image;
							?>
						<tr onclick ="window.location='orderDetails.php?dd=<?php echo $Oid ?>';">
							<td><?php echo ++$counter ?></td>
							<td><img src='<?php echo $image_src;  ?>' width="50" height="50" ></td>
							<td><?php echo $ro['name'] ?></td>
							<td><?php echo $ro['price'] ?></td>

							<td><?php echo $row['quantity'] ?></td>
							<?php
								$total=$row['quantity']*$ro['price'];
							?>
							<td><?php echo $total ?></td>
							<td><?php echo $row['Date'] ?></td>
							<td><a href="php/deleteOrder.php?dd=<?php echo $Oid ?>"><img src="images\icon-delete.png" /></a></td>

						</tr></div>
						<?php
					}
				?>
				</tbody>
			</table>
			<?php
		}
		elseif ($oid=='mh' or $oid=='ph'){
			?>
			<form action="myOrder.php?oid=ph" method="POST">
				<button name="oh" class="mbtn">Purchase using Medicine Slip or Image</button>
			</form><br>
			<?php
			if ($oid=='mh'){
				?>
				<table >
					<thead>
						<tr >
							<th >No</th>
							<th >Name</th>
							<th >Quantinty</th>
							<th >Measure</th>
							<th >Description</th>
							<th >Purpose</th>
							<th >Date</th>								
							<th >Delete</th>
						</tr>
					</thead>

					<tbody>

					<?php
						$counter = 0;
						$tmpid=$_SESSION['id'];

						$query="select * from medicineodr where L_id = $tmpid";
						$result =mysqli_query($con,$query)or die(	$query);
						while($row=mysqli_fetch_array($result))  
						{								
							$mdid=$row['bm_id'];
							?>
							<tr>
								<td><?php echo ++$counter ?></td>
								<td><?php echo $row['mdname'] ?></td>
								<td><?php echo $row['qntty'] ?></td>
								<td><?php echo $row['measure'] ?></td>
								<td><?php echo $row['descrp'] ?></td>
								<td><?php echo $row['purpose'] ?></td>
								<td><?php echo $row['date'] ?></td>
								<td><a href="myOrder.php?dmd=<?php echo $mdid ?>"><img src="images\icon-delete.png" /></a></td>

							</tr></div>
							<?php
						}
					?>
					</tbody>
				</table>
				<?php
			}
			elseif ($oid=='ph'){
				?>
				<table >
					<thead>
						<tr >
							<th >No</th>
							<th >Image</th>
							<th >Description</th>
							<th >Purpose</th>
							<th >Date</th>								
							<th >Delete</th>
						</tr>
					</thead>

					<tbody>

					<?php
						$counter = 0;
						$tmpid=$_SESSION['id'];

						$query="select * from medicineslipodr where L_id = $tmpid";
						$result =mysqli_query($con,$query)or die(	$query);
						while($row=mysqli_fetch_array($result))  
						{	
							$mdid=$row['mds_id'];
							?>
							<tr onclick ="window.location='myOrder.php?smd=<?php echo $mdid ?>';">
								<td><?php echo ++$counter ?></td>
								<?php
									$image = $row['slip'];
									$image_src = "uploads/".$image;
								?>
								<td><img src='<?php echo $image_src;  ?>' width="50" height="50" ></td>
								<td><?php echo $row['descrp'] ?></td>
								<td><?php echo $row['purpose'] ?></td>
								<td><?php echo $row['date'] ?></td>
								<td><a href="myOrder.php?dpd=<?php echo $mdid ?>"><img src="images\icon-delete.png" /></a></td>

							</tr></div>
							<?php
						}
					?>
					</tbody>
				</table>
				<?php
			}
		}
		
		?>
	</div>
</body>
</html>