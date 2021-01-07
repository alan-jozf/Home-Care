<?php
$con=mysqli_connect("localhost","root","","care_app")or die("couldn't connect");
$old=$_POST["old"];
$new=$_POST["new"];

session_start();
$id=$_SESSION["id"];


$query="SELECT * FROM user WHERE U_id=$id";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);
if($row["password"]!=$old){
    header("location:profile.php?err=wrongpass");
}
else{
    $query="UPDATE user SET password='$new' WHERE U_id=$id";
    if(mysqli_query($con,$query)){
        header("Location:logout.php");
    }
    else{
        echo "query error";
    }
}

?>