<?php session_start(); ?>

<?php
$kodeup=$_SESSION['kodeup'];
include("../data_akses/pengail_modul.php");
$kdexcel=$_POST['Excel'];
//<form method="post" action="pengail_daya_excel.php">
//<input type="submit" name="Export Excel" value="Excel"/>
//</form>

?>

<html>
<head><title>Laporan Kelengkapan AIL - Sistem Informasi Pengelolaan AIL</title></head>
<body>

<p><a href="plgblmscan02.php"><button>Export CSV Office 2007</button></a></p>
<p><a href="plgblmscan03.php"><button>Export CSV Office 2010 ke atas</button></a></p>

<tr>
<font size=4><center>DAFTAR PELANGGAN BELUM SCAN</center></font></br>
<table border=1 width=100%><tr>
<td width=4%  align="CENTER"><font size=1>NO</font></td>
<td width=10% align="CENTER"><font size=1>ID PEL</font></td>
<td width=20% align="CENTER"><font size=1>NAMA PELANGGAN</font></td>
<td width=20% align="CENTER"><font size=1>ALAMAT PELANGGAN</font></td>
<td width=6%  align="CENTER"><font size=1>KODE UP</font></td>
<td width=6%  align="CENTER"><font size=1>GOL TARIF</font></td>
<td width=6%  align="CENTER"><font size=1>DAYA</font></td>
<td width=10% align="CENTER"><font size=1>STATUS PELANGGAN</font></td>
<td width=10% align="CENTER"><font size=1>JENIS MUTASI</font></td>
<td width=10% align="CENTER"><font size=1>THN BLN MUTASI</font></td>
</tr>


<?php
$cn=oci_connect($uid,$pwd,$dbs);
//$Qry="select * from v_ail_daya_rekap order by daya desc";
$perPage=10;
if((!isset($_GET['page'])) || $_GET['page'] = 1 || $_GET['page'] = 0){
	$offset=1;
}else{
	$offset=($perPage*$_GET['page'])+1;
}
$Qry="select idpel, nmplg, alamatplg, kodeup, goltarif, daya, statusplg, jenis_mutasi, thblmut from dil
	where kodeup = $kodeup
	and idpel in( select idpel from cust_ail where tgl_update is null) 
	order by kodeup, statusplg, daya desc limit $perPage offset $offset";
	
$stm=oci_parse($cn,$Qry);
oci_execute($stm);

$num=0;
while ($data=oci_fetch_array($stm,OCI_BOTH))
{
$num=$num+1;
$kunci[num]=$data[1];
echo "<td width=1% align=\"CENTER\"><font size=1>$num</font></td>\n";
echo "<td width=8% align=\"RIGHT\"><font size=1>$data[0]</font></td>\n";
echo "<td width=10% align=\"CENTER\"><font size=1>$data[1]</font></td>\n";
echo "<td width=16% align=\"RIGHT\"><font size=1>$data[2]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=1>$data[3]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=1>$data[4]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=1>$data[5]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=1>$data[6]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=1>$data[7]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=1>$data[8]</font></td>\n";
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