<?php
//include('pengail_modul.php');
//$cn=oci_connect($uid,$pwd,$dbs);
$Qry="select to_char(sysdate,'YYYYMMDDhh24miss') waktu from dual";
//echo $Qry;
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
$data=oci_fetch_array($stm,OCI_BOTH);
$waktu=$data[0];


//echo "Tanggal ".substr($waktu,6,2)."-".substr($waktu,4,2)."-".substr($waktu,0,4)." jam ".substr($waktu,8,4);

$ip=$_SERVER['REMOTE_ADDR'];
//echo "<br>".$ip;

?>

