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
    width: 40%;
    margin: 8px 0;
    border-radius: 10px;
}
</style>

<body>
	<?php require("Leftbar.php"); ?> 
	<div class="right_cont" style="{background-color: rgb(232, 232, 232);}">

		<?php require("Topbar.php"); ?> 

		<br><h1 style="margin-left:4%;">New Messages</h1><br>

		<table class="cart" cellpadding="5" cellspacing="10">
			<tbody>
			<tr>
				<th style="text-align:left;" width="40px">No</th>
				<th style="text-align:left;" width="100px">Name</th>
				<th style="text-align:left;" width="300px">Message</th>
				<th style="text-align:left;" width="100px">Date</th>
				<th style="text-align:left;" width="100px">Mobile</th>
				<th style="text-align:left;" width="100px">Delete</th>

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
					<td><?php echo $ro2['PhoneNo'] ?></td><br>
					<td><a href="php/DeleteMsg.php?mid=<?php echo $mid ?>"><img src="images\icon-delete.png" /></a></td>


					</tr>
					<?php
				}
			?> 		
			
			
	</div>
</body>
</html>