<?php
include "../data_akses/pengail_modul.php";
		$cn=oci_connect($uid,$pwd,$dbs);
		$Qry="select * from cust_ail_workplan_area where kode_ap in 
		('53KRW','53SKI','53CMI','53GPI','53MJA')";
		$stm=oci_parse($cn,$Qry);
		oci_execute($stm);
   while ($data=oci_fetch_array($stm,OCI_BOTH)){
   $kode_upi=$data[0];
   $kode_ap=$data[1];
   $kodeup=$data[2];
   $prd_plan=$data[3];
   $target=$data[4];
   $tgt=round($target/24,0);
   $jml_tgt=0;
       for ($i=5;$i<=15;$i++){
          if ($i<10){
          $prd_lap1="20120".$i."1";
          $prd_lap2="20120".$i."2";
          } else {
                if ($i<=12){
          	$prd_lap1="2012".$i."1";
          	$prd_lap2="2012".$i."2";		
                } else {
		$ii=($i-12);
          	$prd_lap1="20130".$ii."1";
          	$prd_lap2="20130".$ii."2";
                } 
          }
      $jml_tgt=$jml_tgt+$tgt;
      $Qry2="insert into cust_ail_workplan values ('$kode_upi','$kode_ap','$kodeup','$prd_plan','$prd_lap1',
            $tgt,0,0,0,0,0)";
      $sql=oci_parse($cn,$Qry2);
      oci_execute($sql);
      oci_commit($cn);
      $jml_tgt=$jml_tgt+$tgt;
      $Qry2="insert into cust_ail_workplan values ('$kode_upi','$kode_ap','$kodeup','$prd_plan','$prd_lap2',
           $tgt,0,0,0,0,0)";
      $sql=oci_parse($cn,$Qry2);
      oci_execute($sql);
      oci_commit($cn);
      } 
          	$prd_lap1="2013041";
          	$prd_lap2="2013042";
   $jml_tgt=$jml_tgt+$tgt;
   $Qry2="insert into cust_ail_workplan values ('$kode_upi','$kode_ap','$kodeup','$prd_plan','$prd_lap1',
        $tgt,0,0,0,0,0)";
   $sql=oci_parse($cn,$Qry2);
   oci_execute($sql);
   oci_commit($cn);
   $tgt=$target-$jml_tgt;
   $Qry2="insert into cust_ail_workplan values ('$kode_upi','$kode_ap','$kodeup','$prd_plan','$prd_lap2',
        $tgt,0,0,0,0,0)";
   $sql=oci_parse($cn,$Qry2);
   oci_execute($sql);
   oci_commit($cn);
 
   }

?>
