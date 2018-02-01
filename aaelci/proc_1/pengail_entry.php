<?php session_start(); ?>
<html>
<head><title>Entry/Edit Informasi AIL - Sistem Informasi Pengelolaan AIL</title></head>
<body>
<center>
*** Entry/Edit Informasi AIL ***<hr>
</center>
<table width=100%>
<tr>
<?php
global $midpel;
$midpel=$_POST['idpel'];
include("../data_akses/pengail_modul.php");
$cn=oci_connect($uid,$pwd,$dbs);
$Qry="select * from dil where idpel= '$midpel'";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
$data=oci_fetch_array($stm,OCI_BOTH);
$idplg=$data[0];
$nama=$data[1];
$alamat=$data[2];
$Tarif=$data[6];
$daya=$data[7];
$rpujl=$data[11];
$kd_aktiv=$data[12];
$kdup=$data[5];


if ($kdup==$_SESSION['kodeup']){

$cn=oci_connect($uid,$pwd,$dbs);
$Qry="select * from cust_ail where idpel= '$midpel'";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
$data=oci_fetch_array($stm,OCI_BOTH);

$kdamplop=$data[1];
$kdlabel=$data[2];
$permohonan=$data[3];
$identitas=$data[4];
$survey=$data[5];
$sjps=$data[6];
$spjbtl=$data[7];
$sspjbtl=$data[8];
$slo=$data[9];
$kuitansi=$data[10];
$pk=$data[11];
$ba=$data[12];
$rayon=$data[13];
$lemari=$data[14];
$baris=$data[15];
$kolom=$data[16];
$nomor=$data[17];
$lain2=$data[18];
$pdl=$data[25];
$prd=$data['PRD_LAP'];
$tgl=$data['TGL_UPDATE'];
$jam=$data['JAM_UPDATE'];


if ($kdamplop!="0") {$st_kdamplop="checked";} else {$st_kdamplop="";}
if ($kdlabel!="0") {$st_kdlabel="checked";} else {$st_kdlabel="";}
if ($permohonan!="0") {$st_permohonan="checked";} else {$st_permohonan="";}
if ($identitas!="0") {$st_identitas="checked";} else {$st_identitas="";}
if ($survey!="0") {$st_survey="checked";} else {$st_survey="";}
if ($sjps!="0") {$st_sjps="checked";} else {$st_sjps="";}
if ($spjbtl!="0") {$st_spjbtl="checked";} else {$st_spjbtl="";}
if ($sspjbtl!="0") {$st_sspjbtl="checked";} else {$st_sspjbtl="";}
if ($slo!="0") {$st_slo="checked";} else {$st_slo="";}
if ($kuitansi!="0") {$st_kuitansi="checked";} else {$st_kuitansi="";}
if ($pk!="0") {$st_pk="checked";} else {$st_pk="";}
if ($ba!="0") {$st_ba="checked";} else {$st_ba="";}
if ($lain2!="0") {$st_lain2="checked";} else {$st_lain2="";}
if ($pdl!="0") {$st_pdl="checked";} else {$st_pdl="";}

} else {
  echo "<h1>Maaf anda hanya berhak Entry/Edit AIL Rayon ".$_SESSION['uup']."</h1>";
  exit;

}
// end of hak rayon .....=============
?>
<form method="post" action="pengail_entry_simpan.php">

<tr>
<td width=30% align=RIGHT>
<input type="hidden" name="prd" value=<?php echo $prd ?> >
<input type="hidden" name="tgl" value=<?php echo $tgl ?> >
<input type="hidden" name="jam" value=<?php echo $jam ?> >
Periode/Update : </td><td width=40%><?php echo "[".substr($prd,0,6)."-".substr($prd,6,1)."] / [".$tgl."-".$jam."]" ?></td><td width=30%></td>
</tr>
<tr>
<td width=30% align=RIGHT>ID Pelanggan : </td><td width=40%><input type="text" name="id_pel" value=<?php echo $idplg ?> readonly="readonly"</td><td width=30%></td>
</tr>
<tr>
<td width=30% align=RIGHT>Nama Pelanggan : </td><td width=40%><?php echo $nama ?></td><td width=30%></td>
</tr>
<tr>
<td width=30% align=RIGHT>Alamat Pelanggan : </td><td width=40%><?php echo $alamat ?></td><td width=30%></td>
</tr>
<tr>
<td width=30% align=RIGHT>Tarif : </td><td width=40%><?php echo $Tarif ?></td><td width=30%></td>
</tr>
<tr>
<td width=30% align=RIGHT>Daya : </td><td width=40%><?php echo $daya ?></td><td width=30%></td>
</tr>
<tr>
<td width=30% align=RIGHT>Rupiah UJL : </td><td width=40%><?php echo $rpujl ?></td><td width=30%></td>
</tr>
<tr>
<td width=30% align=RIGHT>Status Pelanggan : </td><td width=40%><?php echo $kd_aktiv ?></td><td width=30%></td>
</tr>
<tr>
<td width=30% align=RIGHT></td><td width=40%>Kelengkapan AIL : </td><td width=30%></td>
</tr>
<tr>
<td width=30% align=RIGHT></td><td width=40%><hr></td><td width=30%>Keterangan :</td>
</tr>

