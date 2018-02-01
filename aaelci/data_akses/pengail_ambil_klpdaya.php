<?php
		$cn=oci_connect($uid,$pwd,$dbs);
		$Qry="select prd_plan,uraian from t_klp_daya where substr(prd_plan,1,1)='1' 
		order by prd_plan";
		$stm=oci_parse($cn,$Qry);
		oci_execute($stm);
   while ($data=oci_fetch_array($stm,OCI_BOTH)){
   echo "<option value=$data[0]>$data[1]</option>"; 
   } 
   oci_close($cn);
?>
