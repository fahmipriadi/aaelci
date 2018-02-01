<select name="rak">
<?php
$kdunit=$_GET['kdunit'];
$lemari=$_GET['lemari'];

include("pengail_modul.php");
		$cn=oci_connect($uid,$pwd,$dbs);
		$Qry="select distinct ail_lemari,ail_baris||'-'||ail_kolom 
		from cust_ail where ail_rayon='$kdunit' and ail_lemari='$lemari' 
		order by ail_baris desc, ail_kolom desc "
		$stm=oci_parse($cn,$Qry);
		oci_execute($stm);
   while ($data=oci_fetch_array($stm,OCI_BOTH)){
   echo "<option value=$data[1]>$data[1]</option>"; 
   } 
   echo "</select>";
   oci_close($cn);

?>
