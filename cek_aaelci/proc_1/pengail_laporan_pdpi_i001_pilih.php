<?php session_start(); ?>

<html>
<head><title>Laporan Kelengkapan AIL - Sistem Informasi Pengelolaan AIL</title></head>
<body>
<form  method="post" action="pengail_laporan_pdpi_i001.php">
Kode Unit : 
<?php
//session_start();
echo "<select name=\"kdunit\">";

$kode_ap=$_SESSION['kode_ap'];
include "../data_akses/pengail_modul.php";
include "../data_akses/pengail_ambil_rayon.php";
echo "</select>";

include "../data_akses/pengail_ambil_periode_1.php";

?>


<input type="submit" name="submit" value="Excel"/>

<font size=4><center>LAPORAN KELENGKAPAN AIL (PDP I.I-001)</center></font>

<table border=1 width=100%>
<tr><td align="RIGHT"><font face="Monotype Corsiva" size=2>
Sistem Informasi Pengelolaan AIL PLN Area Cianjur, copyrighted and created by Pegawai2A Cianjur</font></td></tr>
</table>
</form>
</body>
</html>