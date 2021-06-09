<?php
session_start();
require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/SMTP.php");
require("PHPMailer/src/Exception.php");
// require("../../../../confidential.php");
include('config.php');
include('confidential.php');
$tmpid=$_SESSION['id'];
$oid=$_GET['dd'];

$sql="SELECT * FROM myorder where O_id = '$oid' ";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
$date=$row['Date']; 

$sql3="SELECT * FROM login where L_id = '$tmpid' ";
$result3=mysqli_query($con,$sql3);
$row3=mysqli_fetch_array($result3);
$email=$row3['email'];

$sql2="SELECT * FROM myorder where Date = '$date' ";
$result2=mysqli_query($con,$sql2);
$row2=mysqli_fetch_array($result2);

// function sentmail($otp_data,$rand,$email){
        
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    try 
    {
        $mail->isSMTP();                                    
        $mail->Host       = 'smtp.gmail.com';                 
        $mail->SMTPAuth   = true;                   
        $mail->Username   = $email;             #sender mail id  
        $mail->Password   = $password;          #password here                         
        $mail->Port       = 587;                                   

        //Recipients
        $mail->setFrom($email, 'Mailer');
        $mail->addAddress($email); 

        //Content
        $mail->isHTML(true); 
        $mail->Subject = 'New Order on Home Care';
        $mail->Body    = '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <style>
                    body{
                        background-color: white;
                        margin: 0;
                        padding: 0;
                    }
                    .container{
                        margin-top: 20px;
                        position: relative;
                        left:50%;
                        transform: translate(-50%);
                        background-color: white;
                        width:350px;
                    }
                    .container img{
                        width:100px;
                        height:100px;
                    }
                    .container h1{
                        font-family: sans-serif;
                        font-size: 36px;
                        color:rgba(0, 0, 0, 0.835);
                    }
                    .container p{
                        font-family: sans-serif;
                        font-size: 15px;
                        color:rgba(0, 0, 0, 0.774);
                        margin-left:10px;
                        margin-right: 10px;
            
                        line-height: 23px;
                    }
                    .container a{
                        text-decoration: none;
                        color: rgba(47, 154, 241, 0.753);
                        font-family: sans-serif;
                        margin-bottom: 10px;
                        font-size: 15px;
                        margin-left:10px;
                        margin-right: 10px;
                    }
            
                </style>
            </head>
            <body>
                <div class="container">
                    <center><h1>Hello.</h1></center>
                    <p>New order has been placed successfully on '.$date.' </p>
                    <a href="localhost/Home-Care/orderDetails.php?dd='.$oid.'">View Your receipt</a>
                    <p style="margin-bottom:0;">Thank You for Choosing Home Care</p>
                </div>
            </body>
            </html>
        ';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        // echo 'Message has been sent';
        header("location:../orderDetails.php?dd=".$oid);
        
    } 
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

?>
                      
<html>
<!-- code bellow is the link for a hosted page -->
 <!-- <img src="https://raw.githubusercontent.com/alansmathew/Find/master/web/images/find_logo100px.png" alt="Find logo" loading="lazy"/> -->
 <!-- <a href="https://alansmathew.000webhostapp.com/php/forget_pass/verifyotprequest.php?varify='.$rand.'">Reset Password</a> -->

 
 </html> 