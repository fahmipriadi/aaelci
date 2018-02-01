<?php
require_once('../../tcpdf/config/lang/eng.php');
require_once('../../tcpdf/tcpdf.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$mkode=$_GET['mkode'];
$midpel=substr($mkode,0,12);
$mkd=substr($mkode,12,2);
$mno=substr($mkode,14,3);


  $Qry="select content from cust_ail_img where idpel='$midpel' and kode_img='$mkd' and no_img='$mno' ";
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

