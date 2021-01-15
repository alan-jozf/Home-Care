<?php
#include("Db_connection.php");
$con = mysqli_connect("localhost","root","","care_app")or die("failed");
$name = $_POST['name'];
$price = $_POST['price'];
$quantity= $_POST['quantity'];
$category = $_POST['category'];
// $image = $_POST['image'];
$image0=$_FILES['image']["name"];
$file_path0='../../uploads/'.$image0;
move_uploaded_file($_FILES["image"]["tmp_name"],$file_path0);


$query="insert into product(name,price,quantity,category,image) 
			values('$name','$price','$quantity','$category','$image0')";

if(mysqli_query($con,$query)){
    header("location:../AddProduct.php?err=done");
}
else{
    header("location:../../Home.php");
}
?>
