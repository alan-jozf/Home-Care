<!DOCTYPE html>
<html lang="en">
<head>
     <link rel="stylesheet" href="css/home.css">
     <!-- <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script> -->
     <script src="script/jquery-3.5.1.min.js" type="text/javascript"></script>
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
                if($row['user_type']=='admin')
                {                      
                    $count=0;

                    $sql="select * from mrequest ";
                    $result=mysqli_query($con, $sql);
                    $row=mysqli_num_rows($result);
                    if($row>0){
                        $count+=1;
                    }
                    $sql="select * from chat_message ";
                    $result=mysqli_query($con, $sql);
                    $row=mysqli_num_rows($result);
                    if($row>0){
                        $count+=1;
                    }
                    $sql="select * from product where quantity <10";
                    $result=mysqli_query($con, $sql);
                    $row=mysqli_num_rows($result);
                    if($row>0){
                        $count+=1;
                    }
                    $sql="select * from product where quantity =0";
                    $result=mysqli_query($con, $sql);
                    $row=mysqli_num_rows($result);
                    if($row>0){
                        $count+=1;
                    }
                    ?>
                        <!-- <a href=""><img class="carticon" src="images/bell.png" width="40" height="40"></a> -->
                        <div>

                        </div>
                        <button id="notification-icon" name="button" onclick="myFunction()">
                                <span id="notification-count"><?php if($count>0) { echo $count; } ?></span>
                                <img class="bellicon" src="images/bell.png" width="40" height="40"/></button>
                            <div id="notification-latest"></div>
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
<script>
	function myFunction() {
		$.ajax({
			url: "php/view_notification.php",
			type: "POST",
			processData:false,
			success: function(data){
				// $("#notification-count").remove();					
				$("#notification-latest").show();
                $("#notification-latest").html(data);
			},
			error: function(){}           
		});
	 }
	 
	 $(document).ready(function() {
		$('body').click(function(e){
			if ( e.target.id != 'notification-icon'){
				$("#notification-latest").hide();
			}
		});
	});
</script>
</html>