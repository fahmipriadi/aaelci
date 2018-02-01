<?php session_start(); ?>
<html>
<head><title>Edit Posisi Dokumen yang Telah di-Upload - Sistem Informasi Pengelolaan AIL</title></head>
<body>

<?php
$midpel=$_POST['idpel'];
include("../data_akses/pengail_modul.php");
$cn=oci_connect($uid,$pwd,$dbs);
$Qry="select a.idpel,a.kode_img,b.uraian,a.no_img,substr(a.nmfile,1,40) filename,
to_char(a.filesize/1000,'9G999D999') flsize from cust_ail_img a,t_kode_img b  where trim(a.kode_img)=b.kode_img and a.idpel= '$midpel' 
order by kode_img,no_img";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
echo "<table width=100%>";
while ($data=oci_fetch_array($stm,OCI_BOTH)){
$mkode=$midpel.trim($data['KODE_IMG']).trim($data['NO_IMG']);
echo "<tr>";
echo "<td width=20%>".$data['KODE_IMG']."-".$data['URAIAN']."</td>";
echo "<td width=10%>".$data['NO_IMG']."</td>";
echo "<td width=50%><a href=\"pengail_edit_pos_image_lihat.php?mkode=$mkode\" target=\"_blank\" > ".$data['FILENAME']."</a></td>";
echo "<td width=10% align=\"RIGHT\">".$data['FLSIZE']."</td>";
echo "</tr>";
}
echo "</table>";

oci_close($cn);
?>

</body>
</html>