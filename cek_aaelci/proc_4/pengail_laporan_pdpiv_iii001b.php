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

$Qry="select * from v_ail_fisik where kodeup='$kdunit' and prd_lap='$prdlap' order by dayad desc";
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
$nmfile=$kdunit.'_pdp_iV_iii_001b.xls';
$workbook->send($nmfile);

// Creating a worksheet
$nama_ws="PDP IV.III-001b(".$prdlap.")";
$worksheet =& $workbook->addWorksheet($nama_ws);

$worksheet->insertBitmap(0,1,"../Images/logo_pln.bmp",1,1,0.8,0.7);

$worksheet->write(1, 2, 'PT PLN (PERSERO)',$format_header);
$worksheet->write(7, 1, 'KANTOR DISTRIBUSI',$format_header);
$worksheet->write(7, 4, ': '.$_SESSION['upi'],$format_header);
$worksheet->write(8, 1, 'AREA / RAYON',$format_header);
$worksheet->write(8, 4, $uunit,$format_header);
$worksheet->write(3, 1, 'KERTAS KERJA VERIFIKASI FISIK',$format_judul);
$worksheet->write(4, 1, 'PDP IV.III-001b',$format_judul);
$worksheet->write(11, 1, 'NO',$format);
$worksheet->write(11, 2, 'IDPEL ',$format);
$worksheet->write(11, 3, 'NAMA PELANGGAN',$format);
$worksheet->write(11, 4, '');
$worksheet->write(11, 5, 'GOLTARIF DIL',$format);
$worksheet->write(11, 6, 'DAYA DIL',$format);
$worksheet->write(12, 7, 'NO METER DIL',$format);
$worksheet->write(12, 8, 'MERK/TYPE METER DIL',$format);
$worksheet->write(12, 9, 'CT DIL',$format);
$worksheet->write(12, 10, 'PT DIL',$format);
$worksheet->write(12, 11, 'FX DIL',$format);
$worksheet->write(12, 12, 'GOLTARIF FISIK',$format);
$worksheet->write(12, 13, 'DAYA FISIK',$format);
$worksheet->write(12, 14, 'NO METER FISIK',$format);
$worksheet->write(12, 15, 'MERK/TYPE METER FISIK',$format);
$worksheet->write(12, 16, 'CT FISIK ',$format);
$worksheet->write(12, 17, 'PT FISIK',$format);
$worksheet->write(12, 18, 'FX FISIK',$format);
$worksheet->write(12, 19, 'KONDISI APP',$format);
$worksheet->write(12, 20, 'KONDISI PSG CT/PT',$format);
$worksheet->write(12, 21, 'KONDISI KUNCI GRD / SEGEL APP',$format);
$worksheet->write(12, 22, 'KONDISI PERAWATAN GRD',$format);
$worksheet->write(12, 23, 'TGL PRWT GRD',$format);
$worksheet->write(12, 24, '');
$worksheet->write(12, 25, 'R_CTP',$format);
$worksheet->write(12, 26, 'S_CTP',$format);
$worksheet->write(12, 27, 'T_CTP',$format);
$worksheet->write(12, 28, 'R_CTS',$format);
$worksheet->write(12, 29, 'S_CTS',$format);
$worksheet->write(12, 30, 'T_CTS',$format);
$worksheet->write(12, 31, 'R_PTS',$format);
$worksheet->write(12, 32, 'S_PTS',$format);
$worksheet->write(12, 33, 'T_PTS',$format);
$worksheet->write(12, 34, '1',$format);
$worksheet->write(12, 35, '2',$format);
$worksheet->write(12, 36, '3',$format);
$worksheet->write(12, 37, '4',$format);
$worksheet->write(12, 38, '5',$format);
$worksheet->write(12, 39, '6',$format);
$worksheet->write(12, 40, '7',$format);
$worksheet->write(12, 41, 'KETERANGAN',$format);
$worksheet->write(12, 42, 'USULAN PERBAIKAN',$format);



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
$worksheet->setColumn(2,2,15);
$worksheet->setColumn(3,3,35);
$worksheet->setColumn(4,4,0.25);
$worksheet->setColumn(5,18,15);
$worksheet->setColumn(19,22,30);
$worksheet->setColumn(23,23,15);
$worksheet->setColumn(24,24,0.25);
$worksheet->setColumn(25,33,12);
$worksheet->setColumn(34,40,8);
$worksheet->setColumn(41,42,30);


$tulis=array("x","x","x","x","x","x","x","x","x","x","x","x","x");

