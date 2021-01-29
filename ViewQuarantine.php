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
input[type="text"]{
    background-color:  rgb(0, 138, 103);
    color: #fff;
    width: 25%;
    margin: 8px 0 0 6%;
    border-radius: 10px;
}input[type=submit]{
    background-color:  rgb(0, 138, 103);
    color: #fff;
    width: 8%;
    margin: 8px 0 15px 1%;
    border-radius: 10px;
}
</style>

<body>

<!-- Home page begins -->
	<?php require("Leftbar.php"); ?> 
	<div class="right_cont" style="{background-color: rgb(232, 232, 232);}">

		<?php require("Topbar.php"); ?> 

		<br><h1 style="margin-left:4%;">Quarantined List</h1><br>

		<form method="post" action="ViewQuarantine.php">
			<input type="text" name="search" placeholder="Search in List">
			<input type="submit" value="Search">
		</form>

			<!-- search function -->
			<?php
				$con=mysqli_connect("localhost","root","","care_app")or die("couldn't connect");

				// $output ='';
				$counter = 0;

				//collect
				if (isset($_POST['search'])){
					$searchq = $_POST['search'];
					$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
					// $query = mysql_query("SELECT * FROM user WHERE name LIKE '%$searchq%' OR hname LIKE '%$searchq%'") or die("could not search");
					$query = "SELECT * FROM user WHERE name LIKE '%$searchq%' OR hname LIKE '%$searchq%'";
					$result =mysqli_query($con,$query);
					$count = mysqli_num_rows($result);
					if($count == 0){
						?>
						</table><br><br><tab>
						<?php
						// $output = 'There was no search results!';
						echo  'There was no search results!';
					}
					else{
						?>
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
						while($row=mysqli_fetch_array($result))  
						{
							?>
							<tr>
							<td><?php echo ++$counter ?></td>
							<td><?php echo $row['name'] ?></td>
							<td><?php echo $row['hname'] ?></td>
							<?php
							$id=$row['sd_id'];
							$quer="select * from subdist where sd_id=$id";
							$resl =mysqli_query($con,$quer);
							$ro=mysqli_fetch_array($resl);
							?>
								<td><?php echo $ro['sd_name'] ?></td>


							</tr>
							<?php
						}
					}
				}
				// Normal case 
				else{
						?>
							<table class="cart" cellpadding="10" cellspacing="10">
							<tbody>
							<tr>
								<th style="text-align:left;" width="40px">No</th>
								<th style="text-align:left;" width="100px">Name</th>
								<th style="text-align:left;" width="150px">House Name</th>
								<th style="text-align:left;" width="150px">Place</th>
								<!-- <th style="text-align:left;" width="100px">Date</th> -->
								<!-- <th style="text-align:left;" width="100px">Mark as Done</th> -->
							</tr>
						<?php
						$con=mysqli_connect("localhost","root","","care_app")or die("couldn't connect");
						$query="select * from user";
						$result =mysqli_query($con,$query);
						while($row=mysqli_fetch_array($result))  
						{
							?>
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
				}
			?> 		
		</form>
	</div>
</body>
</html>