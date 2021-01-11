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
                <a href="view.php"><li>Account</li></a>
                <a href="MedicalRequest.php"><li>Medical Request</li></a>
                <?php
                    if(isset($_SESSION['id']))
                    {
                        $tmpid=$_SESSION['id'];
                        $con=mysqli_connect("localhost","root","","care_app") or die("failed");
                        $sql="select user_type from login where L_id=$tmpid";
                        $result=mysqli_query($con,$sql) or die($sql);
                        $row=mysqli_fetch_array($result);
                        if($row['user_type']=='admin' or $row['user_type']=='user' or $row['user_type']=='mstaff' or $row['user_type']=='volunteer' or $row['user_type']=='pnchOfficr')
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