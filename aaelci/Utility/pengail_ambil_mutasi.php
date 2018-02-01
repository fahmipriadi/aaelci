<?php
session_start();
$usr=$_SESSION['nip'];
include("../../excel/excel_reader2.php");
include "../data_akses/pengail_modul.php";
$cn=oci_connect($uid,$pwd,$dbs);



$fileName = $_FILES['userfile']['name'];     
$tmpName  = $_FILES['userfile']['tmp_name']; 
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];

$data_xl=new Spreadsheet_Excel_Reader($tmpName);
$baris=$data_xl->rowcount($sheet_index=0);



$ada=0;
$upd=0;
//$baris=4;
for ($i=2;$i<=$baris;$i++){
$mkd_upi=$data_xl->val($i,10);
$mkd_ap=$data_xl->val($i,11);
$mkd_up=$data_xl->val($i,12);
$mkd_pdl=$data_xl->val($i,1);
$mno_agenda=$data_xl->val($i,2);
$mthblmut=$data_xl->val($i,3);
$midpel=$data_xl->val($i,4);
$mnama=$data_xl->val($i,5);
//-------menghilangkan kutip satu ...............
	$mixed_subject=$mnama;
	$mixed_search ="'";
	$mixed_replace=" ";
	$mnama=str_replace("'"," ",$mixed_subject);
//-------------------------------------------------
$mpnj=$data_xl->val($i,6);
$m_alamat=$data_xl->val($i,7);
$mjmut=$data_xl->val($i,14);
$mtrf=$data_xl->val($i,15);
$mdaya=$data_xl->val($i,16);
$mtrf_lama=$data_xl->val($i,17);
$mdaya_lama=$data_xl->val($i,18);
$mtglremaja=substr($data_xl->val($i,19),0,4).substr($data_xl->val($i,19),5,2).substr($data_xl->val($i,19),8,2);
$mtglpdl=substr($data_xl->val($i,21),0,4).substr($data_xl->val($i,21),5,2).substr($data_xl->val($i,21),8,2);



$Qry1="select * from cust_mutasi where kode_upi='$mkd_upi' and kode_ap='$mkd_ap' and kodeup='$mkd_up' and no_pdl='$mkd_pdl' ";
//echo $Qry1;
$stm1=oci_parse($cn,$Qry1);
oci_execute($stm1);
  
  $data=oci_fetch_array($stm1,OCI_BOTH);
  if (!$data){
  $Qry="insert into cust_mutasi values ('$mkd_upi','$mkd_ap','$mkd_up','$mkd_pdl',
  '$mno_agenda','$mthblmut','$midpel','$mnama','$mpnj','$m_alamat','$mjmut','$mtrf','$mtglpdl','$mdaya',
  '$mtrf_lama','$mdaya_lama','$usr','$mtglremaja','')";
//  echo $Qry;
  $sql=oci_parse($cn,$Qry);
  oci_execute($sql);
  oci_commit($cn);
  //echo "update 1 record<br>";
  $upd=$upd+1;
  } else {
  $ada=$ada+1;
  //echo "data sudah ada<br>";
  }


}
echo "Dibaca ........ ".($i-2)." record<br>";
echo "Update tmp... ".$upd." record<br>";
echo "Sudah ada .... ".$ada." record<br>";


?>
<form method="POST" action="pengail_mutasi.php">
<input type="submit" name="mutasi" value="Lanjutkan Update DIL">
</form>