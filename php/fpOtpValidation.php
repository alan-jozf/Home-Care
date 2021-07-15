<?php
include('config.php');

if(isset($_GET['varify'])){
    $rand=$_GET['varify'];
    $sql="select * from tbl_otp where otp_random='$rand'";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_array($result);
        $linktime=new DateTime(date($row['otp_time']));
        $since_start = $linktime->diff(new DateTime(date('y-m-d h:i:s')));
        if($since_start->days ==0 && $since_start->h ==0 && $since_start->i < 3 ){
            $sql="delete from tbl_otp where otp_random='$rand'";
            mysqli_query($con,$sql);
            session_start();
            $_SESSION['login']=$row['L_id'];
            header('Location:../fpPasswordReset.php');
        }
        else{
            // echo "link expaired !";
            $sql="delete from tbl_otp where otp_random='$rand'";
            mysqli_query($con,$sql);
            ?>
                <!-- <center><img src="../../images/find_logo.png" alt=""></center> -->
                <div class="container">
                    <h1>Link invalid !</h1>
                    
                    <p>The link you recived is either invalid for this purpose or got expaired. Please try within 3 minutes after requesting for reset password.
                        If this problem pursues, contact customer care for further clarification...
                    </p>
                    <!-- <a href="../../Home.php"><button class="click_button" onclick="submmmit()"> Continue to home page  </button></a> -->
                    <a href="../Home.php"><button class="click_button" > Continue to home page  </button></a>
                </div> 
            <?php
        }
    }
    else{
        // echo "link invalid !";
        ?>
            <!-- <center><img src="../../images/find_logo.png" alt=""></center> -->
            <div class="container">
                <h1>Link invalid !</h1>
                <p>The link you recived is either invalid for this purpose or got expaired. Please try within 3 minutes after requesting for reset password.
                        If this problem pursues, contact customer care for further clarification...
                    </p>
                <a href="../Home.php"><button class="click_button" > Continue to home page  </button></a>
            </div> 
        <?php
    }
}
elseif(isset($_POST['otp'])){
    $otp=$_POST['otp'];
    $sql="select * from tbl_otp where otp_data='$otp'";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_array($result);
        $linktime=new DateTime(date($row['otp_time']));
        $since_start = $linktime->diff(new DateTime(date('y-m-d h:i:s')));
        if($since_start->days ==0 && $since_start->h ==0 && $since_start->i < 3 ){
            $sql="delete from tbl_otp where otp_data='$otp'";
            mysqli_query($con,$sql);
            session_start();
            $_SESSION['login']=$row['L_id'];
            header('Location:../fpPasswordReset.php');
        }
        else{
            $sql="delete from tbl_otp where otp_data='$otp'";
            mysqli_query($con,$sql);
            header('Location:../fpEnterOtp.php?err=wrong');
        }
    }
    else{
        header('Location:../fpEnterOtp.php?err=wrong');
    }
}
else{
    // echo "unAuthorized Access";
    ?>
        <!-- <center><img src="../../images/find_logo.png" alt=""></center> -->
        <div class="container">
            <h1>Link invalid !</h1>
            <p>The link you recived is either invalid for this purpose or got expaired. Please try within 3 minutes after requesting for reset password.
                        If this problem pursues, contact customer care for further clarification...
                    </p>
            <a href="../Home.php"><button class="click_button" > Continue to home page  </button></a>
        </div> 
    <?php
}

?>