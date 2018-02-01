<html>
<head><title>Laporan Kelengkapan AIL - Sistem Informasi Pengelolaan AIL</title></head>
<body>
<form  method="post" action="pengail_prioritas_daya_cek.php">
Kelompok Daya : 
<select name="klpdaya">
<?php
session_start();
$kode_ap=$_SESSION['kode_ap'];
include "../data_akses/pengail_modul.php";
include "../data_akses/pengail_ambil_klpdaya.php";
?>
</select>
<input type="submit" name="submit" value="Proses"/>

<font size=4><center>PRIORITAS MENURUT DAYA (PDP II)</center></font>

<?php
include("../menu/menu_footer.php");
?>
</form>
</body>
</html>