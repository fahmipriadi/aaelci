<html>
<body>
<script type="text/JavaScript" >
function awal(){
top.location.href='../../monitoring3/admin/index.php/start/login';
}

function awal1(){
top.location.href='../index.php';
}

</script>


<?php
include("../data_akses/pengail_modul.php");
$cn=oci_connect($uid,$pwd,$dbs);
$Qry1="select to_char(waktu_refresh,'YYYYMMDDhh24miss') tgl,ip_refresh from cust_ail_workplan_refresh 
       where waktu_refresh=(select max(waktu_refresh) waktu from cust_ail_workplan_refresh)";
//echo $Qry1;
$stm1=oci_parse($cn,$Qry1);
oci_execute($stm1);
$data1=oci_fetch_array($stm1,OCI_BOTH);
$waktu=$data1[0];
$ip=$data1[1];



echo "<form name=\"lap_pdp\" method=\"post\" action=\"laporan_pdp_refresh_link.php\" >";


echo "Update tanggal ".substr($waktu,6,2)."/".substr($waktu,4,2)."/".substr($waktu,0,4)." pukul ";
echo substr($waktu,8,2).":".substr($waktu,10,2).":".substr($waktu,12,2)." dari IP Address ";
echo $ip." ........<input type=\"submit\" name=\"submit\" value=\"Refresh\"> ";
echo "<a href=\"JavaScript:awal();\">[Home - Login]</a>";

$Qry="select kode_ap,uarea,sarea from t_area where kode_upi='$kode_upi' order by kode_ap";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
while ($hasil=oci_fetch_array($stm,OCI_BOTH)){
  $btn="bt".$hasil[0];
//  $tunjuk="laporan_pdp_".$hasil[2].".php";
  echo "<table border=1 width=100%><tr>";
  echo "<td width=25% align=\"LEFT\"><font size=3><input type=submit name=$btn value=\"Expand\">*** Area $hasil[1]</a></font></td>\n";
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

  $kode_ap=$hasil[0];
  $Qry1="select * from v_laporan_pdp where kode_ap='$kode_ap' order by prd_plan";
  $stm1=oci_parse($cn,$Qry1);
  oci_execute($stm1);

  $num=0;
  echo "<table border=1 width=100%>";
  while ($hasil1=oci_fetch_array($stm1,OCI_BOTH)){
  $num=$num+1;
  echo "<tr><td width=5% align=\"RIGHT\"><font size=2>$num</font></td>\n";
  echo "<td width=15% align=\"CENTER\"><font size=2>$hasil1[3]</font></td>\n";
  echo "<td width=5% align=\"RIGHT\"><font size=2>$hasil1[4]</font></td>\n";

//PDP-1
  echo "<td width=5% align=\"RIGHT\"><font size=2>$hasil1[5]</font></td>\n";
  echo "<td width=5% align=\"RIGHT\"><font size=2>$hasil1[6]</font></td>\n";
    if ($hasil1[6]<=25){
    echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/merah.jpg\"></font></td>\n";
    } else {
      if ($hasil1[6]>90){
      echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/hijau.jpg\"></font></td>\n";
      } else {
      echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/kuning.jpg\"></font></td>\n";
      }
    }
//PDP-2
  echo "<td width=5% align=\"RIGHT\"><font size=2>$hasil1[7]</font></td>\n";
  echo "<td width=5% align=\"RIGHT\"><font size=2>$hasil1[8]</font></td>\n";
    if ($hasil1[8]<=25){
    echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/merah.jpg\"></font></td>\n";
    } else {
      if ($hasil1[8]>90){
      echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/hijau.jpg\"></font></td>\n";
      } else {
      echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/kuning.jpg\"></font></td>\n";
      }
    }
//PDP-3
  echo "<td width=5% align=\"RIGHT\"><font size=2>$hasil1[9]</font></td>\n";
  echo "<td width=5% align=\"RIGHT\"><font size=2>$hasil1[10]</font></td>\n";
    if ($hasil1[10]<=25){
    echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/merah.jpg\"></font></td>\n";
    } else {
      if ($hasil1[10]>90){
      echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/hijau.jpg\"></font></td>\n";
      } else {
      echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/kuning.jpg\"></font></td>\n";
      }
    }
//PDP-4
  echo "<td width=5% align=\"RIGHT\"><font size=2>$hasil1[11]</font></td>\n";
  echo "<td width=5% align=\"RIGHT\"><font size=2>$hasil1[12]</font></td>\n";
    if ($hasil1[12]<=25){
    echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/merah.jpg\"></font></td>\n";
    } else {
      if ($hasil1[12]>90){
      echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/hijau.jpg\"></font></td>\n";
      } else {
      echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/kuning.jpg\"></font></td>\n";
      }
    }
//PDP-5
  echo "<td width=5% align=\"RIGHT\"><font size=2>$hasil1[13]</font></td>\n";
  echo "<td width=5% align=\"RIGHT\"><font size=2>$hasil1[14]</font></td>\n";
    if ($hasil1[14]<=25){
    echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/merah.jpg\"></font></td>\n";
    } else {
      if ($hasil1[14]>90){
      echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/hijau.jpg\"></font></td>\n";
      } else {
      echo "<td width=5% align=\"CENTER\"><font size=2><img src=\"../images/kuning.jpg\"></font></td>\n";
      }
    }

  }
echo "</table>\n";
echo "<br>";
}

echo "</form>";

?>
</body>
</html>
