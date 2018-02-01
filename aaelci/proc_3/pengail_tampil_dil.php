<html>
<head><title>Entry/Edit Verifikasi DIL/AIL - Sistem Informasi Pengelolaan AIL</title></head>
<body>
<center>
*** Entry Verifikasi DIL/AIL Informasi AIL ***<hr><br>
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
$idplg=$data['IDPEL'];
$nama=$data['NMPLG'];
$kodeup=$data['KODEUP'];
$Tarif=$data['GOLTARIF'];
$sdaya=$data['DAYA'];
$kdgol=$data['GOLPIUTANG'];
$fx_meter=$data['FMKWH'];
$fx_kvArh=$fx_meter;
  if ($sdaya>=41500){
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
  $ctp="-";
  $cts="-";
  }
$blthmut=$data['TGLMUTASI'];
$jnsmut=$data['JENIS_MUTASI'];
$swtrf=$data['SEWA_TRF'];
$sfrt=$data['FRT'];

$cn=oci_connect($uid,$pwd,$dbs);
$Qry="select * from cust_ail_dil where idpel= '$midpel' ";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
$data=oci_fetch_array($stm,OCI_BOTH);

$nmplg=$data['NMPLG'];
$golpiutang=$data['GOLPIUTANG'];
$daya=$data['DAYA'];
$goltarif=$data['GOLTARIF'];
$fmkwh=$data['FMKWH'];
$tgl_mutasi=$data['TGL_MUTASI'];
$jns_mutasi=$data['JNS_MUTASI'];
$sewa_trf=$data['SEWA_TRF'];
$frt=$data['FRT'];
$kondisi_ail=$data['KONDISI_AIL'];
$keterangan=$data['KETERANGAN'];
$prd=$data['PRD_LAP'];
$tgl=$data['TGL_UPDATE'];
$jam=$data['JAM_UPDATE'];
$usul1=$data['USUL_PDP1'];
$usul2=$data['USUL_PDP2'];
$usul3=$data['USUL_PDP3'];
$usul4=$data['USUL_PDP4'];
$usul5=$data['USUL_PDP5'];
$usul6=$data['USUL_PDP6'];
$usul7=$data['USUL_PDP7'];
$prd=$data['PRD_LAP'];
$tgl=$data['TGL_UPDATE'];
$jam=$data['JAM_UPDATE'];



$c_idpel=$data['C_IDPEL'];
$c_nmplg=$data['C_NMPLG'];
$c_golpiutang=$data['C_GOLPIUTANG'];
$c_daya=$data['C_DAYA'];
$c_goltarif=$data['C_GOLTARIF'];
$c_fmkwh=$data['C_FMKWH'];
$c_fmkvarh=$data['C_FMKVARH'];
$c_mutasi=$data['C_MUTASI'];
$c_sewa_trf=$data['C_SEWA_TRF'];
$c_frt=$data['C_FRT'];
$mct=$data['CT'];
$mpt=$data['PT'];
$tglmutasi=$data['TGLMUT'];
$jmut=$data['JMUT'];






if ($c_idpel=="1") {$st_idpel="checked";} else {$st_idpel="";}
if ($c_nmplg=="1") {$st_nmplg="checked";} else {$st_nmplg="";}
if ($c_golpiutang=="1") {$st_golpiutang="checked";} else {$st_golpiutang="";}
if ($c_daya=="1") {$st_daya="checked";} else {$st_daya="";}
if ($c_goltarif=="1") {$st_goltarif="checked";} else {$st_goltarif="";}
if ($c_fmkwh=="1") {$st_fmkwh="checked";} else {$st_fmkwh="";}
if ($c_fmkvarh=="1") {$st_fmkvarh="checked";} else {$st_fmkvarh="";}
if ($c_mutasi=="1") {$st_mutasi="checked";} else {$st_mutasi="";}
if ($c_sewa_trf=="1") {$st_sewa_trf="checked";} else {$st_sewa_trf="";}
if ($c_frt=="1") {$st_frt="checked";} else {$st_frt="";}


