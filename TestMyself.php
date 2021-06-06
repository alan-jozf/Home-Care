<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="css\registration.css" />

    <script>
		var arry=[];
		var narry=[];
		// var arr=[];

        function active(btn){
            element=document.getElementById(btn);
            // if( window.getComputedStyle(element).getPropertyValue("color")=="rgb(50, 112, 204)")
            if( window.getComputedStyle(element).getPropertyValue("color")=="rgb(50, 112, 204)")
				{	

					// arr.push(btn);
					// alert (arr);
					if (narry.length>0)
					{
						narry[0].style.cssText="background-color: rgb(235, 235, 235)); color:rgb(50, 112, 204);"
						narry=[];
					}
					element.style.cssText="background-color: rgb(50, 112, 204); color:white;"
					arry.push(element);
				}
            else{
				var a= arry.indexOf(element);
				arry.splice(a,1);
				// arr.splice(a,1);
				element.style.cssText="background-color: rgb(235, 235, 235)); color:rgb(50, 112, 204)"
			}
        }        
		function nactive(btn){
            element=document.getElementById(btn);
            if( window.getComputedStyle(element).getPropertyValue("color")=="rgb(50, 112, 204)")
				{
					if (arry.length>0)
					{
						for(var i=0;i<arry.length;i++)
						{
							arry[i].style.cssText="background-color: rgb(235, 235, 235)); color:rgb(50, 112, 204);"
						}
					arry=[];
					}
					element.style.cssText="background-color: rgb(50, 112, 204); color:white;"
					narry=[element];
				}
            else{
				element.style.cssText="background-color: rgb(235, 235, 235)); color:rgb(50, 112, 204);"
				narry=[];
			}
        }
    </script>
</head>
<style>
	.cntr{
		background-color:  rgb(0, 208, 156);
		height:40%;
		padding:5%;
		margin:5%;
		display:none;
		
	}
	.inCntr{
		/* background-color:  RED; */
		/* padding:5%; */
		height:90%;
		margin:0% 0% ;
	}

	/* .btn:hover, .btn:focus, .btn:active, .btn:visited  {
		background-color: rgba(52, 152, 219,0.6);
	}  */
	button{
		margin:5px;
		padding:5px;
		font-size:14px;
		color:rgb(50, 112, 204);
		padding:10px;
		border-radius: 4px;
		background-color: rgb(235, 235, 235);
		border:none;
		cursor: pointer;    
		/* box-shadow: 10px 10px 10px rgb(233, 231, 231), -10px -10px 10px white; */
		margin-left:10px;
	}
	button:hover{
		/* box-shadow: 10px 10px 10px rgb(233, 231, 231), -10px -10px 10px white; */
	}

</style>

<body>

