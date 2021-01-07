<?php

    $image0=$_FILES['1']["name"];

    $file_path0='../uploads/'.$image0;

    move_uploaded_file($_FILES["1"]["tmp_name"],$file_path0);
    session_start();
    
    $con=mysqli_connect("localhost","root","","care_app") or die("failed");
    $tmpid=$_SESSION['id'];

    $sql="insert into dp(L_id,image) values('$tmpid','$image0')" ;
    mysqli_query($con,$sql)  or die($sql);

    header("location:..\Home.php");
?>