if ($usul1=="1") {$st_usul1="checked";} else {$st_usul1="";}
if ($usul2=="1") {$st_usul2="checked";} else {$st_usul2="";}
if ($usul3=="1") {$st_usul3="checked";} else {$st_usul3="";}
if ($usul4=="1") {$st_usul4="checked";} else {$st_usul4="";}
if ($usul5=="1") {$st_usul5="checked";} else {$st_usul5="";}
if ($usul6=="1") {$st_usul6="checked";} else {$st_usul6="";}
if ($usul7=="1") {$st_usul7="checked";} else {$st_usul7="";}



?>
<form method="post" action="pengail_submit_dil_ail.php">

<tr>
<td width=30% align=RIGHT>
<input type="hidden" name="prd" value=<?php echo $prd ?> >
<input type="hidden" name="tgl" value=<?php echo $tgl ?> >
<input type="hidden" name="jam" value=<?php echo $jam ?> >
Periode/Update : </td><td width=40%><?php echo "[".substr($prd,0,6)."-".substr($prd,6,1)."] / [".$tgl."-".$jam."]" ?></td><td width=30%></td>
</tr>

<tr>
<td width=20% align=RIGHT>ID Pelanggan : </td><td width=30%><input type="checkbox" <?php echo $st_idpel ?> name="_midpel">
<input type="text" name="id_pel" value=<?php echo $idplg ?> readonly="readonly"</td>
<td width=40%><input type="text" name="mid_pel" size="45" ></td>
</tr>

<tr>
<td width=20% align=RIGHT>Nama Pelanggan : </td><td width=30%><input type="checkbox" <?php echo $st_nmplg ?> name="mnmplg">
<?php echo $nama ?> </td>
<td width=40%><input type="text" name="mnm_plg"  size="45" ></td>
</tr>

<tr>
<td width=20% align=RIGHT>Gol Piutang : </td><td width=30%><input type="checkbox" <?php echo $st_golpiutang ?> name="mgolpiutang">
<?php echo $kdgol ?> </td>
<td width=40%><input type="text" name="mgol_piutang"  size="45" ></td>
</tr>

<tr>
<td width=20% align=RIGHT>Daya : </td><td width=30%><input type="checkbox" <?php echo $st_daya ?> name="mdaya">
<?php echo $sdaya ?> </td>
<td width=40%><input type="text" name="m_daya"  size="45" ></td>
</tr>

<tr>
<td width=20% align=RIGHT>Gol Tarif : </td><td width=30%><input type="checkbox" <?php echo $st_goltarif ?> name="mtarif">
<?php echo $Tarif ?> </td>
<td width=40%><input type="text" name="mtrf"  size="45" ></td>
</tr>

<tr>
<td width=20% align=RIGHT>Faktor Kali kWh : </td><td width=30%><input type="checkbox" <?php echo $st_fmkwh ?> name="mfmkwh">
<?php echo $fx_meter."[".$ct."][".$pt."]" ?> </td>
<td width=40%><input type="text" <?php if (strlen($mct)>0){echo "value=\"$mct\" ";} ?> name="m_ct" ><input type="text"  name="m_pt" <?php if (strlen($mpt)>0){echo "value=\"$mpt\" ";} ?> size="20" ></td>
</tr>

<tr>
<td width=20% align=RIGHT>Faktor Kali kVArh : </td><td width=30%><input type="checkbox" <?php echo $st_fmkvarh ?> name="mfmkvarh">
<?php echo $fx_meter."[".$ct."][".$pt."]" ?> </td>
<td width=40%><input type="text" name="m_ct" <?php if (strlen($mct)>0){echo "value=\"$mct\" ";} ?> size="20" ><input type="text" name="m_pt" <?php if (strlen($mpt)>0){echo "value=\"$mpt\" ";} ?>  size="20" ></td>
</tr>

