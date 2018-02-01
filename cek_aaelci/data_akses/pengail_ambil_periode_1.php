<?php
include("pengail_modul.php");
		$cn=oci_connect($uid,$pwd,$dbs);
		$Qry1="select prd_lap from cust_ail_prdlap order by prd_lap desc";
		$stm1=oci_parse($cn,$Qry1);
		oci_execute($stm1);
   echo "<select name=\"prdlap\">";
   while ($data1=oci_fetch_array($stm1,OCI_BOTH)){
   echo "<option value=$data1[0]>$data1[0]</option>"; 
   } 
   echo "</select>";
   
?>