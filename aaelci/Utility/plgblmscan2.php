<?php session_start(); ?>

<?php
include("../data_akses/pengail_modul.php");

?>

<html>
<head><title>Laporan Kelengkapan AIL - Sistem Informasi Pengelolaan AIL</title></head>
<body>

<tr>
<font size=4><center>DAFTAR PELANGGAN BELUM SCAN</center></font></br>
<table border=1 width=100%><tr>
<td width=4%  align="CENTER"><font size=1>NO</font></td>
<td width=10% align="CENTER"><font size=1>TANGGAL</font></td>
<td width=20% align="CENTER"><font size=1>DASHBOARD UTAMA</font></td>
<td width=20% align="CENTER"><font size=1>DASHBOARD BANGKA</font></td>
<td width=20% align="CENTER"><font size=1>DASHBOARD BELITUNG</font></td>
</tr>



<?php
$cn=oci_connect($uid,$pwd,$dbs);
//$Qry="select * from v_ail_daya_rekap order by daya desc";
$Qry="SELECT TANGGAL, RTRIM(NAMA_FILE)FROM SNAPSHOT order by TANGGAL desc ";
	
$stm=oci_parse($cn,$Qry);
oci_execute($stm);

$num=0;
while ($data=oci_fetch_array($stm,OCI_BOTH))
{
$num=$num+1;
$kunci[num]=$data[1];
$link1 = "http://10.30.1.21/aaelci/snapshot/".$data[1]."-curl.html";
$link2 = "http://10.30.1.21/aaelci/snapshot/".$data[1]."-curlBGK.html";
$link3 = "http://10.30.1.21/aaelci/snapshot/".$data[1]."-curlTJP.html";

echo "<td width=1% align=\"CENTER\"><font size=1>$num</font></td>\n";
echo "<td width=8% align=\"RIGHT\"><font size=1>$data[0]</font></td>\n";
echo "<td width=10% align=\"CENTER\"><font size=1><a href='$link1'target='_blank'>$data[1]</a></font></td>\n";	
echo "<td width=10% align=\"CENTER\"><font size=1><a href='$link2'target='_blank'>$data[1]</a></font></td>\n";	
echo "<td width=10% align=\"CENTER\"><font size=1><a href='$link3'target='_blank'>$data[1]</a></font></td>\n";	
echo "</tr>\n";
}
echo "</table>\n";


?>

<table border=1 width=100%>
<tr><td align="RIGHT"><font face="Monotype Corsiva" size=2>
Sistem Informasi Pengelolaan AIL PLN DJBB, copyrighted and created by Pegawai2A Cianjur</font></td></tr>
</table>
</form>
</body>
</html>