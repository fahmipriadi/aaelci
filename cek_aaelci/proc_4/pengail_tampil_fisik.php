<html>
<head><title>Entry/Edit Verifikasi Fisik - Sistem Informasi Pengelolaan AIL</title></head>
<body>
<center>
*** Entry Verifikasi Fisik ***<hr><br>
</center>
<table width=100%>
<tr>
<?php
global $midpel;

$midpel=$_POST['idpel'];
include("../data_akses/pengail_modul.php");
$cn=oci_connect($uid,$pwd,$dbs);
$Qry="select * from v_diltek where idpel= '$midpel'";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
$data=oci_fetch_array($stm,OCI_BOTH);
$idplg=$data['IDPEL'];
$nama=$data['NMPLG'];
$kodeup=$data['KODEUP'];
$Tarif=$data['GOLTARIF'];
$sdaya=$data['DAYA'];
$nometer=$data['NO_METER'];
$merkmeter=$data['MERK_METER'];
$typemeter=$data['TYPE_METER'];

$fx_meter=$data['FMKWH'];
$fx_kvArh=$fx_meter;
    $ctp=$data['CT_P'];
    $cts=$data['CT_S'];
    $ptp=$data['PT_P'];
    $pts=$data['PT_S'];
    $fx=$data['FMKWH'];
    $fm=$data['FM'];  
    $nmgar=$data['NAMA_GARDU'];
    $notiang=$data['NO_TIANG'];
    $fasa=$data['FASA'];


$cn=oci_connect($uid,$pwd,$dbs);
$Qry="select * from cust_ail_fisik where idpel= '$midpel' ";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
$data=oci_fetch_array($stm,OCI_BOTH);






$fnmplg=$data['NMPLG'];
$fdaya=$data['DAYA'];
$fgoltarif=$data['GOLTARIF'];
$fnometer=$data['NO_METER'];
$fmerkmeter=$data['MERK_METER'];
$ftypemeter=$data['TYPE_METER'];

    $fctp=$data['CT_P'];
    $fcts=$data['CT_S'];
    $fptp=$data['PT_P'];
    $fpts=$data['PT_S'];
    $ffx=$data['FMKWH'];
    $ffm=$data['FM'];  
    $fnmgar=$data['NAMA_GARDU'];
    $fnotiang=$data['NO_TIANG'];
    $ffasa=$data['FASA'];




$app=$data['KONDISI_APP'];
$psg=$data['KONDISI_PSG'];
$kunci=$data['KONDISI_KUNCI'];
$gardu=$data['KONDISI_GARDU'];
$tglrawat=$data['TGL_PERAWATAN'];

    $rctp=$data['R_CT_P'];
    $sctp=$data['S_CT_P'];
    $tctp=$data['T_CT_P'];
    $rcts=$data['R_CT_S'];
    $scts=$data['S_CT_S'];
    $tcts=$data['T_CT_S'];
    $rptp=$data['R_PT'];
    $sptp=$data['S_PT'];
    $tptp=$data['T_PT'];

$tglfisik=$data['TGL_VERIFIKASI'];
$keterangan=$data['KETERANGAN'];
$usul=$data['USUL'];
$prd=$data['PRD_LAP'];
$tgl=$data['TGL_UPDATE'];
$jam=$data['JAM_UPDATE'];

$usul1=$data['HASIL_1'];
$usul2=$data['HASIL_2'];
$usul3=$data['HASIL_3'];
$usul4=$data['HASIL_4'];
$usul5=$data['HASIL_5'];
$usul6=$data['HASIL_6'];
$usul7=$data['HASIL_7'];
$prd=$data['PRD_LAP'];
$tgl=$data['TGL_UPDATE'];
$jam=$data['JAM_UPDATE'];


$c_goltarif=$data['C_GOLTARIF'];
$c_daya=$data['C_DAYA'];
$c_no_meter=$data['C_NO_METER'];
$c_merk_meter=$data['C_MERK_METER'];
$c_type_meter=$data['C_TYPE_METER'];
$c_ct_p=$data['C_CT_P'];
$c_ct_s=$data['C_CT_S'];
$c_pt_p=$data['C_PT_P'];
$c_pt_s=$data['C_PT_S'];
$c_fmkwh=$data['C_FMKWH'];



