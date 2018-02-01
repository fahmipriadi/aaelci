<html>
<head><title>Daftar AIL Tersimpan - Sistem Informasi Pengelolaan AIL</title></head>
<body>
<form  method="post" action="pengail_laporan_pdpi_ii003.php">
Kode Unit : 
<select name="kdunit">
<?php
session_start();
$kode_ap=$_SESSION['kode_ap'];
include "../data_akses/pengail_modul.php";
include "../data_akses/pengail_ambil_rayon.php";
?>
</select>



<select name="prdlap">
  <option value="10000">     1-10000</option>
  <option value="20000">10001-20000</option>
  <option value="30000">20001-30000</option>
  <option value="40000">30001-40000</option>
  <option value="50000">40001-50000</option>
  <option value="60000">50001-60000</option>
  <option value="70000">60001-70000</option>
  <option value="80000">70001-80000</option>
  <option value="90000">80001-90000</option>
  <option value="100000">90001-100000</option>
  <option value="110000">100001-110000</option>
  <option value="120000">110001-120000</option>
  <option value="130000">120001-130000</option>
  <option value="140000">130001-140000</option>
  <option value="150000">140001-150000</option>
  <option value="160000">150001-160000</option>
  <option value="170000">160001-170000</option>
  <option value="180000">170001-180000</option>
  <option value="190000">180001-190000</option>
</select>

<input type="submit" name="submit" value="Excel"/>

<font size=4><center>DAFTAR AIL TERSIMPAN (PDP I.II-003)</center></font>

<table border=1 width=100%>
<tr><td align="RIGHT"><font face="Monotype Corsiva" size=2>
Sistem Informasi Pengelolaan AIL PLN Area Cianjur, copyrighted and created by Pegawai2A Cianjur</font></td></tr>
</table>
</form>
</body>
</html>