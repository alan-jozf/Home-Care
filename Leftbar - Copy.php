<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <link rel="stylesheet" href="css/home.css">
     <meta http-equiv="Cache-control" content="no-cache">
    <title>Home Care</title>
    <style>
        a{
            text-decoration:none;
            color:black;
        }
    </style> 
</head>
<body>


<div class="left_cont">
        
    <img id="logo" src="images/homecare.jpg" alt="pic">
    <div class="content">
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
                    <a href="ViewProfile.php"><li><img class ="smallicon" src="images/logo/account.png">Account</li></a>
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
                    <a href="ViewRequest.php"><li><img class ="smallicon" src="images/logo/mrequest.png">View Request</li></a>
                    <!-- <a href="AddProduct.php"><li>Add Product</li></a>
                    <a href="ViewProduct.php"><li>View Product</li></a> -->
                    <a href="TestMyself.php"><li><img class ="smallicon" src="images/logo/testme.png">Test Myself</li></a>
                    <a href="ViewQuarantine.php"><li><img class ="smallicon" src="images/logo/people.png">Quarantined List</li></a>
                    <?php
                }
                elseif($row['user_type']=='mstaff')
                {?>
                    <a href="ViewRequest.php"><li><img class ="smallicon" src="images/logo/mrequest.png">View Request</li></a>
                    <a href="TestMyself.php"><li><img class ="smallicon" src="images/logo/testme.png">Test Myself</li></a>
                    <a href="ViewQuarantine.php"><li><img class ="smallicon" src="images/logo/people.png">Quarantined List</li></a>
                    <?php
                }
                elseif($row['user_type']=='volunteer')
                {?>
                    <a href="ViewRequest.php"><li><img class ="smallicon" src="images/logo/mrequest.png">View Request</li></a>
                    <a href="Delivery.php"><li><img class ="smallicon" src="images/logo/list.png">Deliveries</li></a>
                    <a href="TestMyself.php"><li><img class ="smallicon" src="images/logo/testme.png">Test Myself</li></a>
                    <a href="ViewQuarantine.php"><li><img class ="smallicon" src="images/logo/people.png">Quarantined List</li></a>
                    <?php
                }
                elseif($row['user_type']=='user')
                {?>
                    <a href="MedicalRequest.php"><li><img class ="smallicon" src="images/logo/mrequest.png">Medical Request</li></a>
                    <!-- <a href="MedicineRequest.php"><li>Medicine</li></a> -->
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
    </div>
</div>
</body>
</html>