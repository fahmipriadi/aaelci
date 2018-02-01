<?php

$midpel=$_GET['id_pel'];
$perm=$_GET['perm'];
$iden=$_GET['iden'];
$surv=$_GET['surv'];
$sjps=$_GET['sjps'];
$spj=$_GET['spj'];
$sspj=$_GET['sspj'];
$slo=$_GET['slo'];
$kuit=$_GET['kuit'];
$pk=$_GET['pk'];
$ba=$_GET['ba'];
$lain=$_GET['lain'];
$pdl=$_GET['pdl'];


//echo $perm; 
//exit;


switch ("LihatDokumen"){
  case $perm;
  $Qry="select content from cust_ail_img where idpel='$midpel' and kode_img='01' ";
  break;
  case $iden;
  $Qry="select content from cust_ail_img where idpel='$midpel' and kode_img='02' ";
  break;
  case $surv;
  $Qry="select content from cust_ail_img where idpel='$midpel' and kode_img='03' ";
  break;
  case $sjps;
  $Qry="select content from cust_ail_img where idpel='$midpel' and kode_img='04' ";
  break;
  case $spj;
  $Qry="select content from cust_ail_img where idpel='$midpel' and kode_img='05' ";
  break;
  case $sspj;
  $Qry="select content from cust_ail_img where idpel='$midpel' and kode_img='06' ";
  break;
  case $slo;
  $Qry="select content from cust_ail_img where idpel='$midpel' and kode_img='07' ";
  break;
  case $kuit;
  $Qry="select content from cust_ail_img where idpel='$midpel' and kode_img='08' ";
  break;
  case $pk;
  $Qry="select content from cust_ail_img where idpel='$midpel' and kode_img='09' ";
  break;
  case $ba;
  $Qry="select content from cust_ail_img where idpel='$midpel' and kode_img='10' ";
  break;
  case $lain;
  $Qry="select content from cust_ail_img where idpel='$midpel' and kode_img='11' ";
  break;
  case $pdl;
  $Qry="select content from cust_ail_img where idpel='$midpel' and kode_img='12' ";
  break;
  default:
     $Qry="select content from cust_ail_img where idpel='$midpel' ";;
}

//echo $Qry; 
//exit;

include "../data_akses/pengail_modul.php";


require_once('../../tcpdf/config/lang/eng.php');
require_once('../../tcpdf/tcpdf.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


$cn=oci_connect($uid,$pwd,$dbs);
$stm=oci_parse($cn,$Qry);

oci_execute($stm);
$cek=$brs=oci_fetch_array($stm,OCI_ASSOC+OCI_RETURN_NULLS);
if ($cek){
   $stm=oci_parse($cn,$Qry);
   oci_execute($stm);
   while ($brs=oci_fetch_array($stm,OCI_ASSOC+OCI_RETURN_NULLS)){
       $pdf->AddPage();
       $img=$brs['CONTENT']->load();
       $pdf->Image('@'.$img);
       }
   $pdf->Output('ail.pdf', 'I');
} else {
echo "<font size=6>Maaf, Image Dokumen tidak ditemukan</font>";
}

oci_close($cn);
?>

