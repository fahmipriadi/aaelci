<?php
require_once('../../tcpdf/config/lang/eng.php');
require_once('../../tcpdf/tcpdf.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$midpel=$_POST['id_pel'];
$perm=$_POST['perm'];
$iden=$_POST['iden'];
$surv=$_POST['surv'];
$sjps=$_POST['sjps'];
$spj=$_POST['spj'];
$sspj=$_POST['sspj'];
$slo=$_POST['slo'];
$kuit=$_POST['kuit'];
$pk=$_POST['pk'];
$ba=$_POST['ba'];
$lain=$_POST['lain'];
$pdl=$_POST['pdl'];


switch ("Lihat Dokumen"){
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

}



include "../data_akses/pengail_modul.php";
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

