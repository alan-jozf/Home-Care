<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="css/table.css" />

</head>

<body>
<?php require("Topbar.php"); ?> 
    <div class="homepage">
		<h3 class="thead">New Messages</h3>

		<table class="cart" >
			<tr>
				<th >No</th>
				<th >Name</th>
				<th >Message</th>
				<th >Date</th>
				<th >Mobile</th>
				<th >Complete</th>

			</tr>
			<?php
				$counter = 0;

				include('php/config.php');
				$query="select * from chat_message ORDER BY ms_id DESC";
				$result =mysqli_query($con,$query);
				while($row=mysqli_fetch_array($result))  
				{?>
					<tr>
					<td><?php echo ++$counter ?></td>
					<?php
					$mid =$row['ms_id'];
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
					<td><?php echo $row['message'] ?></td>
					<td><?php echo $row['date'] ?></td>
					<td><?php echo $ro2['PhoneNo'] ?></td>
					<td><a href="php/DeleteMsg.php?mid=<?php echo $mid ?>"><img width ="20px" height="20px" src="images\complete.png" /></a></td>


					</tr>
					<?php
				}
			?> 		
		</table>
	</div>
</body>
</html>