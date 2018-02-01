<html>
<head><title>Entry/Edit Informasi AIL - Sistem Informasi Pengelolaan AIL</title></head>
<body>
<center>
<br>*** Entry/Edit Informasi AIL ***<hr><br>
</center>
<table width=100%>
<tr>
<?php
$midpel=$_POST['midpel'];
  echo "<form method=\"post\" enctype=\"multipart/form-data\" action=\"pengail_entry_upload_image.php\"> ";
  echo "Upload dokumen AIL :";
  echo "<table>";
  echo "<tr><td>ID Pelanggan : ".$midpel."</td><td></td></tr>";
  echo "<tr><td>Jenis Dokumen :";
  echo "<select name=\"jdok\"> ";
  echo "<option value=\"01\">Permohonan</option>";
  echo "<option value=\"02\">Identitas Pelanggan</option>";
  echo "<option value=\"03\">Data Survey</option>";
  echo "<option value=\"04\">Surat Jawaban</option>";
  echo "<option value=\"05\">SPJBTL</option>";
  echo "<option value=\"06\">Suplemen SPJBTL</option>";
  echo "<option value=\"07\">SLO</option>";
  echo "<option value=\"08\">Kuitansi</option>";
  echo "<option value=\"09\">Perintah Kerja</option>";
  echo "<option value=\"10\">BA Pemasangan APP </option>";
  //tambahan sendiri -- mario hadi
 echo "<option value=\"12\">PDL/Info DIL</option>";
  echo "<option value=\"11\">Lain-lain</option>";
  echo "</select>";
  echo "</td><td></td>";
  echo "<tr><td><input type=\"hidden\" name=\"midpel\" value=".$midpel."></td>";
  echo "    <td></td></tr> ";
  echo "<tr><td><input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"2000000\">";
  echo "        <input name=\"userfile\" type=\"file\" size=\"45\"></td> ";
  echo "    <td><input name=\"upload\" type=\"submit\" value=\"Upload\"></td></tr>";
  echo "</table>";
  echo "</form>";
  echo "<br><a href=\"pengail_entry_idpel.php\">[Kembali ke form Entry AIL]</a>";

?>
</body>
</html>