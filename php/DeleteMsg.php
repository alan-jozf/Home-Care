  
<?php
include('config.php');

$mid  = $_GET['mid'];
// echo $_GET['mid'];
session_start();
$tmpid=$_SESSION['id'];


$sql = "DELETE FROM chat_message WHERE ms_id= $mid";
if(mysqli_query($con,$sql)){
    header("Location:../Feedbacks.php");
}
else{
    header("location:../Home.php");
    // echo mysqli_query($con,$sql);

}

?>