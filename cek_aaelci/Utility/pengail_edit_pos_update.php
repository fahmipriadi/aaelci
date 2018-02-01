<?php
session_start();

$pswd=$_SESSION['passwd'];


$midpel=$_POST['midpel'];
$mkode_asal=$_POST['mkode_asal'];
$mno_asal=$_POST['mno_asal'];
$mkode_koreksi=$_POST['mkode_koreksi'];
$mno_koreksi=$_POST['mno_koreksi'];
$passcode=$_POST['passcode'];

if (strlen($midpel)==0){
echo "Data IDPEL kosong";
} else {
	if ((strlen($mkode_asal)+strlen($mno_asal))==5){
	include("../data_akses/pengail_modul.php");
	$cn=oci_connect($uid,$pwd,$dbs);
	$Qry="select count(*) ada from t_kode_img where kode_img='$mkode_koreksi'";
	$stm=oci_parse($cn,$Qry);
	oci_execute($stm);
	$data=oci_fetch_array($stm,OCI_BOTH);
		if ($data['ADA']>0){
		   if (strlen($mno_koreksi)==3){
			$cn=oci_connect($uid,$pwd,$dbs);
			$Qry="select count(*) lbr from cust_ail_img where idpel='$midpel' 
				and kode_img='$mkode_koreksi' and no_img='$mno_koreksi' ";
			$stm=oci_parse($cn,$Qry);
			oci_execute($stm);
			$data=oci_fetch_array($stm,OCI_BOTH);
			if ($data['LBR']>0){
			echo "Data Image ".$mkode_koreksi."-".$mno_koreksi."<br>sudah ada";
			} else {
				if ($passcode==$pswd){
				$Qry="update cust_ail_img set kode_img='$mkode_koreksi',no_img='$mno_koreksi' 
				      where idpel='$midpel' and kode_img='$mkode_asal' and no_img='$mno_asal' ";
				$stm=oci_parse($cn,$Qry);
				oci_execute($stm);
				oci_commit($cn);
				echo "Update Kode Image berhasil<br>dari ".$mkode_asal."-".$mno_asal."ke ";
				echo $mkode_koreksi."-".$mno_koreksi;
				} else {
				echo "Pass Code tidak cocok";
				}
			}
		   } else {
		   echo "NoUrut hrs 3 dgts";
		   }
		} else {
		echo "KdImage Tdk Valid";
		}
		//end of check kode image koreksi
	oci_close($cn);
	} else {
	echo "Data awal tdk ditemukan";
	}
	// end of check data awal
}
//--------end of check idpel


?>
<form method="POST" action="pengail_edit_pos_image_update.php" target="_self" >
<input type="submit" name="Pesan" value="Kembali ke Form">
</form>	
