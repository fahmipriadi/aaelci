<?php 
session_start();
$kode_ap=$_SESSION['kode_ap'];
$kodeup=$_SESSION['kodeup'];
$userid=$_SESSION['userid'];
?>

<html>
<head><title>Laporan Kelengkapan AIL - Sistem Informasi Pengelolaan AIL</title></head>
<body>
<form  method="post" action="pengail_prioritas_daya.php">


<?php

$klpdaya=$_POST['klpdaya'];
$mgardu=strtoupper($_POST['mgardu']);
$pwd=$_POST['pwd'];

if (substr($userid,0,1)=="1"){

include("../data_akses/pengail_modul.php");
$cn=oci_connect($uid,$pwd,$dbs);
$Qry="select count(*) plg from v_prioritas where kodeup='$kodeup' and prd_plan='$klpdaya' and prd_lap is null";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
$data=oci_fetch_array($stm,OCI_BOTH);
$jml=$data['PLG'];


echo "Terdapat ".$jml." pelanggan untuk diproses ";
echo "<br>Pass Code :<br>";
echo "<input type=\"HIDDEN\" name=\"kklp\" value=\"".$klpdaya."\">";
echo "<input type=\"HIDDEN\" name=\"jml\" value=\"".$jml."\">";

echo "<input type=\"PASSWORD\" name=\"pass\" size=\"27\" >";
echo "<br><input type=\"submit\" name=\"submit\" value=\"Proses\">";


} else {
  echo "<h1>Maaf, menu ini tidak dapat anda gunakan</h1>";
  exit;

}

?>


<font size=4><center>PRIORITAS MENURUT DAYA (PDP II)</center></font>

<?php
include("../menu/menu_footer.php");
?>
</form>
</body>
</html>