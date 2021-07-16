<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="css/table.css" />

</head>

<body>
	<?php require("Topbar.php"); ?> 
    <div class="homepage">
		<?php
		if(isset($_GET['mid'])){
			
            $mid = $_GET['mid'];
            unset($_GET);

            $sql="update mrequest SET status=0 where MR_id='$mid'";
            if(mysqli_query($con,$sql)){
				header("Location:ViewRequest.php");
			}
			else{
				header("location:Home.php");

			}
		}?>
		<h1 class="thead">Medical Requests</h1>
		<table  class="cart">
			<tbody>
			<tr>
				<th >No</th>
				<th >Name</th>
				<th >Urgency</th>
				<th >Reason</th>
				<th >Date</th>
				<th >Mobile</th>
				<th >Approve</th>
				<!-- <th style="text-align:left;" width="100px">Mark as Done</th> -->
			</tr>
			<?php
				$counter = 0;

				include('php/config.php');
				$query="select * from mrequest where status=1";
				$result =mysqli_query($con,$query);
				while($row=mysqli_fetch_array($result))  
				{?>
					<tr>
					<td><?php echo ++$counter ?></td>
					<?php
					// echo $row['L_id'] 
					$id=$row['L_id'];
					$quer="select * from user where L_id=$id";
					$resl =mysqli_query($con,$quer);
					$ro=mysqli_fetch_array($resl);
					$quer2="select * from login where L_id=$id";
					$resl2 =mysqli_query($con,$quer2);
					$ro2=mysqli_fetch_array($resl2);
					// echo count($ro);
					?>
						<td><?php echo $ro['name'] ?></td>

					<td><?php echo $row['Urgency'] ?></td>
					<td><?php echo $row['Reason'] ?></td>
					<td><?php echo $row['Date'] ?></td>
					<td><?php echo $ro2['PhoneNo'] ?></td>
					<td><a href="ViewRequest.php?mid=<?php echo $row['MR_id'] ?>"><img width ="20px" height="20px" src="images\complete.png" /></a></td>

					</tr>
					<?php
				}
			?> 	</tbody>	
		</table >
	</div>
</body>
</html>