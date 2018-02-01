<?php session_start(); ?>

<?php
include("../data_akses/pengail_modul.php");

?>

<html>
<head><title>Laporan Kelengkapan AIL - Sistem Informasi Pengelolaan AIL</title></head>
<body>

<!--buat bulan-->
<select name="bln">
<option selected="selected">Bulan</option>
<?php
$bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
$jlh_bln=count($bulan);
for($c=0; $c<$jlh_bln; $c+=1){
    echo"<option value=$bulan[$c]> $bulan[$c] </option>";
}
?>
</select>

<!--buat tahun-->
<?php
$now=date('Y');
echo "<select name=’tahun’>";
for ($a=2017;$a<=$now;$a++)
{
     echo "<option value='$a'>$a</option>";
}
echo "</select>";
?>

<input type="submit" name="submit" value="Submit"/>

<tr>
<font size=4><center>HISTORY DASHBOARD PDP</center></font></br>
<table border=1 width=100%><tr>
<td width=4%  align="CENTER"><font size=1>NO</font></td>
<td width=10% align="CENTER"><font size=1>TANGGAL</font></td>
<td width=20% align="CENTER"><font size=1>DASHBOARD UTAMA</font></td>
<td width=20% align="CENTER"><font size=1>DASHBOARD BANGKA</font></td>
<td width=20% align="CENTER"><font size=1>DASHBOARD BELITUNG</font></td>
</tr>



<?php
$cn=oci_connect($uid,$pwd,$dbs);

//$Qry="SELECT to_char(TANGGAL,'mm/dd/yyyy hh24:mi:ss') AS TANGGAL, RTRIM(NAMA_FILE)FROM SNAPSHOT order by TANGGAL desc";
$Qry="SELECT rtrim(NAMA_FILE,' '), to_char(TANGGAL,'mm/dd/yyyy hh24:mi:ss')FROM SNAPSHOT order by TANGGAL desc";	
$stm=oci_parse($cn,$Qry);
oci_execute($stm);

$num=0;
while ($data=oci_fetch_array($stm,OCI_BOTH))
{
$num=$num+1;
$kunci[num]=$data[1];
//inisiasi alamat link
$link1 = "http://10.30.1.21/aaelci/snapshot/".$data[0]."-curl.html";
$link2 = "http://10.30.1.21/aaelci/snapshot/".$data[0]."-curlBGK.html";
$link3 = "http://10.30.1.21/aaelci/snapshot/".$data[0]."-curlTJP.html";
//end inisiasi alamat link
echo "<td width=1% align=\"CENTER\"><font size=1>$num</font></td>\n";
echo "<td width=8% align=\"RIGHT\"><font size=1>$data[1]</font></td>\n"; //menampilkan tanggal capture
echo "<td width=10% align=\"CENTER\"><font size=1><a href='$link1'target='_blank'>$data[0]</a></font></td>\n";	
echo "<td width=10% align=\"CENTER\"><font size=1><a href='$link2'target='_blank'>$data[0]</a></font></td>\n";	
echo "<td width=10% align=\"CENTER\"><font size=1><a href='$link3'target='_blank'>$data[0]</a></font></td>\n";	
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