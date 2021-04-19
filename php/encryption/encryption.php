<!DOCTYPE html>
<html>
<body>

  <?php
    $str="Asdf@1234";
    $arr=str_split($str);
    // $a='';
    // foreach($arr as $value)
    // {
    //   $a= $a .sprintf("%03d", ord("$value"));
    //   echo $a. "<br>";
    // }

    // $arr=str_split($password);
    $a='';
    $i=1;
    foreach($arr as $value)
    {
      $i=$i+2;
      $a= $a .sprintf("%03d", ord("$value")+$i);
    }
    echo $a. "<br>";
    echo md5($a);
  ?>

</body>
</html>

<!-- 
Asdf@1234
065115100102064049050051052
068120107111075062065068071
cea50d07cf7d85354a579f13eb9e3281
45: 999999999999999999999999999999999999999999999
32: b6f1a6dc72a27526a692aff2e6031c24
45: 000000000000000000000000000000000000000000000
32: 63c5fcf83c2275fe64e880dd8dfc5cd6 -->


<!-- decrption

echo(chr(60))."<br>"; = <
echo ord("<")."<br>"; = 60

sprintf("%04d", 10); returns 0010
$str = "00775505";
$str = ltrim($str, "0"); 
echo $str;
775505






 -->