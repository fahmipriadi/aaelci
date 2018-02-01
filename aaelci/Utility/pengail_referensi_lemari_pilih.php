<html>
<body>
<form  method="post" target="lemari_tampil" action="pengail_referensi_lemari_tampil.php">
Kode Unit :<br> 
<select name="kdunit">
<?php
session_start();
$kode_ap=$_SESSION['kode_ap'];
include "../data_akses/pengail_modul.php";
include "../data_akses/pengail_ambil_rayon.php";
?>
</select>
<input type="submit" name="submit" value="Submit"/>
</form>
</body>
</html>