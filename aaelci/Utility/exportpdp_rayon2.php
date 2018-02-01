<?php 

session_start();

header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=data_dashboard_pdp.csv");
header("Pragma: no-cache");
header("Expires: 0");

$kodeup=$_SESSION['kodeup'];
include("../data_akses/pengail_modul.php");
$kdexcel=$_POST['Excel'];
$awal=$_GET['awal'];
$akhir=$_GET['akhir'];
//<form method="post" action="pengail_daya_excel.php">
//<input type="submit" name="Export Excel" value="Excel"/>
//</form>
//echo $awal;
//echo $akhir;
//exit();

$delimiterku = chr(44);

echo "NO".$delimiterku;
echo "TANGGAL".$delimiterku; 
echo "KODE UPI".$delimiterku;
echo "KODE AP".$delimiterku;
echo "KODEUP".$delimiterku;
echo "PRD PLAN".$delimiterku;
echo "TARGET".$delimiterku;
echo "REAL 1".$delimiterku;
echo "REAL 2".$delimiterku;
echo "REAL 3".$delimiterku;
echo "REAL 4".$delimiterku;
echo "REAL 5".$delimiterku;
echo chr(13);

$cn=oci_connect($uid,$pwd,$dbs);
//$Qry="select * from v_ail_daya_rekap order by daya desc";
//$Qry="select * from SNAPSHOT_PDP order by TANGGAL desc ";
$Qry="SELECT * FROM SNAPSHOT_PDP_RAYON where tanggal between to_date ('$awal','MM/DD/YYYY') and to_date ('$akhir','MM/DD/YYYY')";	
$stm=oci_parse($cn,$Qry);
oci_execute($stm);

$num=0;
while ($data=oci_fetch_array($stm,OCI_BOTH))
{
$num=$num+1;
$kunci[num]=$data[1];
echo $num.$delimiterku;
echo chr(34).$data[1].chr(34).$delimiterku;
echo chr(34).$data[2].chr(34).$delimiterku;
echo chr(34).$data[3].chr(34).$delimiterku;
echo chr(34).$data[4].chr(34).$delimiterku;
echo chr(34).$data[5].chr(34).$delimiterku;
echo chr(34).$data[6].chr(34).$delimiterku;
echo chr(34).$data[7].chr(34).$delimiterku;
echo chr(34).$data[8].chr(34).$delimiterku;
echo chr(34).$data[9].chr(34).$delimiterku;
echo chr(34).$data[10].chr(34).$delimiterku;
echo chr(34).$data[11].chr(34).$delimiterku;
echo chr(13);
}
//echo "</table>\n";


?>