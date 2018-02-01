<select name="lemari" onChange="javascript:rubah2(this)">
<?php
$kdunit=$_GET['kode'];

include("pengail_modul.php");
		$cn=oci_connect($uid,$pwd,$dbs);
		$Qry="select distinct ail_lemari
		from cust_ail where ail_rayon='$kdunit' 
		order by ail_lemari desc"
		$stm=oci_parse($cn,$Qry);
		oci_execute($stm);
   while ($data=oci_fetch_array($stm,OCI_BOTH)){
   echo "<option value=$data[0]>$data[0]</option>"; 
   } 
   echo "</select>";
?>
