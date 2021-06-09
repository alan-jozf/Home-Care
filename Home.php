<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <link rel="stylesheet" href="css/home.css"> -->
     <meta http-equiv="Cache-control" content="no-cache">
    <style>

    </style> 
</head>
<body>
    <?php require("Topbar.php"); ?> 
    <div class="homepage">

        <!-- <p id="alert">sample test</p> -->
        <!-- <div class="slides"  >
            <img class="mySlides" src="images/poster4.png" style="width:100%">
            <img class="mySlides" src="images/poster1.png" style="width:100%">
            <img class="mySlides" src="images/poster2.png" style="width:100%">
            <img class="mySlides" src="images/poster3.png" style="width:100%">
        </div> -->
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
        setTimeout(carousel, 3000); // Change image every 2 seconds
    }
</script>
</body>
</html>
