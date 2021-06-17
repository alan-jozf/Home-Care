<?php
    session_start();
?>
<html>
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=0.6">
    <link rel="stylesheet" href="css/topleftbar.css">
     <!-- <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script> -->
     <script src="script/jquery-3.5.1.min.js" type="text/javascript"></script>
    <title>Home Care </title>
<style>

</style> 
</head>
<body>
    <div class="nav">
            <img id="logo" src="images/homecare.jpg" alt="pic">
            <h1>Home Care</h1> 
            <!-- <img class="user icon" src="images/uicon.png"> -->
            <!-- <img class="Bell icon" src="images/bell.png"> -->
            <!-- <img class="cart icon" src="images/cart.png"> -->
            <?php
            if(isset($_SESSION['id']))
            {
				include('php/config.php');
                $tmpid=$_SESSION['id'];
                
                $sql="select image from dp where L_id=$tmpid ";
                $result=mysqli_query($con,$sql) or die($sql);
                if(mysqli_num_rows($result)>0)
                {
                    $row = mysqli_fetch_array($result);
                    $image = $row['image'];
                    $image_src = "uploads/".$image;
                    ?><a href="ViewProfile.php"><img class="usericon" src="<?php echo $image_src;  ?>" ></a><?php
                }
                else
                {
                    ?><a href="ViewProfile.php"><img class="usericon" src="images/uicon.png" ></a><?php
                }
                $sql="select user_type from login where L_id=$tmpid";
                $result=mysqli_query($con,$sql) or die($sql);
                $row=mysqli_fetch_array($result);
                if($row['user_type']=='user')
                {    ?>
                    <a href="Cart.php"><img class="carticon" src="images/cart.png"></a>
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
                        <button id="notification-icon" name="button" onclick="myFunction()">
                            <span id="notification-count"><?php if($count>0) { echo $count; } ?></span>
                            <img class="bellicon" src="images/bell.png" >
                        </button>
                        <div id="notification-latest"></div>
                    <?php
                }
            }
            else
            {
                ?><a href="Login.php"><img class="usericon" src="images/uicon.png" ></a><?php
            }

            ?>

            
            <h3>
            <?php
                // // code for display user name
                // if(isset($_SESSION['id']))
                // {
                //     $tmpid=$_SESSION['id'];
                //     // echo $tmpid;
                //         $sql="select name as name from admin where L_id=$tmpid
                //         union select name from user where L_id=$tmpid
                //         union select name from medical_staff where L_id=$tmpid
                //         union select name from punchayat_officer where L_id=$tmpid
                //         union select name from volunteer where L_id=$tmpid";
                //         $result=mysqli_query($con,$sql) or die($sql);
                //         if(mysqli_num_rows($result)>0)
                //         {
                //             while($row=mysqli_fetch_array($result))
                //             {
                //                 $name=$row['name'];
                //                 echo $name;
                //             }
                //         }
                // }
            ?></h3>
    </div>
    
    <?php require("Leftbar.php"); ?> 

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