<?php require("Leftbar.php"); ?> 
<div class="right_cont" >
	<?php
		include('php/config.php');
		require("Topbar.php"); 
		?> 
	<div class= "cntr" id="div1">
		<div class=" inCntr">
			<center>
					<!-- <h3>Are you experiencing any of these serious symptoms ?</h3><br>  -->
					<?php
						$quer="select * from test_qstn where Type='Serious'";
						$resul=mysqli_query($con,$quer);
						$ro=mysqli_fetch_array($resul);
						echo "<h3>".$ro['question']."</h3><br>";
						$query="select * from test_symptom where Type='Serious'";
						$result=mysqli_query($con,$query);
						$bt=0;
						while($row=mysqli_fetch_array($result)){
							$bt++;
							echo "<button class='btn' id='$bt' name='Serious' onclick='active(this.id)'> ".$row['Description']." </button>";
						}
							$bt++;
							echo " <BR><button id='$bt' name='Serious' onclick='nactive(this.id)'> Nothing above</button><BR>";
					?>
					<!-- <input id="1"  type="submit" value="Next"> -->
					<button  id="q1" onclick="serious()"> Next &#10095;</button>
				</center>
		</div>
	</div>
	<div class= "cntr" id="div2">
		<div class=" inCntr">
			<center>
					<!-- <h3>Do you have any of the following most common symptoms ?</h3><br>  -->
					<?php
						$quer="select * from test_qstn where Type='MostCommon'";
						$resul=mysqli_query($con,$quer);
						$ro=mysqli_fetch_array($resul);
						echo "<h3>".$ro['question']."</h3><br>";
						$query="select * from test_symptom where Type='MostCommon'";
						$result=mysqli_query($con,$query);
						// $bt=0;
						while($row=mysqli_fetch_array($result)){
							$bt++;
							echo "<button id='$bt' name='MostCommon' onclick='active(this.id)'> ".$row['Description']." </button>";
						}
							$bt++;
							echo " <BR><button id='$bt' name='MostCommon' onclick='nactive(this.id)'> Nothing above</button><BR>";
					?>
					<!-- <input id="2" type="submit" value="Next"> -->
					<button  id="q2" onclick="mostcommon()"> Next &#10095;</button>

		</div>
	</div>
	<div class= "cntr" id="div3">
		<div class=" inCntr">
			<center>
						<!-- <h3>These are some less common symptoms, Are you experiencing any of these ?</h3><br>  -->
					<?php
						$quer="select * from test_qstn where Type='LessCommon'";
						$resul=mysqli_query($con,$quer);
						$ro=mysqli_fetch_array($resul);
						echo "<h3>".$ro['question']."</h3><br>";
						$query="select * from test_symptom where Type='LessCommon'";
						$result=mysqli_query($con,$query);
						// $bt=0;
						while($row=mysqli_fetch_array($result)){
							$bt+=1;
							echo "<button id='$bt' name='LessCommon' onclick='active(this.id)'> ".$row['Description']." </button>";
						}
							$bt++;
							echo " <BR><button id='$bt' name='LessCommon' onclick='nactive(this.id)'> Nothing above</button><BR>";
					?>
					<button  id="q3" onclick="lesscommon()"> Next &#10095;</button>
		</div>
	</div>
	<div class= "cntr" id="div4">
		<div class=" inCntr">
			<center>
					<!-- <h3>Have you ever had any of the following:</h3><br>  -->
					<?php						
						$quer="select * from test_qstn where Type='Disease'";
						$resul=mysqli_query($con,$quer);
						$ro=mysqli_fetch_array($resul);
						echo "<h3>".$ro['question']."</h3><br>";
						$query="select * from test_symptom where Type='Disease'";
						$result=mysqli_query($con,$query);
						// $bt=0;
						while($row=mysqli_fetch_array($result)){
							$bt+=1;
							echo "<button id='$bt' name='Disease' onclick='active(this.id)'> ".$row['Description']." </button>";
						}
							$bt++;
							echo " <BR><button id='$bt' name='Disease' onclick='nactive(this.id)'> Nothing above</button><BR>";
					?>
					<button  id="q4" onclick="disease()"> Next &#10095;</button>
		</div>
	</div>
	<div class= "cntr" id="div5">
		<div class=" inCntr">
			<center>
					<h3>Don't be panic</h3><br> 
					<?php	
						$query="select * from test_treatment where Type='Serious'";
						$result=mysqli_query($con,$query);
						// $bt=0;
						while($row=mysqli_fetch_array($result)){
							$bt+=1;
							echo "<button id='.$bt.' name='Serious'> ".$row['Description']." </button><br>";
						}
					?>
					<!-- <br><button  id="q4" onclick="show_next_div()"> Next &#10095;</button> -->
		</div>
	</div>
	<div class= "cntr" id="div6">
		<div class=" inCntr">
			<center>
					<h3>You should Care More..</h3><br> 
					<?php						
						$query="select * from test_treatment where Type='MoreCare'";
						$result=mysqli_query($con,$query);
						// $bt=0;
						while($row=mysqli_fetch_array($result)){
							$bt+=1;
							echo "<button id='.$bt.' name='MoreCare'> ".$row['Description']." </button>";
						}
					?>
					<!-- <br><button  id="q4" onclick="MoreCare()"> Next &#10095;</button> -->
		</div>
	</div>
	<div class= "cntr" id="div7">
		<div class=" inCntr">
			<center>
					<h3>Self Care Tips</h3><br> 
					<?php						
						$query="select * from test_treatment where Type='SelfCare'";
						$result=mysqli_query($con,$query);
						// $bt=0;
						while($row=mysqli_fetch_array($result)){
							$bt+=1;
							echo "<button id='.$bt.' name='SelfCare'> ".$row['Description']." </button>";
						}
					?>
					<!-- <br><button  id="q4" onclick="show_next_div()"> Next &#10095;</button> -->
		</div>
	</div>

</div>
	<script>
		
		var divs = document.getElementsByClassName('cntr');
		var shown_div = 0;
		var total_divs = divs.length;
		divs[shown_div].style.display = "block";

		function serious(){
			if (narry.length>0)
			{
				shown_div += 1
				narry=[];
			}
			else if(arry.length>0)
			{
				shown_div = 4
			}
			if (shown_div < total_divs){
				for (x=0; x<total_divs; x++){
					if (x==shown_div)
						divs[x].style.display = "block";
					else
						divs[x].style.display = "none";
				}
			}
		}
		function mostcommon(){
			if (narry.length>0)
			{
				shown_div += 1
				narry=[];
			}
			else if(arry.length>0)
			{
				shown_div = 3
				arry= [];
			}
			if (shown_div < total_divs){
				for (x=0; x<total_divs; x++){
					if (x==shown_div)
						divs[x].style.display = "block";
					else
						divs[x].style.display = "none";
				}
			}
		}
		function lesscommon(){
			if (narry.length>0)
			{
				shown_div += 1
				narry=[];
			}
			else if(arry.length>0)
			{
				arry= [];
				shown_div = 5
			}
			if (shown_div < total_divs){
				for (x=0; x<total_divs; x++){
					if (x==shown_div)
						divs[x].style.display = "block";
					else
						divs[x].style.display = "none";
				}
			}
		}
		
		function disease(){
			if (narry.length>0)
			{
				shown_div = 6
			}
			else if(arry.length>0)
			{
				shown_div = 5
			}
			if (shown_div < total_divs){
				for (x=0; x<total_divs; x++){
					if (x==shown_div)
						divs[x].style.display = "block";
					else
						divs[x].style.display = "none";
				}
			}
		}
		

		
	</script>
</body>
</html>