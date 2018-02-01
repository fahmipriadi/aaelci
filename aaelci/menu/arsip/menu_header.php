<?php session_start(); ?>

<script type="text/JavaScript" >
function awal(){
top.location.href='../../monitoring3/admin/index.php/start/login';
}
function awal1(){
top.location.href='../index.php';
}

</script>

<table bgcolor="#02021E" border=0 width=100%>
<tr >
<?php
		//session_start();
		$nip=$_SESSION['nip'];
		$nama=$_SESSION['unama'];
		$kodeup=$_SESSION['kodeup'];
		include("../data_akses/pengail_modul.php");
		$cn=oci_connect($uid,$pwd,$dbs);
		$Qry="select upper(uupi) upi,supi from t_upi where kode_upi='$kode_upi'";
		$stm=oci_parse($cn,$Qry);
		oci_execute($stm);
		if ($data0=oci_fetch_array($stm,OCI_BOTH)){
		$upi=$data0[0];
                $_SESSION['supi']=$data0[1]; 
		} else { $upi="Distribusi Jawa Barat dan Banten"; $_SESSION['supi']='DJBB';}
		$Qry="select upper(uup) up,upper(uarea) area from v_unit where kodeup='$kodeup'";
		$stm=oci_parse($cn,$Qry);
		oci_execute($stm);
		if ($data=oci_fetch_array($stm,OCI_BOTH)){
		$area="AREA ".$data[1];
		  if ($data[0]!=null){
		  $area=$area." - RAYON ".$data[0];
		  }
		}


?>

	<td align=center width=5%><img src="../images/pln_small.jpg"></td><td with=20%>
	<font face="Times New Roman" size=3 color="CCFFFF">PT PLN (PERSERO)<br>
	<font face="Times New Roman" size=2 color="CCFFFF"><?php echo $upi ?><br>
	<?php echo $area ?></td>
	<td align=center width=60%><font face="Monotype Corsiva" size=8 color="CCFFFF">
	Revenue Assurance<br><font face="Times New Roman" size=3 color="CCFFFF">
	Pembenahan Data Pelangggan</td>
	<td align="RIGHT" width=10%><font face="Times New Roman" size=2 color="CCFFFF">
		<?php
		echo "User :<br>";
		echo $nama."<br>";
//echo $_SESSION['uarea'];
		echo "<a href=\"JavaScript:awal1();\"  >[Logout]</a>";
		//while ($data=oci_fetch_array($stm,OCI_BOTH))
		//{
		//echo "Target ".$data[0]." : ".$data[1]." ".$data[2]."<br>"; 
		//}
		//oci_close($cn);
		?>
	</td>
</tr>
</table>