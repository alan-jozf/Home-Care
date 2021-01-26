<?php
#include("Db_connection.php");
$con = mysqli_connect("localhost","root","","care_app")or die("failed");
$pid  = $_GET['dd'];


$image0=$_FILES['image']["name"];
echo $image0;
$file_path0='../../uploads/'.$image0;
move_uploaded_file($_FILES["image"]["tmp_name"],$file_path0);

$query="update product SET image = '$image0' where P_id ='$pid'";

if(mysqli_query($con,$query)){
    echo $image0;
    header("location:../ViewProduct.php");
}
else{
    header("location:../../Home.php");
}
?>
