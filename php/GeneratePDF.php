<?php
  $con=mysqli_connect("localhost","root","","care_app")or die("couldn't connect");
  require_once 'dompdf/autoload.inc.php';
  use Dompdf\Dompdf;
  $dompdf = new Dompdf();

  session_start();
  // if(isset($_POST['create']))
  // {
    $output ='<h3 align="center">Delivery List</h3><br />';

    //output -> html design

    $output .="
      <table fontsize= '10' width ='100%' border='1' cellpadding='5' cellspacing='0'>
      <tbody>
      <tr>
        <th width='10px'>No</th>
        <th width='70px'>Date</th>
        <th width='100px'>User</th>
        <th width='80px'>Mobile</th>
        <th width='100px'>House Name</th>
        <th width='100px'>Place</th>
        <th width='80px'>Product</th>
        <th width='70px'>Quantinty</th>
          
      </tr>
      ";

    $query="select * from myOrder";
    $result =mysqli_query($con,$query);
    while($row=mysqli_fetch_array($result))  
    {	
        $id=$row['P_id'];
        $Oid=$row['O_id'];
        $lid=$row['L_id'];

        $counter = 0;

        $quer="select * from product where P_id=$id";
        $resl =mysqli_query($con,$quer);
        $ro=mysqli_fetch_array($resl);
        $image = $ro['image'];
        $image_src = "uploads/".$image;

        $querB="select * from user where L_id=$lid";
        $reslB =mysqli_query($con,$querB);
        $roB=mysqli_fetch_array($reslB);
        $sid=$roB['sd_id'];

        $querC="select * from subdist where sd_id=$sid";
        $reslC =mysqli_query($con,$querC);
        $roC=mysqli_fetch_array($reslC);

        $querD="select * from login where L_id=$lid";
        $reslD =mysqli_query($con,$querD);
        $roD=mysqli_fetch_array($reslD);

        $output .='

        <tr>
          <td>'.++$counter .'</td>
          <td>'.$row['Date'] .'</td>
          <td>'.$roB['name'] .'</td>
          <td>'.$roD['PhoneNo'] .'</td>
          <td>'.$roB['hname'] .'</td>
          <td>'.$roC['sd_name'] .'</td>
          <td>'.$ro['name'] .'</td>
          <td>'.$row['quantity'] .'</td>
        </tr>';
    }
    $output .="</table> <br />";
    echo $output;
      $file_name='Delivery List.pdf';
      $dompdf->loadHtml($output); //load the html;
      $dompdf->render(); //html to pdf
      ob_end_clean();
      $dompdf->stream($file_name, array("Attachment" => false)); //Attachment false -> present report in a new tab
      exit(0);
  // }
?>
