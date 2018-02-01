<html>
<body>
<?php
//tgl create : 15/03/2012
//revisi     : 29/05/2012
//-----------------------

include("../data_akses/pengail_modul.php");
$kdunit=$rayon;
//$lemari='001';
if (!$nomor==""){
$lalu="sama";
} else {
$lalu="lanjut";
$cn=oci_connect($uid,$pwd,$dbs);
$Qry="select  jml_baris,jml_kolom,jml_ail,pos_baris,pos_kolom,ltrim(to_char(pos_nomor+1,'000')) no_baru
 from cust_ail_lemari 
      where ail_rayon='$kdunit' and ail_lemari='$lemari' ";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
$data=oci_fetch_array($stm,OCI_BOTH);

 if ($data) {
 $jbrs=$data[0];
 $jklm=$data[1];
 $j_ail=$data[2];
 $posbaris=$data[3];
 $poskolom=$data[4];
 $posnomor=$data[5];
  if ($posnomor>$j_ail){
  $posnomor='001';
     if ($poskolom==$jklm){
     $poskolom='01';
     $posbaris=str_pad(($posbaris+1 ),2,"0",STR_PAD_LEFT);   
     }else{
     $poskolom=str_pad(($poskolom+1 ),2,"0",STR_PAD_LEFT);
     }
     if ($posbaris>$jbrs){
     $lalu="henti";
     }
//--------------------revisi 29/05/2012----------------------------
//     } else {
//     $posbaris=str_pad(($posbaris+1 ),2,"0",STR_PAD_LEFT);   
//     }
//-----------------------------------------------------------------
  }
  //cek apakah dalam baris kolom masih cukup -------- 
 } else {
 $lalu="none";
 }
 //bila lemari tersedia ----

oci_close($cn);
}
//bila nomor posisi kosong-----
?>
</body>
</html>
