<?php
$conn = new mysqli("localhost","root","","home_care");

// $sql="UPDATE comments SET status=1 WHERE status=0";	
// $result=mysqli_query($conn, $sql);

// $sql="select * from comments ORDER BY id DESC limit 5";
// $result=mysqli_query($conn, $sql);
// $response='';
// while($row=mysqli_fetch_array($result)) {
// 	$response = $response . "<div class='notification-item'>" .
//         "<div class='notification-subject'>". $row["subject"] . "</div>" . 
//         "<div class='notification-comment'>" . $row["comment"]  . "</div>" .
// 	"</div>";
// }

$response='';

$sql="select * from mrequest ";
$result=mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);
if($row>0){
    $response = $response . "<div class='notification-item'>" .
    "<a href='ViewRequest.php' class='notification-subject'> New Medical Request Received </a>" . 
    "</div>";
}
$sql="select * from chat_message ";
$result=mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);
if($row>0){
    $response = $response . "<div class='notification-item'>" .
    "<a href='admin/Feedbacks.php' class='notification-subject'>New Message Alert </a>" . 
    "</div>";
}
$sql="select * from product where quantity <10";
$result=mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);
if($row>0){
    $response = $response . "<div class='notification-item'>" .
    "<a href='admin/ViewProduct.php' class='notification-subject'> Low Stock Warning </a>" . 
    "</div>";
    if($row["quantity"]==0){
        $response = $response . "<div class='notification-item'>" .
        "<a href='admin/ViewProduct.php' class='notification-subject'> Product Out of Stock </a>" . 
        "</div>";
    }
}
if(!empty($response)) {
	print $response;
}


?>