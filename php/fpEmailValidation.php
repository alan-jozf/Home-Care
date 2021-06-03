<?php
session_start();

include('config.php');

    $email = $_POST["email"];
    $sql="SELECT * FROM login where email = '$email' ";
    $result=mysqli_query($con,$sql);

    if(mysqli_num_rows($result)>0){
        // $data->value='yes';
        $row=mysqli_fetch_array($result);
        $Lid=$row['L_id']; 
        $sql="SELECT * FROM tbl_otp where L_id = '$Lid' ";

        $result=mysqli_query($con,$sql);
        $date=date('y-m-d h:i:s');
        $otp_data=rand(100000,999999);
        $seed = str_split('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789');
        shuffle($seed);
        $rand = '';
        foreach (array_rand($seed, 61) as $k) $rand .= $seed[$k];

        if(mysqli_num_rows($result)>0){
            $sql="update tbl_otp set otp_time='$date',otp_data='$otp_data',otp_random='$rand' where L_id=$Lid";
        }
        else{
            $sql="insert into tbl_otp (L_id,otp_data,otp_random,otp_time) values ($Lid,'$otp_data','$rand','$date')";
        }
        // mysqli_query($con,$sql);
        // sentmail($otp_data,$rand,$email);
        if(mysqli_query($con,$sql)){
            $_SESSION['email']=$email;
            $_SESSION['otp_data']=$otp_data;
            $_SESSION['rand']=$rand;

            header("Location:fpSendMail.php");
        }
        else{
            header("location:../fpEnterMail.php?err=Error");
        }
    }
    else{
        header("location:../fpEnterMail.php?err=MailError");
    }
?>