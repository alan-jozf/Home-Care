<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <link rel="stylesheet" href="css/home.css">
     <meta http-equiv="Cache-control" content="no-cache">
    <title>care app</title>
    <style>
        a{
            text-decoration:none;
            color:black;
        }
    </style> 
</head>
<body>


<div class="left_cont">
        
    <img src="images/c.png" alt="pic">
    <div class="content">
        <ul>
            <?php
            if(isset($_SESSION['id']))
            {
                $tmpid=$_SESSION['id'];
                $con=mysqli_connect("localhost","root","","care_app") or die("failed");
                $sql="select user_type from login where L_id=$tmpid";
                $result=mysqli_query($con,$sql) or die($sql);
                $row=mysqli_fetch_array($result);
                ?>
                    <a href="Home.php"><li>Home</li></a>
                    <a href="ViewProfile.php"><li>Account</li></a>
                <?php   
                if($row['user_type']=='admin')
                {?>
                    <a href="ViewRequest.php"><li>View Request</li></a>
                    <a href="admin/AddProduct.php"><li>Add Product</li></a>
                    <a href="admin/ViewProduct.php"><li>View Product</li></a>
                    <a href="TestMyself.php"><li>Test Myself</li></a>
                    <a href="ViewQuarantine.php"><li>Quarantined List</li></a>
                    <?php
                }
                elseif($row['user_type']=='pnchOfficr')
                {?>
                    <a href="ViewRequest.php"><li>View Request</li></a>
                    <!-- <a href="admin/AddProduct.php"><li>Add Product</li></a>
                    <a href="admin/ViewProduct.php"><li>View Product</li></a> -->
                    <a href="TestMyself.php"><li>Test Myself</li></a>
                    <a href="ViewQuarantine.php"><li>Quarantined List</li></a>
                    <?php
                }
                elseif($row['user_type']=='mstaff')
                {?>
                    <a href="ViewRequest.php"><li>View Request</li></a>
                    <a href="TestMyself.php"><li>Test Myself</li></a>
                    <a href="ViewQuarantine.php"><li>Quarantined List</li></a>
                    <?php
                }
                elseif($row['user_type']=='volunteer')
                {?>
                    <a href="ViewRequest.php"><li>View Request</li></a>
                    <a href="Delivery.php"><li>Deliveries</li></a>
                    <a href="TestMyself.php"><li>Test Myself</li></a>
                    <a href="ViewQuarantine.php"><li>Quarantined List</li></a>
                    <?php
                }
                elseif($row['user_type']=='user')
                {?>
                    <a href="ViewRequest.php"><li>View Request</li></a>
                    <a href="MedicalRequest.php"><li>Medical Request</li></a>
                    <!-- <a href="MedicineRequest.php"><li>Medicine</li></a> -->
                    <a href="Shopping.php"><li>Shopping</li></a>
                    <a href="myOrder.php"><li>My Orders</li></a>
                    <a href="TestMyself.php"><li>Test Myself</li></a>
                    <a href="ViewQuarantine.php"><li>Quarantined List</li></a>
                    <?php
                }?>
                <a href="logout.php"><li>Logout</li></a>
                <?php
            }
            else
            {?>
                <a href="Home.php"><li>Home</li></a>
                <a href="Login.php"><li>Login/Register</li></a>
                <a href="Registration_Volunteer.php"><li>Volunteer Registration</li></a>
                <a href="Login.php"><li>Medical Request</li></a>
                <a href="Login.php"><li>Shopping</li></a>
                <a href="ViewQuarantine.php"><li>Quarantined List</li></a>
                <?php
            }   

            ?>
        </ul>
    </div>
</div>
</body>
</html>