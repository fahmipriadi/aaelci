<html>
<head><title>Blob</title></head>

</html>
<?php
include("data_akses/pengail_modul.php");
$cn=oci_connect($uid,$pwd,$dbs);

echo 'Pelanggan'."<br/>"; 

$Qry= "select idpel, kode_img, no_img, nmfile, type, content from cust_ail_img where ROWNUM <= 5";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
while ($hasil=oci_fetch_array($stm,OCI_BOTH)){
  echo $hasil[0];
  echo $hasil[4]."<br/>";
 
}

echo "</form>";

?>
