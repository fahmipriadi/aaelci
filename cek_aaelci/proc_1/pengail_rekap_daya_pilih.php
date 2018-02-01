<?php session_start(); ?>

<html>
<head><title>Laporan Kelengkapan AIL - Sistem Informasi Pengelolaan AIL</title></head>
<body>
<form  method="post" action="pengail_rekap_daya.php">
Kode Unit : 
<?php
echo "<select name=\"kdunit\">";

$kode_ap=$_SESSION['kode_ap'];
include "../data_akses/pengail_modul.php";
include "../data_akses/pengail_ambil_rayon.php";
echo "</select>";

//include "../data_akses/pengail_ambil_periode_1.php";

?>


<input type="submit" name="submit" value="Submit"/>

<font size=4><center>REKAPITULASI KELENGKAPAN AIL MENURUT DAYA</center></font>

<table border=1 width=100%>
<tr><td align="RIGHT"><font face="Monotype Corsiva" size=2>
Sistem Informasi Pengelolaan AIL PLN DJBB, copyrighted and created by Pegawai2A Cianjur</font></td></tr>
</table>
</form>
</body>
</html>