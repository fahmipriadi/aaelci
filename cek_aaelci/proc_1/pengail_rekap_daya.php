<html>
<head><title>Rekapitulasi Kelengkapan AIL per Daya Terpasang - Sistem Informasi Pengelolaan AIL</title></head>
<body>
<?php
$kdunit=$_POST['kdunit'];
include("../data_akses/pengail_modul.php");
//<form method="post" action="pengail_daya_excel.php">
//<input type="submit" value="Excel">
//</form>

?>
Kode Rayon : <input type="text" name="kdunit" value=<?php echo $kdunit ?> readonly="readonly"> 
<a href="pengail_rekap_daya_pilih.php">Kembali ke pilihan Rayon</a>
<tr>
<font size=4><center>DAFTAR KELENGKAPAN AIL PER DAYA TERPASANG</center></font>
<table border=1 width=100%><tr>
<td width=3% align="CENTER"><font size=1>NO</font></td>
<td width=6% align="CENTER"><font size=1>DAYA</font></td>
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
$cn=oci_connect($uid,$pwd,$dbs);
$Qry="select * from v_ail_daya_rekap where kodeup='$kdunit' order by daya desc";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);


$num=0;
echo "<table border=1 width=100%>\n";
while ($data=oci_fetch_array($stm,OCI_BOTH))
{
$num=$num+1;
$kunci[num]=$data[1];
echo "<td width=3% align=\"RIGHT\"><font size=2>$num</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=2>$data[1]</font></td>\n";
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

<?php
include("../menu/menu_footer.php");
?>
</body>
</html>