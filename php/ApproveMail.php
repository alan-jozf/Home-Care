<!-- Adhin Babu
      PHP Mailer
      this page is to send login id and password to the user inorder to confirm request
      i have to make this to send registration link to puchayat officers mail id which is from a seperate database in order to make them register
      this method can also be used for password recovery
      and to send confirm mail to volunteer request -->
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require('../fun.php');
if(sessioncheck() == true or isset($_POST['ha']))
{
$con = connect(); 
$hid=$_POST['ha'];
    
$q1=mysqli_query($con,"SELECT * FROM `tbl_hostel_reg` WHERE `hstl_id`=$hid")or die("Sign in Error q1");
$row = mysqli_fetch_array($q1);

$q2=mysqli_query($con,"SELECT * FROM `tbl_hostel_manager` WHERE `hstl_id`=$hid")or die("Sign in Error q2");
$r1 = mysqli_fetch_array($q2);
    
$lid=$r1['login_id'];
$hm=$r1['hstl_manager_name'];    
$email=$r1['hstl_manager_email'];

$q6=mysqli_query($con,"SELECT * FROM `tbl_login` WHERE `login_id`=$lid")or die("Sign in Error q2");
$r2 = mysqli_fetch_array($q6);
$uname=$r2['username'];
$pass=$r2['password'];
  
    $q5=mysqli_query($con,"UPDATE `tbl_login` SET `status`=1 WHERE `login_id`=$lid")or die("Sign in Error q5");
    
    $q3=mysqli_query($con,"UPDATE `tbl_hostel_manager` SET `status`=1 WHERE `hstl_id`=$hid")or die("Sign in Error q3");
    
    require 'mail/vendor/autoload.php';
    $message = "<p>Hey,". $hm  ."<br>Your accout is Active</p>";
    $message .= "<p>Username :<b>".$uname."</b></p>";
    $message .= "<p>Password :<b>".$pass."</b></p>";
    $mail = new PHPMailer(true);


        //Server settings
        $mail->SMTPDebug = 0;                                       // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com;';                      // Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'adhinbabu1998@gmail.com';              // SMTP username
        $mail->Password   = 'Adhin@123';                            // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        $mail->setFrom('adhinbabu1998@gmail.com', 'HMS');
        //Recipients
        $mail->addAddress($email);
 
        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = "HMS : Account Activated";
        $mail->Body    = $message;
        $mail->send();
        echo "Email Sent";
  }
  else {
    echo "update query error";
  }

?>