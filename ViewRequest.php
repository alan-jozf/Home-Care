<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="css\registration.css" />

</head>
<style>

table{
	margin-left:4%;
	margin-top:1%;
	
}
label{
	width: 70%;
}
input[type="file"],[type=button]{
    background-color:  rgb(0, 138, 103);
    color: #fff;
    width: 40%;
    margin: 8px 0;
    border-radius: 10px;
}
</style>

<body>
	<?php require("Leftbar.php"); ?> 
	<div class="right_cont" style="{background-color: rgb(232, 232, 232);}">

		<?php require("Topbar.php"); ?> 

		<br><h1 style="margin-left:4%;">Medical Requests</h1><br>

		<table class="cart" cellpadding="5" cellspacing="5">
			<tbody>
			<tr>
				<th style="text-align:left;" width="40px">No</th>
				<th style="text-align:left;" width="100px">Name</th>
				<th style="text-align:left;" width="100px">Urgency</th>
				<th style="text-align:left;" width="100px">Reason</th>
				<th style="text-align:left;" width="150px">Date</th>
				<!-- <th style="text-align:left;" width="100px">Mark as Done</th> -->
			</tr>
			<?php
				$counter = 0;

				include('php/config.php');
				$query="select * from mrequest";
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
					// echo count($ro);
					?>
						<td><?php echo $ro['name'] ?></td>

					<td><?php echo $row['Urgency'] ?></td>
					<td><?php echo $row['Reason'] ?></td>
					<td><?php echo $row['Date'] ?></td><br>

					</tr>
					<?php
				}
			?> 		
			
			
	</div>
</body>
</html>