<?php
    
    include('php/config.php');
    $oid=$_GET['dd'];

    $quer1="select * from count where sd_id=11 and id =(select MAX(id) from count)";
    $resu1 =mysqli_query($con,$quer1);
    $ro1=mysqli_fetch_array($resu1);

    $date=$ro1['date'];
    $date1=date_create("01-01-2021");
    $date2=date_create($date);
    $diff=date_diff($date1,$date2);
    $d=$diff->format("%a")-7;
    $start=$d* 24 * 3600 * 1000;
    // echo $d;

    $quer1="select * from count where sd_id=11 ORDER BY id DESC";
    $resu1 =mysqli_query($con,$quer1);
    $count = array();

    // if($oid==1){
    //     // $c=mysql_num_rows($query);
    //     $c=0;
    //     while( $c<8 )
    //     {
    //         $c++;
    //     }
    // }

    if($oid==1){
        $c=0;
        while( $c<8 )
        {    
            while($row = mysqli_fetch_array($resu1)){
                $count[] = $row;
            }
            $c1= (int)$count[7]['tested']; 
            $c2= (int)$count[6]['tested'];
            $c3= (int)$count[5]['tested'];
            $c4= (int)$count[4]['tested'];
            $c5= (int)$count[3]['tested'];
            $c6= (int)$count[2]['tested'];
            $c7= (int)$count[1]['tested'];
            $c8= (int)$count[0]['tested'];
              
            $c++;
        }
        $max=10000;
        $head="Tested";

    }
    if($oid==2){
        $c=0;
        while( $c<8 )
        {    
            while($row = mysqli_fetch_array($resu1)){
                $count[] = $row;
            }
            $c1= (int)$count[7]['confirmed']; 
            $c2= (int)$count[6]['confirmed'];
            $c3= (int)$count[5]['confirmed'];
            $c4= (int)$count[4]['confirmed'];
            $c5= (int)$count[3]['confirmed'];
            $c6= (int)$count[2]['confirmed'];
            $c7= (int)$count[1]['confirmed'];
            $c8= (int)$count[0]['confirmed'];
              
            $c++;
        }
        $max=4000;
        $head="Confirmed";

    }
    if($oid==4){
        $c=0;
        while( $c<8 )
        {    
            while($row = mysqli_fetch_array($resu1)){
                $count[] = $row;
            }
            $c1= (int)$count[7]['recovery']; 
            $c2= (int)$count[6]['recovery'];
            $c3= (int)$count[5]['recovery'];
            $c4= (int)$count[4]['recovery'];
            $c5= (int)$count[3]['recovery'];
            $c6= (int)$count[2]['recovery'];
            $c7= (int)$count[1]['recovery'];
            $c8= (int)$count[0]['recovery'];
              
            $c++;
        }
        $max=6000;
        $head="Recovery";

    }
    if($oid==3){
        $c=0;
        while( $c<8 )
        {    
            while($row = mysqli_fetch_array($resu1)){
                $count[] = $row;
            }
            $c1= (int)$count[7]['active']; 
            $c2= (int)$count[6]['active'];
            $c3= (int)$count[5]['active'];
            $c4= (int)$count[4]['active'];
            $c5= (int)$count[3]['active'];
            $c6= (int)$count[2]['active'];
            $c7= (int)$count[1]['active'];
            $c8= (int)$count[0]['active'];
              
            $c++;
        }
        $max=18000;
        $head="Active";


    }



    $dataPoints = array(
        array("x" => $start            , "y" => $c1),
        array("x" => $start+86400000   , "y" => $c2),
        array("x" => $start+86400000*2 , "y" => $c3),
        array("x" => $start+86400000*3 , "y" => $c4),
        array("x" => $start+86400000*4 , "y" => $c5),
        array("x" => $start+86400000*5 , "y" => $c6),
        array("x" => $start+86400000*6 , "y" => $c7),
        array("x" => $start+86400000*7 , "y" => $c8)
    );

    //  $dataPoints = array(
    // 	array("x" => 13910400000 , "y" => 100),
    // 	array("x" => 13996800000 , "y" => 71),
    // 	array("x" => 14083200000 , "y" => 205),
    // 	array("x" => 14169600000 , "y" => 523),
    // 	array("x" => 14256000000 , "y" => 326),
    // 	array("x" => 14342400000 , "y" => 847),
    // 	array("x" => 14428800000 , "y" => 753)
    //  );

    // pointInterval: 24 * 3600 * 1000 // one day
    // 86400000 = Jan 1
    // 13824000000= June 10 =86400000*160

    // 31622400000 = 1 yr difference//366 day
    // 31536000000 = 1 yr difference//365 day
    // 946665000000 = yr 2000////???????????
    // 2021= ?????????????????

?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "<?php echo $head?>"
	},
	axisX: {
		valueFormatString: "DD MMM"
	},
	axisY: {
		title: "Count",
		includeZero: true,
		maximum: <?php echo $max?>
	},
	data: [{
		type: "splineArea",
		color: "#6599FF",
		xValueType: "dateTime",
		xValueFormatString: "DD MMM",
        yValueFormatString: "#,##0 <?php echo $head?>",
		dataPoints: <?php echo json_encode($dataPoints); ?>
	}]
});
 
chart.render();
 
}
</script>
</head>
<body>
<?php require("Topbar.php"); ?>
    <div class="homepage">

        <div id="chartContainer" style="height: 70%; width: 85%; margin-top:80px;margin-left:50px; border: #e4e4e4 2px solid;"></div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

        <!-- https://canvasjs.com/php-charts/spline-area-chart/ -->
        <!-- https://canvasjs.com/php-charts/spline-chart/ -->
        <!-- https://www.sourcecodester.com/tutorials/php/12871/how-create-line-graph-phpmysqli.html -->
    </div>
</body>
</html>