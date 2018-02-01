<?php
$midpel=$_POST['id_pel'];



$c_goltarif=$_POST['mtarif'];
$c_daya=$_POST['mdaya'];
$c_no_meter=$_POST['mnometer'];
$c_merk_meter=$_POST['mmerkmeter'];
$c_type_meter=$_POST['mtypemeter'];
$c_ct_p=$_POST['mctp'];
$c_ct_s=$_POST['mcts'];
$c_pt_p=$_POST['mptp'];
$c_pt_s=$_POST['mpts'];
$c_fmkwh=$_POST['mfmkwh'];

$mtrf=$_POST['m_tarif'];
$mdaya=$_POST['m_daya'];
$mnometer=$_POST['mno_meter'];
$mmerkmeter=$_POST['mmerk_meter'];
$mtypemeter=$_POST['mtype_meter'];
$mctp=$_POST['m_ctp'];
$mcts=$_POST['m_cts'];
$mptp=$_POST['m_ptp'];
$mpts=$_POST['m_pts'];
$mfx=$_POST['m_fx'];

$mrctp=$_POST['r_ct_p'];
$msctp=$_POST['s_ct_p'];
$mtctp=$_POST['t_ct_p'];
$mrcts=$_POST['r_ct_s'];
$mscts=$_POST['s_ct_s'];
$mtcts=$_POST['t_ct_s'];
$mrpts=$_POST['r_pt_s'];
$mspts=$_POST['s_pt_s'];
$mtpts=$_POST['t_pt_s'];

$prdupdate=$_POST['prd'];
$tglupdate=$_POST['tgl'];
$jamupdate=$_POST['jam'];




if ($c_goltarif=="on") {$_goltarif="1";$goltarif='';} else {$_goltarif="0"; $goltarif=$mtrf;}
if ($c_daya=="on") {$_daya="1";$daya=0;} else {$_daya="0"; $daya=$mdaya;}
if ($c_no_meter=="on") {$_nometer="1";$nometer=0;} else {$_nometer="0"; $nometer=$mnometer;}
if ($c_merk_meter=="on") {$_merkmeter="1";$merkmeter='';} else {$_merkmeter="0"; $merkmeter=$mmerkmeter;}
if ($c_type_meter=="on") {$_typemeter="1";$typemeter='';} else {$_typemeter="0"; $typemeter=$mtypemeter;}
if ($c_ct_p=="on") {$_ctp="1";$ctp=0;} else {$_ctp="0"; $ctp=$mctp;}
if ($c_ct_s=="on") {$_cts="1";$cts=0;} else {$_cts="0"; $cts=$mcts;}
if ($c_pt_p=="on") {$_ptp="1";$ptp=0;} else {$_ptp="0"; $ptp=$mptp;}
if ($c_pt_s=="on") {$_pts="1";$pts=0;} else {$_pts="0"; $pts=$mpts;}
if ($c_fmkwh=="on") {$_fmkwh="1";$fmkwh=0;} else {$_fmkwh="0"; $fmkwh=$mfx;}


$app=$_POST['app'];
$psg=$_POST['psg'];
$kunci=$_POST['kunci'];
$gardu=$_POST['gardu'];
$tglrawat=$_POST['tglrawat'];
$keterangan=$_POST['keterangan'];
$tglfisik=$_POST['tglfisik'];


$m_usul1=$_POST['m_usul1'];
$m_usul2=$_POST['m_usul2'];
$m_usul3=$_POST['m_usul3'];
$m_usul4=$_POST['m_usul4'];
$m_usul5=$_POST['m_usul5'];
$m_usul6=$_POST['m_usul6'];
$m_usul7=$_POST['m_usul7'];



if ($m_usul1=="on") {$usul1="1";} else {$usul1="0";}
if ($m_usul2=="on") {$usul2="1";} else {$usul2="0";}
if ($m_usul3=="on") {$usul3="1";} else {$usul3="0";}
if ($m_usul4=="on") {$usul4="1";} else {$usul4="0";}
if ($m_usul5=="on") {$usul5="1";} else {$usul5="0";}
if ($m_usul6=="on") {$usul6="1";} else {$usul6="0";}
if ($m_usul7=="on") {$usul7="1";} else {$usul7="0";}

$jml_usul=$usul1+$usul2+$usul3+$usul4+$usul5+$usul6+$usul7;





