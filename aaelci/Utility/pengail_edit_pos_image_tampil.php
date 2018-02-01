<?php session_start(); ?>
<html>
<head><title>Edit Posisi Dokumen yang Telah di-Upload - Sistem Informasi Pengelolaan AIL</title></head>
<body>

<center>
*** Edit Posisi Dokumen yang Telah di-Upload ***<hr>
</center>
<table width=100%>
<tr>
<?php
global $midpel;
$midpel=$_POST['idpel'];
include("../data_akses/pengail_modul.php");
$cn=oci_connect($uid,$pwd,$dbs);
$Qry="select * from dil where idpel= '$midpel'";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
$data=oci_fetch_array($stm,OCI_BOTH);
$idplg=$data[0];
$nama=$data[1];
$alamat=$data[2];
$Tarif=$data[6];
$daya=$data[7];
$rpujl=$data[11];
$kd_aktiv=$data[12];
$kdup=$data[5];


if ($kdup==$_SESSION['kodeup']){

$cn=oci_connect($uid,$pwd,$dbs);
$Qry="select * from cust_ail where idpel= '$midpel'";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
$data=oci_fetch_array($stm,OCI_BOTH);

$kdamplop=$data[1];
$kdlabel=$data[2];
$permohonan=$data[3];
$identitas=$data[4];
$survey=$data[5];
$sjps=$data[6];
$spjbtl=$data[7];
$sspjbtl=$data[8];
$slo=$data[9];
$kuitansi=$data[10];
$pk=$data[11];
$ba=$data[12];
$rayon=$data[13];
$lemari=$data[14];
$baris=$data[15];
$kolom=$data[16];
$nomor=$data[17];
$lain2=$data[18];
$pdl=$data[25];

if ($kdamplop!="0") {$st_kdamplop="checked";} else {$st_kdamplop="";}
if ($kdlabel!="0") {$st_kdlabel="checked";} else {$st_kdlabel="";}
if ($permohonan!="0") {$st_permohonan="checked";} else {$st_permohonan="";}
if ($identitas!="0") {$st_identitas="checked";} else {$st_identitas="";}
if ($survey!="0") {$st_survey="checked";} else {$st_survey="";}
if ($sjps!="0") {$st_sjps="checked";} else {$st_sjps="";}
if ($spjbtl!="0") {$st_spjbtl="checked";} else {$st_spjbtl="";}
if ($sspjbtl!="0") {$st_sspjbtl="checked";} else {$st_sspjbtl="";}
if ($slo!="0") {$st_slo="checked";} else {$st_slo="";}
if ($kuitansi!="0") {$st_kuitansi="checked";} else {$st_kuitansi="";}
if ($pk!="0") {$st_pk="checked";} else {$st_pk="";}
if ($ba!="0") {$st_ba="checked";} else {$st_ba="";}
if ($lain2!="0") {$st_lain2="checked";} else {$st_lain2="";}
if ($pdl!="0") {$st_pdl="checked";} else {$st_pdl="";}

} else {
  echo "<h1>Maaf anda hanya berhak Entry/Edit AIL Rayon ".$_SESSION['uup']."</h1>";
  exit;

}
// end of hak rayon .....=============
?>


















</body>
</html>