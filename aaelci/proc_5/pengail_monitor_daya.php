<?php
// created by Heru E Soemanto
// date : 27/02/2012
// revision : 1
// date : 27/05/2013
// content : tambahan informasi tgl PDP1-PDP5
//============================================
$kdunit=$_POST['kdunit'];
$kdaya=$_POST['kdaya'];
$m_nama=strtoupper($_POST['m_nama']);
$m_daya=$_POST['m_daya'];
$m_gardu=strtoupper($_POST['m_gardu']);
$mgardu=substr($m_gardu,0,4);
$mtiang=substr($m_gardu,5,24);

$prdlap=$kdaya;
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

$Qry="select * from v_ail_rak_12345 where kodeup='$kdunit' 
and prd_plan='$kdaya' ";

if (strlen(trim($m_daya))>0){
$Qry=$Qry." and daya=$m_daya ";
}

if (strlen(trim($m_nama))>0){
$Qry=$Qry." and nmplg like '%$m_nama%' ";
}

if (strlen(trim($mgardu))>0){
$Qry=$Qry." and nama_gardu like '%$mgardu%' ";
}


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
$nmfile=$kdunit.'_monitor_progres_'.$kdaya.'-'.$m_nama.'-'.$m_daya.'-'.$m_gardu.'.xls';
//$kdunit.'_monitor_progres_'.$kdaya.$m_nama.$m_gardu.'.xls';
$workbook->send($nmfile);

// Creating a worksheet
$nama_ws="Monitoring PDP1-PDP5(".$prdlap.")";
$worksheet =& $workbook->addWorksheet($nama_ws);

$worksheet->insertBitmap(0,1,"../Images/logo_pln.bmp",1,1,0.8,0.7);

$worksheet->write(1, 2, 'PT PLN (PERSERO)',$format_header);
$worksheet->write(7, 1, 'KANTOR DISTRIBUSI',$format_header);
$worksheet->write(7, 4, ': JAWA BARAT DAN BANTEN',$format_header);
$worksheet->write(8, 1, 'AREA / RAYON',$format_header);
$worksheet->write(8, 4, $uunit,$format_header);
$worksheet->write(3, 1, 'MONITOR PROGRES PEMBENAHAN DATA PELANGGAN ',$format_judul);
$worksheet->write(4, 1, 'PDP1 - PDP5',$format_judul);
$worksheet->write(11, 1, 'NO',$format);
$worksheet->write(11, 2, 'IDPEL',$format);
$worksheet->write(11, 3, 'NAMA PELANGGAN',$format);
$worksheet->write(11, 4, '');
$worksheet->write(11, 5, 'LEMARI',$format);
$worksheet->write(11, 6, 'BARIS',$format);
$worksheet->write(11, 7, 'KOLOM',$format);
$worksheet->write(11, 8, 'NOMOR',$format);
$worksheet->write(11, 9, 'TGL_PDP1',$format);
$worksheet->write(11, 10, 'TGL_PDP2',$format);
$worksheet->write(11, 11, 'TGL_PDP3',$format);
$worksheet->write(11, 12, 'TGL_PDP4',$format);
$worksheet->write(11, 13, 'TGL_PDP5',$format);
$worksheet->write(11, 14, 'KLP_DAYA',$format);
$worksheet->write(11, 15, 'DAYA',$format);
$worksheet->write(11, 16, 'GARDU',$format);
$worksheet->write(11, 17, 'NO_TIANG',$format);
//$worksheet->write(12, 17, 'TUL I-10',$format);
//$worksheet->write(12, 17, 'LAIN-LAIN',$format);
//$worksheet->write(12, 18, '');
//$worksheet->write(12, 19, 'KETERANGAN',$format);

$worksheet->mergeCells(3,1,3,13);
$worksheet->mergeCells(4,1,4,13);
$worksheet->mergeCells(7,1,7,3);
$worksheet->mergeCells(8,1,8,3);
$worksheet->mergeCells(11,1,12,1);
$worksheet->mergeCells(11,2,12,2);
$worksheet->mergeCells(11,3,12,3);
$worksheet->mergeCells(11,5,12,5);
$worksheet->mergeCells(11,6,12,6);
$worksheet->mergeCells(11,7,12,7);
$worksheet->mergeCells(11,8,12,8);
$worksheet->mergeCells(11,9,12,9);
$worksheet->mergeCells(11,10,12,10);
$worksheet->mergeCells(11,11,12,11);
$worksheet->mergeCells(11,12,12,12);
$worksheet->mergeCells(11,13,12,13);
$worksheet->mergeCells(11,14,12,14);
$worksheet->mergeCells(11,15,12,15);
$worksheet->mergeCells(11,16,12,16);
$worksheet->mergeCells(11,17,12,17);



$worksheet->setColumn(0,0,3);
$worksheet->setColumn(1,1,11);
$worksheet->setColumn(2,2,15);
$worksheet->setColumn(3,3,30);
$worksheet->setColumn(4,4,0.25);
$worksheet->setColumn(5,16,13);
$worksheet->setColumn(16,17,30);

//$tulis=array("x","x","x","x","x","x","x","x","x","x","x","x","x");
$tulis=array("x","x","x","x");

$num=12;
//while ($dt=odbc_fetch_into($stm,$data))
while ($data=oci_fetch_array($stm,OCI_BOTH))
{
$num=$num+1;
// The actual data


$worksheet->write($num,1,($num-12));
$worksheet->writeString($num,2,$data[2]);
$worksheet->writeString($num,3,$data[3]);
$worksheet->write($num,4,'');
$worksheet->writeString($num,5,$data[4],$format);
$worksheet->writeString($num,6,$data[5],$format);
$worksheet->writeString($num,7,$data[6],$format);
$worksheet->writeString($num,8,$data[7],$format);
$worksheet->writeString($num,9,$data[8],$format);
$worksheet->writeString($num,10,$data[11],$format);
$worksheet->writeString($num,11,$data[12],$format);
$worksheet->writeString($num,12,$data[13],$format);
$worksheet->writeString($num,13,$data[14],$format);
$worksheet->writeString($num,14,$data[15],$format);
$worksheet->writeString($num,15,$data[1],$format);
$worksheet->writeString($num,16,$data[16],$format);
$worksheet->writeString($num,17,$data[17],$format);


}

// Let's send the file
$workbook->close();



?>

