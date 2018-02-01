<html>
<head><title>Tunggu Satu Menit</title></head>

</html>
<?php
include("data_akses/pengail_modul.php");
$cn=oci_connect($uid,$pwd,$dbs);

echo 'IDPelanggan'."<br/>"; 

$Qry="select * from DIL where ROWNUM <= 100";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
while ($hasil=oci_fetch_array($stm,OCI_BOTH)){
  echo $hasil[0]."<br/>";
}
echo "</form>";

?>
