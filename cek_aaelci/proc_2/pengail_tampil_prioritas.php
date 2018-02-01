<html>
<head><title>Entry/Edit Identifikasi / Prioritas - Sistem Informasi Pengelolaan AIL</title></head>
<body>
<center>
*** Entry/Edit Identifikasi / Prioritas ***<hr>
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
$kodeup=$data[5];
$Tarif=$data[6];
$daya=$data[7];
$kdgol=$data[8];
$fx_meter=$data[9];
$fx_kvArh=$fx_meter;
  if ($daya>=41500){
    if ($fx_meter>=400){
    $ctp=($fx_meter/200)*5;
    $ct=$ctp."/5";
    $pt="20000/100";
    } else {
    $ctp=$fx_meter*5;
    $ct=$ctp."/5";  
    $pt="-";
    }
  } else {
  $ct="-";
  $pt="-";
  }
    
$cn=oci_connect($uid,$pwd,$dbs);
$Qry="select sum(rptag) tag from cust_tag where unitup= '$kodeup' and thblrek='201101' ";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
$data=oci_fetch_array($stm,OCI_BOTH);
$tot_tag=$data[0];

$cn=oci_connect($uid,$pwd,$dbs);
$Qry="select rptag from cust_tag where idpel= '$midpel' and thblrek='201101' ";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
$data=oci_fetch_array($stm,OCI_BOTH);
$rptag=$data[0];

  if ($tot_tag==0){
  $prostag=0;
  } else {
  $prostag=($rptag/$tot_tag*100);  
  }


$cn=oci_connect($uid,$pwd,$dbs);
$Qry="select * from cust_ail_prioritas where idpel= '$midpel'";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
$data=oci_fetch_array($stm,OCI_BOTH);

$kdail=$data[1];
$kriteria1=$data[2];
$kriteria2=$data[3];
$kriteria3=$data[4];
$kriteria4=$data[5];
$kriteria5=$data[6];
$tgl_periksa=$data[8];
$pertimbang=$data[9];
$ketidaksamaan=(6-($kdail+$kriteria1+$kriteria2+$kriteria3+$kriteria4+$kriteria5));
$prd=$data[12];
$tgl=$data[10];
$jam=$data[11];

if ($kdail!="0") {$st_kdail="checked";} else {$st_kdail="";}
if ($kriteria1!="0") {$st_kriteria1="checked";} else {$st_kriteria1="";}
if ($kriteria2!="0") {$st_kriteria2="checked";} else {$st_kriteria2="";}
if ($kriteria3!="0") {$st_kriteria3="checked";} else {$st_kriteria3="";}
if ($kriteria4!="0") {$st_kriteria4="checked";} else {$st_kriteria4="";}
if ($kriteria5!="0") {$st_kriteria5="checked";} else {$st_kriteria5="";}




?>
<form method="post" action="pengail_simpan_prioritas.php">
<tr>
<td width=30% align=RIGHT>ID Pelanggan : </td><td width=40%><input type="text" name="id_pel" value=<?php echo $idplg ?> readonly="readonly"</td><td width=30%></td>
</tr>
<tr>
<td width=30% align=RIGHT>Nama Pelanggan : </td><td width=40%><?php echo $nama ?></td><td width=30%></td>
</tr>
<tr>
<td width=30% align=RIGHT>Tarif : </td><td width=40%><?php echo $Tarif ?></td><td width=30%></td>
</tr>
<tr>
<td width=30% align=RIGHT>Rp Tagihan : </td><td width=40%><?php echo $rptag ?></td><td width=30%></td>
</tr>
<tr>
<td width=30% align=RIGHT>Prosentase Tag : </td><td width=40%><?php echo substr($prostag,0,8) ?>% </td><td width=30%></td>
</tr>
<tr>
<td width=30% align=RIGHT>Daya : </td><td width=40%><?php echo $daya ?></td><td width=30%></td>
</tr>
<tr>
<td width=30% align=RIGHT>Kode Golongan : </td><td width=40%><?php echo $kdgol ?></td><td width=30%></td>
</tr>
<tr>
<td width=30% align=RIGHT>Trafo Arus (CT) : </td><td width=40%><?php echo $ct ?></td><td width=30%></td>
</tr>
<tr>
<td width=30% align=RIGHT>Trafo Tegangan (PT) : </td><td width=40%><?php echo $pt ?></td><td width=30%></td>
</tr>
<tr>
<td width=30% align=RIGHT>Faktor kali kWh : </td><td width=40%><?php echo $fx_meter ?></td><td width=30%></td>
</tr>
<tr>
<td width=30% align=RIGHT>Faktor kali kVArh : </td><td width=40%><?php echo $fx_kvArh ?></td><td width=30%></td>
</tr>
<tr>
<td width=30% align=RIGHT>Tanggal Periksa Terakhir : </td><td width=40%><input type="TEXT" name="tgl_periksa" value=<?php echo $tgl_periksa ?> >[YYYYMMDD : tahun,bulan,tgl]</td><td width=30%></td>
</tr>
<tr>
<td width=30% align=RIGHT></td><td width=40%><hr></td><td width=30%></td>
</tr>
<tr>
<td width=30%></td><td width=40%><input type="checkbox" <?php echo $st_kdail ?> name="kdail">Keberadaan AIL</td><td width=30%></td>
</tr>
<tr>
<td width=30%></td><td width=40%><input type="checkbox" <?php echo $st_kriteria1 ?> name="kriteria1">Pendapatan Tagihan Listrik</td><td width=30%></td>
</tr>
<tr>
<td width=30%></td><td width=40%><input type="checkbox" <?php echo $st_kriteria2 ?> name="kriteria2">Kesesuaian Pengenaan Tarif</td><td width=30%></td>
</tr>
<tr>
<td width=30%></td><td width=40%><input type="checkbox" <?php echo $st_kriteria3 ?> name="kriteria3">Periode pemeriksaan Fisik</td><td width=30%></td>
</tr>
<tr>
<td width=30%></td><td width=40%><input type="checkbox" <?php echo $st_kriteria4 ?> name="kriteria4">Kesesuaian Informasi Teknis (CT/PT)</td><td width=30%></td>
</tr>
<tr>
<td width=30%></td><td width=40%><input type="checkbox" <?php echo $st_kriteria5 ?> name="kriteria5">Daya Tersambung</td><td width=30%></td>
</tr>
<tr>
<td width=30% align=RIGHT>Jumlah Ketidaksamaan : </td><td width=40%><input type="text" name="ketidaksamaan" value=<?php echo $ketidaksamaan ?> readonly="readonly"></td><td width=30%></td>
</tr>
<tr>
<td width=30% align=RIGHT>Periode/Update : </td><td width=40%><?php echo "[".substr($prd,0,6)."-".substr($prd,6,1)."] / [".$tgl."-".$jam."]" ?></td><td width=30%></td>
</tr>
<tr>
<td width=30% align=RIGHT>Pertimbangan Prioritas : </td><td width=40%><textarea name="pertimbang" rows="4" cols="40" ><?php echo $pertimbang ?> </textarea></td><td width=30%></td>
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