if ($c_goltarif=="1") {$st_goltarif="checked";} else {$st_goltarif="";}
if ($c_daya=="1") {$st_daya="checked";} else {$st_daya="";}
if ($c_no_meter=="1") {$st_no_meter="checked";} else {$st_no_meter="";}
if ($c_merk_meter=="1") {$st_merk_meter="checked";} else {$st_merk_meter="";}
if ($c_type_meter=="1") {$st_type_meter="checked";} else {$st_type_meter="";}
if ($c_ct_p=="1") {$st_ct_p="checked";} else {$st_ct_p="";}
if ($c_ct_s=="1") {$st_ct_s="checked";} else {$st_ct_s="";}
if ($c_pt_p=="1") {$st_pt_p="checked";} else {$st_pt_p="";}
if ($c_pt_s=="1") {$st_pt_s="checked";} else {$st_pt_s="";}
if ($c_fmkwh=="1") {$st_fmkwh="checked";} else {$st_fmkwh="";}


if ($usul1=="1") {$st_usul1="checked";} else {$st_usul1="";}
if ($usul2=="1") {$st_usul2="checked";} else {$st_usul2="";}
if ($usul3=="1") {$st_usul3="checked";} else {$st_usul3="";}
if ($usul4=="1") {$st_usul4="checked";} else {$st_usul4="";}
if ($usul5=="1") {$st_usul5="checked";} else {$st_usul5="";}
if ($usul6=="1") {$st_usul6="checked";} else {$st_usul6="";}
if ($usul7=="1") {$st_usul7="checked";} else {$st_usul7="";}



?>
<form method="post" action="pengail_submit_fisik.php">

<tr>
<td width=30% align=RIGHT>Periode/Update : </td><td width=40%><?php echo "[".substr($prd,0,6)."-".substr($prd,6,1)."] / [".$tgl."-".$jam."]" ?></td><td width=30%></td>
</tr>

<tr>
<td width=20% align=RIGHT>ID Pelanggan : </td><td width=30%><input type="text" name="id_pel" value=<?php echo $idplg ?> readonly="readonly"</td>
<td width=40%></td>
</tr>

<tr>
<td width=20% align=RIGHT>Nama Pelanggan : </td><td width=30%>
<?php echo $nama ?> </td>
<td width=40%></td>
</tr>

<tr>
<td width=20% align=RIGHT>Gol Tarif : </td><td width=30%><input type="checkbox" <?php echo $st_goltarif ?> name="mtarif">
<?php echo $Tarif ?> </td>
<td width=40%><input type="text" name="m_tarif" <?php if (strlen($fgoltarif)>0){echo "value=\"$fgoltarif\" ";} ?> size="45" ></td>
</tr>

<tr>
<td width=20% align=RIGHT>Daya : </td><td width=30%><input type="checkbox" <?php echo $st_daya ?> name="mdaya">
<?php echo $sdaya ?> </td>
<td width=40%><input type="text" name="m_daya" <?php if (strlen($fdaya)>0){echo "value=\"$fdaya\" ";} ?> size="45" ></td>
</tr>

<tr>
<td width=20% align=RIGHT>No Meter : </td><td width=30%><input type="checkbox" <?php echo $st_no_meter ?> name="mnometer">
<?php echo $nometer ?> </td>
<td width=40%><input type="text" name="mno_meter" <?php if (strlen($fnometer)>0){echo "value=\"$fnometer\" ";} ?> size="45" ></td>
</tr>

<tr>
<td width=20% align=RIGHT>Merk Meter : </td><td width=30%><input type="checkbox" <?php echo $st_merk_meter ?> name="mmerkmeter">
<?php echo $merkmeter ?> </td>
<td width=40%><input type="text" name="mmerk_meter" <?php if (strlen($fmerkmeter)>0){echo "value=\"$fmerkmeter\" ";} ?> size="45" ></td>
</tr>

<tr>
<td width=20% align=RIGHT>Type Meter : </td><td width=30%><input type="checkbox" <?php echo $st_type_meter ?> name="mtypemeter">
<?php echo $typemeter ?> </td>
<td width=40%><input type="text" name="mtype_meter" <?php if (strlen($ftypemeter)>0){echo "value=\"$ftypemeter\" ";} ?> size="45" ></td>
</tr>

