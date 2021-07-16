<!DOCTYPE html>
<html lang="en">
<head>
     <!-- <link rel="stylesheet" href="css/home.css"> -->
     <meta http-equiv="Cache-control" content="no-cache">
    <style>

    </style> 
</head>
    <div class="left_cont">
        <ul>
            <?php
            if(isset($_SESSION['id']))
            {
                $tmpid=$_SESSION['id'];
				include('php/config.php');
                $sql="select user_type from login where L_id=$tmpid";
                $result=mysqli_query($con,$sql) or die($sql);
                $row=mysqli_fetch_array($result);
                ?>
                    <a href="Home.php"><li><img class ="smallicon" src="images/logo/home.png">Home</li></a>
                <?php   
                if($row['user_type']=='admin')
                {?>
                    <a href="ViewRequest.php"><li><img class ="smallicon" src="images/logo/mrequest.png"> View Request</li></a>
                    <a href="AddProduct.php"><li><img class ="smallicon" src="images/logo/add.png">Add Product</li></a>
                    <a href="ViewProduct.php"><li><img class ="smallicon" src="images/logo/list.png">View Product</li></a>
                    <a href="Feedbacks.php"><li><img class ="smallicon" src="images/logo/chat.png">Feedbacks</li></a>
                    <a href="TestMyself.php"><li><img class ="smallicon" src="images/logo/testme.png">Test Myself</li></a>
                    <a href="ViewQuarantine.php"><li><img class ="smallicon" src="images/logo/people.png">Quarantined List</li></a>
                    <?php
                }
                elseif($row['user_type']=='pnchOfficr')
                {?>
                    <a href="ViewProfile.php"><li><img class ="smallicon" src="images/logo/account.png">Account</li></a>
                    <a href="ViewRequest.php"><li><img class ="smallicon" src="images/logo/mrequest.png">View Request</li></a>
                    <a href="CountUpdate.php"><li><img class ="smallicon" src="images/logo/count.png">Count Update</li></a>
                    <!-- <a href="AddProduct.php"><li>Add Product</li></a>
                    <a href="ViewProduct.php"><li>View Product</li></a> -->
                    <a href="TestMyself.php"><li><img class ="smallicon" src="images/logo/testme.png">Test Myself</li></a>
                    <a href="ViewQuarantine.php"><li><img class ="smallicon" src="images/logo/people.png">Quarantined List</li></a>
                    <?php
                }
                elseif($row['user_type']=='mstaff')
                {?>
                    <a href="ViewProfile.php"><li><img class ="smallicon" src="images/logo/account.png">Account</li></a>
                    <a href="ViewRequest.php"><li><img class ="smallicon" src="images/logo/mrequest.png">View Request</li></a>
                    <a href="Add_vaccine.php"><li><img class ="smallicon" src="images/logo/vaccine.png">Add Vaccine</li></a>
                    <a href="Vaccination.php"><li><img class ="smallicon" src="images/logo/vaccined.png">Vaccination</li></a>
                    <a href="TestMyself.php"><li><img class ="smallicon" src="images/logo/testme.png">Test Myself</li></a>
                    <a href="ViewQuarantine.php"><li><img class ="smallicon" src="images/logo/people.png">Quarantined List</li></a>
                    <?php
                }
                elseif($row['user_type']=='volunteer')
                {?>
                    <a href="ViewProfile.php"><li><img class ="smallicon" src="images/logo/account.png">Account</li></a>
                    <a href="ViewRequest.php"><li><img class ="smallicon" src="images/logo/mrequest.png">View Request</li></a>
                    <a href="Delivery.php"><li><img class ="smallicon" src="images/logo/list.png">Deliveries</li></a>
                    <a href="TestMyself.php"><li><img class ="smallicon" src="images/logo/testme.png">Test Myself</li></a>
                    <a href="ViewQuarantine.php"><li><img class ="smallicon" src="images/logo/people.png">Quarantined List</li></a>
                    <?php
                }
                elseif($row['user_type']=='user')
                {?>
                    <a href="ViewProfile.php"><li><img class ="smallicon" src="images/logo/account.png">Account</li></a>
                    <a href="MedicalRequest.php"><li><img class ="smallicon" src="images/logo/mrequest.png">Medical Request</li></a>
                    <a href="BuyMedicine.php"><li><img class ="smallicon" src="images/logo/medicine.png">Buy Medicine</li></a>
                    <a href="VaccineBooking.php"><li><img class ="smallicon" src="images/logo/vaccine.png">Vaccine Booking</li></a>
                    <a href="Shopping.php"><li><img class ="smallicon" src="images/logo/shopping.png">Shopping</li></a>
                    <a href="myOrder.php"><li><img class ="smallicon" src="images/logo/list.png">My Orders</li></a>
                    <a href="TestMyself.php"><li><img class ="smallicon" src="images/logo/testme.png">Test Myself</li></a>
                    <a href="Help.php"><li><img class ="smallicon" src="images/logo/chat.png">Help</li></a>
                    <?php
                }?>
                <a href="logout.php"><li><img class ="smallicon" src="images/logo/logout.png">Logout</li></a>
                <?php
            }
            else
            {?>
                <a href="Home.php"><li><img class ="smallicon" src="images/logo/home.png">Home</li></a>
                <a href="Login.php"><li><img class ="smallicon" src="images/logo/account.png">Login/Register</li></a>
                <a href="TestMyself.php"><li><img class ="smallicon" src="images/logo/testme.png">Test Myself</li></a>
                <a href="Login.php"><li><img class ="smallicon" src="images/logo/mrequest.png">Medical Request</li></a>
                <a href="Login.php"><li><img class ="smallicon" src="images/logo/shopping.png">Shopping</li></a>
                <?php
            }   

            ?>
        </ul>
        <!-- <h2>Welcome User</h2> -->
        <div class="nametag">
            <?php
            if(isset($_SESSION['id']))
            {
                include('php/config.php');
                $tmpid=$_SESSION['id'];
                $sql="select user_type from login where L_id=$tmpid";
                $result=mysqli_query($con,$sql) or die($sql);
                $row=mysqli_fetch_array($result);
                if($row['user_type']=='user')
                {    $name="User" ;}
                if($row['user_type']=='admin')
                {    $name="Admin" ;}
                if($row['user_type']=='mstaff')
                {    $name="Medical Staff" ;}
                if($row['user_type']=='pnchOfficr')
                {    $name="Punchayat Officer" ;}
                if($row['user_type']=='volunteer')
                {    $name="Volunteer" ;}  
                echo "<h2>Loggined as ".$name."</h2>" ;        
            }
            ?>
        </div>
    </div>
</body>
</html>