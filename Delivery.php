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

		<br><h1 style="margin-left:4%;">Pending Deliveries</h1><br>

		<table class="cart" cellpadding="5" cellspacing="10">
			<tbody>
			<tr>
				<th style="text-align:left;" width="40px">No</th>
				<th style="text-align:left;" width="100px">Date</th>
				<th style="text-align:left;" width="100px">User</th>
				<th style="text-align:left;" width="100px">Mobile</th>
				<th style="text-align:left;" width="100px">House Name</th>
				<th style="text-align:left;" width="100px">Place</th>
				<th style="text-align:left;" width="100px">Image</th>
				<th style="text-align:left;" width="100px">Product</th>
				<th style="text-align:left;" width="100px">Quantinty</th>
					

				<!-- <th style="text-align:left;" width="100px">Date</th> -->
				<!-- <th style="text-align:left;" width="100px">Mark as Done</th> -->
			</tr>
			<?php
				$counter = 0;
				$con=mysqli_connect("localhost","root","","care_app")or die("couldn't connect");
				$query="select * from myOrder";
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
					$sid=$roB['sd_id'];

					$querC="select * from subdist where sd_id=$sid";
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
						<td><?php echo $roC['sd_name'] ?></td>
						<td><img src='<?php echo $image_src;  ?>' width="50" height="50" ></td>
						<td><?php echo $ro['name'] ?></td>
						<td><?php echo $row['quantity'] ?></td>


					</tr>
					<?php
				}
			?>
		</table>
	</div>
</body>
</html>