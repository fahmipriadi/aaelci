<?php session_start() ?>
<html>
<head><title>Laporan PDP Revenue Assurance - Sistem Informasi Pengelolaan AIL</title></head>

<script type="text/JavaScript" >
function awal(){
top.location.href='../login.php';
}
</script>
<table bgcolor="#02021E" border=0 width=100%>
<tr >

	<td align=center width=5%><img src="../images/pln_small.jpg"></td><td with=20%>
	<font face="Times New Roman" size=3 color="CCFFFF">PT PLN (PERSERO)<br>
                <?php
		include("../data_akses/pengail_modul.php");
		$cn=oci_connect($uid,$pwd,$dbs);
		$Qry="select upper(uupi) upi,supi from t_upi where kode_upi='$kode_upi'";
		$stm=oci_parse($cn,$Qry);
		oci_execute($stm);
		if ($data0=oci_fetch_array($stm,OCI_BOTH)){
		$upi=$data0[0];
                $_SESSION['supi']=$data0[1]; 
		} else { $upi="Distribusi Jawa Barat dan Banten"; $_SESSION['supi']='DJBB';}
		?>

	<font face="Times New Roman" size=2 color="CCFFFF"><?php echo $upi ?><br>
	<?php echo $area ?></td>
	<td align=center width=60%><font face="Monotype Corsiva" size=8 color="CCFFFF">
	Revenue Assurance<br><font face="Times New Roman" size=3 color="CCFFFF">
	Pembenahan Data Pelangggan</td>
	<td align="RIGHT" width=10%><font face="Times New Roman" size=2 color="CCFFFF">
	</td>
</tr>
</table>
</html>

