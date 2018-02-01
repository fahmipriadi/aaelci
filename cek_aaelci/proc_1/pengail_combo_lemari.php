<?php
$kdunit=$_GET['kdunit'];
include("../data_akses/pengail_modul.php");
		$cn=oci_connect($uid,$pwd,$dbs);
		$Qry="select distinct ail_rayon,ail_lemari from cust_ail
		where kodeup='$kdunit' 
		order by ail_rayon,ail_lemari desc";
echo $Qry;
		$stm=oci_parse($cn,$Qry);
		oci_execute($stm);
while ($data3=oci_fetch_array($stm,OCI_BOTH)){
echo "<option value=\"$data3[1]\">$data3[1]</option>";
}
?>
