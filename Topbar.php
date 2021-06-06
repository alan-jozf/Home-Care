<!DOCTYPE html>
<html lang="en">
<head>
     <link rel="stylesheet" href="css/home.css">
     <meta http-equiv="Cache-control" content="no-cache">
    <title>Home Care</title>
<style>
    @font-face{
        font-family: hel;
        src:url(assets/AlexBrush-Regular.ttf);
    }

</style> 
</head>
<body>
    <div class="nav">
            <h1>Home Care</h1> 
            <!-- <h2>Welcome User</h2> -->
            <?php
            if(isset($_SESSION['id']))
            {
                if($row['user_type']=='user')
                {    ?>
                    <h2>User</h2>
                    <?php
                }if($row['user_type']=='admin')
                {    ?>
                    <h2>Admin</h2>
                    <?php
                }if($row['user_type']=='mstaff')
                {    ?>
                    <h2>Medical Staff </h2>
                    <?php
                }if($row['user_type']=='pnchOfficr')
                {    ?>
                    <h2>Punchayat Officer</h2>
                    <?php
                }if($row['user_type']=='volunteer')
                {    ?>
                    <h2>Volunteer</h2>
                    <?php
                }           
            }?> 
        <div class="logo">
            <!-- <a href="ViewProfile.php"><img class="usericon" src="images/uicon.png" width="60" height="60"></a> -->
            <?php
            if(isset($_SESSION['id']))
            {
				include('php/config.php');
                $tmpid=$_SESSION['id'];

                if($row['user_type']=='user')
                {    ?>
                    <a href="Cart.php"><img class="carticon" src="images/cart.png" width="40" height="40"></a>
                    <?php
                }
                $sql="select image from dp where L_id=$tmpid ";
                $result=mysqli_query($con,$sql) or die($sql);
                if(mysqli_num_rows($result)>0)
                {
                    $row = mysqli_fetch_array($result);
                    $image = $row['image'];
                    $image_src = "uploads/".$image;
                    ?>
                    <a href="ViewProfile.php"><img class="usericon" src="<?php echo $image_src;  ?>" ></a>
                <?php
                }
                else
                {
                ?>
                    <a href="ViewProfile.php"><img class="usericon" src="images/uicon.png" ></a>
                <?php
                }
            }
            else
            {
            ?>
                <a href="Login.php"><img class="usericon" src="images/uicon.png" ></a>
            <?php
            }
        ?>

            
            <h3>
            <?php
                if(isset($_SESSION['id']))
                {
                    // include('php/config.php');
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
    
    <hr>

</body>
</html>