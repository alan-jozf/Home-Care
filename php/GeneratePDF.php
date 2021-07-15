<?php
include('config.php');
session_start();

// ob_start();
  require_once 'dompdf/autoload.inc.php';
  use Dompdf\Dompdf;
  $dompdf = new Dompdf();
  ?>
	<link rel="stylesheet" type="text/css" href="css/table.css" />
<?php
  // session_start();
  // if(isset($_POST['create']))
  // {
    date_default_timezone_set("Asia/Kolkata");
    $date = date('d-m-Y H:i:A');
    $tmpid=$_SESSION['id'];

    $query="select * from volunteer";
    $result =mysqli_query($con,$query);
    $row=mysqli_fetch_array($result); 
    $plid=$row['pn_id'];

    $querB="select * from punchayat where pn_id=$plid";
    $reslB =mysqli_query($con,$querB);
    $roB=mysqli_fetch_array($reslB);
    $pname=$roB['pn_name'];

    $output ='<p align="left">'.$pname .'</p><p align="left">'.$date.'</p>
              <h3 align="center"><u>Home Care </u></h3><h4>Delivery List</h4><br />';
    $output .="
      <table fontsize= '10' border='1' cellpadding='5' cellspacing='0'>
      <tbody>
      <tr>          
      <th width='10px'>No</th>
      <th width='80px'>Date</th>
      <th width='60px'>User</th>
      <th width='80px'>Mobile</th>
      <th width='100px'>House Name</th>
      <th width='80px'>Place</th>
      <th width='60px'>Product</th>
      <th width='60px'>Description</th>
      <th width='20px'>Quantinty</th>
      </tr>
      ";
    
      $counter = 0;
      include('php/config.php');
      

      $query="select * from myorder where L_id in (select L_id from user where pn_id =$plid)";
      $result =mysqli_query($con,$query);
      while($row=mysqli_fetch_array($result))  


      // $query="select * from myorder";
      // $result =mysqli_query($con,$query);
      // while($row=mysqli_fetch_array($result))  
      {	
        $id=$row['P_id'];
        $Oid=$row['O_id'];
        $lid=$row['L_id'];

        $quer="select * from product where P_id=$id";
        $resl =mysqli_query($con,$quer);
        $ro=mysqli_fetch_array($resl);
        $image = $ro['image'];
        $image_src = "uploads/".$image;

        $querB="select * from user where L_id=$lid";
        $reslB =mysqli_query($con,$querB);
        $roB=mysqli_fetch_array($reslB);
        $sid=$roB['pn_id'];

        $querC="select * from punchayat where pn_id=$sid";
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
          <td>'.$roC['pn_name'] .'</td>
          <td>'.$ro['name'] .'</td>
          <td>'.$ro['description'] .'</td>
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
