  
<?php

$image0=$_FILES['1']["name"];

$file_path0='../uploads/'.$image0;

move_uploaded_file($_FILES["1"]["tmp_name"],$file_path0);
session_start();

$con=mysqli_connect("localhost","root","","care_app") or die("failed");
$tmpid=$_SESSION['id'];

$sqc = "SELECT L_id FROM dp WHERE L_id = '$tmpid'";
$qury=mysqli_query($con,$sqc);
$rowCheck=mysqli_num_rows($qury);

if($rowCheck>0){
    $sql="update dp SET image='$image0' where L_id='$tmpid'";
    mysqli_query($con,$sql);
    header("location:..\ViewProfile.php");
}
else{
    $sql="insert into dp(L_id,image) values('$tmpid','$image0')" ;
    mysqli_query($con,$sql);
    header("location:..\ViewProfile.php");
}
?>
