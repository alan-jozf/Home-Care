<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <link rel="stylesheet" href="../css/home.css">
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
        
        <img src="../images/homecare.jpg" alt="pic">

        <div class="content">
            <ul>
                <!-- <a href="Home.php"><li>Home</li></a> -->
                <!-- <a href="ViewProfile.php"><li>Account</li></a> -->
                <!-- <a href="MedicalRequest.php"><li>Medical Request</li></a> -->
                <!-- <a href="logout.php"><li>Logout</li></a> -->

                <?php
                    if(isset($_SESSION['id']))
                    {
                        $tmpid=$_SESSION['id'];
                        include('php/config.php');
                        $sql="select user_type from login where L_id=$tmpid";
                        $result=mysqli_query($con,$sql) or die($sql);
                        $row=mysqli_fetch_array($result);

                        if($row['user_type']=='admin')
                        {
                            ?>
                                <a href="../Home.php"><li>Home</li></a>

                                <a href="../ViewProfile.php"><li>Account</li></a>

                                <a href="../ViewRequest.php"><li>View Request</li></a>

                                <a href="AddProduct.php"><li>Add Product</li></a>

                                <a href="ViewProduct.php"><li>View Product</li></a>

                                <a href="../TestMyself.php"><li>Test Myself</li></a>

                                <a href="../ViewQuarantine.php"><li>Quarantined List</li></a>

                                <a href="../logout.php"><li>Logout</li></a>

                            <?php
                        }
                    }
                ?>
            </ul>
        </div>
    </div>
</body>
</html>