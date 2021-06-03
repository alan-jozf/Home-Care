<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="css\registration.css" />

</head>
<style>

table{
	margin-left:4%;
	/* margin-top:1%; */
	
}
label{
	width: 70%;
}

input[type="file"],[type=button]{
    background-color:  rgb(0, 138, 103);
    color: #fff;
    margin: 8px 0;
    border-radius: 10px;
}
input[type=button]{
    width: 30%;
    margin: 20px 0 0 20%;
    border-radius: 10px;
}

</style>

<body>
	<?php require("Leftbar.php"); ?> 
	<div class="right_cont" style="{background-color: rgb(232, 232, 232);}">

		<?php require("Topbar.php"); ?> 

		<br><h1 style="margin-left:4%;">My Orders</h1><br>

		<table class="cart" cellpadding="5" cellspacing="10">
		<thead>

			<tr>
				<th style="text-align:left;" width="40px">No</th>
				<th style="text-align:left;" width="100px">Image</th>
				<th style="text-align:left;" width="100px">Name</th>
				<th style="text-align:left;" width="100px">Price</th>
				<th style="text-align:left;" width="100px">Quantinty</th>
				<th style="text-align:left;" width="100px">Total</th>
				<th style="text-align:left;" width="100px">Date</th>								
				<th style="text-align:left;" width="100px">Delete</th>

				<!-- <th style="text-align:left;" width="100px">Date</th> -->
				<!-- <th style="text-align:left;" width="100px">Mark as Done</th> -->
			</tr>
			</thead>

			<tbody style="height: 10px !important; overflow: scroll; ">

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
						<td><?php echo $row['Date'] ?></td>
						<td><a href="php/deleteOrder.php?dd=<?php echo $Oid ?>"><img src="images\icon-delete.png" /></a></td>

					</tr>
					<?php
				}
			?>
			</tbody>
		</table>
	</div>
</body>
</html>