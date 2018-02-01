<?php

$midpel=$_GET['id_pel'];
$kdimg=$_GET['kode_img'];
$noimg=$_GET['no_img'];

$Qry="select content from cust_ail_img where idpel='$midpel' and kode_img ='$kdimg'  and no_img ='$noimg' ";

include "../data_akses/pengail_modul.php";

require_once('../../tcpdf/config/lang/eng.php');
require_once('../../tcpdf/tcpdf.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//konek db oracle
$cn=oci_connect($uid,$pwd,$dbs);
$stm=oci_parse($cn,$Qry);

//Buat menampilkan gambarnya
oci_execute($stm);
$cek=$brs=oci_fetch_array($stm,OCI_ASSOC+OCI_RETURN_NULLS);
if ($cek){
   $stm=oci_parse($cn,$Qry);
   oci_execute($stm);
   while ($brs=oci_fetch_array($stm,OCI_ASSOC+OCI_RETURN_NULLS)){
       $pdf->AddPage();
       $img=imagecreatefromstring($brs['CONTENT']->load());
	   header('Content-Type: image/jpeg');
		imagejpeg($img);
		imagedestroy($img);
       }
} else {
echo "<font size=6>Maaf, Image Dokumen tidak ditemukan</font>";
}

oci_close($cn);
?>

