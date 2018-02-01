<?php
		$cn=oci_connect($uid,$pwd,$dbs);
		$Qry="select kodeup,uup from t_unit where kode_ap='$kode_ap' order by kodeup";
		$stm=oci_parse($cn,$Qry);
		oci_execute($stm);
   while ($data=oci_fetch_array($stm,OCI_BOTH)){
   echo "<option value=$data[0]>$data[1]</option>"; 
   } 
   oci_close($cn);

?>
