<?php
$midpel=$_POST['id_pel'];
$tgl_periksa=$_POST['tgl_periksa'];
$pertimbang=$_POST['pertimbang'];
$kdail=$_POST['kdail'];
$kriteria1=$_POST['kriteria1'];
$kriteria2=$_POST['kriteria2'];
$kriteria3=$_POST['kriteria3'];
$kriteria4=$_POST['kriteria4'];
$kriteria5=$_POST['kriteria5'];

if ($kdail=="on") {$ail="1";} else {$ail="0";}
if ($kriteria1=="on") {$krt1="1";} else {$krt1="0";}
if ($kriteria2=="on") {$krt2="1";} else {$krt2="0";}
if ($kriteria3=="on") {$krt3="1";} else {$krt3="0";}
if ($kriteria4=="on") {$krt4="1";} else {$krt4="0";}
if ($kriteria5=="on") {$krt5="1";} else {$krt5="0";}
$ketidaksamaan=6-($ail+$krt1+$krt2+$krt3+$krt4+$krt5);


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
$Qry="update cust_ail_prioritas set kd_ail='$ail',kriteria_1='$krt1',kriteria_2='$krt2',
kriteria_3='$krt3',kriteria_4='$krt4',kriteria_5='$krt5',ketidaksamaan='$ketidaksamaan',
tgl_periksa=$tgl_periksa,pertimbangan='$pertimbang',tgl_update='$tgl', 
jam_update='$jam', prd_lap='$prd' where idpel= '$midpel'";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
oci_commit($cn);
oci_close($cn);

echo "Pelanggan dengan ID pelanggan ".$midpel." tersimpan dengan jumlah ketidak-samaan = ".$ketidaksamaan;
echo "<br>Periode : ".$prd."<br>";
?>
<form method="post" action="pengail_entry_prioritas.php">
<br><br><input type="submit" name="kembali" value="Kembali ke form Entry">
</form>
