<?php

//$Qry="select content,idpel,kode_img,no_img from cust_ail_img where idpel='$midpel' and kode_img ='$kdimg'  and no_img ='$noimg' ";


//ini untuk membaca argument dari command line
if (!empty($argv[1])) {
  parse_str($argv[1], $_GET);
}

include "../data_akses/pengail_modul.php";

require_once('../../tcpdf/config/lang/eng.php');
require_once('../../tcpdf/tcpdf.php');

$midpel=$_GET['id_pel'];
$kdimg=$_GET['kode_img'];
$noimg=$_GET['no_img'];

$myfile = fopen(date('Y-m-d_H_i_s')."cek_loop_gambar.txt", "w") or die("Unable to open file!");

//$Qry="select content,idpel,kode_img,no_img from cust_ail_img where idpel='$midpel' ";

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
		
		//$img=imagecreatefromstring($brs['CONTENT']->load());
		$suksesimg = "FALSE";
		$img=@imagecreatefromstring($brs['CONTENT']->load());
$hasilnya = '';
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
		
		//echo "IDPEL=".$brs['IDPEL']." , KODE_IMG=".$brs['KODE_IMG'].", NO_IMG=".$brs['NO_IMG']." img=".$suksesimg;
		//echo "\r\n";
		//echo "<br>";
		$hasilnya = $hasilnya . "IDPEL=".$brs['IDPEL']." , KODE_IMG=".$brs['KODE_IMG'].", NO_IMG=".$brs['NO_IMG']." img=".$suksesimg;
		$hasilnya = $hasilnya .  "\r\n";
		$hasilnya = $hasilnya .  "<br>";
		//echo $hasilnya;
		fwrite($myfile, $hasilnya);
		}
} else {
echo "<font size=6>Maaf, Image Dokumen tidak ditemukan</font>";
}

fclose($myfile);
oci_close($cn);




?>