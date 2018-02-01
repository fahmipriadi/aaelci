<html>
<head><title>Monitoring Progres PDP berdasarkan Kelompok Daya - Sistem Informasi Pengelolaan AIL</title></head>
<body>
<form  method="post" action="pengail_monitor_daya.php">
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

<br>Nama Pelanggan ..........................: <input type="TEXT" name="m_nama" >
<br> Daya Terpasang ...........................: <input type="TEXT" name="m_daya" >
<br>Gardu / No.Tiang .........................: <input type="TEXT" name="m_gardu" >

<input type="submit" name="submit" value="Excel"/>

<font size=4><center>MONITOR PROGRES PEMBENAHAN DATA PELANGGAN (PDP1-PDP5)</center></font>

<table border=1 width=100%>
<tr><td align="RIGHT"><font face="Monotype Corsiva" size=2>
Sistem Informasi Pengelolaan AIL PLN <?php echo $_SESSION['supi'] ?>, copyrighted and created by Pegawai2A Cianjur</font></td></tr>
</table>
</form>
</body>
</html>