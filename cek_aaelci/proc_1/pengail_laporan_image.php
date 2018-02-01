<?php
// created by Heru E Soemanto
// date : 27/02/2012
//===========================
$kdunit=$_POST['kdunit'];
$lemari=$_POST['lemari'];
$rak=$_POST['rak'];
$brs=substr($rak,0,2);
$klm=substr($rak,3,2);
$prdlap=$lemari."-".$brs."-".$klm;
session_start();
$kode_ap=$_SESSION['kode_ap'];
$uarea=$_SESSION['uarea'];

include("../data_akses/pengail_modul.php");
//$cn=odbc_connect($cst,$uid,$pwd);
$cn=oci_connect($uid,$pwd,$dbs);

$Qry="select * from t_unit where kodeup='$kdunit' ";
//$stm=odbc_do($cn,$Qry);
$stm=oci_parse($cn,$Qry);
oci_execute($stm);

$hasil=oci_fetch_array($stm,OCI_BOTH);
$kdap=$hasil[1];
$uunit=strtoupper(': '.$uarea.' / '.$hasil[3]);

//$uunit=': CIANJUR / CIPANAS';

$Qry="select * from v_ail_img_posisi where ail_rayon='$kdunit' and ail_lemari='$lemari' 
and ail_baris='$brs' and ail_kolom='$klm' order by ail_rayon,ail_lemari,ail_baris,ail_kolom,ail_nomor";
//$stm=odbc_do($cn,$Qry);
$stm=oci_parse($cn,$Qry);
oci_execute($stm);


require_once 'Spreadsheet/Excel/Writer.php';

// Creating a workbook
$workbook = new Spreadsheet_Excel_Writer();
$format=& $workbook->addFormat(array('Size'=>10,'Align'=>'center'));
$format_judul=& $workbook->addFormat(array('Size'=>18,'Align'=>'center','Bold'=>1));
$format_judul->setFontFamily('Arial Black');
$format_header=& $workbook->addFormat(array('Size'=>10,'Align'=>'left','Bold'=>1));
$format_header->setFontFamily('Arial Black');


// sending HTTP headers
$nmfile=$kdunit.'_pdp_i_Add_001.xls';
$workbook->send($nmfile);

// Creating a worksheet
$nama_ws="PDP I.II-002(".$prdlap.")";
$worksheet =& $workbook->addWorksheet($nama_ws);

$worksheet->insertBitmap(0,1,"../Images/logo_pln.bmp",1,1,0.8,0.7);

$worksheet->write(1, 2, 'PT PLN (PERSERO)',$format_header);
$worksheet->write(7, 1, 'KANTOR DISTRIBUSI',$format_header);
$worksheet->write(7, 4, ': JAWA BARAT DAN BANTEN',$format_header);
$worksheet->write(8, 1, 'AREA / RAYON',$format_header);
$worksheet->write(8, 4, $uunit,$format_header);
$worksheet->write(3, 1, 'DAFTAR AIL SUDAH DI-SCAN',$format_judul);
$worksheet->write(4, 1, '(PDP I Add-001)',$format_judul);
$worksheet->write(11, 1, 'NO',$format);
$worksheet->write(11, 2, 'IDPEL',$format);
$worksheet->write(11, 3, 'NAMA PELANGGAN',$format);
$worksheet->write(11, 4, '');
$worksheet->write(11, 5, 'LEMARI',$format);
$worksheet->write(11, 6, 'BARIS',$format);
$worksheet->write(11, 7, 'KOLOM',$format);
$worksheet->write(11, 8, 'NOMOR',$format);
$worksheet->write(12, 9, 'LBR DOK',$format);
//$worksheet->write(12, 10, 'JAWABAN PERSETUJUAN',$format);
//$worksheet->write(12, 11, 'SPJBTL',$format);
//$worksheet->write(12, 12, 'SUPLEMEN SPJBTL',$format);
//$worksheet->write(12, 13, 'SERTIFIKAT LAIK OPERASI',$format);
//$worksheet->write(12, 14, 'KUITANSI PEMBAYARAN BP DAN UJL',$format);
//$worksheet->write(12, 15, 'TUL I-09',$format);
//$worksheet->write(12, 16, 'TUL I-10',$format);
//$worksheet->write(12, 17, 'LAIN-LAIN',$format);
//$worksheet->write(12, 18, '');
//$worksheet->write(12, 19, 'KETERANGAN',$format);

$worksheet->mergeCells(3,1,3,8);
$worksheet->mergeCells(4,1,4,8);
$worksheet->mergeCells(7,1,7,3);
$worksheet->mergeCells(8,1,8,3);
$worksheet->mergeCells(11,1,12,1);
$worksheet->mergeCells(11,2,12,2);
$worksheet->mergeCells(11,3,12,3);
$worksheet->mergeCells(11,5,12,5);
$worksheet->mergeCells(11,6,12,6);
$worksheet->mergeCells(11,7,12,7);
$worksheet->mergeCells(11,8,12,8);



$worksheet->setColumn(0,0,3);
$worksheet->setColumn(1,1,11);
$worksheet->setColumn(2,2,15);
$worksheet->setColumn(3,3,30);
$worksheet->setColumn(4,4,0.25);
$worksheet->setColumn(5,9,10);

//$tulis=array("x","x","x","x","x","x","x","x","x","x","x","x","x");
$tulis=array("x","x","x","x");

$num=12;
//while ($dt=odbc_fetch_into($stm,$data))
while ($data=oci_fetch_array($stm,OCI_BOTH))
{
$num=$num+1;
// The actual data


$worksheet->write($num,1,($num-12));
$worksheet->writeString($num,2,$data[0]);
$worksheet->writeString($num,3,$data[9]);
$worksheet->write($num,4,'');
$worksheet->writeString($num,5,$data[4],$format);
$worksheet->writeString($num,6,$data[5],$format);
$worksheet->writeString($num,7,$data[6],$format);
$worksheet->writeString($num,8,$data[7],$format);
$worksheet->writeString($num,9,$data[8],$format);


}

// Let's send the file
$workbook->close();



?>

