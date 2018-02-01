<?php
include "../data_akses/pengail_modul.php";
//konek db oracle
$cn=oci_connect($uid,$pwd,$dbs);
//$queryku = 'SELECT TO_DATE("2015/05/15 8:30:25", "YYYY/MM/DD HH:MI:SS")FROM dual';
$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
echo $date->format('d-m-Y H:i:s');
//$tanggal = ('2015/10/11 08:00:00');
//$queryku = "INSERT INTO cust_ail_history 
		//(KODE_AP, KODE_UPI, KODEUP, PRD_PLAN, REAL_1, REAL_2, REAL_3, REAL_4, REAL_5, TGL_HISTORY) 
		//SELECT AA.KODE_AP, AA.KODE_UPI, AA.KODEUP, AA.PRD_PLAN, AA.REAL_1, AA.REAL_2, AA.REAL_3, AA.REAL_4, AA.REAL_5, 
		//$date('YYYY/MM/DD HH:MI:SS') FROM cust_ail_workplan_area aa WHERE rownum < 10";

//echo $query;
//exit;		
		
$stm=oci_parse($cn,$queryku);
oci_execute($stm); // The row is committed and immediately visible to other users
oci_close($cn);
?>

