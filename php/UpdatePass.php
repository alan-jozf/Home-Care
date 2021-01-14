<?php
$con=mysqli_connect("localhost","root","","care_app")or die("couldn't connect");
$old=$_POST["old"];
$n=$_POST["new"];

session_start();
$id=$_SESSION["id"];


$query="SELECT * FROM login WHERE L_id=$id";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);

if($old == $row['password']){
    $query="UPDATE login SET password='$n' WHERE L_id=$id";
    if(mysqli_query($con,$query)){
        header("Location:..\logout.php");
    }
    else{
        echo "query error";
    }
}
else{
    header("location:..\ChangePassword.php?err=wrongpass");
}

?>