<?php
    $phone=$_POST["phone"];
    $pword=$_POST["pword"];

    session_start();
    $con=mysqli_connect("localhost","root","","care_app") or die("failed");
    $sql="select * from login where PhoneNo='$phone' or email='$phone' and password='$pword'";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0)
    {
        while($row = mysqli_fetch_array($result))
	    {
            if(($phone==$row['PhoneNo']) && ($pword==$row['password']))
            { 
                $_SESSION['id']=$row['L_id'];
                header("location:../Home.php");
            }
            else{
                header("location:../Login.php?err=wrong");
            }
	    }
    }
    else{
        header("location:../Login.php?err=wrong");
    }
    mysqli_close($con);
  
?>