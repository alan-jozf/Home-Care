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
                <!-- <a href="Home.php"><li>Home</li></a> -->
                <!-- <a href="ViewProfile.php"><li>Account</li></a> -->
                <!-- <a href="MedicalRequest.php"><li>Medical Request</li></a> -->
                <!-- <a href="logout.php"><li>Logout</li></a> -->

                <?php
                if(isset($_SESSION['id']))
                {
                    $tmpid=$_SESSION['id'];
                    $con=mysqli_connect("localhost","root","","care_app") or die("failed");
                    $sql="select user_type from login where L_id=$tmpid";
                    $result=mysqli_query($con,$sql) or die($sql);
                    $row=mysqli_fetch_array($result);
                }
                    ?>
                <a href="Home.php"><li>Home</li></a>
                    <?php
                if(isset($_SESSION['id']))
                {    
                    if($row['user_type']=='admin' or $row['user_type']=='user' or $row['user_type']=='mstaff' 
                                                    or $row['user_type']=='volunteer' or $row['user_type']=='pnchOfficr')
                    {
                        ?>
                            <a href="ViewProfile.php"><li>Account</li></a>
                        <?php
                    }
                }
                    else{
                        ?>
                            <a href="Login.php"><li>Login</li></a>
                        <?php
                        }
                        ?>
                    <?php
                if(isset($_SESSION['id']))
                {
                    if($row['user_type']=='admin')
                    {
                        ?>
                            <a href="admin/AddProduct.php"><li>Add Product</li></a>
                        <?php
                    }
                }
                ?>
                    <?php
                if(isset($_SESSION['id']))
                {
                    if($row['user_type']=='mstaff' 
                    or $row['user_type']=='pnchOfficr'  or $row['user_type']=='volunteer')
                    {
                        ?>
                            <a href="ViewRequest.php"><li>View Request</li></a>
                        <?php
                    }
                    if($row['user_type']=='admin')
                    {
                        ?>
                            <a href="ViewRequest.php"><li>View Request</li></a>
                        <?php
                    }
                    if($row['user_type']=='user')
                    {
                        ?>
                            <a href="MedicalRequest.php"><li>Medical Request</li></a>
                        <?php
                    }

                }
                    else{
                        ?>
                            <a href="Login.php"><li>Medical Request</li></a>
                        <?php
                        }
                    ?>
                    <?php
                if(isset($_SESSION['id']))
                {
                    if($row['user_type']=='user' or $row['user_type']=='mstaff' or $row['user_type']=='pnchOfficr')
                    {
                        ?>
                            <!-- <li>Shopping</li> -->
                            <a href="Shopping.php"><li>Shopping</li></a>
                        <?php
                    }
                }
                ?>
                
                <li>Test Myself</li>
                <a href="ViewQuarantine.php"><li>Quarantined List</li></a>
                <!-- <a href="Home.php"><li>Quarantined List</li></a> -->

                <?php
                if(isset($_SESSION['id']))
                {
                    if($row['user_type']=='admin' or $row['user_type']=='user' 
                    or $row['user_type']=='mstaff' or $row['user_type']=='volunteer' or $row['user_type']=='pnchOfficr')
                    {
                        ?>
                            <a href="logout.php"><li>Logout</li></a>
                        <?php
                    }
                }

                ?>
            </ul>
        </div>
</div>
</body>
</html>