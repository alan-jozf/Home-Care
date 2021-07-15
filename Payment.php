<!DOCTYPE html>
<html lang="en">
<head>
	<title>EDIT</title>
	<link rel="stylesheet" type="text/css" href="css/orderdetails.css" />
	<link rel="stylesheet" type="text/css" href="css/profile.css" />
	<link rel="stylesheet" type="text/css" href="css/table.css" />

</head>

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
            $pnid= $user['pn_id'];

            $query5="select * from punchayat where pn_id=$pnid";
            $result5=mysqli_query($con,$query5);
            $punchayat = mysqli_fetch_array($result5);
            $sdid= $punchayat['sd_id'];

            $query3="select * from subdist where sd_id=$sdid";
            $result3=mysqli_query($con,$query3);
            $sd = mysqli_fetch_array($result3);
            $dtid= $sd['dt_id'];

            $query4="select * from district where dt_id=$dtid";
            $result4=mysqli_query($con,$query4);
            $dt = mysqli_fetch_array($result4);

        ?> 
        <div class="adrs">
            <h1 class="phead">Shipping Address</h1><br>
            <b><p><?php echo $user['name'] ?></p></b>
            <p><?php echo $user['hname'] ?></p>
            <p><?php echo $punchayat['pn_name'] ?></p>
            <p><?php echo $sd['sd_name'] ?></p>
            <p><?php echo $dt['dt_name'] ?></p><br>
            <p><?php echo $login['email'] ?></p>
            <p><?php echo $login['PhoneNo'] ?></p>
            <?php   
                $mail=$login['email'];
                $_SESSION['mail']= $mail;?>

            <button >Change or Add Address</button>
        </div>
        <div class="sumry">
            <h1 class="phead">Payment Summary</h1>
            <table style="margin-left:0px"class="cart" >
			<tbody>
			<tr>
				<th >Name</th>
				<th >Price</th>
				<th >Quantinty</th>
				<th >Total</th>				
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
            <h1 class="pbotom">Total Amount &emsp;&emsp;&emsp;&emsp; ₹  <?php echo $gtotal ?> </h1>
            <?php $_SESSION['total']=$gtotal; ?>
            <?php
                require('php/pconfig.php');
                ?>
            <form action="php/submiteasy.php" method="post" class="paywithcard">
            <!-- <form action="php/submit.php" method="post" class="paywithcard"> -->
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
        </div>
	</div>
    
</body>
</html>