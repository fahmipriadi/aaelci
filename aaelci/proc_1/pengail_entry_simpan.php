<html>
<head><title>Entry/Edit Informasi AIL - Sistem Informasi Pengelolaan AIL</title></head>
<body>
<center>
<br>*** Entry/Edit Informasi AIL ***<hr><br>
</center>
<table width=100%>
<tr>
<form method="post" action="pengail_entry_idpel1.php">

<?php
$midpel=$_POST['id_pel'];
$kdamplop=$_POST['kdamplop'];
$kdlabel=$_POST['kdlabel'];
$permohonan=$_POST['permohonan'];
$identitas=$_POST['identitas'];
$survey=$_POST['survey'];
$sjps=$_POST['sjps'];
$spjbtl=$_POST['spjbtl'];
$sspjbtl=$_POST['sspjbtl'];
$slo=$_POST['slo'];
$kuitansi=$_POST['kuitansi'];
$pk=$_POST['pk'];
$ba=$_POST['ba'];
$rayon=$_POST['kd_up'];
$lemari=$_POST['no_lemari'];
$baris=$_POST['no_baris'];
$kolom=$_POST['no_kolom'];
$nomor=$_POST['no_urut'];
$lain2=$_POST['lain2'];
$ket1=$_POST['ket1'];
$ket2=$_POST['ket2'];
$ket3=$_POST['ket3'];
$pdl=$_POST['pdl'];
$prdupdate=$_POST['prd'];
$tglupdate=$_POST['tgl'];
$jamupdate=$_POST['jam'];


if ($kdamplop=="on") {$amp="1";} else {$amp="0";}
if ($kdlabel=="on") {$lbl="1";} else {$lbl="0";}
if ($permohonan=="on") {$pr="1";} else {$pr="0";}
if ($identitas=="on") {$id="1";} else {$id="0";}
if ($survey=="on") {$sv="1";} else {$sv="0";}
if ($sjps=="on") {$sj="1";} else {$sj="0";}
if ($spjbtl=="on") {$sb="1";} else {$sb="0";}
if ($sspjbtl=="on") {$ss="1";} else {$ss="0";}
if ($slo=="on") {$so="1";} else {$so="0";}
if ($kuitansi=="on") {$kw="1";} else {$kw="0";}
if ($pk=="on") {$kj="1";} else {$kj="0";}
if ($ba=="on") {$bc="1";} else {$bc="0";}
if ($lain2=="on") {$ln="1";} else {$ln="0";}
if ($pdl=="on") {$npdl="1";} else {$npdl="0";}


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




include "pengail_ambil_nomor_lemari.php";
if ($lalu=="lanjut"){
$baris=$posbaris;
$kolom=$poskolom;
$nomor=$posnomor;
}


include("../data_akses/pengail_modul.php");
$cn=oci_connect($uid,$pwd,$dbs);



//Jika perubahan nomor posisi karena pemberian nomor otomatis
if ($lalu=="lanjut"){
$Qry="update cust_ail_lemari set pos_baris='$baris', pos_kolom='$kolom',
pos_nomor='$nomor' where ail_rayon='$kdunit' and ail_lemari='$lemari' ";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
oci_commit($cn);
}
//eof update nomor posisi otomatis

$Qry="update cust_ail set kd_amplop='$amp',kd_label='$lbl',permohonan='$pr',identitas='$id',survey='$sv',
sjps='$sj',spjbtl='$sb',sspjbtl='$ss',slo='$so',kuitansi='$kw',
pk='$kj',ba='$bc',ail_lain2='$ln',pdl=$npdl, ail_rayon='$rayon', 
ail_lemari='$lemari', ail_baris='$baris', ail_kolom='$kolom',
ail_nomor='$nomor', tgl_update='$tgl', jam_update='$jam', prd_lap='$prd' where idpel= '$midpel'";
$Qry;
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
oci_commit($cn);
oci_close($cn);

echo "AIL dengan IDPEL : <font size=4>".$midpel."</font><br>";
if ($lalu=="henti"){
echo "<font size=4>Lemari penuh silakan gunakan lemari yang lainnya</font>";
} else {
  if ($lalu=="none"){
  echo "<font size=4>Lemari ".$lemari." belum tersedia, silakan didaftarkan di master terlebih dahulu</font>";
  } else {
    if ($lalu=="sama"){
    echo "tetap pada posisi lemari : ";
    } else {
    echo "ditempatkan pada posisi lemari : ";
    }
    //bila posisi tidak dirubah ------- 
  echo "<font size=4>".$rayon."-".$lemari."-".$baris."-".$kolom."-".$nomor."</font>";
  }
  //bila lemari belum terdaftar ----------
}
//bila lemari pernuh --------

?>
<br><br><input type="submit" name="kembali" value="Kembali ke form Entry">
<input type="submit" name="image" value="Upload hasil scan dokumen">
<input type="hidden" name="midpel" value="<?php echo $midpel ?>">
<input type="hidden" name="posisi" value="<?php echo $rayon."-".$lemari."-".$baris."-".$kolom."-".$nomor ?>">
</form>
</body>
</html>