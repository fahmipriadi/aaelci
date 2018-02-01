<?php
include("../data_akses/pengail_modul.php");
$cn=oci_connect($uid,$pwd,$dbs);

$kdunit=$_GET['kunit'];
$stEdit=$_GET['_edit'];
$stAdd=$_GET['_add'];
$lemari=$_GET['no_lemari'];

if ($stAdd=="Add"){
$Qry="select ltrim(to_char(max(ail_lemari)+1,'000')) no_baru from cust_ail_lemari 
      where ail_rayon='$kdunit'";
  $stm=oci_parse($cn,$Qry);
  oci_execute($stm);
  $data=oci_fetch_array($stm,OCI_BOTH);
  $lemari=$data[0];  
$jml_baris='0';
$jml_kolom='0';
$jml_ail='0';
$pos_baris='00';
$pos_kolom='00';
$pos_nomor='000';
$Qry="insert into cust_ail_lemari values ('$kdunit','$lemari',$jml_baris,$jml_kolom,
     $jml_ail,'$pos_baris','$pos_kolom','$pos_nomor')";
echo $Qry;

} else {
$Qry="select * from cust_ail_lemari where ail_rayon='$kdunit' and to_number(ail_lemari)='$lemari'";
echo $Qry;
}

?>
