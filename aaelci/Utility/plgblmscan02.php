<?php 

session_start();

header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=pelanggan_belum_scan.csv");
header("Pragma: no-cache");
header("Expires: 0");

$kodeup=$_SESSION['kodeup'];
include("../data_akses/pengail_modul.php");
$kdexcel=$_POST['Excel'];
//<form method="post" action="pengail_daya_excel.php">
//<input type="submit" name="Export Excel" value="Excel"/>
//</form>

$delimiterku = chr(59);

echo "NO".$delimiterku;
echo "ID PEL".$delimiterku; 
echo "NAMA PELANGGAN".$delimiterku;
echo "ALAMAT PELANGGAN".$delimiterku;
echo "KODE UP".$delimiterku;
echo "GOL TARIF".$delimiterku;
echo "DAYA".$delimiterku;
echo "STATUS PELANGGAN".$delimiterku;
echo "JENIS MUTASI".$delimiterku;
echo "THN BLN MUTASI".$delimiterku;
echo chr(13);

$cn=oci_connect($uid,$pwd,$dbs);
//$Qry="select * from v_ail_daya_rekap order by daya desc";
$Qry="select idpel, nmplg, alamatplg, kodeup, goltarif, daya, statusplg, jenis_mutasi, thblmut from dil
	where kodeup = $kodeup
	and idpel in( select idpel from cust_ail where tgl_update is null) 
	order by kodeup, statusplg, daya desc ";
	
$stm=oci_parse($cn,$Qry);
oci_execute($stm);

$num=0;
while ($data=oci_fetch_array($stm,OCI_BOTH))
{
$num=$num+1;
$kunci[num]=$data[1];
echo $num.$delimiterku;
echo "'".$data[0].$delimiterku;
echo $data[1].$delimiterku;
echo $data[2].$delimiterku;
echo $data[3].$delimiterku;
echo $data[4].$delimiterku;
echo $data[5].$delimiterku;
echo $data[6].$delimiterku;
echo $data[7].$delimiterku;
echo $data[8].$delimiterku;
echo chr(13);
}
//echo "</table>\n";


?>