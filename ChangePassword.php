
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        a{
            /* text-decoration:yes; */
            color:blue;
        }

        .container{
                    margin-top:5%;

                }
        input{
            width:250px;
            height:40px;
            /* border:.10px ; */
            margin:5px;
        }
        input:focus{
            outline:none;
        }

        form{
            margin:2%;
            
        }
        label{
            width: 70%;
        }
        img{
            border-radius:1%;
        }
        input[type="password"],[type=button]{
            background-color:  rgb(0, 138, 103);
            color: #fff;
            width: 40%;
            height:40px;
            margin: 8px 0;
            border-radius: 10px;
            /* border:10px; */
        }
        .butt{
            margin-top:-30px;
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
        // var field=false;
        // function show_password(){
        //     document.getElementById("div").style.cssText="display:block";
        //     document.getElementById('ch').value="Change";
        //     document.getElementById("ch").setAttribute("onclick", "send()");
        //     field=true;
        // }
        function dis(){
            document.getElementById('invalid').style.cssText="visibility: hidden;";
        }
    </script>

</head>

<body>
<?php require("Leftbar.php"); ?>
<div class="right_cont">

    <?php require("Topbar.php"); ?> 
    <center>
        <?php
        $id=$_SESSION["id"];
        include('php/config.php');
        $query="SELECT * FROM login WHERE L_id=$id";
        $result=mysqli_query($con,$query);
        $login = mysqli_fetch_array($result);

        $query="select name from admin where L_id=$id
        union select name from user where L_id=$id
        union select name from volunteer where L_id=$id";

        $result=mysqli_query($con,$query); 

        ?>
        <div class="container">
            <div class="inside_container">
            <h2>Change Password</h2>
                <?php  
                            if(isset($_GET['err'])=='wrongpass'){
                                ?>
                                <h2 style="color:red" id="invalid">old password dosent match</h2>
                                <?php
                            }
                        ?>
                <!-- <div class="pass" id="div" style="display:none;"> -->
                <div class="pass" id="div">
                    <form action="php\UpdatePass.php" method="POST" id="fm">
                        <input type="password" class="box" name="old" id="one" placeholder="Old password" onclick="dis()"><br>
                        <input type="password" class="box" name="new" id="two" onblur="pass('two')" placeholder="New password"><br>
                        <input type="password" class="box" name="" id="three" placeholder="Confirm Password"><br><br>
                    </form>
                </div>
                <input type="button" style="background-color:green;color:white;" class="butt" id="ch" onclick="send()" value="Change Paswword">
                <BR><h3 style="color:blue;"><a href="ViewProfile.php">🢀 Go Back</a></h3>
            </div>
        </div>
    </center>
</div>
</body>
</html>
