<?php
include("data_akses/pengail_modul.php");

$cn=oci_connect($uid,$pwd,$dbs);
$Qry="INSERT INTO snapshot_pdp (    
    ID,
    TANGGAL,
    KODE_UPI,
    KODE_AP,
    PRD_PLAN,
    URAIAN,
    TARGET,
    REAL_1,
    PROSENTASE1,
    REAL_2,
    PROSENTASE2,
    REAL_3,
    PROSENTASE3,
    REAL_4,
    PROSENTASE4,
    REAL_5,
    PROSENTASE5)
  SELECT 
    SNAPSHOT_SEQ.NEXTVAL,
    current_date as TANGGAL,
    AA.KODE_UPI,
    AA.KODE_AP,
    AA.PRD_PLAN,
    AA.URAIAN,
    AA.TARGET,
    AA.REAL_1,
    AA.PROSENTASE1,
    AA.REAL_2,
    AA.PROSENTASE2,
    AA.REAL_3,
    AA.PROSENTASE3,
    AA.REAL_4,
    AA.PROSENTASE4,
    AA.REAL_5,
    AA.PROSENTASE5
  FROM v_laporan_pdp AA";
  
$stm=oci_parse($cn,$Qry);  
oci_execute($stm);

$Qry2="INSERT INTO snapshot_pdp_rayon (
	NEXTVAL, TANGGAL, KODE_UPI, KODE_AP, KODEUP, PRD_PLAN, TGT, REAL1, REAL2, REAL3, REAL4, REAL5 )
	SELECT 
	SNAPSHOT_PDP_RAYON_SEQ.NEXTVAL, CURRENT_DATE AS TANGGAL, AA.KODE_UPI, AA.KODE_AP, AA.KODEUP, AA.PRD_PLAN, AA.TGT, AA.REAL1, AA.REAL2, AA.REAL3, AA.REAL4, AA.REAL5
	FROM v_ail_workplan_rayon AA";
//echo $Qry;

$stm=oci_parse($cn,$Qry2);
oci_execute($stm);

?>
