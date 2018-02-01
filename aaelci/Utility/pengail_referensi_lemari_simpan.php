<?php

include "../data_akses/pengail_modul.php";
$kdsimpan=$_POST['simpan'];
$kdunit=$_POST['kd_unit'];
$lemari=$_POST['no_lemari'];
$jbaris=$_POST['jbaris'];
$jkolom=$_POST['jkolom'];
$j_ail=$_POST['j_ail'];
$posbrs=$_POST['posbrs'];
$posklm=$_POST['posklm'];
$pnomor=$_POST['pnomor'];

//echo "<br>Kode Simpan=".$kdsimpan;
//echo "<br>Kode Unit=".$kdunit;
//echo "<br>Kode Lemari=".$lemari;

$cn=oci_connect($uid,$pwd,$dbs);
$Qry="update cust_ail_lemari set jml_baris='$jbaris',jml_kolom='$jkolom',jml_ail='$j_ail',
     pos_baris='$posbrs',pos_kolom='$posklm',pos_nomor='$pnomor' where ail_rayon='$kdunit' 
     and ail_lemari='$lemari' ";
$sql=oci_parse($cn,$Qry);
oci_execute($sql);
oci_commit($cn);

$Qry="select content from cust_ail_lemari_img where ail_rayon='$kdunit' and ail_lemari='$lemari' ";
//echo $Qry;
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
$brs=oci_fetch_array($stm,OCI_ASSOC+OCI_RETURN_NULLS);

if ($brs){
  if (!brs) {
     header('Status : 404 Not Found');
   } else {
     $gbr=$brs['CONTENT']->load();
     header("Content-type: image/jpeg");
     print $gbr;
   }

} else {
  echo "<form method=\"post\" enctype=\"multipart/form-data\" action=\"pengail_referensi_lemari_upload.php\"> ";
  echo "Gambar lemari belum tersedia, silakan upload .....";
  echo "<table>";
  echo "<tr><td><input type=\"hidden\" name=\"kd_unit\" value=".$kdunit."></td>";
  echo "    <td><input type=\"hidden\" name=\"no_lemari\" value=".$lemari."></td>";
  echo "    <td></td></tr> ";
  echo "<tr><td><input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"2000000\">";
  echo "        <input name=\"userfile\" type=\"file\"></td> ";
  echo "    <td><input name=\"upload\" type=\"submit\" value=\"Upload\"></td></tr>";
  echo "</table>";
  echo "</form>";
}

?>



