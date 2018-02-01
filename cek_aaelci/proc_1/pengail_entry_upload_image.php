<?php
include "../data_akses/pengail_modul.php";


$fileName = $_FILES['userfile']['name'];     
$tmpName  = $_FILES['userfile']['tmp_name']; 
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];
$midpel=$_POST['midpel'];
$jdok=$_POST['jdok'];
$posisi=$_POST['posisi'];

session_start();
$username =$_SESSION['nip'];
$kodeup=$_SESSION['kodeup'];
$kode_ap=$_SESSION['kode_ap'];
$kode_upi=$_SESSION['kode_upi'];

//echo "Nama File =".$fileName;
//echo "<br>Tmp Name  =".$tmpName;
//echo "<br>File Size =".$fileSize;
//echo "<br>File Type =".$fileType;
//echo "<br>Kode Unit =".$kdunit;
//echo "<br>No lemari =".$lemari;

$cn=oci_connect($uid,$pwd,$dbs);
$Qry="select ltrim(to_char(max(no_img)+1,'000')) no_baru from cust_ail_img 
      where idpel='$midpel' and kode_img='$jdok' ";
$sql=oci_parse($cn,$Qry);
oci_execute($sql);
$data=oci_fetch_array($sql,OCI_BOTH); 
  if (!$data){
  $no_baru="001";
  } else {
  $no_baru=$data[0];
  } 



$content=oci_new_descriptor($cn,OCI_D_LOB);
$Qry="insert into cust_ail_img values (:idpel,:jdk,:urutdok,:fileName,:fileType,:fileSize,EMPTY_BLOB(),:username,:kodeup,:kode_ap,:kode_upi) returning content into :content";
$sql=oci_parse($cn,$Qry);
oci_bind_by_name($sql,':idpel',$midpel);
oci_bind_by_name($sql,':jdk',$jdok);
oci_bind_by_name($sql,':urutdok',$no_baru);
oci_bind_by_name($sql,':fileName',$fileName);
oci_bind_by_name($sql,':fileType',$fileType);
oci_bind_by_name($sql,':fileSize',$fileSize);
oci_bind_by_name($sql,':content',$content,-1,OCI_B_BLOB);
oci_bind_by_name($sql,':username',$username);
oci_bind_by_name($sql,':kodeup',$kodeup);
oci_bind_by_name($sql,':kode_ap',$kode_ap);
oci_bind_by_name($sql,':kode_upi',$kode_upi);

oci_execute($sql,OCI_DEFAULT);

$content->savefile($tmpName); 
oci_commit($cn);

echo "<form method=\"post\" action=\"pengail_entry_idpel2.php\">";
echo "Dokumen AIL untuk IDPEL : [".$midpel."] dengan nama file <font size=\"4\">[".$fileName."]</font><br>sudah diupload dengan kode ";
echo "<font size=4>".$midpel."-".$jdok."-".$no_baru."</font>" ;
echo "<br><br><input type=\"submit\" name=\"kembali\" value=\"Kembali ke form Upload\"> ";
echo "<input type=\"hidden\" name=\"midpel\" value=".$midpel."></td>";
echo "</form>";
echo "<br><a href=\"pengail_entry_idpel.php\">[Kembali ke form Entry AIL]</a>";

?>