<tr>
<td width=30%></td><td width=40%><input type="checkbox" <?php echo $st_kdamplop ?> name="kdamplop">Kondisi Amplop</td><td width=30%><input type="text" name="ket1" size="55"></td>
</tr>
<tr>
<td width=30%></td><td width=40%><input type="checkbox" <?php echo $st_kdlabel ?> name="kdlabel">Kondisi Label AIL</td><td width=30%><input type="text" name="ket2" size="55"></td>
</tr>
<tr>
<td width=30%></td><td width=40%><input type="checkbox" <?php echo $st_permohonan ?> name="permohonan">Surat Permohonan</td><td width=30%><input type="text" name="ket3" size="55"></td>
</tr>
<tr>
<td width=30%></td><td width=40%><input type="checkbox" <?php echo $st_identitas ?> name="identitas">Identitas Pelanggan</td><td width=30%>Kode Rayon :</td>
</tr>
<tr>
<td width=30%></td><td width=40%><input type="checkbox" <?php echo $st_survey ?> name="survey">Data Survey</td><td width=30%><input type="text" name="kd_up" readonly="readonly" value=<?php echo $rayon ?>></td>
</tr>
<tr>
<td width=30%></td><td width=40%><input type="checkbox" <?php echo $st_sjps ?> name="sjps">Surat Jawaban</td><td width=30%>Nomor Lemari :</td>
</tr>
<tr>
<td width=30%></td><td width=40%><input type="checkbox" <?php echo $st_spjbtl ?> name="spjbtl">Surat Perjanjian Jual beli Tenaga Listrik</td><td width=30%><input type="text" name="no_lemari" value=<?php echo $lemari ?>></td>
</tr>
<tr>
<td width=30%></td><td width=40%><input type="checkbox" <?php echo $st_sspjbtl ?> name="sspjbtl">Suplemen Surat Perjanjian Jual beli Tenaga Listrik</td><td width=30%>Nomor Baris :</td>
</tr>
<tr>
<td width=30%></td><td width=40%><input type="checkbox" <?php echo $st_slo ?> name="slo">Surat Laik Operasi / Surat Pernyataan</td><td width=30%><input type="text" name="no_baris" value=<?php echo $baris ?>></td>
</tr>
<tr>
<td width=30%></td><td width=40%><input type="checkbox" <?php echo $st_kuitansi ?> name="kuitansi">Kuitansi</td><td width=30%>Nomor Kolom :</td>
</tr>
<tr>
<td width=30%></td><td width=40%><input type="checkbox" <?php echo $st_pk ?> name="pk">Perintah Kerja</td><td width=30%><input type="text" name="no_kolom" value=<?php echo $kolom ?>></td>
</tr>
<tr>
<td width=30%></td><td width=40%><input type="checkbox" <?php echo $st_ba ?> name="ba">Berita Acara Pemasangan SR-APP</td><td width=30%>Nomor Urut :</td>
</tr>
<tr>
<td width=30%></td><td width=40%><input type="checkbox" <?php echo $st_pdl ?> name="pdl">PDL / Info DIL</td><td width=30%><input type="text" name="no_urut" value=<?php echo $nomor ?> ></td>
</tr>
<tr>
<td width=30%></td><td width=40%><input type="checkbox" <?php echo $st_lain2 ?> name="lain2">Lain-lain</td><td width=30%></td>
</tr>
<tr>
<td width=30%></td><td width=40%><input type="submit" value="Simpan" name="submit"></td><td width=30%></td>
</tr>
</table>
</form>

<?php
oci_close($cn);
?>

</body>
</html>