<?php
include("../data_akses/pengail_modul.php");
$cn=oci_connect($uid,$pwd,$dbs);
session_start();
$kode_ap=$_SESSION['kode_ap'];

?>
<html>
<head><title>Laporan Kelengkapan AIL - Sistem Informasi Pengelolaan AIL</title></head>

<script language="JavaScript" type="text/JavaScript">

function show_rak(){

<?php
		$Qry="select distinct ail_rayon,ail_lemari from cust_ail where kode_ap='$kode_ap' 
		order by ail_rayon,ail_lemari desc";
		$stm3=oci_parse($cn,$Qry);
		oci_execute($stm3);
  while ($data3=oci_fetch_array($stm3,OCI_BOTH)){
  $kdunit=$data3[0];
  $lemari=$data3[1];

//(document.laporan.kdunit.value==\"".$kdunit."\")" and 

  echo "if ((document.laporan.kdunit.value==\"".$kdunit."\") && (document.laporan.lemari.value==\"".$lemari."\"))";
  echo "{";
		$Qry="select distinct ail_rayon,ail_lemari,ail_baris,ail_kolom brsklm from cust_ail
		where kode_ap='$kode_ap' and ail_rayon='$kdunit' and ail_lemari='$lemari' 
		order by ail_rayon,ail_lemari desc,ail_baris desc ,ail_kolom ";
		$stm4=oci_parse($cn,$Qry);
		oci_execute($stm4);
     $content = "document.getElementById('rak').innerHTML = \"<select name='rak'><option>--Baris Kolom--</option>";
     while ($data4=oci_fetch_array($stm4,OCI_BOTH)){
     $content .= "<option value='".$data4[2]."-".$data4[3]."'>".$data4[2]."-".$data4[3]."</option>";   
     }
  $content .= "</select>\"";
  echo $content;
  echo "}";   

  }

?>
}



function show_lemari(){
<?php
		$Qry="select kodeup,uup from t_unit where kode_ap='$kode_ap'";
		$stm=oci_parse($cn,$Qry);
		oci_execute($stm);
  while ($data=oci_fetch_array($stm,OCI_BOTH)){
  $kdunit=$data[0];
  echo "if (document.laporan.kdunit.value==\"".$kdunit."\")";
  echo "{";
		$Qry="select distinct ail_rayon,ail_lemari from cust_ail
		where ail_rayon='$kdunit' 
		order by ail_rayon,ail_lemari desc";
		$stm2=oci_parse($cn,$Qry);
		oci_execute($stm2);
     $content = "document.getElementById('lemari').innerHTML = \"<select name='lemari' onchange='show_rak()' ><option>--Pilih Lemari---</option>";
     while ($data2=oci_fetch_array($stm2,OCI_BOTH)){
     $content .= "<option value='".$data2[1]."'>".$data2['1']."</option>";   
     }
  $content .= "</select>\"";
  echo $content;
  echo "}";   

}

?>
}






</script>

<body>
<form  name="laporan" method="post" action="pengail_laporan_image.php" >
Kode Rak :<br> 
<select name="kdunit" onchange="show_lemari()" >;
<option>--Pilih Rayon--</option>
<?php
include("../data_akses/pengail_modul.php");
		$cn=oci_connect($uid,$pwd,$dbs);
		$Qry="select kodeup,uup from t_unit where kode_ap='$kode_ap'";
		$stm=oci_parse($cn,$Qry);
		oci_execute($stm);
while ($data=oci_fetch_array($stm,OCI_BOTH)){
echo "<option value=\"$data[0]\">$data[1]</option>";
}
?>
</select>

<div id="lemari"></div>
<div id="rak"></div>


<input type="submit" name="submit" value="Excel"/>


<font size=4><center>DAFTAR ISI RAK PENYIMPANAN (PDP I.II-002)</center></font>

<table border=1 width=100%>
<tr><td align="RIGHT"><font face="Monotype Corsiva" size=2>
Sistem Informasi Pengelolaan AIL PLN Area Cianjur, copyrighted and created by Pegawai2A Cianjur</font></td></tr>
</table>
</form>


</body>
</html>