$num=12;
//while ($dt=odbc_fetch_into($stm,$data))
while ($data=oci_fetch_array($stm,OCI_BOTH))
{
$num=$num+1;

$c_goltarif=$data['C_GOLTARIF'];
$c_daya=$data['C_DAYA'];
$c_nometer=$data['C_NO_METER'];
$c_typemeter=$data['C_TYPE_METER'];
$c_ctp=$data['C_CT_P'];
$c_ptp=$data['C_PT_P'];
$c_fmkwh=$data['C_FMKWH'];

if ($c_goltarif=="1"){$goltarif=$data['GOLTARIFD'];} else {$goltarif=$data['GOLTARIF'];}
if ($c_daya=="1"){$daya=$data['DAYAD'];} else {$daya=$data['DAYA'];}
if ($c_nometer=="1"){$nometer=$data['NO_METERD'];} else {$nmplg=$data['NO_METER'];}
if ($c_typemeter=="1"){$meter=trim($data['MERK_METERD'])."/".$data['TYPE_METERD'];} else {$meter=trim($data['MERK_METER'])."/".$data['TYPE_METER'];}
if ($c_ctp=="1"){$ct=($data['CT_PD'])."/".$data['CT_SD'];} else {$ct=($data['CT_P'])."/".$data['CT_S'];}
if ($c_ptp=="1"){$pt=($data['PT_PD'])."/".$data['PT_SD'];} else {$ct=($data['PT_P'])."/".$data['PT_S'];}
if ($c_fmkwh=="1"){$fmkwh=$data['FMKWHD'];} else {$fmkwh=$data['FMKWH'];}


// The actual data
$worksheet->write($num,1,($num-12));
$worksheet->writeString($num,2,$data['IDPEL']);
$worksheet->writeString($num,3,$data['NMPLG']);
$worksheet->write($num,4,'');
$worksheet->writeString($num,5,$data['GOLTARIFD'],$format);
$worksheet->writeString($num,6,$data['DAYAD'],$format);
$worksheet->writeString($num,7,$data['NO_METERD'],$format);
$worksheet->writeString($num,8,($data['MERK_METERD']."/".$data['TYPE_METERD']),$format);
$worksheet->writeString($num,9,$data['CT_PD']."/".$data['CT_SD'],$format);
$worksheet->writeString($num,10,$data['PT_PD']."/".$data['PT_SD'],$format);
$worksheet->writeString($num,11,$data['FMKWHD'],$format);
$worksheet->writeString($num,12,$goltarif,$format);
$worksheet->writeString($num,13,$daya,$format);
$worksheet->writeString($num,14,$nometer,$format);
$worksheet->writeString($num,15,$meter['FMKVARHD'],$format);
$worksheet->writeString($num,16,$ct,$format);
$worksheet->writeString($num,17,$pt,$format);
$worksheet->writeString($num,18,$fmkwh,$format);
$worksheet->writeString($num,19,$data['KONDISI_APP'],$format);
$worksheet->writeString($num,20,$data['KONDISI_PSG'],$format);
$worksheet->writeString($num,21,$data['KONDISI_KUNCI'],$format);
$worksheet->writeString($num,22,$data['KONDIDI_GARDU'],$format);
$worksheet->writeString($num,23,$data['TGL_PERAWATAN'],$format);
$worksheet->writeString($num,25,$data['R_CT_P'],$format);
$worksheet->writeString($num,26,$data['S_CT_P'],$format);
$worksheet->writeString($num,27,$data['T_CT_P'],$format);
$worksheet->writeString($num,28,$data['R_CT_S'],$format);
$worksheet->writeString($num,29,$data['S_CT_S'],$format);
$worksheet->writeString($num,30,$data['T_CT_S'],$format);
$worksheet->writeString($num,31,$data['R_PT'],$format);
$worksheet->writeString($num,32,$data['S_PT'],$format);
$worksheet->writeString($num,33,$data['T_PT'],$format);

for ($i=36;$i<=42;$i++)
  {
  if ($data[$i]=="1") 
     $tulis[$i]='v';  
  else 
     $tulis[$i]='x';
  }

for ($j=36;$j<=42;$j++) 
  {
  $worksheet->writeString($num,$j-2,$tulis[$j],$format);
  }

$worksheet->writeString($num,41,$data['KETERANGAN'],$format);
$worksheet->writeString($num,42,$data['USUL'],$format);








}

// Let's send the file
$workbook->close();



?>

