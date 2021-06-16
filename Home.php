<html>
<head>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <?php require("Topbar.php"); 
        include('php/config.php');?>
    <div class="homepage">
        <div class="col1">
            <div class="row1">
                <h2 id="head">Affected Areas</h2>
                <div id="map">
                    <img id="default" src="images/Map.PNG" alt="MAP">
                </div>
            </div>

            <?php
                // $date = date('d-m-Y');  
                $quer1="select * from count where sd_id=11 and id =(select MAX(id) from count)";
                $resu1 =mysqli_query($con,$quer1);
                $ro1=mysqli_fetch_array($resu1);
            ?>
            
            <div class="row2">
                <a href="checkgraph.php?dd= 1">
                <div class="col">
                    <div class="left">
                        <div class="head">
                            <h4>Tested</h4>
                            <img id="arrow" src="images/upgreen.png" alt="MAP">
                        </div>
                        <h3><?php echo $ro1['tested'];?> </h3>
                    </div>
                </div></a>
                <a href="checkgraph.php?dd= 2">
                <div class="col">
                    <div class="left">
                        <div class="head">
                            <h4>Confirmed</h4>
                            <img id="arrow" src="images/upred.png" alt="MAP">
                        </div>
                        <h3> <?php echo $ro1['confirmed'];?> </h3>
                    </div>
                </div>  </a>
                <a href="checkgraph.php?dd= 3">
                <div class="col">
                    <div class="left">
                        <div class="head">
                            <h4>Active</h4>
                            <img id="arrow" src="images/downgreen.png" alt="MAP">
                        </div>
                        <h3> <?php echo $ro1['active'];?> </h3>
                    </div>
                </div>  </a>
                <a href="checkgraph.php?dd= 4">
                <div class="col">
                    <div class="left">
                        <div class="head">
                            <h4>Recovery</h4>
                            <img id="arrow" src="images/downred.png" alt="MAP">
                        </div>
                        <h3><?php echo $ro1['recovery'];?> </h3>
                    </div>
                </div>  </a>
            </div>
        </div>
        <div class="col2">
            <div id="head">
                <h2>Helpline Numbers</h2>
            </div>
            <div class="news">
                <div class="rowc">
                    <div class="icon">
                        <img id="icon" src="images/verify.png">
                    </div>
                    <div class="right">
                        <p> Health Ministry Helpline</p>
                        <img id="phone" src="images/phone.png">
                        <h5> 1075</h5>
                    </div>
                </div>
                <div class="rowc">
                    <div class="icon">
                        <img id="icon" src="images/verify.png">
                    </div>
                    <div class="right">
                        <p> Child Helpline</p>
                        <img id="phone" src="images/phone.png">
                        <h5> 1098</h5>
                    </div>
                </div>
                <div class="rowc">
                    <div class="icon">                          
                        <img id="icon" src="images/verify.png">
                    </div>
                    <div class="right">
                        <p> Senior Citizens Helpline</p>
                        <img id="phone" src="images/phone.png">
                        <h5> 14567</h5>
                    </div>
                </div>
                <div class="rowc">
                    <div class="icon">
                        <img id="icon" src="images/verify.png">
                    </div>
                    <div class="right">
                        <p> Regional Health Helpline</p>
                        <img id="phone" src="images/phone.png">
                        <h5> 8136815972</h5>
                    </div>
                </div>
            </div>
            <div class="slides"  >
                <img class="mySlides" src="images/poster1.jpg">
                <img class="mySlides" src="images/poster2.jpg">
                <img class="mySlides" src="images/poster3.jpg">
                <img class="mySlides" src="images/poster4.jpg">
                <img class="mySlides" src="images/poster5.jpg">
            </div>
        </div>
    </div>


    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}    
            x[myIndex-1].style.display = "block";  
            setTimeout(carousel, 4500); // Change image every 3 seconds
        }
    </script>


