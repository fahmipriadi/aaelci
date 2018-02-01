<?php
session_start();
$supi=$_SESSION['supi'];
echo "***Area $uarea - Rayon $uup <a href=\"laporan_pdp.php\">[Back to laporan $supi]</a>";
include("../data_akses/pengail_modul.php");
$cn=oci_connect($uid,$pwd,$dbs);
$Qry="select * from v_ail_workplan where prd_lap<=(select max(prd_lap) from cust_ail) and kodeup='$up' order by prd_lap";

$stm=oci_parse($cn,$Qry);
oci_execute($stm);
  $jreal11=0;
  $jreal21=0;
  $jreal31=0;
  $jreal41=0;
  $jreal51=0;

while ($hasil=oci_fetch_array($stm,OCI_BOTH)){
  echo "<table border=1 width=100%><tr>";
  echo "<td width=25% align=\"LEFT\"><font size=3>*** Periode $hasil[3]</font></td>\n";
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

  
  $prd_lap=$hasil[3];
  $Qry1="select * from v_laporan_pdp_rayon_wp where kodeup='$up' and prd_lap='$prd_lap' order by prd_plan";
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
  $pilih=substr($hasil1[3],1,1);
     switch ($pilih){
     case "1";
       $jreal11=$jreal11+$hasil1[6];
       $jreal1=$jreal11;
       break;
     case "2";
       $jreal21=$jreal21+$hasil1[6];
       $jreal1=$jreal21;
       break;
     case "3";
       $jreal31=$jreal31+$hasil1[6];
       $jreal1=$jreal31;
       break;
     case "4";
       $jreal41=$jreal41+$hasil1[6];
       $jreal1=$jreal41;
       break;
     case "5";
       $jreal51=$jreal51+$hasil1[6];
       $jreal1=$jreal51;
       break;
     }

     $jpros=round($jreal1/$hasil1[5]*100,2);

  echo "<td width=5% align=\"RIGHT\"><font size=2>$jreal1</font></td>\n";
  echo "<td width=5% align=\"RIGHT\"><font size=2>$jpros</font></td>\n";
    if ($jpros<=25){
    echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/merah.jpg\"></font></td>\n";
    } else {
      if ($jpros>90){
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

?>


