<?php
// created by Heru E Soemanto
// date : 27/02/2012
//===========================
$kdunit=$_POST['kdunit'];
$kdaya=$_POST['kdaya'];
$status=$_POST['status'];


session_start();
$kode_ap=$_SESSION['kode_ap'];
$uarea=$_SESSION['uarea'];
//$kode_ap='53CJR';
//$uarea='Cianjur';





include("../data_akses/pengail_modul.php");
//$cn=odbc_connect($cst,$uid,$pwd);
$cn=oci_connect($uid,$pwd,$dbs);

$Qry="select * from t_unit where kodeup='$kdunit' ";
//$stm=odbc_do($cn,$Qry);
$stm=oci_parse($cn,$Qry);
oci_execute($stm);

$hasil=oci_fetch_array($stm,OCI_BOTH);
$kdap=$hasil[1];
$uunit=strtoupper($uarea.' / '.$hasil[3]);

//$uunit=': CIANJUR / CIPANAS';
if ($status=="2"){
   $Qry="select * from v_ail_pengawasan where kodeup='$kdunit' and prd_plan='$kdaya' order by idpel ";
   } else {
   $Qry="select * from v_ail_pengawasan where kodeup='$kdunit' and prd_plan='$kdaya' and status='$status' order by idpel ";
   }
//$stm=odbc_do($cn,$Qry);
$stm=oci_parse($cn,$Qry);
oci_execute($stm);


require_once 'Spreadsheet/Excel/Writer.php';

// Creating a workbook
$workbook = new Spreadsheet_Excel_Writer();
$format=& $workbook->addFormat(array('Size'=>10,'Align'=>'center'));
$format->setTextWrap();
$format->setVAlign('vcenter');

$format_judul=& $workbook->addFormat(array('Size'=>18,'Align'=>'center','Bold'=>1));
$format_judul->setFontFamily('Arial Black');
$format_header=& $workbook->addFormat(array('Size'=>10,'Align'=>'left','Bold'=>1));
$format_header->setFontFamily('Arial Black');


// sending HTTP headers
$nmfile=$kdunit.'_'.$kdaya.'_pdp_v_ii_001.xls';
$workbook->send($nmfile);
$c_uupi=": "."JAWA BARAT DAN BANTEN";
//$c_uupi=": ".$_SESSION['upi'];

$c_uunit=": ".$uunit;
// Creating a worksheet
$nama_ws=$kdaya."_PDP V.II-001(".$status.")";
$worksheet =& $workbook->addWorksheet($nama_ws);

$worksheet->insertBitmap(0,1,"../Images/logo_pln.bmp",1,1,0.8,0.7);

$worksheet->write(1, 2, 'PT PLN (PERSERO)',$format_header);
$worksheet->write(3, 1, 'KERTAS KERJA PENGAWASAN PELAKSANAAN PROGRAM PEMBENAHAN DATA PELANGGAN',$format_judul);
$worksheet->write(4, 1, 'PDP V.II-001',$format_judul);
$worksheet->write(7, 1, 'KANTOR DISTRIBUSI',$format_header);
$worksheet->write(7, 4, $c_uupi,$format_header);
$worksheet->write(8, 1, 'AREA / RAYON',$format_header);
$worksheet->write(8, 4, $c_uunit,$format_header);
$worksheet->write(9, 1, 'PERIODE PEMBENAHAN DATA ',$format_header);
$worksheet->write(9, 4, ':',$format_header);

$worksheet->write(12, 1, 'NO',$format);
$worksheet->write(12, 2, 'DAFTAR PELANGGAN PROGRAM PEMBENAHAN DATA PELANGGAN',$format);
$worksheet->write(12, 6, 'PERUBAHAN DATA INDUK PELANGGAN (DIL)',$format);
$worksheet->write(12, 10, 'PENYESUAIAN DATA LAPANGAN',$format);

$worksheet->write(13, 2, 'IDPEL',$format);
$worksheet->write(13, 3, 'NAMA PELANGGAN',$format);
$worksheet->write(13, 4, 'PROGRAM PEMBENAHAN',$format);
$worksheet->write(12, 5, 'STATUS PELAKSANAAN',$format);
$worksheet->write(13, 6, 'JNS DATA DIRUBAH',$format);
$worksheet->write(13, 7, 'TGL PERUBAHAN',$format);
$worksheet->write(13, 8, 'DATA SEBLM RBH',$format);
$worksheet->write(13, 9, 'DATA SESUDAH RBH',$format);
$worksheet->write(13, 10, 'JNS PENYESUAIAN',$format);
$worksheet->write(13, 11, 'TGL PENYESUAIAN',$format);
$worksheet->write(13, 12, 'DATA SBLM PENY',$format);
$worksheet->write(13, 13, 'DATA SESUDAH PENY',$format);
$worksheet->write(12, 14, 'KETERANGAN',$format);

$worksheet->mergeCells(3,1,3,14);
$worksheet->mergeCells(4,1,4,14);
$worksheet->mergeCells(12,2,12,4);
$worksheet->mergeCells(12,5,13,5);
$worksheet->mergeCells(12,6,12,9);
$worksheet->mergeCells(12,10,12,13);
$worksheet->mergeCells(12,14,13,14);


$worksheet->setRow(13,30);
$worksheet->setColumn(0,0,3);
$worksheet->setColumn(1,1,11);
$worksheet->setColumn(2,2,15);
$worksheet->setColumn(3,3,30);
$worksheet->setColumn(4,4,15);
$worksheet->setColumn(5,5,30);
$worksheet->setColumn(5,13,15);
$worksheet->setColumn(14,14,40);



$num=13;
//while ($dt=odbc_fetch_into($stm,$data))
while ($data=oci_fetch_array($stm,OCI_BOTH))
{
$num=$num+1;
// The actual data

if ($data[3]=='1'){
   $c_status='Selesai';
   $c_pdp=' ';
   } else {
   $c_status='Dalam Pelaksanaan';
   $c_pdp="PDP3=".$data[4]." - PDP4=".$data[5];
   } 

   $worksheet->write($num,1,($num-13));
   $worksheet->writeString($num,2,$data[0]);
   $worksheet->writeString($num,3,$data[1]);
   $worksheet->writeString($num,4,$data[2],$format);
   $worksheet->writeString($num,5,$c_status,$format);
   $worksheet->writeString($num,14,$c_pdp,$format);
}

// Let's send the file
$workbook->close();



?>

