<?php
include("../data_akses/pengail_modul.php");

$result=file_get_contents("laporan_pdp_revas_link.php");
$result;
$myfile = fopen("../snapshot/".date('Y-m-d_H_i_s')."curl.html", "w") or die("Unable to open file!");
$txt = $result;
fwrite($myfile, $txt);
fclose($myfile);

$nama_file='testing';
$date=date('Y-m-d_H_i_s');
$cn=oci_connect($uid,$pwd,$dbs);
//$Qry="select * from v_ail_daya_rekap order by daya desc";
$Qry="INSERT into snapshot (ID_snapsot, nama_file, tanggal) values (snapshot_sequence.nextval," . "'" .$nama_file."'" . ", sysdate)";
//echo $Qry;
$stm=oci_parse($cn,$Qry);
oci_execute($stm);

?>

