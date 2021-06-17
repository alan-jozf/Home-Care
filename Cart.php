<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="css/table.css" />

</head>
<style>

</style>

<body>
<?php require("Topbar.php"); ?> 
    <div class="homepage">
		<br><h1 class="thead">Cart</h1><br>
		<?php
			$tmpid=$_SESSION['id'];
			include('php/config.php');
			$query="select * from cart where L_id = $tmpid";
			$result =mysqli_query($con,$query);
			$rowCheck=mysqli_num_rows($result);
			if($rowCheck>0){

			?>
			<table class="cart" >
				<tbody>
					<tr>
						<th >No</th>
						<th >Image</th>
						<th >Name</th>
						<th >Price</th>
						<th >Quantinty</th>
						<th >Total</th>				
						<th >Delete</th>

						<!-- <th style="text-align:left;" width="100px">Date</th> -->
						<!-- <th style="text-align:left;" width="100px">Mark as Done</th> -->
					</tr>
					<?php
						$counter = 0;
						while($row=mysqli_fetch_array($result))  
						{	
							$id=$row['P_id'];
							$cid=$row['C_id'];

							$quer="select * from product where P_id=$id";
							$resl =mysqli_query($con,$quer);
							$ro=mysqli_fetch_array($resl);

								$image = $ro['image'];
								$image_src = "uploads/".$image;
								?>
							<tr>
								<td><?php echo ++$counter ?></td>
								<td><img src='<?php echo $image_src;  ?>' width="50" height="50" ></td>
								<td><?php echo $ro['name'] ?></td>
								<td><?php echo $ro['price'] ?></td>

								<td><?php echo $row['quantity'] ?></td>
								<?php
									$total=$row['quantity']*$ro['price'];
								?>
								<td><?php echo $total ?></td>

								<td><a href="php/delete.php?dd=<?php echo $cid ?>"><img src="images\icon-delete.png" /></a></td>

							</tr>
							<?php
						}
					?>
			</table>
			<div class="tblebtom">
					<a href="Payment.php"><input type="button" value="Buy Now"></a></p>
			</div><?php
		}
		else{?>
			<div class="tblebtom">
				<br><p class="tbotm">Cart is empty</p><br>
				<a href="Shopping.php"><input type="button" value="Shop Now"></a></p>
			</div><?php
		}?>
	</div>
</body>
</html>