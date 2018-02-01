<?php
$kdunit=$_GET['kdunit'];
$lemari=$_GET['lemari'];
include("../data_akses/pengail_modul.php");
		$cn=oci_connect($uid,$pwd,$dbs);
		$Qry="select distinct ail_rayon,ail_lemari,ail_baris||'-'||ail_kolom brsklm from cust_ail
		where kodeup='$kdunit'  and ail_lemari='$lemari' 
		order by ail_rayon,ail_lemari desc";
		$stm=oci_parse($cn,$Qry);
		oci_execute($stm);
while ($data4=oci_fetch_array($stm,OCI_BOTH)){
echo "<option value=\"$data4[2]\">$data4[2]</option>";
}
?>