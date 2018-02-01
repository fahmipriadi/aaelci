<?php
include "../data_akses/pengail_modul.php";


$fileName = $_FILES['userfile']['name'];     
$tmpName  = $_FILES['userfile']['tmp_name']; 
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];
$kdunit=$_POST['kd_unit'];
$lemari=$_POST['no_lemari'];
$username ='ailcjr';
//$_SESSION['username'];

echo "Nama File =".$fileName;
echo "<br>Tmp Name  =".$tmpName;
echo "<br>File Size =".$fileSize;
echo "<br>File Type =".$fileType;
echo "<br>Kode Unit =".$kdunit;
echo "<br>No lemari =".$lemari;
//echo "<br>File      =".$saveFile;


//$fp      = fopen($tmpName, 'r');
//$content = fread($fp, filesize($tmpName));
//$content = addslashes($content);
//fclose($fp);
$cn=oci_connect($uid,$pwd,$dbs);

$content=oci_new_descriptor($cn,OCI_D_LOB);
$Qry="insert into cust_ail_lemari_img values (:kdunit,:lemari,:fileName,:fileType,:fileSize,EMPTY_BLOB(),:username) returning content into :content";
//echo $Qry;
$sql=oci_parse($cn,$Qry);
oci_bind_by_name($sql,':kdunit',$kdunit);
oci_bind_by_name($sql,':lemari',$lemari);
oci_bind_by_name($sql,':fileName',$fileName);
oci_bind_by_name($sql,':fileType',$fileType);
oci_bind_by_name($sql,':fileSize',$fileSize);
oci_bind_by_name($sql,':content',$content,-1,OCI_B_BLOB);
oci_bind_by_name($sql,':username',$username);
oci_execute($sql,OCI_DEFAULT);

$content->savefile($tmpName); 
oci_commit($cn);




?>