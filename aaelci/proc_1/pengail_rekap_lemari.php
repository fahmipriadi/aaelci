<?php session_start(); ?>
<html>
<head><title>Rekapitulasi Kelengkapan AIL per Lemari Penyimpanan - Sistem Informasi Pengelolaan AIL</title></head>
<body>

<tr>
<font size=4><center>DAFTAR KELENGKAPAN AIL PER LEMARI PENYIMPANAN</center></font>
<table border=1 width=100%><tr>
<td width=6% align="CENTER"><font size=1>RAYON</font></td>
<td width=6% align="CENTER"><font size=1>LEMARI</font></td>
<td width=6% align="CENTER"><font size=1>JML PLG</font></td>
<td width=6% align="CENTER"><font size=1>KODE AMPLOP</font></td>
<td width=6% align="CENTER"><font size=1>KODE LABEL</font></td>
<td width=6% align="CENTER"><font size=1>PERMO- HONAN</a></font></td>
<td width=6% align="CENTER"><font size=1>IDENTITAS</font></td>
<td width=6% align="CENTER"><font size=1>SURVEY</font></td>
<td width=6% align="CENTER"><font size=1>SJPS</font></td>
<td width=6% align="CENTER"><font size=1>SPJBTL</font></td>
<td width=6% align="CENTER"><font size=1>SSPJBTL</font></td>
<td width=6% align="CENTER"><font size=1>SLO</font></td>
<td width=6% align="CENTER"><font size=1>KUI TANSI</font></td>
<td width=6% align="CENTER"><font size=1>PK</font></td>
<td width=6% align="CENTER"><font size=1>BA</font></td>
<td width=6% align="CENTER"><font size=1>LAIN LAIN</font></td>
</tr>
</table>


<?php
$kode_ap=$_SESSION['kode_ap'];

//$kdunit=$_POST['kdunit'];
include("../data_akses/pengail_modul.php");
//$cn=odbc_connect($cst,$uid,$pwd);
$cn=oci_connect($uid,$pwd,$dbs);

$Qry="select * from v_ail_LEMARI_rekap where kode_ap='$kode_ap' order by kodeup";
//$stm=odbc_do($cn,$Qry);
$stm=oci_parse($cn,$Qry);
oci_execute($stm);



$num=0;
echo "<table border=1 width=100%>\n";
//while ($dt=odbc_fetch_into($stm,$data))
while ($data=oci_fetch_array($stm,OCI_BOTH))
{
$num=$num+1;
echo "<td width=6% align=\"CENTER\"><font size=2>$data[0]</font></td>\n";
echo "<td width=6% align=\"CENTER\"><font size=2>$data[1]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=2>$data[2]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=2>$data[3]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=2>$data[4]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=2>$data[5]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=2>$data[6]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=2>$data[7]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=2>$data[8]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=2>$data[9]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=2>$data[10]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=2>$data[11]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=2>$data[12]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=2>$data[13]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=2>$data[14]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=2>$data[15]</font></td>\n";
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