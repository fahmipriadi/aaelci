<?php 
session_start(); 
include "../data_akses/pengail_modul.php"; 
$midpel='161000000000';
$jdok='01';
$posisi='';
?> 
<html>
<head><title>Entry/Edit Informasi AIL - Sistem Informasi Pengelolaan AIL</title></head>
<body>
<center>
*** Entry/Edit Informasi AIL ***<hr><br>
</center>

<form id="form" method="post" enctype="multipart/form-data" action="pengail_upload_image.php">
Pilih File JPEG yang berawalan nama IDPEL :
<br>
<table>
<tr><td><input type="hidden" name="MAX_FILE_SIZE" value="5000000">
<input name="userfile" type="file" size="65"></td>
<td><input name="upload" type="submit" value="Upload"></td></tr>
</table> 
<?php
echo "<input type=\"hidden\" name=\"midpel\" value=\"$midpel\">";
echo "<input type=\"hidden\" name=\"jdok\" value=\"$jdok\">";
echo "<input type=\"hidden\" name=\"posisi\" value=\"$posisi\">";
?><br>
</form>
<br><a href="pengail_entry_idpel.php">[Kembali ke form Entry AIL]</a>

</body>
</html>