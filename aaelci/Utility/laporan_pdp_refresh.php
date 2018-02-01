<?php
$submit=$_POST['submit'];



if ($submit=="Refresh"){

include("../data_akses/pengail_modul.php");
$cn=oci_connect($uid,$pwd,$dbs);
$Qry="update cust_ail_workplan_area
set real_1=(select realisasi from v_ail_workplan_110 where kodeup=cust_ail_workplan_area.kodeup  
and prd_plan=cust_ail_workplan_area.prd_plan)";
//where kodeup in (select kodeup from v_ail_workplan_110)";
$sql=oci_parse($cn,$Qry);
oci_execute($sql);

$Qry="update cust_ail_workplan_area
set real_2=(select realisasi from v_ail_workplan_120 where kodeup=cust_ail_workplan_area.kodeup  
and prd_plan=cust_ail_workplan_area.prd_plan)";
//where kodeup in (select kodeup from v_ail_workplan_120)";
$sql=oci_parse($cn,$Qry);
oci_execute($sql);

$Qry="update cust_ail_workplan_area
set real_3=(select realisasi from v_ail_workplan_130 where kodeup=cust_ail_workplan_area.kodeup  
and prd_plan=cust_ail_workplan_area.prd_plan)";
//where kodeup in (select kodeup from v_ail_workplan_130)";
$sql=oci_parse($cn,$Qry);
oci_execute($sql);

$Qry="update cust_ail_workplan_area
set real_4=(select realisasi from v_ail_workplan_140 where kodeup=cust_ail_workplan_area.kodeup  
and prd_plan=cust_ail_workplan_area.prd_plan)";
//where kodeup in (select kodeup from v_ail_workplan_140)";
$sql=oci_parse($cn,$Qry);
oci_execute($sql);

$Qry="update cust_ail_workplan_area
set real_5=(select realisasi from v_ail_workplan_150 where kodeup=cust_ail_workplan_area.kodeup  
and prd_plan=cust_ail_workplan_area.prd_plan)";
//where kodeup in (select kodeup from v_ail_workplan_150)";
$sql=oci_parse($cn,$Qry);
oci_execute($sql);




oci_commit($cn);





$ip=$_SERVER['REMOTE_ADDR'];


$Qry="insert into cust_ail_workplan_refresh select sysdate,'$ip' ip from dual";
$sql=oci_parse($cn,$Qry);
oci_execute($sql);
oci_commit($cn);
include('laporan_pdp_link.php');


} else {

  include("../data_akses/pengail_modul.php");
  $cn=oci_connect($uid,$pwd,$dbs);
  $Qry="select kode_ap,uarea from t_area where kode_upi='$kode_upi'";
  $stm=oci_parse($cn,$Qry);
  oci_execute($stm);
  while ($data1=oci_fetch_array($stm,OCI_BOTH)){
  $kdup="bt".$data1[0];
  $tampil=$_POST[$kdup];
  $up=$data1[0];
     if ($tampil=="Expand"){
     $area=$data1[0];
     $uarea=$data1[1];
     include("laporan_pdp_area.php"); 
     }
  }

//$kdup="bt53661";
//$tampil=$_POST[$kdup];
//echo $tampil;




}



?>
