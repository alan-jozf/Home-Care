<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="css\registration.css" />

</head>
<style>
    .right_cont{
    }
    .adrs{
        float: left;
        margin:40px;
        padding:20px;
        width:25%;
        height:50%;
        border-radius:5px;
        box-shadow: 5px 5px 5px 5px  rgba(0, 0, 0, 0.4);
        background-color: rgb(232,232,232);
    }    
    .sumry{
        float: left;
        margin:40px;
        padding:20px;
        width:50%;
        height:50%;
        border-radius:5px;
        box-shadow: 5px 5px 5px 5px  rgba(0, 0, 0, 0.4);
        background-color: rgb(232,232,232);
    }
    button{
        color:white;
        font-size:15px;
        height: 35px;
        width: 70%;
        border-radius: 2px;
        margin: 30px 2px 0px;
        cursor: pointer;
        background-color: blue;
    }

</style>

<body>
<?php require("Topbar.php"); ?> 
    <div class="homepage">

        <?php
            include('php/config.php');
            $tempid=$_SESSION['id'];
            $query="select * from login where L_id=$tempid";
            $result=mysqli_query($con,$query);
            $login = mysqli_fetch_array($result);

            $query2="select * from user where L_id=$tempid";
            $result2=mysqli_query($con,$query2);
            $user = mysqli_fetch_array($result2);
            $sdid= $user['sd_id'];

            $query3="select * from subdist where sd_id=$sdid";
            $result3=mysqli_query($con,$query3);
            $sd = mysqli_fetch_array($result3);
            $dtid= $sd['dt_id'];

            $query4="select * from district where dt_id=$dtid";
            $result4=mysqli_query($con,$query4);
            $dt = mysqli_fetch_array($result4);

        ?> 
        <div class="adrs">
            <h1><?php echo $user['name'] ?></h1><br>
            <h2><?php echo $user['hname'] ?></h2>
            <h3><?php echo $sd['sd_name'] ?></h3>
            <h3><?php echo $dt['dt_name'] ?></h3><br>
            <h3><?php echo $login['email'] ?></h3>

            <?php   
                $mail=$login['email'];
                $_SESSION['mail']= $mail;?>

            <h3><?php echo $login['PhoneNo'] ?></h3><br><br><br>
            <button color=blue>Change or Add Address</button>
        </div>
        <div class="sumry">
            <h1>Payment Summary</h1><br>
            <table class="cart" cellpadding="5" cellspacing="10">
			<tbody>
			<tr>
				<!-- <th style="text-align:left;" width="40px">No</th> -->
				<th style="text-align:left;" width="100px">Name</th>
				<th style="text-align:left;" width="100px">Price</th>
				<th style="text-align:left;" width="100px">Quantinty</th>
				<th style="text-align:left;" width="100px">Total</th>				

				<!-- <th style="text-align:left;" width="100px">Date</th> -->
				<!-- <th style="text-align:left;" width="100px">Mark as Done</th> -->
			</tr>
            <?php
                $query="select * from cart where L_id = $tempid";
				$result =mysqli_query($con,$query);
                $gtotal=0;
				while($row=mysqli_fetch_array($result))  
				{	
					$id=$row['P_id'];
					$quer="select * from product where P_id=$id";
					$resl =mysqli_query($con,$quer);
					$ro=mysqli_fetch_array($resl);
                    ?>
					<tr>
						<td><?php echo $ro['name'] ?></td>
						<td><?php echo $ro['price'] ?></td>
						<td><?php echo $row['quantity'] ?></td>
						<?php
							$total=$row['quantity']*$ro['price'];
                            $gtotal=$total+$gtotal;

						?>
						<td ><?php echo $total ?></td>
					</tr>
					<?php
				}
			?>
            </table><br>
            <h2 style="position:absolute; left:55%; bottom:25%;">Total Amount &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; ₹  <?php echo $gtotal ?> </h2>   
            <?php $_SESSION['total']=$gtotal; ?>
        </div>
	</div>
    <?php
        require('php/pconfig.php');
        ?>
    <form action="php/submit.php" method="post" style="position:absolute;   left:75%; top:76%;">
        <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="<?php echo $publishableKey?>"
            data-amount=<?php echo  $gtotal* 100  ?>
            data-name="Payment"
            data-description="Purchace with Home Care"
            data-image="C:\xampp\htdocs\Home-Care\images\homecare.jpg"
            data-currency="inr"
            data-email=<?php echo $mail ?>
        >
        </script>
            <!-- data-amount="1000"
                            =1000paisa= 10rs -->
            <?php   $_SESSION['total']=$gtotal*100; ?>
    </form>
</body>
</html>