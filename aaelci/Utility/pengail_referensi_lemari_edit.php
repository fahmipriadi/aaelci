<html>
<body>
<?php
$kdunit=$_GET['kunit'];
$lemari=$_GET['no_lemari'];
$stEdit=$_GET['_edit'];
$stAdd=$_GET['_add'];
//echo "Kode Unit   :".$kdunit;
//echo "<br>Kode Lemari :".$lemari;
//echo "<br>Kode Edit   :".$stEdit;
//echo "<br>Kode Tambah :".$stAdd;
include("../data_akses/pengail_modul.php");
$cn=oci_connect($uid,$pwd,$dbs);

if ($stEdit=="Edit")
{
$Qry="select * from cust_ail_lemari where ail_rayon='$kdunit' and to_number(ail_lemari)='$lemari'";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
$data=oci_fetch_array($stm,OCI_BOTH);
  if (!$data){
  $Qry="select * from cust_ail_lemari where ail_rayon='$kdunit' and ail_lemari=
       (select max(ail_lemari) nom from cust_ail_lemari where ail_rayon='$kdunit')";
  $stm=oci_parse($cn,$Qry);
  oci_execute($stm);
  $data=oci_fetch_array($stm,OCI_BOTH);
  }
$lemari=$data[1];  
$jml_baris=$data[2];
$jml_kolom=$data[3];
$jml_ail=$data[4];
$pos_baris=$data[5];
$pos_kolom=$data[6];
$pos_nomor=$data[7];

} else {

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
  $stm=oci_parse($cn,$Qry);
  oci_execute($stm);
  oci_commit($cn);

}


?>

<form method="post" action="pengail_referensi_lemari_simpan.php" target="lemari_gambar"> 
<table width=100%>
<tr>
<td width=50% align=RIGHT>Kode Unit :</td>
<td width=50$ align=LEFT><input type="text" name="kd_unit" value=<?php echo $kdunit ?> readonly="readonly"></td>
</tr>
<tr>
<td width=50% align=RIGHT>Nomor Lemari :</td>
<td width=50$ align=LEFT><input type="text" name="no_lemari" value=<?php echo $lemari ?> readonly="readonly"></td>
</tr>
<tr>
<td width=50% align=RIGHT>Jumlah Baris :</td>
<td width=50$ align=LEFT><input type="text" name="jbaris" value=<?php echo $jml_baris ?>></td>
</tr>
<tr>
<td width=50% align=RIGHT>Jumlah Kolom :</td>
<td width=50$ align=LEFT><input type="text" name="jkolom" value=<?php echo $jml_kolom ?>></td>
</tr>
<tr>
<td width=50% align=RIGHT>Jumlah AIL tiap baris/kolom :</td>
<td width=50$ align=LEFT><input type="text" name="j_ail" value=<?php echo $jml_ail ?>></td>
</tr>
<tr>
<td width=50% align=RIGHT>Posisi Baris :</td>
<td width=50$ align=LEFT><input type="text" name="posbrs" value=<?php echo $pos_baris ?>></td>
</tr>
<tr>
<td width=50% align=RIGHT>Posisi Kolom :</td>
<td width=50$ align=LEFT><input type="text" name="posklm" value=<?php echo $pos_kolom ?>></td>
</tr>
<tr>
<td width=50% align=RIGHT>Nomor dalam Baris/Kolom :</td>
<td width=50$ align=LEFT><input type="text" name="pnomor" value=<?php echo $pos_nomor ?>></td>
</tr>
<tr>
<td></td>
<td width=50% align=LEFT><input type="submit" value="Simpan / Lihat Lemari" name="simpan"></td>
</tr>
</table>

</form>
</body>
</html>