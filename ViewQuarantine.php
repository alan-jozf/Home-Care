<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="css/table.css" />
</head>
<body>

<!-- Home page begins -->

<?php require("Topbar.php"); ?> 
    <div class="homepage">
		<br><h1 class="thead">Quarantined List</h1><br>
		<form method="post" action="ViewQuarantine.php">
			<input type="text" name="search" placeholder="Search in List">
			<input type="submit" value="Search">
		</form>

			<!-- search function -->
			<?php
				include('php/config.php');

				// $output ='';
				$counter = 0;

				//collect
				if (isset($_POST['search'])){
					$searchq = $_POST['search'];
					$searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
					
					$query1 = "select pn_id FROM punchayat WHERE pn_name LIKE '%$searchq%'";
					$result1 =mysqli_query($con,$query1)or die("could not search1");
					$count1 = mysqli_num_rows($result1);
					if($count1 > 0)
					{
						$prow = mysqli_fetch_array($result1);
						$pcatid = $prow['pn_id'];
					}
					else
					{
						$pcatid = -1;
					}	
					
					$query = "SELECT * FROM user WHERE name LIKE '%$searchq%' OR hname LIKE '%$searchq%' or pn_id = '$pcatid'";
					$result =mysqli_query($con,$query);
					$count = mysqli_num_rows($result);
					if($count == 0){
						echo  '<p id="error">There is no search results!</p>';
					}
					else{
						?>
							<table class="cart" >
							<tbody>
							<tr>
								<th >No</th>
								<th >Name</th>
								<th >House Name</th>
								<th >Place</th>
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
							$id=$row['pn_id'];
							$quer="select * from punchayat where pn_id=$id";
							$resl =mysqli_query($con,$quer);
							$ro=mysqli_fetch_array($resl);
							?>
								<td><?php echo $ro['pn_name'] ?></td>


							</tr>
							<?php
						}
					}
				}
				// Normal case 
				else{
						?>
							<table class="cart" >
							<tbody>
							<tr>
								<th >No</th>
								<th >Name</th>
								<th >House Name</th>
								<th >Place</th>
								<!-- <th style="text-align:left;" width="100px">Date</th> -->
								<!-- <th style="text-align:left;" width="100px">Mark as Done</th> -->
							</tr>
						<?php
						// include('php/config.php');
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
							$id=$row['pn_id'];
							$quer="select * from punchayat where pn_id=$id";
							$resl =mysqli_query($con,$quer);
							$ro=mysqli_fetch_array($resl);
							// echo count($ro);
							?>
								<td><?php echo $ro['pn_name'] ?></td>


							</tr>
							<?php
						}
				}
			?> 		
		</form>
	</div>
</body>
</html>