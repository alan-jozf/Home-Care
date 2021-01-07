<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- <style>
        body{
            margin:0px; 
            padding:0px;
            background-image: url(images/banner.jpg);
            /* background-position: center; */
            background-repeat: no-repeat;
            background-size: cover;
        }
        .container{
            width:40%;
            height:auto;
            position: absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            background-color: rgba(244, 244, 244, 0.899);
            border-radius: 10px;
        }
        .container .circle{
            position: relative;
            width:150px;
            height:150px;
            border-radius: 50%;
            background-color: rgb(17, 50, 80);
            margin-top:40px;
            background-image: url(images/banner.jpg);
            background-position: center;
            background-size: 150px 150px;
        }
        input{
            width:250px;
            height:40px;
            border:.6px solid black;
            margin:5px;
        }
        input:focus{
            outline:none;
        }
    </style> -->

<style>
div.right_cont{
	background-color: rgb(232, 232, 232);
}
form{
	margin:6%;
	
}
label{
	width: 70%;
}
img{
	border-radius:50%;
}
input[type="password"],[type=button]{
    background-color:  rgb(0, 138, 103);
    color: #fff;
    width: 40%;
    height:40px;
    margin: 8px 0;
    border-radius: 10px;
}
</style>
    <script>
        var one1=false;
        var two1=false;
        var three1=false;

        function pass(id){
            elem=document.getElementById(id);
            passone_field=elem;
            patt=/^(?=.*[!@#$%^&*(),.?":{}|<>\ ])(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
            if(elem.value.trim()=="" || !elem.value.match(patt))
                {   
                    two1=false;
                    elem.value="";
                    elem.placeholder="ex: !Abcdef8";
                    elem.style.cssText="border: 1px solid red";
                }
            else{
                    two1=true;
                    elem.style.cssText="border:none";
                }
        } 

        function send(){
            var one=document.getElementById('one');
            var two=document.getElementById('two');
            var three=document.getElementById('three');

            if(one.value==""){
                one.style.cssText="border:1px solid red";
                one1=false;
            }
            else{
                one.style.cssText="border:none";
                one1=true;
            }
            if(two.value==""){
                two.style.cssText="border:1px solid red";
                two1=false;
            }
            else{
                two.style.cssText="border:none";
                two1=true;
            }



            if(three.value=="" || three.value != two.value){
                three.style.cssText="border:1px solid red";
                three1=false;
            }
            else{
                three.style.cssText="border:none";
                three1=true;
            }
            if(one1 && two1 && three1){
                document.getElementById("fm").submit();
            }
        }
        var field=false;
        function show_password(){
            document.getElementById("div").style.cssText="display:block";
            document.getElementById('ch').value="Change";
            document.getElementById("ch").setAttribute("onclick", "send()");
            field=true;
        }
        function dis(){
            document.getElementById('invalid').style.cssText="visibility: hidden;";
        }
    </script>

</head>

<body>
<?php require("Leftbar.php"); ?> 
<div class="right_cont" style="{background-color: rgb(232, 232, 232);}">

	<?php require("Topbar.php"); ?> 
    <form action="changepass.php">
    <center>
        <?php
        $id=$_SESSION["id"];
        $con=mysqli_connect("localhost","root","","care_app")or die("couldn't connect");
        $query="select * from login where L_id=$id";
        $result=mysqli_query($con,$query);
        $login = mysqli_fetch_array($result);

        $query="select name from admin where L_id=$id
        union select name from user where L_id=$id
        union select name from volunteer where L_id=$id";

        $result=mysqli_query($con,$query);
        $reg_table = mysqli_fetch_array($result);

        ?>
        <div class="container">
            <div class="inside_container">
 
                </div>
                <?php  
                            if(isset($_GET['password'])=='wrongpass'){
                                ?>
                                <h2 style="color:red" id="invalid">old password dosent match</h2>
                                <?php
                            }
                        ?>
                <div class="pass" id="div" style="display:none;">
                    <form action="changepass.php" method="POST" id="fm">
                        <input type="password" class="box" name="old" id="one" placeholder="Old password" onclick="dis()"><br>
                        <input type="password" class="box" name="new" id="two" onblur="pass('two')" placeholder="New password"><br>
                        <input type="password" class="box" name="" id="three" placeholder="Confirm Password"><br><br>
                    </form>
                </div>
                <!-- <input type="submit" style="background-color:green;color:white;" class="butt" id="ch" onclick="show_password()" value="Change Paswword"> -->

                <input type="button" style="background-color:green;color:white;" class="butt" id="ch" onclick="show_password()" value="Change Paswword">
            </div>
        </div>
    </center>
    </form>
    </div>
</body>
</html>
