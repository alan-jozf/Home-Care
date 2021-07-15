<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="css/table.css" />
	<link rel="stylesheet" type="text/css" href="css/orderdetails.css" />
</head>
<body>
<?php require("Topbar.php"); ?> 
    <div class="homepage">
		<form action="Delivery.php?oid=sh" method="POST">
			<button name="oh" class="hbtn">Shopping History</button>
		</form><br>
		<form action="Delivery.php?oid=mh" method="POST">
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
			<a class="thead" href="Delivery.php?oid=ph">
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
				header("Location:Delivery.php?oid=mh");
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
				header("Location:Delivery.php?oid=ph");
			}
			else{
				header("location:Home.php");
			}
		}
		else{
			$oid = 'sh';
		}

		// above if else creating oid for showing categorry 

		if ($oid=='sh'){

		}?>

		<div class="dtable">
			<h1 class="thead">Pending Deliveries</h1>
			<button class="dbtn"><a href="php/GeneratePDF.php" target="_blank"> Generate PDF</a></button>
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
				</tr>
				<?php
					$counter = 0;
					include('php/config.php');
					$tmpid=$_SESSION['id'];

					$query="select * from volunteer";
					$result =mysqli_query($con,$query);
					$row=mysqli_fetch_array($result); 
					$plid=$row['pn_id'];

					// $query="select * from Delivery";

					$query="select * from Delivery where L_id in (select L_id from user where pn_id =$plid)";
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