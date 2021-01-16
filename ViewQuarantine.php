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
	/* border-collapse: collapse;	 */
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

		<br><h1 style="margin-left:4%;">Quarantined List</h1><br>

		<table class="cart" cellpadding="5" cellspacing="10">
			<tbody>
			<tr>
				<th style="text-align:left;" width="40px">No</th>
				<th style="text-align:left;" width="100px">Name</th>
				<th style="text-align:left;" width="100px">House Name</th>
				<th style="text-align:left;" width="100px">Place</th>
				<!-- <th style="text-align:left;" width="100px">Date</th> -->
				<!-- <th style="text-align:left;" width="100px">Mark as Done</th> -->
			</tr>
			<?php
				$counter = 0;

				$con=mysqli_connect("localhost","root","","care_app")or die("couldn't connect");
				$query="select * from user";
				$result =mysqli_query($con,$query);
				while($row=mysqli_fetch_array($result))  
				{?>
					<tr>
					<td><?php echo ++$counter ?></td>
					<td><?php echo $row['name'] ?></td>
					<td><?php echo $row['hname'] ?></td>
					<?php
					// echo $row['L_id'] 
					$id=$row['sd_id'];
					$quer="select * from subdist where sd_id=$id";
					$resl =mysqli_query($con,$quer);
					$ro=mysqli_fetch_array($resl);
					// echo count($ro);
					?>
						<td><?php echo $ro['sd_name'] ?></td>


					</tr>
					<?php
				}
			?> 		
			
			
	</div>
</body>
</html>