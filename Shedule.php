<!DOCTYPE html>
<html lang="en">
<head>
	<title>Vaccine Booking</title>
	<link rel="stylesheet" type="text/css" href="css/vaccine.css" />
</head>
<script>
    function pin()
    {
        var n=document.getElementById("pin");
        var letter=/^([0-9]{6})$/;
        if(n.value == "")
        {
            n.placeholder ="PIN no is empty";
        }
        else if(!n.value.match(letter))
        {
            n.value ="";
            n.placeholder ="Enter valid PIN no";
        }
    }
</script>
<body>
	<?php require("Topbar.php"); 
		include('php/config.php');

        if (isset($_GET['mstaff'])){
            $tmpid = $_GET['mstaff'];
            $_SESSION['mstaff']=$tmpid;
        }
        elseif(isset($_SESSION['mstaff'])){
            $tmpid = $_SESSION['mstaff'];
        }
        else{
            $tmpid=$_SESSION['id'];
        }
        date_default_timezone_set("Asia/Kolkata");
        $date = date('d-m-Y');

        $sql1="select * from login where L_id='$tmpid'";
        $result1=mysqli_query($con,$sql1);
        $row1=mysqli_fetch_array($result1);

        $sql2="select * from v_status where L_id='$tmpid'";
        $result2=mysqli_query($con,$sql2);
        $row2=mysqli_fetch_array($result2);

        if(mysqli_num_rows($result2)==0){
            header("location:VaccineBooking.php?err=ano");
        }
        if (isset($_GET['vid'])){
            $vdid = $_GET['vid'];
            unset($_GET);

            $sqlv1="select * from hospital_vdaily where hpvs_id='$vdid'";
            $resultv1=mysqli_query($con,$sqlv1);
            $rowv1=mysqli_fetch_array($resultv1);
            $vdate=$rowv1['date'];                        
            $totalb=$rowv1['booked'];                        
            $totalb+=1;

            $sqlv2="update hospital_vdaily SET booked='$totalb' where hpvs_id='$vdid'";
            $resultv2=mysqli_query($con,$sqlv2);
            // $rowv2=mysqli_fetch_array($resultv2);

            $sqlv3="update v_status SET slot='$vdate' where L_id='$tmpid'";
            $resultv3=mysqli_query($con,$sqlv3);
            // $rowv3=mysqli_fetch_array($resultv3);
            
            $sqlv3="update v_status SET  hpvs_id ='$vdid' where L_id='$tmpid'";
            $resultv3=mysqli_query($con,$sqlv3);
            // $rowv3=mysqli_fetch_array($resultv3);

            if(isset($_SESSION['mstaff'])){
                header("location:Vaccination.php?err=bk");
            }
            else{
                header("location:VaccineBooking.php?err=bk");
            }

        }
		?> 
    <div class="homepage">
		<div class="vlefttop">
			<h2>Book Appointment</h2>
		</div>
        <div class="barow1">
            <div class="balft">
                <form method="post" action="Shedule.php">
                    <p>Search by PIN</p>
                    <input type="text" name="pin" id="pin" onblur="pin()" required>
                    <input type="submit" value ="Search">
                </form>
            </div>
            <div class="bargt">
                <form method="post" action="Shedule.php">
                    <p>Search by District</p>
                    <select name="dist" id="dist" class="form-control" required>
                        <option value=""></option>
                        <?php $query =mysqli_query($con,"SELECT * FROM district");
                        while($row=mysqli_fetch_array($query))
                        { ?>
                            <option value="<?php echo $row['dt_id'];?>"><?php echo $row['dt_name'];?></option>
                            <?php
                            }
                            ?>
                    </select>
                    <input type="submit" value ="Search">
                </form>
            </div>
        </div>
        <?php

        //PIN Ssearch

        if (isset($_POST['pin'])){
            $pin = $_POST['pin'];
            $pin = preg_replace("#[^0-9]#i","",$pin);
            unset($_POST);

            $querys1 = "select * FROM pin_number WHERE pin ='$pin'";
            $results1 =mysqli_query($con,$querys1)or die("could not search1");
            $counts1 = mysqli_num_rows($results1);
            if($counts1 > 0)
            {
                $rows1 = mysqli_fetch_array($results1);
                ?>
                <div class="barow2">
                    <h3>Slot Search Results</h3>
                    <p ID="k2">Filter Results By:</p>
                    <p>Cost:</p>
                    <input type="button" value ="Free">
                    <p>Vaccine:</p>
                    <input type="button" value ="Covishield">
                </div>
                <div class="date">
                    <?php
                        $x = 0;
                        do {
                            $datev= date("d-M-Y", strtotime("+$x  day"));
                            echo "<input type='button' value='".$datev."'>";
                            $x++;
                        } while ($x <= 5);
                    ?>
                </div>
                <div class="barow3">
                    <div class="optrow1">
                        <div class="resul">
                            <!-- <p>Kootickal CHC</p>
                            <p>Kottayam, 686514</p> -->
                            <?php
                                $plid=$rows1['pn_id'];
                                // echo $plid;
                                
                                $query4="select * from hospital where pn_id=$plid";
                                $result4 =mysqli_query($con,$query4);
                                $row4=mysqli_fetch_array($result4);
                                echo "<p>".$row4['hp_name']."</p>";

                                $query5="select * from punchayat where pn_id=$plid";
                                $result5 =mysqli_query($con,$query5);
                                $row5=mysqli_fetch_array($result5);
                                $sdid=$row5['sd_id'];                        
                                $query6="select * from subdist where sd_id=$sdid";
                                $result6 =mysqli_query($con,$query6);
                                $row6=mysqli_fetch_array($result6);
                                $dtid=$row6['dt_id'];
                                $query7="select * from district where dt_id=$dtid";
                                $result7 =mysqli_query($con,$query7);
                                $row7=mysqli_fetch_array($result7);

                                echo "<p>".$row7['dt_name'].",".$rows1['pin'];

                            ?>
                        </div>
                        <?php
                            $x = 0;
                            $h_id=$row4['hp_id'];  

                            do {
                                $datev= date("d-M-Y", strtotime("+$x  day"));
                                ?>
                                    <div class="avbty">
                                        <center>
                                        <p>Covishield</p>
                                        <?php
                                            $sql1e = "SELECT * FROM hospital_vdaily WHERE date = '$datev' and hp_id='$h_id'";
                                            $result1e=mysqli_query($con,$sql1e);
                                            $row1e=mysqli_fetch_array($result1e);
                                            $bal=$row1e['total']-$row1e['booked'];
                                            if($bal<50){
                                                if($bal==0){                                            
                                                    echo "<button style='background-color:#888;'>".$bal."</button><br>";
                                                    echo "<button id='nill'>Nill</button>";
                                                }
                                                else{
                                                    ?>
                                                    <form action="Shedule.php?vid=<?php echo $row1e['hpvs_id']?>" method="POST">
                                                        <?php
                                                            echo "<button style='background-color:red;'>".$bal."</button><br>";
                                                            echo "<input name ='book' type='submit' id='book' value='Book'>";
                                                        ?>
                                                    </form>
                                                    <?php
                                                }
                                            }
                                            else{
                                                ?>
                                                <form action="Shedule.php?vid=<?php echo $row1e['hpvs_id']?>" method="POST">
                                                    <?php
                                                        echo "<button>".$bal."</button><br>";
                                                        echo "<input name ='book' type='submit' id='book' value='Book'>";
                                                    ?>
                                                </form>
                                                <?php
                                            }
                                        ?>
                                        </center>
                                    </div>
                                <?php
                                $x++;
                            } while ($x <= 5);
                        ?>
                    </div>
                </div>
                <?php
            }
            else{
                echo "<h4 style='margin-left:100px;'>No Search Results</h4>";
            }
        }

        // district search

        elseif(isset($_POST['dist'])){
            $dtid = $_POST['dist'];
            unset($_POST);
            $head=0;

            $queryd1 = "select * FROM subdist WHERE dt_id ='$dtid'";
            $resultd1 =mysqli_query($con,$queryd1)or die("could not search1");
            $countd1 = mysqli_num_rows($resultd1);

            if($countd1 > 0)
            {
                while($rowd1 = mysqli_fetch_array($resultd1)){
                    $sdid=$rowd1['sd_id'];       
    
                    $queryd5="select * from punchayat where sd_id=$sdid";
                    $resultd5 =mysqli_query($con,$queryd5);
                    $countd5 = mysqli_num_rows($resultd5);
    
                    if($countd5 > 0)
                    {
                        while($rowd5=mysqli_fetch_array($resultd5)){
                            $pnid=$rowd5['pn_id'];       

                            $queryd4="select * from hospital where pn_id=$pnid";
                            $resultd4 =mysqli_query($con,$queryd4);
                            $countd4 = mysqli_num_rows($resultd4);
                            if($countd4 > 0){
                                $rowd4=mysqli_fetch_array($resultd4);
                                // echo "<p>".$rowd4['hp_name']."</p>";
                                $head+=1;
                                if($head==1){
                                    ?>
                                    <div class="barow2">
                                        <h3>Slot Search Results</h3>
                                        <p ID="k2">Filter Results By:</p>
                                        <p>Cost:</p>
                                        <input type="button" value ="Free">
                                        <p>Vaccine:</p>
                                        <input type="button" value ="Covishield">
                                    </div>
                                    <div class="date">
                                        <?php
                                            $x = 0;
                                            do {
                                                $datev= date("d-M-Y", strtotime("+$x  day"));
                                                echo "<input type='button' value='".$datev."'>";
                                                $x++;
                                            } while ($x <= 5);
                                        ?>
                                    </div>
                                    <?php
                                }

                                ?>
                                <div class="barow3">
                                    <div class="optrow1">
                                        <div class="resul">
                                            <!-- <p>Kootickal CHC</p>
                                            <p>Kottayam, 686514</p> -->
                                            <?php
                                                echo "<p>".$rowd4['hp_name']."</p>";

                                                $queryd7="select * from district where dt_id=$dtid";
                                                $resultd7 =mysqli_query($con,$queryd7);
                                                $rowd7=mysqli_fetch_array($resultd7);

                                                $queryd8="select * from pin_number where pn_id=$pnid";
                                                $resultd8 =mysqli_query($con,$queryd8);
                                                $rowd8=mysqli_fetch_array($resultd8);

                                                echo "<p>".$rowd7['dt_name'].",".$rowd8['pin'];

                                            ?>
                                        </div>
                                        <?php
                                            $x = 0;
                                            $h_id=$rowd4['hp_id'];  

                                            do {
                                                $datev= date("d-M-Y", strtotime("+$x  day"));
                                                ?>
                                                    <div class="avbty">
                                                        <center>
                                                        <p>Covishield</p>
                                                        <?php
                                                            $sql1e = "SELECT * FROM hospital_vdaily WHERE date = '$datev' and hp_id='$h_id'";
                                                            $result1e=mysqli_query($con,$sql1e);
                                                            $row1e=mysqli_fetch_array($result1e);
                                                            $bal=$row1e['total']-$row1e['booked'];
                                                            if($bal<50){
                                                                if($bal==0){                                            
                                                                    echo "<button style='background-color:#888;'>".$bal."</button><br>";
                                                                    echo "<button id='nill'>Nill</button>";
                                                                }
                                                                else{
                                                                    ?>
                                                                    <form action="Shedule.php?vid=<?php echo $row1e['hpvs_id']?>" method="POST">
                                                                        <?php
                                                                            echo "<button style='background-color:red;'>".$bal."</button><br>";
                                                                            echo "<input name ='book' type='submit' id='book' value='Book'>";
                                                                        ?>
                                                                    </form>
                                                                    <?php
                                                                }
                                                            }
                                                            else{
                                                                ?>
                                                                <form action="Shedule.php?vid=<?php echo $row1e['hpvs_id']?>" method="POST">
                                                                    <?php
                                                                        echo "<button>".$bal."</button><br>";
                                                                        echo "<input name ='book' type='submit' id='book' value='Book'>";
                                                                    ?>
                                                                </form>
                                                                <?php
                                                            }
                                                        ?>
                                                        </center>
                                                    </div>
                                                <?php
                                                $x++;
                                            } while ($x <= 5);
                                        ?>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }
                }  
            }
            if($head==0){
                echo "<h4 style='margin-left:100px;'>No Search Results</h4>";
            }
        }
        
        // Normal case 

        else{

            ?>
            <div class="barow2">
                <h3>Slot Search Results</h3>
                <p ID="k2">Filter Results By:</p>
                <p>Cost:</p>
                <input type="button" value ="Free">
                <p>Vaccine:</p>
                <input type="button" value ="Covishield">
            </div>
            <div class="date">
                <?php
                    $x = 0;
                    do {
                        $datev= date("d-M-Y", strtotime("+$x  day"));
                        echo "<input type='button' value='".$datev."'>";
                        $x++;
                    } while ($x <= 5);
                ?>
            </div>
            <div class="barow3">
                <div class="optrow1">
                    <div class="resul">
                        <!-- <p>Kootickal CHC</p>
                        <p>Kottayam, 686514</p> -->
                        <?php
                            $query3="select * from user where L_id='$tmpid'";
                            $result3 =mysqli_query($con,$query3);
                            $row3=mysqli_fetch_array($result3); 
                            $plid=$row3['pn_id'];
                            // echo $plid;
                            
                            $query4="select * from hospital where pn_id=$plid";
                            $result4 =mysqli_query($con,$query4);
                            $row4=mysqli_fetch_array($result4);
                            echo "<p>".$row4['hp_name']."</p>";

                            $query5="select * from punchayat where pn_id=$plid";
                            $result5 =mysqli_query($con,$query5);
                            $row5=mysqli_fetch_array($result5);
                            $sdid=$row5['sd_id'];                        
                            $query6="select * from subdist where sd_id=$sdid";
                            $result6 =mysqli_query($con,$query6);
                            $row6=mysqli_fetch_array($result6);
                            $dtid=$row6['dt_id'];
                            $query7="select * from district where dt_id=$dtid";
                            $result7 =mysqli_query($con,$query7);
                            $row7=mysqli_fetch_array($result7);

                            $query8="select * from pin_number where pn_id=$plid";
                            $result8 =mysqli_query($con,$query8);
                            $row8=mysqli_fetch_array($result8);

                            echo "<p>".$row7['dt_name'].",".$row8['pin'];

                        ?>
                    </div>
                    <?php
                        $x = 0;
                        $h_id=$row4['hp_id'];  

                        do {
                            $datev= date("d-M-Y", strtotime("+$x  day"));
                            ?>
                                <div class="avbty">
                                    <center>
                                    <p>Covishield</p>
                                    <?php
                                        $sql1e = "SELECT * FROM hospital_vdaily WHERE date = '$datev' and hp_id='$h_id'";
                                        $result1e=mysqli_query($con,$sql1e);
                                        $row1e=mysqli_fetch_array($result1e);
                                        $bal=$row1e['total']-$row1e['booked'];
                                        if($bal<50){
                                            if($bal==0){                                            
                                                echo "<button style='background-color:#888;'>".$bal."</button><br>";
                                                echo "<button id='nill'>Nill</button>";
                                            }
                                            else{
                                                ?>
                                                <form action="Shedule.php?vid=<?php echo $row1e['hpvs_id']?>" method="POST">
                                                    <?php
                                                        echo "<button style='background-color:red;'>".$bal."</button><br>";
                                                        echo "<input name ='book' type='submit' id='book' value='Book'>";
                                                    ?>
                                                </form>
                                                <?php
                                            }
                                        }
                                        else{
                                            ?>
                                            <form action="Shedule.php?vid=<?php echo $row1e['hpvs_id']?>" method="POST">
                                                <?php
                                                    echo "<button>".$bal."</button><br>";
                                                    echo "<input name ='book' type='submit' id='book' value='Book'>";
                                                ?>
                                            </form>
                                            <?php
                                        }
                                    ?>
                                    </center>
                                </div>
                            <?php
                            $x++;
                        } while ($x <= 5);
                    ?>
                </div>
            </div>
            <?php
        }?>
	</div>
</body>
</html>