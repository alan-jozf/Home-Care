<!DOCTYPE html>
<html lang="en">
<head>
     <link rel="stylesheet" href="css/home.css">
     <meta http-equiv="Cache-control" content="no-cache">
    <title>care app</title>
    <style>
    </style> 
</head>
<body>
<div class="nav">
            <h1>Care</h1> 
            <h2>App</h2>
        
        <div class="logo">
            <!-- <a href="ViewProfile.php"><img class="usericon" src="images/uicon.png" width="60" height="60"></a> -->
            <?php
            if(isset($_SESSION['id']))
            {
                $con = mysqli_connect("localhost","root","","care_app")or die("failed");
                $tmpid=$_SESSION['id'];
                $sql="select image from dp where L_id=$tmpid ";
                $result=mysqli_query($con,$sql) or die($sql);
                if(mysqli_num_rows($result)>0)
                {
                    $row = mysqli_fetch_array($result);
                    $image = $row['image'];
                    $image_src = "uploads/".$image;
                    ?>
                    <a href="ViewProfile.php"><img class="usericon" src="<?php echo $image_src;  ?>" width="60" height="60"></a>
                <?php
                }
                else
                {
                ?>
                    <a href="ViewProfile.php"><img class="usericon" src="images/uicon.png" width="60" height="60"></a>
                <?php
                }
            }
            else
            {
            ?>
                <a href="Login.php"><img class="usericon" src="images/uicon.png" width="50" height="50"></a>
            <?php
            }
        ?>

            
            <h3>
            <?php
                if(isset($_SESSION['id']))
                {
                    $con = mysqli_connect("localhost","root","","care_app")or die("failed");
                    $tmpid=$_SESSION['id'];
                    // echo $tmpid;
                        $sql="select name as name from admin where L_id=$tmpid
                        union select name from user where L_id=$tmpid
                        union select name from medical_staff where L_id=$tmpid
                        union select name from punchayat_officer where L_id=$tmpid
                        union select name from volunteer where L_id=$tmpid";
                        $result=mysqli_query($con,$sql) or die($sql);

                        if(mysqli_num_rows($result)>0)
                        {
                            while($row=mysqli_fetch_array($result))
                            {
                                $name=$row['name'];
                                echo $name;
                            }
                        }
                }
            ?></h3>
        </div>

    </div>
</body>
</html>