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
<?php require("Leftbar.php"); ?> 

<div class="right_cont">

    <?php require("Topbar.php"); ?> 

    <div class="content">
<!-- 
      <div class="div"><h2>Medical Request</h2></div>
      <div class="div"><h2>View Quarantined List</h2></div>
      <div class="div"><h2>Safety Measures</h2></div>
      <div class="div"><h2>Route Map</h2></div>
      <div class="div"><h2>Shopping </h2></div>
      <div class="div"><h2>Test Myself</h2></div>
       -->
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
            else
            {
                ?>
                    <div class="div"><h2>Medical Request</h2></div>
                <?php
            }
        ?>

        <?php
            if(isset($_SESSION['id']))
            {
                if($row['user_type']=='admin')
                {
                    ?>
                        <div class="div"><h2>Shopping Analysis</h2></div>
                        <!-- <div class="div"><a href="MedicalRequest.php"><h2>Medical Request</h2></a></div> -->
                    <?php
                }
                elseif($row['user_type']=='user')
                {
                    ?>
                        <div class="div"><h2>Shopping</h2></div>
                    <?php
                }
                elseif($row['user_type']=='mstaff')
                {
                    ?>
                        <div class="div"><h2>View Quarantine Countdowns</h2></div>
                    <?php
                }
                elseif($row['user_type']=='volunteer')
                {
                    ?>
                        <div class="div"><h2>View Order Requests</h2></div>
                    <?php
                }
                elseif($row['user_type']=='pnchOfficr')
                {
                    ?>
                        <div class="div"><h2>View Order Requests</h2></div>
                    <?php
                }
            }
            else
            {
                ?>
                    <div class="div"><h2>Medical Request</h2></div>
                <?php
            }
        ?>

        <?php
            if(isset($_SESSION['id']))
            {
                if($row['user_type']=='admin')
                {
                    ?>
                        <div class="div"><h2>Safety Measures</h2></div>
                        <!-- <div class="div"><a href="MedicalRequest.php"><h2>Medical Request</h2></a></div> -->
                    <?php
                }
                elseif($row['user_type']=='user')
                {
                    ?>
                        <div class="div"><h2>Safety Measures</h2></div>
                    <?php
                }
                elseif($row['user_type']=='mstaff')
                {
                    ?>
                        <div class="div"><h2>Manage Safety Tips</h2></div>
                    <?php
                }
                elseif($row['user_type']=='volunteer')
                {
                    ?>
                        <div class="div"><h2>Safety Measures</h2></div>
                    <?php
                }
                elseif($row['user_type']=='pnchOfficr')
                {
                    ?>
                        <div class="div"><h2>Add products</h2></div>
                    <?php
                }
            }
            else
            {
                ?>
                    <div class="div"><h2>Safety Measures</h2></div>
                <?php
            }
        ?>

        <?php
            if(isset($_SESSION['id']))
            {
                if($row['user_type']=='admin')
                {
                    ?>
                        <div class="div"><h2>Route Map</h2></div>
                        <!-- <div class="div"><a href="MedicalRequest.php"><h2>Medical Request</h2></a></div> -->
                    <?php
                }
                elseif($row['user_type']=='user')
                {
                    ?>
                        <div class="div"><h2>Route Map</h2></div>
                    <?php
                }
                elseif($row['user_type']=='mstaff')
                {
                    ?>
                        <div class="div"><h2>Route Map</h2></div>
                    <?php
                }
                elseif($row['user_type']=='volunteer')
                {
                    ?>
                        <div class="div"><h2>Route Map</h2></div>
                    <?php
                }
                elseif($row['user_type']=='pnchOfficr')
                {
                    ?>
                        <div class="div"><h2>Add Government Kits</h2></div>
                    <?php
                }
            }
            else
            {
                ?>
                    <div class="div"><h2>Route Map</h2></div>
                <?php
            }
        ?>

        <?php
            if(isset($_SESSION['id']))
            {
                if($row['user_type']=='admin')
                {
                    ?>
                        <div class="div"><h2>View Quarantined List</h2></div>
                        <!-- <div class="div"><a href="MedicalRequest.php"><h2>Medical Request</h2></a></div> -->
                    <?php
                }
                elseif($row['user_type']=='user')
                {
                    ?>
                        <div class="div"><h2>Count Down</h2></div>
                    <?php
                }
                elseif($row['user_type']=='mstaff')
                {
                    ?>
                        <div class="div"><h2>View Quarantined List</h2></div>
                    <?php
                }
                elseif($row['user_type']=='volunteer')
                {
                    ?>
                        <div class="div"><h2>View Quarantined List</h2></div>
                    <?php
                }
                elseif($row['user_type']=='pnchOfficr')
                {
                    ?>
                        <div class="div"><h2>View Quarantined List</h2></div>
                    <?php
                }
            }
            else
            {
                ?>
                    <div class="div"><h2>View Quarantined List</h2></div>
                <?php
            }
        ?>

        <?php
            if(isset($_SESSION['id']))
            {
                if($row['user_type']=='admin')
                {
                    ?>
                        <div class="div"><h2>Test Myself</h2></div>
                        <!-- <div class="div"><a href="MedicalRequest.php"><h2>Medical Request</h2></a></div> -->
                    <?php
                }
                elseif($row['user_type']=='user')
                {
                    ?>
                        <div class="div"><h2>Test Myself</h2></div>
                    <?php
                }
                elseif($row['user_type']=='mstaff')
                {
                    ?>
                        <div class="div"><h2>Test Myself</h2></div>
                    <?php
                }
                elseif($row['user_type']=='volunteer')
                {
                    ?>
                        <div class="div"><h2>Test Myself</h2></div>
                    <?php
                }
                elseif($row['user_type']=='pnchOfficr')
                {
                    ?>
                        <div class="div"><h2>Test Myself</h2></div>
                    <?php
                }
            }
            else
            {
                ?>
                    <div class="div"><h2>Test Myself</h2></div>
                <?php
            }
        ?>
    </div>
    <div class="right_content">
        <div class="div" style="height:275px"><h2>Graph</h2></div>
        <!-- <div class="div"><h2> Register as a Volunteer </h2></div> -->
        <?php
            if(isset($_SESSION['id']))
            {
                if($row['user_type']=='admin')
                {
                    ?>
                        <div class="div"><h2>Add Punchayat Officer</h2></div>
                        <!-- <div class="div"><a href="MedicalRequest.php"><h2>Medical Request</h2></a></div> -->
                    <?php
                }
                elseif($row['user_type']=='user')
                {
                    ?>
                        <div class="div"><h2>My Orders</h2></div>
                    <?php
                }
                elseif($row['user_type']=='mstaff')
                {
                    ?>
                        <div class="div"><h2>Update Covid-19 Test Cases</h2></div>
                    <?php
                }
                elseif($row['user_type']=='volunteer')
                {
                    ?>
                        <div class="div"><h2>History</h2></div>
                    <?php
                }
                elseif($row['user_type']=='pnchOfficr')
                {
                    ?>
                        <div class="div"><h2>Route Map</h2></div>
                    <?php
                }
            }
            else
            {
                ?>
                    <div class="div"><h2>Register as a volunteer</h2></div>
                <?php
            }
        ?>
    </div>
</div>
</body>
</html>
