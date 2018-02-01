<?php
include "../data_akses/pengail_modul.php";
$kdrekap=$_POST['kdrekap'];
$kdsubmit=$_POST['submit'];
$kdexcel=$_POST['Excel'];

session_start();
$kode_ap=$_SESSION['kode_ap'];
$uarea=$_SESSION['uarea'];

//echo $kode_ap;
//echo $uarea;

$uunit=strtoupper(': '.$uarea);

$cn=oci_connect($uid,$pwd,$dbs);

switch ($kdrekap){
  case "total";
	$Qry="select * from v_ail_rayon_rekap where kode_ap='$kode_ap' order by rayon";
	break;
  case "tanggal";
	$Qry="select * from v_ail_tgl_rayon  where kode_ap='$kode_ap' order by tgl_update desc";
	break;
  case "periode";
	$Qry="select * from v_ail_prd_rayon  where kode_ap='$kode_ap' order by prd_lap desc";
	break;
  case "rayontgl";
	$Qry="select * from v_ail_tgl_rekap  where kode_ap='$kode_ap' ";
	break;
  case "rayonprd";
	$Qry="select * from v_ail_prd_lap  where kode_ap='$kode_ap'";
	break;
}
     
$sql=oci_parse($cn,$Qry);
oci_execute($sql);

if ($kdsubmit=='Submit'){
echo "<table border=1 width=100%>\n";
while ($data=oci_fetch_array($sql,OCI_BOTH))
{
echo "<td width=15% align=\"CENTER\"><font size=2>$data[16]</font></td>\n";
echo "<td width=5% align=\"RIGHT\"><font size=2>$data[2]</font></td>\n";
echo "<td width=5% align=\"RIGHT\"><font size=2>$data[3]</font></td>\n";
echo "<td width=5% align=\"RIGHT\"><font size=2>$data[4]</font></td>\n";
echo "<td width=5% align=\"RIGHT\"><font size=2>$data[5]</font></td>\n";
echo "<td width=5% align=\"RIGHT\"><font size=2>$data[6]</font></td>\n";
echo "<td width=5% align=\"RIGHT\"><font size=2>$data[7]</font></td>\n";
echo "<td width=5% align=\"RIGHT\"><font size=2>$data[8]</font></td>\n";
echo "<td width=5% align=\"RIGHT\"><font size=2>$data[9]</font></td>\n";
echo "<td width=5% align=\"RIGHT\"><font size=2>$data[10]</font></td>\n";
echo "<td width=5% align=\"RIGHT\"><font size=2>$data[11]</font></td>\n";
echo "<td width=5% align=\"RIGHT\"><font size=2>$data[12]</font></td>\n";
echo "<td width=5% align=\"RIGHT\"><font size=2>$data[13]</font></td>\n";
echo "<td width=5% align=\"RIGHT\"><font size=2>$data[14]</font></td>\n";
echo "<td width=5% align=\"RIGHT\"><font size=2>$data[15]</font></td>\n";
echo "</tr>\n";
}
echo "</table>\n";
} else
{
require_once 'Spreadsheet/Excel/Writer.php';
// Creating a workbook
$workbook = new Spreadsheet_Excel_Writer();
$format=& $workbook->addFormat(array('Size'=>10,'Align'=>'center'));
$format1=& $workbook->addFormat(array('Size'=>10,'Align'=>'right'));
$format_judul=& $workbook->addFormat(array('Size'=>18,'Align'=>'center','Bold'=>1));
$format_judul->setFontFamily('Arial Black');
$format_header=& $workbook->addFormat(array('Size'=>10,'Align'=>'left','Bold'=>1));
$format_header->setFontFamily('Arial Black');
// sending HTTP headers
$nmfile='rekap_kelengkapan_AIL.xls';
$workbook->send($nmfile);
// Creating a worksheet
$worksheet =& $workbook->addWorksheet('Rekapitulasi');

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
$worksheet->write(3, 1, 'REKAPITULASI PROGRES KELENGKAPAN AIL',$format_judul);
$worksheet->write(4, 1, 'Rekapitulasi',$format_judul);
$worksheet->write(11, 1, 'NO ',$format);
$worksheet->write(11, 2, 'KUNCI',$format);
$worksheet->write(11, 3, 'JML_PLG',$format);
$worksheet->write(11, 4, '');
$worksheet->write(11, 5, 'KONDISI AMPLOP AIL',$format);
$worksheet->write(11, 6, 'KONDISI LABEL AIL',$format);
$worksheet->write(12, 7, 'SURAT PERMOHONAN',$format);
$worksheet->write(12, 8, 'IDENTITAS PELANGGAN',$format);
$worksheet->write(12, 9, 'FORMULIR SURVEY',$format);
$worksheet->write(12, 10, 'JAWABAN PERSETUJUAN',$format);
$worksheet->write(12, 11, 'SPJBTL',$format);
$worksheet->write(12, 12, 'SUPLEMEN SPJBTL',$format);
$worksheet->write(12, 13, 'SERTIFIKAT LAIK OPERASI',$format);
$worksheet->write(12, 14, 'KUITANSI PEMBAYARAN BP DAN UJL',$format);
$worksheet->write(12, 15, 'TUL I-09',$format);
$worksheet->write(12, 16, 'TUL I-10',$format);
$worksheet->write(12, 17, 'LAIN-LAIN',$format);
$worksheet->write(12, 18, '');
$worksheet->write(12, 19, 'KETERANGAN',$format);

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

while ($data=oci_fetch_array($sql,OCI_BOTH))
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



}

?>

