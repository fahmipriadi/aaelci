<?php
session_start();
$kode_ap=$_SESSION['kode_ap'];
?>
<html>
<head><title>Rekapitulasi Kelengkapan AIL per Lemari Penyimpanan - Sistem Informasi Pengelolaan AIL</title></head>
<body>

<tr>
<font size=4><center>DAFTAR AIL HASIL SCANNING PER LEMARI PENYIMPANAN</center></font>
<table border=1 width=100%><tr>
<td width=10% align="CENTER"><font size=1>RAYON</font></td>
<td width=10% align="CENTER"><font size=1>LEMARI</font></td>
<td width=10% align="CENTER"><font size=1>BARIS</font></td>
<td width=10% align="CENTER"><font size=1>KOLOM</font></td>
<td width=10% align="CENTER"><font size=1>JML PELANGGAN</font></td>
<td width=10% align="CENTER"><font size=1>LBR DOKUMEN</a></font></td>
</tr>
</table>


<?php

//$kdunit=$_POST['kdunit'];
include("../data_akses/pengail_modul.php");
//$cn=odbc_connect($cst,$uid,$pwd);
$cn=oci_connect($uid,$pwd,$dbs);

$Qry="select * from v_ail_img_posisi_rekap where kode_ap='$kode_ap' order by ail_rayon,
ail_lemari,ail_baris,ail_kolom";
//$stm=odbc_do($cn,$Qry);
$stm=oci_parse($cn,$Qry);
oci_execute($stm);



$num=0;
echo "<table border=1 width=100%>\n";
//while ($dt=odbc_fetch_into($stm,$data))
while ($data=oci_fetch_array($stm,OCI_BOTH))
{
$num=$num+1;
echo "<td width=10% align=\"CENTER\"><font size=2>$data[2]</font></td>\n";
echo "<td width=10% align=\"CENTER\"><font size=2>$data[3]</font></td>\n";
echo "<td width=10% align=\"CENTER\"><font size=2>$data[4]</font></td>\n";
echo "<td width=10% align=\"CENTER\"><font size=2>$data[5]</font></td>\n";
echo "<td width=10% align=\"RIGHT\"><font size=2>$data[6]</font></td>\n";
echo "<td width=10% align=\"RIGHT\"><font size=2>$data[7]</font></td>\n";
echo "</tr>\n";
}
echo "</table>\n";

?>


<table border=1 width=100%>
<tr><td align="RIGHT"><font face="Monotype Corsiva" size=2>
<a href="index.php">Home</a> Sistem Informasi Pengelolaan AIL PLN Area Cianjur, copyrighted and created by Pegawai2A Cianjur</font></td></tr>
</table>
</body>
</html>