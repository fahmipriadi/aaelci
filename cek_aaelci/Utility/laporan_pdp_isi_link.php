<?php session_start() ?>

<form method="POST" action="laporan_pdp_isi_wp_.php">
<?php
$supi=$_SESSION['supi'];
echo "<input type=\"hidden\" name=\"kdap\" value=\"$area\">";
echo "***Area $uarea ....<a href=\"laporan_pdp.php\">[Back to laporan $supi]</a>";
include("../data_akses/pengail_modul.php");
$cn=oci_connect($uid,$pwd,$dbs);
$Qry="select kodeup,uup from t_unit where kode_ap='$area' order by kodeup ";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
while ($hasil=oci_fetch_array($stm,OCI_BOTH)){
  $btn="bt".$hasil[0];
  echo "<table border=1 width=100%><tr>";
  echo "<td width=25% align=\"LEFT\"><font size=3><input type=submit name=$btn value=\"Expand\">*** Rayon $hasil[1]</font></td>\n";
  echo "<td width=15% align=\"CENTER\"><font size=1>REALISASI PDP-1</font></td>\n";
  echo "<td width=15% align=\"CENTER\"><font size=1>REALISASI PDP-2</font></td>\n";
  echo "<td width=15% align=\"CENTER\"><font size=1>REALISASI PDP-3</font></td>\n";
  echo "<td width=15% align=\"CENTER\"><font size=1>REALISASI PDP-4</font></td>\n";
  echo "<td width=15% align=\"CENTER\"><font size=1>REALISASI PDP-5</font></td></tr></table>\n";


  echo "<table border=1 width=100%><tr>";
  echo "<td width=5% align=\"CENTER\"><font size=1>NOMOR</font></td>\n";
  echo "<td width=15% align=\"CENTER\"><font size=1>KELOMPOK DAYA</font></td>\n";
  echo "<td width=5% align=\"CENTER\"><font size=1>TARGET</font></td>\n";
  echo "<td width=5% align=\"CENTER\"><font size=1>REAL</font></td>\n";
  echo "<td width=5% align=\"CENTER\"><font size=1>PROS (%)</font></td>\n";
  echo "<td width=5% align=\"CENTER\"><font size=1>STATUS</font></td>\n";
  echo "<td width=5% align=\"CENTER\"><font size=1>REAL</font></td>\n";
  echo "<td width=5% align=\"CENTER\"><font size=1>PROS (%)</font></td>\n";
  echo "<td width=5% align=\"CENTER\"><font size=1>STATUS</font></td>\n";
  echo "<td width=5% align=\"CENTER\"><font size=1>REAL</font></td>\n";
  echo "<td width=5% align=\"CENTER\"><font size=1>PROS (%)</font></td>\n";
  echo "<td width=5% align=\"CENTER\"><font size=1>STATUS</font></td>\n";
  echo "<td width=5% align=\"CENTER\"><font size=1>REAL</font></td>\n";
  echo "<td width=5% align=\"CENTER\"><font size=1>PROS (%)</font></td>\n";
  echo "<td width=5% align=\"CENTER\"><font size=1>STATUS</font></td>\n";
  echo "<td width=5% align=\"CENTER\"><font size=1>REAL</font></td>\n";
  echo "<td width=5% align=\"CENTER\"><font size=1>PROS (%)</font></td>\n";
  echo "<td width=5% align=\"CENTER\"><font size=1>STATUS</font></td></tr></table>\n";

  $kodeup=$hasil[0];
  $Qry1="select * from v_laporan_pdp_rayon where kodeup='$kodeup' and target>0 order by prd_plan";
  $stm1=oci_parse($cn,$Qry1);
  oci_execute($stm1);

  $num=0;
  echo "<table border=1 width=100%>";
  while ($hasil1=oci_fetch_array($stm1,OCI_BOTH)){
  $num=$num+1;
  echo "<tr><td width=5% align=\"RIGHT\"><font size=2>$num</font></td>\n";
  echo "<td width=15% align=\"CENTER\"><font size=2>$hasil1[4]</font></td>\n";
  echo "<td width=5% align=\"RIGHT\"><font size=2>$hasil1[5]</font></td>\n";

//PDP-1
  echo "<td width=5% align=\"RIGHT\"><font size=2>$hasil1[6]</font></td>\n";
  echo "<td width=5% align=\"RIGHT\"><font size=2>$hasil1[7]</font></td>\n";
    if ($hasil1[7]<=25){
    echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/merah.jpg\"></font></td>\n";
    } else {
      if ($hasil1[7]>90){
      echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/hijau.jpg\"></font></td>\n";
      } else {
      echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/kuning.jpg\"></font></td>\n";
      }
    }
//PDP-2
  echo "<td width=5% align=\"RIGHT\"><font size=2>$hasil1[8]</font></td>\n";
  echo "<td width=5% align=\"RIGHT\"><font size=2>$hasil1[9]</font></td>\n";
    if ($hasil1[9]<=25){
    echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/merah.jpg\"></font></td>\n";
    } else {
      if ($hasil1[9]>90){
      echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/hijau.jpg\"></font></td>\n";
      } else {
      echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/kuning.jpg\"></font></td>\n";
      }
    }
//PDP-3
  echo "<td width=5% align=\"RIGHT\"><font size=2>$hasil1[10]</font></td>\n";
  echo "<td width=5% align=\"RIGHT\"><font size=2>$hasil1[11]</font></td>\n";
    if ($hasil1[11]<=25){
    echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/merah.jpg\"></font></td>\n";
    } else {
      if ($hasil1[11]>90){
      echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/hijau.jpg\"></font></td>\n";
      } else {
      echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/kuning.jpg\"></font></td>\n";
      }
    }
//PDP-4
  echo "<td width=5% align=\"RIGHT\"><font size=2>$hasil1[12]</font></td>\n";
  echo "<td width=5% align=\"RIGHT\"><font size=2>$hasil1[13]</font></td>\n";
    if ($hasil1[13]<=25){
    echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/merah.jpg\"></font></td>\n";
    } else {
      if ($hasil1[13]>90){
      echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/hijau.jpg\"></font></td>\n";
      } else {
      echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/kuning.jpg\"></font></td>\n";
      }
    }
//PDP-5
  echo "<td width=5% align=\"RIGHT\"><font size=2>$hasil1[14]</font></td>\n";
  echo "<td width=5% align=\"RIGHT\"><font size=2>$hasil1[15]</font></td>\n";
    if ($hasil1[15]<=25){
    echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/merah.jpg\"></font></td>\n";
    } else {
      if ($hasil1[15]>90){
      echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/hijau.jpg\"></font></td>\n";
      } else {
      echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/kuning.jpg\"></font></td>\n";
      }
    }
  }
echo "</table>\n";
echo "<br>";

}
echo "<input type=\"hidden\" name=\"uarea\" value=\"$uarea\">";

?>
</form>


