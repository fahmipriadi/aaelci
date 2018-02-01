<?php 
include("../data_akses/pengail_modul.php");

?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laporan Kelengkapan AIL - Sistem Informasi Pengelolaan AIL</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#awal" ).datepicker();
	$( "#akhir" ).datepicker();
  } );
  </script>
</head>
<body>
<?php
if (isset($_GET["awal"])) { $awal  = $_GET["awal"]; } else { $akhir=0; }; 
if (isset($_GET["akhir"])) { $akhir  = $_GET["akhir"]; } else { $akhir=0; }; 
if ($awal!=0||$akhir!=0)
{
?>
<!--From : <input type="text" name="d1" class="tcal" value="" /> To: <input type="text" name="d2" class="tcal" value="" /> <input type="submit" value="Search">-->
<p><a href="exportpdp1.php?awal=<?php echo $awal?>&akhir=<?php echo $akhir?>"><button>Export CSV Office 2007</button></a></p>
<p><a href="exportpdp2.php?awal=<?php echo $awal?>&akhir=<?php echo $akhir?>"><button>Export CSV Office 2010 ke atas</button></a></p>
<?php
} //end IF
?>	
<form action="datapdp.php" method="get">
<p>Dari: <input type="text" name="awal" placeholder="masukan tanggal" id="awal" 
		value='<?php if($awal==null){
		echo "Masukan Tanggal";
		} else {
		echo $awal;
		}?>'> 
   Sampai: <input type="text" name="akhir" placeholder="masukan tanggal" id="akhir" 
		value='<?php if($akhir==null){
		echo "Masukan Tanggal";
		} else {
		echo $akhir;
		}?>'> 
   <button type="submit" name="cari" class="btn ">Tampilkan Data</button></p>
</form>

<?php

//echo $awal."|".$akhir;
if ($awal!=0 || $akhir!=0){ //Start IF
//exit();
?>
	

<tr>
<font size=4><center>DATA DASHBOARD PDP</center></font></br>
<table border=1 width=100%><tr>
<td width=4%  align="CENTER"><font size=1>NO</font></td>
<td width=10% align="CENTER"><font size=1>TANGGAL</font></td>
<td width=20% align="CENTER"><font size=1>KODE_UPI</font></td>
<td width=20% align="CENTER"><font size=1>KODE_AP</font></td>
<td width=6%  align="CENTER"><font size=1>PRD_PLAN</font></td>
<td width=6%  align="CENTER"><font size=1>URAIAN</font></td>
<td width=6%  align="CENTER"><font size=1>TARGET</font></td>
<td width=10% align="CENTER"><font size=1>REAL_1</font></td>
<td width=10% align="CENTER"><font size=1>PROSENTASE1</font></td>
<td width=10% align="CENTER"><font size=1>REAL_2</font></td>
<td width=10% align="CENTER"><font size=1>PROSENTASE2</font></td>
<td width=10% align="CENTER"><font size=1>REAL_3</font></td>
<td width=10% align="CENTER"><font size=1>PROSENTASE3</font></td>
<td width=10% align="CENTER"><font size=1>REAL_4</font></td>
<td width=10% align="CENTER"><font size=1>PROSENTASE4</font></td>
<td width=10% align="CENTER"><font size=1>REAL_5</font></td>
<td width=10% align="CENTER"><font size=1>PROSENTASE5</font></td>
</tr>

<?php
//$awal=date('YY-MM-DD');
//$akhir=date('YY-MM-DD');
$cn=oci_connect($uid,$pwd,$dbs);

$Qry="SELECT * FROM SNAPSHOT_PDP where tanggal between to_date ('$awal','MM/DD/YYYY') and to_date ('$akhir','MM/DD/YYYY') ORDER BY TANGGAL";
	
$stm=oci_parse($cn,$Qry);
oci_execute($stm);

$num=0;
while ($data=oci_fetch_array($stm,OCI_BOTH))
{
$num=$num+1;
$kunci[num]=$data[1];
echo "<td width=1% align=\"CENTER\"><font size=1>$num</font></td>";
echo "<td width=10% align=\"CENTER\"><font size=1>$data[1]</font></td>\n";
echo "<td width=16% align=\"RIGHT\"><font size=1>$data[2]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=1>$data[3]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=1>$data[4]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=1>$data[5]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=1>$data[6]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=1>$data[7]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=1>$data[8]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=1>$data[9]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=1>$data[10]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=1>$data[11]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=1>$data[12]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=1>$data[13]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=1>$data[14]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=1>$data[15]</font></td>\n";
echo "<td width=6% align=\"RIGHT\"><font size=1>$data[16]</font></td>\n";
echo "</tr>\n";
}
echo "</table>\n";
?>

<table border=1 width=100%>
<tr><td align="CENTER"><font face="Monotype Corsiva" size=2>
Sistem Informasi Pengelolaan AIL PLN DJBB, copyrighted and created by Pegawai2A Cianjur</font></td></tr>
</table>
</form>
<?php
} //end IF
?>
</body>
</html>

