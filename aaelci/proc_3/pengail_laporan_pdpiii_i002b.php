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

$Qry="select * from v_ail_DIL where kodeup='$kdunit' and prd_lap='$prdlap' order by dayad desc";
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
$nmfile=$kdunit.'_pdp_iii_i_002b.xls';
$workbook->send($nmfile);

// Creating a worksheet
$nama_ws="PDP III.I-002b(".$prdlap.")";
$worksheet =& $workbook->addWorksheet($nama_ws);

$worksheet->insertBitmap(0,1,"../Images/logo_pln.bmp",1,1,0.8,0.7);

$worksheet->write(1, 2, 'PT PLN (PERSERO)',$format_header);
$worksheet->write(7, 1, 'KANTOR DISTRIBUSI',$format_header);
$worksheet->write(7, 4, ': JAWA BARAT DAN BANTEN',$format_header);
$worksheet->write(8, 1, 'AREA / RAYON',$format_header);
$worksheet->write(8, 4, $uunit,$format_header);
$worksheet->write(3, 1, 'KERTAS KERJA VERIFIKASI DIL DENGAN AIL',$format_judul);
$worksheet->write(4, 1, 'PDP III.I-002b',$format_judul);
$worksheet->write(11, 1, 'NO',$format);
$worksheet->write(11, 2, 'IDPEL DIL',$format);
$worksheet->write(11, 3, 'IDPEL AIL',$format);
$worksheet->write(11, 4, '');
$worksheet->write(11, 5, 'NAMA PLG DIL',$format);
$worksheet->write(11, 6, 'NAMA PLG AIL',$format);
$worksheet->write(12, 7, 'KDGOL DIL',$format);
$worksheet->write(12, 8, 'KDGOL AIL',$format);
$worksheet->write(12, 9, 'DAYA DIL',$format);
$worksheet->write(12, 10, 'DAYA AIL',$format);
$worksheet->write(12, 11, 'TARIF DIL',$format);
$worksheet->write(12, 12, 'TARIF AIL',$format);
$worksheet->write(12, 13, 'FX KWH DIL',$format);
$worksheet->write(12, 14, 'FX KWH AIL',$format);
$worksheet->write(12, 15, 'FX KVARH DIL',$format);
$worksheet->write(12, 16, 'FX KVARH AIL ',$format);
$worksheet->write(12, 17, 'TGL/JNS MUT DIL',$format);
$worksheet->write(12, 18, 'TGL/JNS MUT AIL',$format);
$worksheet->write(12, 19, 'SEWATRF DIL',$format);
$worksheet->write(12, 20, 'SEWATRF AIL',$format);
$worksheet->write(12, 21, 'FRT DIL',$format);
$worksheet->write(12, 22, 'FRT AIL',$format);
$worksheet->write(12, 23, '');
$worksheet->write(12, 24, '1',$format);
$worksheet->write(12, 25, '2',$format);
$worksheet->write(12, 26, '3',$format);
$worksheet->write(12, 27, '4',$format);
$worksheet->write(12, 28, '5',$format);
$worksheet->write(12, 29, '6',$format);
$worksheet->write(12, 30, '7',$format);
$worksheet->write(12, 31, '8',$format);
$worksheet->write(12, 32, '9',$format);
$worksheet->write(12, 33, '10',$format);
$worksheet->write(12, 34, 'KONDISI AIL',$format);
$worksheet->write(12, 35, 'KETERANGAN',$format);
$worksheet->write(12, 36, 'KONDISI AIL',$format);
$worksheet->write(12, 37, 'KETERANGAN',$format);
$worksheet->write(12, 38, '1',$format);
$worksheet->write(12, 39, '2',$format);
$worksheet->write(12, 40, '3',$format);
$worksheet->write(12, 41, '4',$format);
$worksheet->write(12, 42, '5',$format);
$worksheet->write(12, 43, '6',$format);
$worksheet->write(12, 44, '7',$format);



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
$worksheet->setColumn(2,3,15);
$worksheet->setColumn(4,4,0.25);
$worksheet->setColumn(5,6,30);
$worksheet->setColumn(7,22,15);
$worksheet->setColumn(23,23,0.25);
$worksheet->setColumn(24,33,8);
$worksheet->setColumn(34,37,18);
$worksheet->setColumn(38,44,8);


$tulis=array("x","x","x","x","x","x","x","x","x","x","x","x","x");