<tr>
<td width=20% align=RIGHT>CT Primer : </td><td width=30%><input type="checkbox" <?php echo $st_ct_p ?> name="mctp">
<?php echo $ctp ?> </td>
<td width=40%><input type="text" name="m_ctp" <?php if (strlen($fctp)>0){echo "value=\"$fctp\" ";} ?> size="45" ></td>
</tr>

<tr>
<td width=20% align=RIGHT>CT Sekunder : </td><td width=30%><input type="checkbox" <?php echo $st_ct_s ?> name="mcts">
<?php echo $cts ?> </td>
<td width=40%><input type="text" name="m_cts" <?php if (strlen($fcts)>0){echo "value=\"$fcts\" ";} ?> size="45" ></td>
</tr>

<tr>
<td width=20% align=RIGHT>PT Primer : </td><td width=30%><input type="checkbox" <?php echo $st_pt_p ?> name="mptp">
<?php echo $ptp ?> </td>
<td width=40%><input type="text" name="m_ptp" <?php if (strlen($fptp)>0){echo "value=\"$fptp\" ";} ?> size="45" ></td>
</tr>

<tr>
<td width=20% align=RIGHT>PT Sekunder : </td><td width=30%><input type="checkbox" <?php echo $st_pt_s ?> name="mpts">
<?php echo $pts ?> </td>
<td width=40%><input type="text" name="m_pts" <?php if (strlen($fpts)>0){echo "value=\"$fpts\" ";} ?> size="45" ></td>
</tr>

<tr>
<td width=20% align=RIGHT>Faktor Kali kWh : </td><td width=30%><input type="checkbox" <?php echo $st_fmkwh ?> name="mfmkwh">
<?php echo $fx_meter ?> </td>
<td width=40%><input type="text" name="m_fx" <?php if (strlen($ffx)>0){echo "value=\"$ffx\" ";} ?> size="45" ></td>
</tr>


<tr>
<td width=20% align=RIGHT>Hasil Ukur CT Primer Fasa-R :</td><td width=30%>
<input type="text" name="r_ct_p" <?php if (strlen($rctp)>0){echo "value=\"$rctp\" ";} ?>  size="15" > </td>
<td width=40%>
</td>
</tr>
<tr>
<td width=20% align=RIGHT>Hasil Ukur CT Primer Fasa-S :</td><td width=30%>
<input type="text" name="s_ct_p" <?php if (strlen($rctp)>0){echo "value=\"$sctp\" ";} ?>  size="15" > </td>
<td width=40%>
</td>
</tr>
<tr>
<td width=20% align=RIGHT>Hasil Ukur CT Primer Fasa-T :</td><td width=30%>
<input type="text" name="t_ct_p" <?php if (strlen($rctp)>0){echo "value=\"$tctp\" ";} ?>  size="15" > </td>
<td width=40%>
</td>
</tr>

<tr>
<td width=20% align=RIGHT>Hasil Ukur CT Sekunder Fasa-R :</td><td width=30%>
<input type="text" name="r_ct_s" <?php if (strlen($rcts)>0){echo "value=\"$rcts\" ";} ?>  size="15" > </td>
<td width=40%>
</td>
</tr>
<tr>
<td width=20% align=RIGHT>Hasil Ukur CT Sekunder Fasa-S :</td><td width=30%>
<input type="text" name="s_ct_s" <?php if (strlen($rcts)>0){echo "value=\"$scts\" ";} ?>  size="15" > </td>
<td width=40%>
</td>
</tr>
<tr>
<td width=20% align=RIGHT>Hasil Ukur CT Sekunder Fasa-T :</td><td width=30%>
<input type="text" name="t_ct_s" <?php if (strlen($rcts)>0){echo "value=\"$tcts\" ";} ?>  size="15" > </td>
<td width=40%>
</td>
</tr>


<tr>
<td width=20% align=RIGHT>Hasil Ukur PT Sekunder Fasa-R :</td><td width=30%>
<input type="text" name="r_pt_s" <?php if (strlen($rptp)>0){echo "value=\"$rptp\" ";} ?>  size="15" > </td>
<td width=40%>
</td>
</tr>
<tr>
<td width=20% align=RIGHT>Hasil Ukur PT Sekunder Fasa-S :</td><td width=30%>
<input type="text" name="s_pt_s" <?php if (strlen($sptp)>0){echo "value=\"$sptp\" ";} ?>  size="15" > </td>
<td width=40%>
</td>
</tr>
<tr>
<td width=20% align=RIGHT>Hasil Ukur PT Sekunder Fasa-T :</td><td width=30%>
<input type="text" name="t_pt_s" <?php if (strlen($tptp)>0){echo "value=\"$tptp\" ";} ?>  size="15" > </td>
<td width=40%>
</td>
</tr>







