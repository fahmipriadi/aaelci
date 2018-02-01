<html>
<head><title>Laporan Kelengkapan AIL - Sistem Informasi Pengelolaan AIL</title></head>
<body>
<form  method="post" action="pengail_laporan_pdpV_ii001.php">
Kode Unit : 
<select name="kdunit">
<?php
session_start();
$kode_ap=$_SESSION['kode_ap'];
//$kode_ap='53CJR';
include "../data_akses/pengail_modul.php";
include "../data_akses/pengail_ambil_rayon.php";
echo "</select>";
echo "<select name=\"kdaya\">";
include "../data_akses/pengail_ambil_klpdaya5.php";
echo "</select>";
?>
<select name="status">
   <option value="0">Status [0] - Dalam Pelaksanaan</option>
   <option value="1">Status [1] - Selesai</option>
   <option value="2">Status [2] - Semua</option>
</select>

<input type="submit" name="submit" value="Excel"/>

<font size=4><center>KERTAS KERJA PENGAWASAN PELAKSANAAN PROGRAM PEMBENAHAN DATA PELANGGAN (PDP V.II-001)</center></font>

<table border=1 width=100%>
<tr><td align="RIGHT"><font face="Monotype Corsiva" size=2>
Sistem Informasi Pengelolaan AIL PLN <?php echo $_SESSION['supi'] ?>, copyrighted and created by Pegawai2A Cianjur</font></td></tr>
</table>
</form>
</body>
</html>