<html>
<head><title>Tunggu Satu Menit</title></head>

</html>
<?php
include("data_akses/pengail_modul.php");
$cn=oci_connect($uid,$pwd,$dbs);

echo 'Pelanggan Yang Filenya Kosong';

$Qry="select distinct IDPEL from cust_ail_img where dbms_lob.getlength(CONTENT)='0' order by IDPEL";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
while ($hasil=oci_fetch_array($stm,OCI_BOTH)){
  echo $hasil[0];
 
}

echo "</form>";

?>
