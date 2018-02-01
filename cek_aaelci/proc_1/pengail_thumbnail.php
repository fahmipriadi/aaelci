<?php
$midpel=substr($_GET['id'],2,12);
include "../data_akses/pengail_modul.php";
$cn=oci_connect($uid,$pwd,$dbs);
$Qry="select content from cust_ail_img where idpel='$midpel' and rownum=1 ";
//echo $Qry;
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
$brs=oci_fetch_array($stm,OCI_ASSOC+OCI_RETURN_NULLS);

  if (!brs) {
     header('Status : 404 Not Found');
   } else {
     $gbr=$brs['CONTENT']->load();
     header("Content-type: image/jpeg");
     echo $gbr;

   }


?>



