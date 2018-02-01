<html>
<head><title>Tampilin gambar</title></head>

</html>
<?php
include("data_akses/pengail_modul.php");
$cn=oci_connect($uid,$pwd,$dbs);

$Qry="select * from cust_ail-img";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);

echo $stm;

?>
