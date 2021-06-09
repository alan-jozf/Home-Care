<?php
include('config.php');
session_start();

// getting text message through ajax
$getMesg = mysqli_real_escape_string($con, $_POST['text']);
$getMes = $_SESSION['btn'];

if($getMes=="Others")
{
	date_default_timezone_set("Asia/Kolkata");
	$date = date('d-m-Y H:i:A');
    $tmpid=$_SESSION['id'];
    $to='admin';
    $sql = "insert into chat_message(L_id,message,date,toWhom) values($tmpid,'$getMesg','$date','$to')";

    if(mysqli_query($con,$sql)){
        echo "Your message is deliered.\n We will contact you soon.\n Thank You for your time";
    }
    $_SESSION['btn']="";

}
else{
    //checking user query to database query
    $arr=explode (" ", $getMesg); 
    $pass="0";
    // checking polite words first
    foreach($arr as $value)
    {
        $check_data = "SELECT * FROM chat_bot WHERE queries LIKE '%$value%' and cb_id ='8'";
        $run_query = mysqli_query($con, $check_data) or die("Error");
        if(mysqli_num_rows($run_query) > 0){
            $fetch_data = mysqli_fetch_assoc($run_query);
            $pass="1";
            $replay = $fetch_data['replies'];
            echo $replay;
            break;
        }
    }
    if($pass=="0"){
        // checking preset msg
        foreach($arr as $value)
        {
            $check_data = "SELECT * FROM chat_bot WHERE queries LIKE '%$value%' and cb_id !='8'";
            $run_query = mysqli_query($con, $check_data) or die("Error");
            if(mysqli_num_rows($run_query) > 0){
                $fetch_data = mysqli_fetch_assoc($run_query);
                $pass="1";
                $replay = $fetch_data['replies'];
                echo $replay;
                break;
            }
        }
        // avoid unneccessary chat
        if($pass=="0"){
            echo "Sorry can't be able to understand you!";
        }
    }
}
?>