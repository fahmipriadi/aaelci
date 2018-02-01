<?php
// created by Heru E Soemanto
// date : 27/02/2012
//===========================
$kdunit=$_POST['kdunit'];
$prdlap=$_POST['prdlap'];
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

$Qry="select * from v_ail_prioritas where kodeup='$kdunit' and prd_lap='$prdlap' order by daya desc";
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
$nmfile=$kdunit.'_pdp_ii_i_001.xls';
$workbook->send($nmfile);

// Creating a worksheet
$nama_ws="PDP II.I-001(".$prdlap.")";
$worksheet =& $workbook->addWorksheet($nama_ws);

$worksheet->insertBitmap(0,1,"../Images/logo_pln.bmp",1,1,0.8,0.7);

$worksheet->write(1, 2, 'PT PLN (PERSERO)',$format_header);
$worksheet->write(7, 1, 'KANTOR DISTRIBUSI',$format_header);
$worksheet->write(7, 4, ': JAWA BARAT DAN BANTEN',$format_header);
$worksheet->write(8, 1, 'AREA / RAYON',$format_header);
$worksheet->write(8, 4, $uunit,$format_header);
$worksheet->write(3, 1, 'KERTAS KERJA ANALISIS DATA PELANGGAN DAN PENETAPAN PRIORITAS',$format_judul);
$worksheet->write(4, 1, 'PDP II.I-001',$format_judul);
$worksheet->write(11, 1, 'NO',$format);
$worksheet->write(11, 2, 'ID PELANGGAN',$format);
$worksheet->write(11, 3, 'NAMA PELANGGAN',$format);
$worksheet->write(11, 4, '');
$worksheet->write(11, 5, 'GOL_TARIF',$format);
$worksheet->write(11, 6, 'NILAI TAGIHAN',$format);
$worksheet->write(12, 7, 'PROSENTASE TAG',$format);
$worksheet->write(12, 8, 'DAYA (VA)',$format);
$worksheet->write(12, 9, 'KODE GOL',$format);
$worksheet->write(12, 10, 'NILAI CT',$format);
$worksheet->write(12, 11, 'STANDAR CT',$format);
$worksheet->write(12, 12, 'TRAFO TEGANGAN',$format);
$worksheet->write(12, 13, 'FAKTOR KALI KWH',$format);
$worksheet->write(12, 14, 'FAKTOR KALI KVARH',$format);
$worksheet->write(12, 15, 'TGL PERIKSA',$format);
$worksheet->write(12, 16, 'JARAK S.D. KINI',$format);
$worksheet->write(12, 17, 'KEBERADAAN AIL',$format);
$worksheet->write(12, 18, '');
$worksheet->write(12, 19, '1',$format);
$worksheet->write(12, 20, '2',$format);
$worksheet->write(12, 21, '3',$format);
$worksheet->write(12, 22, '4',$format);
$worksheet->write(12, 23, '5',$format);
$worksheet->write(12, 24, 'JML KETIDAKSAMAAN',$format);
$worksheet->write(12, 25, 'PERTIMBANGAN',$format);



$worksheet->mergeCells(3,1,3,19);
$worksheet->mergeCells(4,1,4,19);
$worksheet->mergeCells(7,1,7,3);
$worksheet->mergeCells(8,1,8,3);
$worksheet->mergeCells(11,1,12,1);
$worksheet->mergeCells(11,2,12,2);
$worksheet->mergeCells(11,3,12,3);
$worksheet->mergeCells(11,5,12,5);
$worksheet->mergeCells(11,6,12,6);
$worksheet->mergeCells(11,7,11,17);



$worksheet->setColumn(0,0,3);
$worksheet->setColumn(1,1,11);
$worksheet->setColumn(2,2,21);
$worksheet->setColumn(3,3,39);
$worksheet->setColumn(4,4,0.25);
$worksheet->setColumn(5,17,18);
$worksheet->setColumn(18,18,0.25);
$worksheet->setColumn(19,23,8);
$worksheet->setColumn(24,24,18);
$worksheet->setColumn(25,25,35);


$tulis=array("x","x","x","x","x","x","x","x","x","x","x","x","x");
$num=12;
//while ($dt=odbc_fetch_into($stm,$data))
while ($data=oci_fetch_array($stm,OCI_BOTH))
{
$num=$num+1;

$daya=$data['DAYA'];
$fx_meter=$data['FMKWH'];
  if ($daya>=41500){
    if ($fx_meter>=400){
    $ctp=($fx_meter/200)*5;
    $ct=$ctp."/5";
    $pt="20000/100";
    } else {
    $ctp=$fx_meter*5;
    $ct=$ctp."/5";  
    $pt="-";
    }
  } else {
  $ct="-";
  $pt="-";
  }

$ail=$data['KD_AIL'];
  if ($ail=='1'){
  $kdail='Ada';
  } else {
  $kdail='Tidak Ada';
  }


// The actual data
$worksheet->write($num,1,($num-12));
$worksheet->writeString($num,2,$data['IDPEL']);
$worksheet->writeString($num,3,$data['NMPLG']);
$worksheet->write($num,4,'');
$worksheet->writeString($num,5,$data['GOLTARIF'],$format);
$worksheet->writeString($num,6,$data['TAGIHAN'],$format);
$worksheet->writeString($num,7,$data['PERSEN'],$format);
$worksheet->writeString($num,8,$data['DAYA'],$format);
$worksheet->writeString($num,9,$data['GOLPIUTANG'],$format);
$worksheet->writeString($num,10,$ct,$format);
$worksheet->writeString($num,12,$pt,$format);
$worksheet->writeString($num,13,$data['FMKWH'],$format);
$worksheet->writeString($num,14,$data['FMKWH'],$format);
$worksheet->writeString($num,15,$data['TGL_PERIKSA'],$format);
$worksheet->writeString($num,17,$kdail,$format);
$worksheet->writeString($num,19,$data['KRITERIA_1'],$format);
$worksheet->writeString($num,20,$data['KRITERIA_2'],$format);
$worksheet->writeString($num,21,$data['KRITERIA_3'],$format);
$worksheet->writeString($num,22,$data['KRITERIA_4'],$format);
$worksheet->writeString($num,23,$data['KRITERIA_5'],$format);
$worksheet->writeString($num,24,$data['KETIDAKSAMAAN'],$format);
$worksheet->writeString($num,25,$data['PERTIMBANGAN'],$format);


}

// Let's send the file
$workbook->close();



?>

