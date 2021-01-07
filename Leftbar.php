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
                <a href="Home.php"><li>Home</li></a>
                <?php
                    if(isset($_SESSION['id']))
                    {
                        $tmpid=$_SESSION['id'];
                        $sql="select user_type from login where L_id=$tmpid";
                        $result=mysqli_query($con,$sql) or die($sql);
                        $row=mysqli_fetch_array($result);
                        if($row['user_type']=='admin')
                        {
                            ?>
                                <div class="div"><h2>View Medical Requests</h2></div>
                                <!-- <div class="div"><a href="MedicalRequest.php"><h2>Medical Request</h2></a></div> -->
                            <?php
                        }
                        elseif($row['user_type']=='user')
                        {
                            ?>
                                <a href="MedicalRequest.php"><div class="div"><h2>Medical Request</h2></div></a>
                                <!-- <div class="div"><h2>Medical Request</h2></div> -->
                            <?php
                        }
                        elseif($row['user_type']=='mstaff')
                        {
                            ?>
                                <a href="ViewRequest.php"><div class="div"><h2>View Request</h2></div></a>
                                <!-- <div class="div"><h2>View Medical Requests</h2></div> -->
                            <?php
                        }
                        elseif($row['user_type']=='volunteer')
                        {
                            ?>
                                <div class="div"><h2>View Medical Requests</h2></div>
                            <?php
                        }
                        elseif($row['user_type']=='pnchOfficr')
                        {
                            ?>
                                <div class="div"><h2>Medical Request</h2></div>
                            <?php
                        }
                    }
                ?>
                <a href="view.php"><li>Account</li></a>
                <li>About</li>
                <li>Help</li>
                <a href="logout.php"><li>Logout</li></a>
            </ul>
        </div>
</div>
</body>
</html>