<!-- script for map begins -->

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAI1qfenpKZLABJ5z-n_Ct0h53tzwUBmCA"
            type="text/javascript"></script>

            <!-- Babu?key=AIzaSyDHTWkA5K-6EpKCyTPcdS3ONyCxDBqJ74o" -->

    <script type="text/javascript">

        // Multiple markers location, latitude, and longitude

        x = navigator.geolocation;
        x.getCurrentPosition(success, failure);
        function success(position)
        {
            var myLat = 9.6358538; 
            var myLong = 76.5971685;

            //    https://www.google.co.in/maps/place/Ayarkunnam,+Kerala/@9.6358538,76.5971685,
            //    myLat = position.coords.latitude;
            //    myLong = position.coords.longitude;

            var coords = new google.maps.LatLng(myLat,myLong);
            var mapOptions = {

                zoom:11,
                center: coords,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                disableDefaultUI: true,
            
            }

            var map = new google.maps.Map(document.getElementById("map"), mapOptions);
            var marker = new google.maps.Marker({map:map, position:coords});
            setMarkers(map);
        }

        function failure(){
            alert("Allow Location access in browser Settings");
            document.getElementById("map").innerHTML = "Allow Location access in browser Settings";
            }

        var markers = [
            <?php 
            $query="select * from map";
            $result =mysqli_query($con,$query);
            if(mysqli_num_rows($result) > 0){
                while($row = $result->fetch_assoc()){
                    $place=$row['place'];
                    $sid=$row['sd_id'];

                    $query1="select * from active where sd_id='$sid'";
                    $result1 =mysqli_query($con,$query1);
                    $row1=mysqli_fetch_array($result1);

                    echo '["'.$row['place'].'", '.$row['lati'].', '.$row['longi'].', '.$row1['active'].',],';
                }
            }
            ?>
        ];

        console.log(markers);
        function setMarkers(map) {
            // Adds markers to the map.
            // Marker sizes are expressed as a Size of X,Y where the origin of the image
            // (0,0) is located in the top left of the image.
            // Origins, anchor positions and coordinates of the marker increase in the X
            // direction to the right and in the Y direction down.
            const image = {
                url:
                "images/1020409.png",
                scaledSize: new google.maps.Size(50, 50), // scaled size
                origin: new google.maps.Point(0,0), // origin
                anchor: new google.maps.Point(0, 0) // anchor
            };

            const shape = {
                coords: [1, 1, 1, 20, 18, 20, 18, 1],
                type: "poly",
            };


            // var infoWindowContent ='<div id="iw-container">' +
            //                        '<div class="iw-title">'+markers[i][0]+'<input type="button"  data-toggle="modal" data-target="#exampleModal" style="float:right;" value="Make a Request" class="btn btn-success makeRequest" onclick="myFunction('+markers[i][10]+','+markers[i][11]+')" /></div>' +
            //                        '<div class="iw-content">' +
            //                          '<div class="iw-subTitle"><b>Contact Number :</b>'+markers[i][4]+'</div>' +
            //                          '<p><b>Email Id :</b>'+markers[i][3]+'<br>License Number :'+markers[i][6]+'</p>' +
            //                          '<div class="iw-subTitle">Address</div>' +
            //                          '<p>'+markers[i][6]+'<br>State :'+markers[i][8]+'<br>'+
            //                          'District :'+markers[i][9]+'<br>Pin :'+markers[i][7]+'</p>'+
            //                        '</div>';


            // Add multiple markers to map
                var infoWindow = new google.maps.InfoWindow(), marker, i;
                var bounds = new google.maps.LatLngBounds();

            for( i = 0; i < markers.length; i++ ) {
                var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                // bounds.extend(position);

                const contentString =markers[i][0];
                const infowindow = new google.maps.InfoWindow({
                    content: contentString,
                });

                marker = new google.maps.Marker({
                    position: position,
                    map: map,
                            icon: image,
                    title: markers[i][0],
                });

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {

                        // infoWindow.setContent('<div id="iw-container">' +
                        //            '<div class="iw-title">'+markers[i][0]+'<input type="button"  data-toggle="modal" data-target="#exampleModal" style="float:right;" value="Make a Request" class="btn btn-success makeRequest" onclick="myFunction('+markers[i][10]+','+markers[i][11]+')" /></div>' +
                        //            '<div class="iw-content">' +
                        //              '<div class="iw-subTitle"><b>Contact Number :</b>'+markers[i][4]+'</div>' +
                        //              '<p><b>Email Id :</b>'+markers[i][3]+'<br>License Number :'+markers[i][6]+'</p>' +
                        //              '<div class="iw-subTitle">Address</div>' +
                        //              '<p>'+markers[i][6]+'<br>State :'+markers[i][8]+'<br>'+
                        //              'District :'+markers[i][9]+'<br>Pin :'+markers[i][7]+'</p>'+
                        //            '</div>');


                        infoWindow.setContent('<div id="iw-container">' +
                                    ' <p style=\"padding:5px;\"> '+markers[i][0]+'</p><p style=\"float:left; padding:5px;\"> Active : <h3 style=\"color:red; float:left;  padding:5px;\">'+markers[i][3]+'</h3></p> '+
                            '</div>');
                        infoWindow.open(map, marker);
                    }
                })(marker, i));


            }
        }
    </script>
</body>
</html>
