<html>
<head><title>Laporan Kelengkapan AIL - Sistem Informasi Pengelolaan AIL</title></head>
<body>
<form  method="post" action="pengail_laporan_pdpiV_iii001b.php">
Kode Unit : 
<select name="kdunit">
<?php
session_start();
$kode_ap=$_SESSION['kode_ap'];
include "../data_akses/pengail_modul.php";
include "../data_akses/pengail_ambil_rayon.php";
echo "</select>";
include "../data_akses/pengail_ambil_periode_1.php";
?>

<input type="submit" name="submit" value="Excel"/>

<font size=4><center>KERTAS KERJA VERIFIKASI [FISIK (PDP IV.III-001b)</center></font>

<table border=1 width=100%>
<tr><td align="RIGHT"><font face="Monotype Corsiva" size=2>
Sistem Informasi Pengelolaan AIL PLN <?php echo $_SESSION['supi'] ?>, copyrighted and created by Pegawai2A Cianjur</font></td></tr>
</table>
</form>
</body>
</html>