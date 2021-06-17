<!DOCTYPE html>
<html lang="en">
<head>
	<title>Order History</title>
	<link rel="stylesheet" type="text/css" href="css/table.css" />
</head>
<body>
<?php require("Topbar.php"); ?> 
    <div class="homepage">
		<br><h1 class="thead">Order History</h1><br>
		<table class="cart" cellpadding="5" cellspacing="10">
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

				include('php/config.php');
				$query="select * from myOrder where L_id = $tmpid";
				$result =mysqli_query($con,$query);
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
	</div>
</body>
</html>