<tr>
<td width=20% align=RIGHT>Kondisi APP :</td><td width=30%>
<input type="text" name="app" <?php if (strlen($app)>0){echo "value=\"$app\" ";} ?>  size="45" > </td>
<td width=40%>
</td>
</tr>

<tr>
<td width=20% align=RIGHT>Kondisi Pemasangan CT/PT :</td><td width=30%>
<input type="text" name="psg" <?php if (strlen($psg)>0){echo "value=\"$psg\" ";} ?>  size="45" > </td>
<td width=40%>
</td>
</tr>

<tr>
<td width=20% align=RIGHT>Kondisi Kunci Gardu/Segel :</td><td width=30%>
<input type="text" name="kunci" <?php if (strlen($kunci)>0){echo "value=\"$kunci\" ";} ?>  size="45" > </td>
<td width=40%>
</td>
</tr>

<tr>
<td width=20% align=RIGHT>Kondisi Perawatan Gardu :</td><td width=30%>
<input type="text" name="gardu" <?php if (strlen($gardu)>0){echo "value=\"$gardu\" ";} ?>  size="45" > </td>
<td width=40%>
</td>
</tr>

<tr>
<td width=20% align=RIGHT>Tanggal Perawatan Terakhir [YYYYMMDD] :</td><td width=30%>
<input type="text" name="tglrawat" <?php if (strlen($tglrawat)>0){echo "value=\"$tglrawat\" ";} ?>  size="15" > </td>
<td width=40%>
</td>
</tr>


<tr>
<td width=20% align=RIGHT>Keterangan :</td><td width=30%>
<input type="text" name="keterangan" value="<?php echo $keterangan ?>" size="45" > </td>
<td width=40%>
</td>
</tr>

<tr>
<td width=20% align=RIGHT>Usulan Perbaikan :</td><td width=30%>
<input type="text" name="usul" value="<?php echo $usul ?>" size="45" > </td>
<td width=40%>
</td>
</tr>

<tr>
<td width=20% align=RIGHT>Tanggal Verifikasi Fisik :</td><td width=30%>
<input type="text" name="tglfisik" value="<?php echo $tglfisik ?>" size="15" > </td>
<td width=40%>
</td>
</tr>



<tr>
<td width=20% align=RIGHT></td><td width=50%><input type="checkbox" <?php echo $st_usul1 ?> name="m_usul1">
Kesesuaian Merk,Nomor, dan Type Meter kWh
</td>
<td width=30%></td>
</tr>
<tr>
<td width=20% align=RIGHT></td><td width=30%><input type="checkbox" <?php echo $st_usul2 ?> name="m_usul2">
Kesesuaian Golongan Tarif </td>
<td width=40%></td>
</tr>
<tr>
<td width=20% align=RIGHT></td><td width=30%><input type="checkbox" <?php echo $st_usul3 ?> name="m_usul3">
Kesesuaian Fisik Trafo Arus dan Trafo Tegangan </td>
<td width=40%></td>
</tr>
<tr>
<td width=20% align=RIGHT></td><td width=30%><input type="checkbox" <?php echo $st_usul4 ?> name="m_usul4">
Kesesuaian hasil ukur Trafo Arus dan Trafo Tegangan</td>
<td width=40%></td>
</tr>
<tr>
<td width=20% align=RIGHT></td><td width=30%><input type="checkbox" <?php echo $st_usul5 ?> name="m_usul5">
Kesesuaian Faktor Kali Meter kWh dan kVArh</td>
<td width=40%></td>
</tr>
<tr>
<td width=20% align=RIGHT></td><td width=30%><input type="checkbox" <?php echo $st_usul6 ?> name="m_usul6">
Kesesuaian Alat Pembatas </td>
<td width=40%></td>
</tr>
<tr>
<td width=20% align=RIGHT></td><td width=30%><input type="checkbox" <?php echo $st_usul7 ?> name="m_usul7">
Kesesuaian Standar Pemasangan/Pengawatan Trafo Arus / Tegangan (R/S/T)</td>
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