$now=getdate();
$bln=str_pad($now[mon],2,"0",STR_PAD_LEFT);
$tg=str_pad($now[mday],2,"0",STR_PAD_LEFT);
$jm=str_pad($now[hours],2,"0",STR_PAD_LEFT);
$mnt=str_pad($now[minutes],2,"0",STR_PAD_LEFT);
$dt=str_pad($now[seconds],2,"0",STR_PAD_LEFT);


if ($tglupdate==null){
$tgl=$now[year].$bln.$tg;
$jam=$jm.$mnt.$dt;
   if ($now[mday]<=15){
      $prd=$now[year].$bln."1";
      } else {
      $prd =$now[year].$bln."2";
      }
} else {
$tgl=$tglupdate;
$jam=$jamupdate;
$prd=$prdupdate;
}





include("../data_akses/pengail_modul.php");
$cn=oci_connect($uid,$pwd,$dbs);
$Qry="update cust_ail_fisik set 
GOLTARIF='$goltarif', 
DAYA ='$daya',
NO_METER ='$nometer',
MERK_METER='$merkmeter',
TYPE_METEr='$typemeter',
CT_P  ='$ctp',
CT_S  ='$cts',
PT_P  ='$ptp',
PT_S  ='$pts',
FMKWH ='$fmkwh',
C_GOLTARIF='$_goltarif',
C_DAYA  ='$_daya',
C_NO_METER='$_nometer',
C_MERK_METER='$_merkmeter',
C_TYPE_METER='$_typemeter',
C_CT_P  ='$_ctp',
C_CT_S  ='$_cts',
C_PT_P  ='$_ptp',
C_PT_S  ='$_pts',
C_FMKWH  ='$_fmkwh',
KONDISI_APP='$app',
KONDISI_PSG ='$psg',
KONDISI_KUNCI= '$kunci',
KONDISI_GARDU='$gardu',
TGL_PERAWATAN='$tglrawat',
R_CT_P='$mrctp',
S_CT_P='$msctp',
T_CT_P='$mtctp',
R_CT_S='$mrcts',
S_CT_S='$mscts',
T_CT_S='$mtcts',
R_PT='$mrpts',   
S_PT='$mspts',  
T_PT='$mtpts',   
HASIL_1  ='$usul1',
HASIL_2  ='$usul2',
HASIL_3  ='$usul3',
HASIL_4  ='$usul4',
HASIL_5  ='$usul5',
HASIL_6  ='$usul6',
HASIL_7  ='$usul7',
KETERANGAN= '$keterangan',
USUL  ='$usul',
TGL_VERIFIKASI='$tglfisik',
TGL_UPDATE             ='$tgl',
JAM_UPDATE             ='$jam',
PRD_LAP                ='$prd'
where idpel='$midpel' ";

//echo $Qry;

$stm=oci_parse($cn,$Qry);
oci_execute($stm);


$Qry="update cust_ail_pengawasan set jml_pdp4=$jml_usul,TGL_UPDATE ='$tgl',
      JAM_UPDATE='$jam',PRD_PROGRAM='$prd',PRD_LAP='$prd' where idpel='$midpel'";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
oci_commit($cn);
	
$Qry="select (jml_pdp4+jml_pdp3) jml_pdp from cust_ail_pengawasan where idpel='$midpel'";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
if ($data=oci_fetch_array($stm,OCI_BOTH)){$jml_pdp=$data[0];}
if ($jml_pdp==17){
   $Qry="update cust_ail_pengawasan set status='1',TGL_UPDATE ='$tgl',
      JAM_UPDATE='$jam' where idpel='$midpel'";
   } else {
   $Qry="update cust_ail_pengawasan set status='0',TGL_UPDATE =null,
      JAM_UPDATE=null where idpel='$midpel'";
   }
   $stm=oci_parse($cn,$Qry);
   oci_execute($stm);



oci_commit($cn);
oci_close($cn);





echo "Pelanggan dengan ID pelanggan ".$midpel." tersimpan dengan nilai kesesuaian = ".$jml_usul;
echo "<br>Periode : ".$prd."<br>";
?>
<form method="post" action="pengail_entry_fisik.php">
<br><br><input type="submit" name="kembali" value="Kembali ke form Entry">
</form>
