<?php
$con=mysqli_connect("localhost","root","","care_app")or die("couldn't connect");

session_start();
    if( isset($_SESSION['login']) && isset($_POST['password']))
    {
        $n=$_POST["password"];
        // $n=md5($n);
        $arr=str_split($n);
        $a='';
        $i=1;
        foreach($arr as $value)
        {
            $i=$i+2;
            $a= $a .sprintf("%03d", ord("$value")+$i);
        }
        $n= md5($a);
        
        $id=$_SESSION["login"];

        $query="UPDATE login SET password='$n' WHERE L_id=$id";
        if(mysqli_query($con,$query)){
            session_unset();
            header("Location:..\Login.php");
        }
        else{
            session_unset();
            echo "query error";
        }
    }
    else{
        session_unset();
        header("location:..\fpEnterMail.php?err=wrongpass");
    }

?>