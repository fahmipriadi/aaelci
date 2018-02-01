<?php
$kdap=$_POST['kdap'];
$uarea=$_POST['uarea'];
$uup=$_POST['uup'];
//echo $kdap;
include("../data_akses/pengail_modul.php");
$cn=oci_connect($uid,$pwd,$dbs);
$Qry="select kodeup,uup from t_unit where kode_ap='$kdap'";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
while ($data1=oci_fetch_array($stm,OCI_BOTH)){
$kdup="bt".$data1[0];
//echo $kdup;
$tampil=$_POST[$kdup];
$up1=$data1[0];
$uup1=$data1[1];
//echo $tampil;
  if ($tampil=="Expand"){
  //echo $up;
  $up=$up1;
  $uup=$uup1;
  }
}

  include("laporan_pdp_isi_wp.php"); 

//$kdup="bt53661";
//$tampil=$_POST[$kdup];
//echo $tampil;

?>