<tr>
<td width=20% align=RIGHT>Tgl/Jenis Mutasi : </td><td width=30%><input type="checkbox" <?php echo $st_mutasi ?> name="mmutasi">
<?php echo $blthmut."/".$jnsmut ?> </td>
<td width=40%><input type="text" name="m_blthmut" <?php if (strlen($tglmutasi)>0){echo "value=\"$tglmutasi\" ";} ?>  size="20" ><input type="text" name="m_jmut" <?php if (strlen($jmut)>0){echo "value=\"$jmut\" ";} ?>  size="20" ></td>
</tr>

<tr>
<td width=20% align=RIGHT>Sewa Trafo : </td><td width=30%><input type="checkbox" <?php echo $st_sewa_trf ?> name="msewa_trf">
<?php echo $swtrf ?> </td>
<td width=40%><input type="text" name="mswtrf"  size="45" ></td>
</tr>

<tr>
<td width=20% align=RIGHT>Faktor Rugi Trafo : </td><td width=30%><input type="checkbox" <?php echo $st_frt ?> name="m_frt">
<?php echo $sfrt ?> </td>
<td width=40%><input type="text" name="mfrt"  size="45" ></td>
</tr>

<tr>
<td width=20% align=RIGHT>Kondisi AIL :</td><td width=30%><?php echo $kondisi_ail ?> </td>
<td width=40%>
<select name="kdail" value="<?php echo $kondisi_ail ?>">
  <option value="Ada">Ada</option>
  <option value="Tidak Lengkap">Tidak Lengkap</option>
  <option value="Tidak Ada">Tidak Ada</option>
  <option value="">---</option>
</select>
</td>
</tr>

<tr>
<td width=20% align=RIGHT>Keterangan :</td><td width=30%>
<input type="text" name="keterangan" value="<?php echo $keterangan ?>" size="45" > </td>
<td width=40%>
</td>
</tr>




<tr>
<td width=20% align=RIGHT></td><td width=50%><input type="checkbox" <?php echo $st_usul1 ?> name="m_usul1">
Mendapatkan  salinan dokumen SPJBTL terkini
</td>
<td width=30%></td>
</tr>
<tr>
<td width=20% align=RIGHT></td><td width=30%><input type="checkbox" <?php echo $st_usul2 ?> name="m_usul2">
Mendapatkan salinan kuitansi pembayaran PB atau mutasi terkini </td>
<td width=40%></td>
</tr>
<tr>
<td width=20% align=RIGHT></td><td width=30%><input type="checkbox" <?php echo $st_usul3 ?> name="m_usul3">
Mendapatkan salinan BA Pemasangan/PK Penyambungan terkini </td>
<td width=40%></td>
</tr>
<tr>
<td width=20% align=RIGHT></td><td width=30%><input type="checkbox" <?php echo $st_usul4 ?> name="m_usul4">
Melakukan verifikasi klasifikasi Kode Plg dengan kebijakan di PLN</td>
<td width=40%></td>
</tr>
<tr>
<td width=20% align=RIGHT></td><td width=30%><input type="checkbox" <?php echo $st_usul5 ?> name="m_usul5">
Mendapatkan salinan BA Verifikasi Fisik dari Tim Verifikasi</td>
<td width=40%></td>
</tr>
<tr>
<td width=20% align=RIGHT></td><td width=30%><input type="checkbox" <?php echo $st_usul6 ?> name="m_usul6">
Melakukan pemeriksaan fisik atas letak dan kepemilikan trafo</td>
<td width=40%></td>
</tr>
<tr>
<td width=20% align=RIGHT></td><td width=30%><input type="checkbox" <?php echo $st_usul7 ?> name="m_usul7">
Melakukan pemeriksaan fisik atas daya terpasang di pelanggan</td>
<td width=40%></td>
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