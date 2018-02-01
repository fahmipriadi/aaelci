<?php
$midpel=$_POST['id_pel'];


//$midpel=$_POST['idpel'];
//include("../data_akses/pengail_modul.php");
//$cn=oci_connect($uid,$pwd,$dbs);
//$Qry="select * from dil where idpel= '$midpel'";
//$stm=oci_parse($cn,$Qry);
//oci_execute($stm);
//$data=oci_fetch_array($stm,OCI_BOTH);

$c_idpel=$_POST['_midpel'];
$c_nmplg=$_POST['mnmplg'];
$c_golpiutang=$_POST['mgolpiutang'];
$c_daya=$_POST['mdaya'];
$c_goltarif=$_POST['mtarif'];
$c_fmkwh=$_POST['mfmkwh'];
$c_fmkvarh=$_POST['mfmkvarh'];
$c_mutasi=$_POST['mmutasi'];
$c_sewa_trf=$_POST['msewa_trf'];
$c_frt=$_POST['m_frt'];
$kdail=$_POST['kdail'];


$m_idpel=$_POST['mid_pel'];
$nmplg=$_POST['mnm_plg'];
$golpiutang=$_POST['mgol_piutang'];
$daya=$_POST['m_daya'];
$goltarif=$_POST['mtrf'];
$mct=$_POST['m_ct'];
$mpt=$_POST['m_pt'];
$tgl_mutasi=$_POST['m_blthmut'];
$jns_mutasi=$_POST['m_jmut'];
$sewa_trf=$_POST['mswtrf'];
$frt=$_POST['mfrt'];
$kondisi_ail=$_POST['kdail'];

$keterangan=$_POST['keterangan'];
$m_usul1=$_POST['m_usul1'];
$m_usul2=$_POST['m_usul2'];
$m_usul3=$_POST['m_usul3'];
$m_usul4=$_POST['m_usul4'];
$m_usul5=$_POST['m_usul5'];
$m_usul6=$_POST['m_usul6'];
$m_usul7=$_POST['m_usul7'];

$prdupdate=$_POST['prd'];
$tglupdate=$_POST['tgl'];
$jamupdate=$_POST['jam'];




if ($c_idpel=="on") {$_midpel="1";} else {$_midpel="0";}
if ($c_nmplg=="on") {$_mnmplg="1";} else {$_mnmplg="0";}
if ($c_golpiutang=="on") {$_mgolpiutang="1";} else {$_mgolpiutang="0";}
if ($c_daya=="on") {$_mdaya="1";} else {$_mdaya="0";}
if ($c_goltarif=="on") {$_mtarif="1";} else {$_mtarif="0";}
if ($c_fmkwh=="on") {$_mfmkwh="1";} else {$_mfmkwh="0";}
if ($c_fmkvarh=="on") {$_mfmkvarh="1";} else {$_mfmkvarh="0";}
if ($c_mutasi=="on") {$_mmutasi="1";} else {$_mmutasi="0";}
if ($c_sewa_trf=="on") {$_m_sewatrf="1";} else {$_m_sewatrf="0";}
if ($c_frt=="on") {$_m_frt="1";} else {$_m_frt="0";}

$jml_sesuai=($_midpel+$_mnmplg+$_mgolpiutang+$_mdaya+$_mtarif+$_mfmkwh+$_mfmkvarh+$_mmutasi+$_m_sewatrf+$_m_frt);
$jml_td_sesuai=10-$jml_sesuai;

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
$Qry="update cust_ail_dil set 
NMPLG			='$nmplg',                  
GOLPIUTANG             ='$golpiutang',
DAYA                   ='$daya',
GOLTARIF               ='$goltarif',
TGL_MUTASI             ='$tgl_mutasi',
JNS_MUTASI             ='$jns_mutasi',
SEWA_TRF               ='$sewa_trf',
FRT                    ='$frt',
KONDISI_AIL            ='$kondisi_ail',
KETERANGAN             ='$keterangan',
USUL_PDP1              ='$usul1',
USUL_PDP2              ='$usul2',
USUL_PDP3              ='$usul3',
USUL_PDP4              ='$usul4',
USUL_PDP5              ='$usul5',
USUL_PDP6              ='$usul6',
USUL_PDP7              ='$usul7',
TGL_UPDATE             ='$tgl',
JAM_UPDATE             ='$jam',
PRD_LAP                ='$prd',
C_IDPEL                ='$_midpel',
C_NMPLG                ='$_mnmplg',
C_GOLPIUTANG           ='$_mgolpiutang',
C_DAYA                 ='$_mdaya',
C_GOLTARIF             ='$_mtarif',
C_FMKWH                ='$_mfmkwh',
C_FMKVARH              ='$_mfmkvarh',
C_MUTASI               ='$_mmutasi',
C_SEWA_TRF             ='$_m_sewatrf',
C_FRT                  ='$_m_frt' ,
CT             ='$mct' ,
PT             ='$mpt' ,
TGLMUT         ='$tgl_mutasi' ,
JMUT           ='$jns_mutasi' 
where idpel='$midpel' ";

//echo $Qry;



$stm=oci_parse($cn,$Qry);
oci_execute($stm);

$Qry="update cust_ail_pengawasan set prd_program='$prd',jml_pdp3=$jml_sesuai where idpel='$midpel'";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);

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



echo "Pelanggan dengan ID pelanggan ".$midpel." tersimpan dengan Jumlah ketidak-samaan = ".$jml_td_sesuai;
echo "<br>Jumlah Usulan : ".$jml_usul;
echo "<br>Periode : ".$prd."<br>";
?>
<form method="post" action="pengail_entry_dil_ail.php">
<br><br><input type="submit" name="kembali" value="Kembali ke form Entry">
</form>
