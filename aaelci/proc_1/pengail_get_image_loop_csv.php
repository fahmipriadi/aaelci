<?php
ini_set('memory_limit','64M');

//$Qry="select content,idpel,kode_img,no_img from cust_ail_img where idpel='$midpel' and kode_img ='$kdimg'  and no_img ='$noimg' ";


//ini untuk membaca argument dari command line
//if (!empty($argv[1])) {
  //parse_str($argv[1], $_GET);}

include "../data_akses/pengail_modul.php";

require_once('../../tcpdf/config/lang/eng.php');
require_once('../../tcpdf/tcpdf.php');

$midpel=$_GET['id_pel'];
$kdimg=$_GET['kode_img'];
$noimg=$_GET['no_img'];

$myfile = fopen(date('Y-m-d_H_i_s')."cek_loop_gambar.csv", "w") or die("Unable to open file!");

//$Qry="select content,idpel,kode_img,no_img from cust_ail_img where idpel='$midpel' ";
//$Qry="select content,idpel,kode_img,no_img from cust_ail_img where idpel='161400145440' ";
//$Qry="select content,idpel,kode_img,no_img from cust_ail_img where rownum <= 10";

$Qry="SELECT * FROM (
	SELECT 
	CUST_AIL_IMG.* ,
	IMG_TELAH_DI_CEK.CEK
	FROM CUST_AIL_IMG
	LEFT JOIN IMG_TELAH_DI_CEK ON 
	CUST_AIL_IMG.IDPEL = IMG_TELAH_DI_CEK.IDPEL AND
	CUST_AIL_IMG.NO_IMG = IMG_TELAH_DI_CEK.NO_IMG AND
	CUST_AIL_IMG.KODE_IMG = IMG_TELAH_DI_CEK.KODE_IMG
	)
	WHERE CEK IS NULL
	AND ROWNUM <100";	
	
$Qry="select cust_ail_img.idpel, img_telah_di_cek.idpel ,cust_ail_img.nmfile, img_telah_di_cek.validkah
	  from cust_ail_img left join img_telah_di_cek 
	on CUST_AIL_IMG.IDPEL = IMG_TELAH_DI_CEK.IDPEL AND
    CUST_AIL_IMG.NO_IMG = IMG_TELAH_DI_CEK.NO_IMG AND
    CUST_AIL_IMG.KODE_IMG = IMG_TELAH_DI_CEK.KODE_IMG 
    where validkah <> 1";

	//select NMFILE, VALIDKAH from cust_ail_img join img_telah_di_cek on cust_ail_img.idpel = img_telah_di_cek.idpel where validkah = 0
echo $Qry;
echo "\r\n";
echo "<br>";

//exit;

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
   
        $hasilnya = '';

		//$suksesimg=@img;
		//if (imagejpeg($img,"C:\xampp\htdocs\aaelci\tmpupload\anu.jpg")) {
		//		$suksesimg = "TRUE";
		//	}else{
		//	$suksesimg = "FALSE";
		//	};
		//echo "IDPEL=".$brs['IDPEL']." , KODE_IMG=".$brs['KODE_IMG'].", NO_IMG=".$brs['NO_IMG']." img=".$suksesimg;
		//echo "\r\n";
		//echo "<br>";
		$Qry02="INSERT INTO IMG_TELAH_DI_CEK (IDPEL, KODE_IMG, NO_IMG, VALIDKAH) VALUES ('".$brs['IDPEL']."','".$brs['KODE_IMG']."','".$brs['NO_IMG']."','".$suksesimg."')";
		//$head="IDPEL,KODE_IMG,NO_IMG\n";
		$csv=" ".$brs['IDPEL'].",".$brs['NMFILE'].",".$brs['NO_IMG'].", ";
		$hasilnya = $hasilnya . $csv;
		//$hasilnya = $hasilnya . "IDPEL=".$brs['IDPEL']." , KODE_IMG=".$brs['KODE_IMG'].", NO_IMG=".$brs['NO_IMG']." img=".$suksesimg;
		$hasilnya = $hasilnya .  "\r\n";
		//$hasilnya = $hasilnya .  "<br>";
		//echo $hasilnya;
		//$output = $head . $hasilnya;
		fwrite($myfile, $hasilnya);
	}	
	
} else {
echo "<font size=6>Maaf, Image Dokumen tidak ditemukan</font>";
}

fclose($myfile);
oci_close($cn);

?>