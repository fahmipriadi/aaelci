<?php session_start(); ?>
<html>
<head><title>Laporan Kelengkapan AIL - Sistem Informasi Pengelolaan AIL</title></head>
<body>
<form  method="post" action="pengail_prioritas_daya_pilih.php">


<?php
$kode_ap=$_SESSION['kode_ap'];
$kodeup=$_SESSION['kodeup'];
$unama=$_SESSION['nip'];
$pswd=$_SESSION['passwd'];


$klpdaya=$_POST['kklp'];
$pwd=$_POST['pass'];
$jml=$_POST['jml'];

if ($pwd==$pswd){

$now=getdate();
$bln=str_pad($now[mon],2,"0",STR_PAD_LEFT);
$tg=str_pad($now[mday],2,"0",STR_PAD_LEFT);
$jm=str_pad($now[hours],2,"0",STR_PAD_LEFT);
$mnt=str_pad($now[minutes],2,"0",STR_PAD_LEFT);
$dt=str_pad($now[seconds],2,"0",STR_PAD_LEFT);

$tgl=$now[year].$bln.$tg;
$jam=$jm.$mnt.$dt;
if ($now[mday]<=15){
  $prd=$now[year].$bln."1";
} else {
  $prd =$now[year].$bln."2";
}



include("../data_akses/pengail_modul.php");
$cn=oci_connect($uid,$pwd,$dbs);
$Qry="update cust_ail_prioritas set 
kd_ail='1',kriteria_1='0',kriteria_2='0',
kriteria_3='0',kriteria_4='0',kriteria_5='0',ketidaksamaan='5',
tgl_periksa='-',pertimbangan='Prioritas Daya Terpasang',tgl_update='$tgl', 
jam_update='$jam', prd_lap='$prd' where idpel in (select idpel from v_prioritas where kodeup='$kodeup'
and prd_plan='$klpdaya' and prd_lap is null)";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);

$Qry="insert into cust_ail_dil(idpel,USUL_PDP1,USUL_PDP2,USUL_PDP3,USUL_PDP4,USUL_PDP5,USUL_PDP6,USUL_PDP7,
prd_plan,kodeup,kode_ap,kode_upi,C_IDPEL,C_NMPLG,C_GOLPIUTANG,C_DAYA,C_GOLTARIF,C_FMKWH,C_FMKVARH,C_MUTASI,C_SEWA_TRF,C_FRT) 
select idpel,'0' krt1,'0' ktr2,'0' krt3,'0' krt4,'0' krt5,'0' krt6,'0' KRT7,
prd_plan,ail_rayon,kode_ap,kode_upi,'0' c1,'0' c2,'0' c3,'0' c4,'0' c5,'0' c6,'0' c7,'0' c8,'0' c9,'0' c10 from cust_ail 
where idpel in (select idpel from cust_ail_prioritas where kodeup='$kodeup'
and prd_plan='$klpdaya' and tgl_update='$tgl' and jam_update='$jam')";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);

$Qry="insert into cust_ail_fisik(idpel,hasil_1,hasil_2,hasil_3,hasil_4,hasil_5,hasil_6,hasil_7,
prd_plan,kodeup,kode_ap,kode_upi,C_GOLTARIF,C_daya,C_no_meter,c_merk_meter,c_type_meter,
C_CT_P,C_ct_s,C_pt_p,C_pt_s,C_fmkwh) 
select idpel,'0' krt1,'0' ktr2,'0' krt3,'0' krt4,'0' krt5,'0' krt6,'0' KRT7,
prd_plan,ail_rayon,kode_ap,kode_upi,'0' c1,'0' c2,'0' c3,'0' c4,'0' c5,'0' c6,
'0' c7,'0' c8,'0' c9,'0' c10 from cust_ail
where idpel in (select idpel from cust_ail_prioritas where kodeup='$kodeup'
and prd_plan='$klpdaya' and tgl_update='$tgl' and jam_update='$jam')";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);

$Qry="insert into cust_ail_pengawasan(idpel,jml_pdp3,jml_pdp4,status,prd_plan,kodeup,kode_ap,kode_upi) 
select idpel,0,0,'0',prd_plan,ail_rayon,kode_ap,kode_upi from cust_ail
where idpel in (select idpel from cust_ail_prioritas where kodeup='$kodeup'
and prd_plan='$klpdaya' and tgl_update='$tgl' and jam_update='$jam')";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);








oci_commit($cn);
oci_close($cn);


echo "Telah diproses ".$jml." pelanggan ke dalam prioritas pembenahan periode '$prd' ";
echo "<br><input type=\"submit\" name=\"kembali\" value=\"Kembali ke pilihan Proses\">";


} else {
  echo "<h1>Maaf, passcode tidak cocok</h1>";
  exit;

}

?>


<font size=4><center>PRIORITAS MENURUT DAYA (PDP II)</center></font>

<?php
include("../menu/menu_footer.php");
?>
</form>
</body>
</html>





