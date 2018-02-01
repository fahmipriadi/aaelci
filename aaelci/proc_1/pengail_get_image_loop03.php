<?php
ini_set('memory_limit','64M');

//error_reporting(-1);

//$Qry="select content,idpel,kode_img,no_img from cust_ail_img where idpel='$midpel' and kode_img ='$kdimg'  and no_img ='$noimg' ";

include "../data_akses/pengail_modul.php";

require_once('../../tcpdf/config/lang/eng.php');
require_once('../../tcpdf/tcpdf.php');

$midpel=$_GET['id_pel'];
$kdimg=$_GET['kode_img'];
$noimg=$_GET['no_img'];


//$Qry="select content,idpel,kode_img,no_img from cust_ail_img where idpel='$midpel' ";
$Qry="select rownum, a.content, a.kode_img, a.no_img, a.idpel
from  
( select content, kode_img, no_img, idpel 
  from cust_ail_img where idpel='161400145440' ) a
where ROWNUM <= 5";

	
echo $Qry;
echo "\r\n";
echo "<br>";

//exit;

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//konek db oracle
$cn=oci_connect($uid,$pwd,$dbs);
$stm=oci_parse($cn,$Qry);

//Buat menampilkan gambarnya
oci_execute($stm);
$cek=oci_fetch_array($stm,OCI_ASSOC+OCI_RETURN_NULLS);
if ($cek){
   $stm=oci_parse($cn,$Qry);
   oci_execute($stm);
   while ($brs=oci_fetch_array($stm,OCI_ASSOC+OCI_RETURN_NULLS)){
       //$pdf->AddPage();
       //$img=imagecreatefromstring($brs['CONTENT']->load());
	   //header('Content-Type: image/jpeg');
	//	imagejpeg($img);
	//	imagedestroy($img);
		
		$img=imagecreatefromstring($brs['CONTENT']->load());
		$suksesimg = "FALSE";
		//$img=@imagecreatefromstring($brs['CONTENT']->load());
		//$img = $brs['CONTENT']->load();
		$pjg = $brs['CONTENT']->size();
		
if ($img !== false)
{
		$suksesimg = "TRUE";
		imagedestroy($img);
}
		//$suksesimg=@img;
		//if (imagejpeg($img,"C:\xampp\htdocs\aaelci\tmpupload\anu.jpg")) {
		//		$suksesimg = "TRUE";
		//	}else{
		//		$suksesimg = "FALSE";
		//	};
		
		echo "IDPEL=".$brs['IDPEL']." , KODE_IMG=".$brs['KODE_IMG'].", NO_IMG=".$brs['NO_IMG']." img=".$suksesimg." pjg=".$pjg;
		echo "\r\n";
		echo "<br>";
		
		}
} else {
echo "<font size=6>Maaf, Image Dokumen tidak ditemukan</font>";
}

oci_close($cn);




?>