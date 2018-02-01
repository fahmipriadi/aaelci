<?php
	require_once 'Spreadsheet/Excel/Writer.php';
	include("../data_akses/pengail_modul.php");
// Creating a workbook
$workbook = new Spreadsheet_Excel_Writer();
$format=& $workbook->addFormat(array('Size'=>10,'Align'=>'center'));
$format1=& $workbook->addFormat(array('Size'=>10,'Align'=>'right'));
$format_judul=& $workbook->addFormat(array('Size'=>18,'Align'=>'center','Bold'=>1));
$format_judul->setFontFamily('Arial Black');
$format_header=& $workbook->addFormat(array('Size'=>10,'Align'=>'left','Bold'=>1));
$format_header->setFontFamily('Arial Black');
// sending HTTP headers
$nmfile='Pelanggan_belum_scan.xlsx';
$workbook->send($nmfile);
// Creating a worksheet
$worksheet =& $workbook->addWorksheet('Pelanggan_belum_scan');

$worksheet->setColumn(0,0,3);
$worksheet->setColumn(1,1,10);
$worksheet->setColumn(2,2,15);
$worksheet->setColumn(3,3,10);
$worksheet->setColumn(4,4,0.25);
$worksheet->setColumn(5,17,18);
$worksheet->setColumn(18,18,0.25);
$worksheet->setColumn(19,19,41);


$worksheet->insertBitmap(0,1,"../Images/logo_pln.bmp",1,1,0.8,0.7);

$worksheet->write(1, 2, 'PT PLN (PERSERO)',$format_header);
$worksheet->write(7, 1, 'KANTOR DISTRIBUSI',$format_header);
$worksheet->write(7, 4, ': JAWA BARAT DAN BANTEN',$format_header);
$worksheet->write(8, 1, 'AREA ',$format_header);
$worksheet->write(8, 4, $uunit,$format_header);
$worksheet->write(3, 1, 'PELANGGAN BELUM SCAN',$format_judul);
$worksheet->write(4, 1, 'Pelanggan belum scan',$format_judul);
$worksheet->write(11, 1, 'NO ',$format);
$worksheet->write(11, 2, 'ID PEL',$format);
$worksheet->write(11, 3, 'NAMA PELANGGAN',$format);
$worksheet->write(11, 4, 'ALAMAT PELANGGAN');
$worksheet->write(11, 5, 'KODE UP',$format);
$worksheet->write(11, 6, 'GOL TARIF',$format);
$worksheet->write(12, 7, 'DAYA',$format);
$worksheet->write(12, 8, 'STATUS PELANGGAN',$format);
$worksheet->write(12, 9, 'JENIS MUTASI',$format);
$worksheet->write(12, 10, 'THN BLN MUTASI',$format);

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

$num=12;

$cn=oci_connect($uid,$pwd,$dbs);
//$Qry="select * from v_ail_daya_rekap order by daya desc";
$Qry="select idpel, nmplg, alamatplg, kodeup, goltarif, daya, statusplg, jenis_mutasi, thblmut from dil
	where kodeup = $kodeup
	and idpel in( select idpel from cust_ail where tgl_update is null) 
	order by kodeup, statusplg, daya desc ";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);

$num=0;
while ($data=oci_fetch_array($stm,OCI_BOTH))
{
$num=$num+1;
// The actual data

$worksheet->write($num,1,($num-12));
$worksheet->writeString($num,2,$data[16]);
$worksheet->write($num,3,$data[2]);
$worksheet->write($num,4,'');
for ($j=4;$j<=16;$j++) 
  {
  $worksheet->writeString($num,$j+1,$data[$j-1],$format1);
  }

}

// Let's send the file
$workbook->close();
?>