$num=12;
//while ($dt=odbc_fetch_into($stm,$data))
while ($data=oci_fetch_array($stm,OCI_BOTH))
{
$num=$num+1;

$c_nmplg=$data['C_NMPLG'];
$c_golpiutang=$data['C_GOLPIUTANG'];
$c_daya=$data['C_DAYA'];
$c_goltarif=$data['C_GOLTARIF'];
$c_fmkwh=$data['C_FMKWH'];
$c_fmkvarh=$data['C_FMKVARH'];
$c_mutasi=$data['C_MUTASI'];
$c_sewatrf=$data['C_SEWA_TRF'];
$c_frt=$data['C_FRT'];


if ($c_nmplg=="1"){$nmplg=$data['NMPLGD'];} else {$nmplg=$data['NMPLG'];}
if ($c_golpiutang=="1"){$golpiutang=$data['GOLPIUTANGD'];} else {$golpiutang=$data['GOLPIUTANG'];}
if ($c_daya=="1"){$daya=$data['DAYAD'];} else {$daya=$data['DAYA'];}
if ($c_goltarif=="1"){$goltarif=$data['GOLTARIFD'];} else {$goltarif=$data['GOLTARIF'];}
if ($c_fmkwh=="1"){$fmkwh=$data['FMKWHD'];} else {$fmkwh=$data['FMKWH'];}
if ($c_fmkvarh=="1"){$fmkvarh=$data['FMKVARH'];} else {$fmkvarh=$data['FMKVARH'];}
if ($c_mutasi=="1"){$mutasi=trim($data['JNS_MUTASID'])."/".$data['TGL_MUTASID'];} else {$mutasi=trim($data['JNS_MUTASI'])."/".$data['TGL_MUTASI'];}
if ($c_sewatrf=="1"){$sewatrf=$data['SEWA_TRFD'];} else {$sewatrf=$data['SEWA_TRF'];}
if ($c_frt=="1"){$frt=$data['FRTD'];} else {$frt=$data['FRT'];}


// The actual data
$worksheet->write($num,1,($num-12));
$worksheet->writeString($num,2,$data['IDPEL']);
$worksheet->writeString($num,3,$data['IDPEL']);
$worksheet->write($num,4,'');
$worksheet->writeString($num,5,$data['NMPLGD']);
$worksheet->writeString($num,6,$nmplg);
$worksheet->writeString($num,7,$data['GOLPIUTANGD'],$format);
$worksheet->writeString($num,8,$golpiutang,$format);
$worksheet->writeString($num,9,$data['DAYAD'],$format);
$worksheet->writeString($num,10,$daya,$format);
$worksheet->writeString($num,11,$data['GOLTARIFD'],$format);
$worksheet->writeString($num,12,$goltarif,$format);
$worksheet->writeString($num,13,$data['FMKWHD'],$format);
$worksheet->writeString($num,14,$fmkwh,$format);
$worksheet->writeString($num,15,$data['FMKVARHD'],$format);
$worksheet->writeString($num,16,$fmkvarh,$format);
$worksheet->writeString($num,17,trim($data['JNS_MUTASID'])."/".$data['TGL_MUTASID'],$format);
$worksheet->writeString($num,18,$mutasi,$format);
$worksheet->writeString($num,19,$data['SEWA_TRFD'],$format);
$worksheet->writeString($num,20,$sewatrf,$format);
$worksheet->writeString($num,21,$data['FRTD'],$format);
$worksheet->writeString($num,22,$frt,$format);

for ($i=21;$i<=30;$i++)
  {
  if ($data[$i]=="1") 
     $tulis[$i]='v';  
  else 
     $tulis[$i]='x';
  }

for ($j=21;$j<=30;$j++) 
  {
  $worksheet->writeString($num,$j+3,$tulis[$j],$format);
  }

$worksheet->writeString($num,34,$data['KONDISI_AIL'],$format);
$worksheet->writeString($num,35,$data['KETERANGAN'],$format);
$worksheet->writeString($num,36,$data['KONDISI_AIL'],$format);
$worksheet->writeString($num,37,$data['KETERANGAN'],$format);


for ($i=33;$i<=39;$i++)
  {
  if ($data[$i]=="1") 
     $tulis[$i]='v';  
  else 
     $tulis[$i]='x';
  }

for ($j=33;$j<=39;$j++) 
  {
  $worksheet->writeString($num,$j+5,$tulis[$j],$format);
  }









}

// Let's send the file
$workbook->close();



?>

