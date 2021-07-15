<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="css/table.css" />
</head>
<body>
<?php require("Topbar.php"); ?> 
    <div class="homepage">
		<h1 class="thead">Pending Deliveries</h1>
		<button><a href="php/GeneratePDF.php" target="_blank"> Generate PDF</a></button>
		<div class="dtable">
			<table class="cart" >
				<tbody>
				<tr>
					<th >No</th>
					<th >Date</th>
					<th >User</th>
					<th >Mobile</th>
					<th >House Name</th>
					<th >Place</th>
					<th >Image</th>
					<th >Product</th>
					<th >Description</th>
					<th >Quantinty</th>
						
					<!-- <th style="text-align:left;" width="100px">Date</th> -->
					<!-- <th style="text-align:left;" width="100px">Mark as Done</th> -->
				</tr>
				<?php
					$counter = 0;
					include('php/config.php');
					$tmpid=$_SESSION['id'];

					$query="select * from volunteer";
					$result =mysqli_query($con,$query);
					$row=mysqli_fetch_array($result); 
					$plid=$row['pn_id'];

					// $query="select * from myorder";

					$query="select * from myorder where L_id in (select L_id from user where pn_id =$plid)";
					$result =mysqli_query($con,$query);
					while($row=mysqli_fetch_array($result))  
					{	
						$id=$row['P_id'];
						$Oid=$row['O_id'];
						$lid=$row['L_id'];

						$quer="select * from product where P_id=$id";
						$resl =mysqli_query($con,$quer);
						$ro=mysqli_fetch_array($resl);
						$image = $ro['image'];
						$image_src = "uploads/".$image;

						$querB="select * from user where L_id=$lid";
						$reslB =mysqli_query($con,$querB);
						$roB=mysqli_fetch_array($reslB);
						$sid=$roB['pn_id'];

						$querC="select * from punchayat where pn_id=$sid";
						$reslC =mysqli_query($con,$querC);
						$roC=mysqli_fetch_array($reslC);

						$querD="select * from login where L_id=$lid";
						$reslD =mysqli_query($con,$querD);
						$roD=mysqli_fetch_array($reslD);

						?>
						<tr>
							<td><?php echo ++$counter ?></td>
							<td><?php echo $row['Date'] ?></td>
							<td><?php echo $roB['name'] ?></td>
							<td><?php echo $roD['PhoneNo'] ?></td>
							<td><?php echo $roB['hname'] ?></td>
							<td><?php echo $roC['pn_name'] ?></td>
							<td><img src='<?php echo $image_src;  ?>' width="50" height="50" ></td>
							<td><?php echo $ro['name'] ?></td>
							<td><?php echo $ro['description'] ?></td>
							<td><?php echo $row['quantity'] ?></td>
						</tr>
						<?php
					}
				?>
			</table>
		</div>
	</div>
</body>
</html>