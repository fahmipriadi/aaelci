<?php
session_start();
$nip=$_SESSION['nip'];
$pswd=$_SESSION['pswd'];
include("../data_akses/pengail_modul.php");

		$cn=oci_connect($uid,$pwd,$dbs);
		$Qry="select * from v_user_pdp where uname='$nip'";
//echo $Qry;
		$stm=oci_parse($cn,$Qry);
		oci_execute($stm);
		$data=oci_fetch_array($stm,OCI_BOTH);
		if ($data)
		{              
		$userid=$data[0];
		$uname=$data[1];
		$group=$data[4];
		$kodeup=$data[5];
		$unama=$data[6];
		$kode_ap=$data[9];
		$uup=$data[10];
		$uarea=$data['UAREA'];
		$kode_upi=$data['KODE_UPI'];

		  if ($data[2]==$pswd)
		  {
		  $_SESSION['nip']=$uname;
		  $_SESSION['userid']=$userid;
		  $_SESSION['group']=$group;
		  $_SESSION['kodeup']=$kodeup;
		  $_SESSION['unama']=$unama;
		  $_SESSION['kode_ap']=$kode_ap;
		  $_SESSION['uup']=$uup;
		  $_SESSION['uarea']=$uarea;
		  $_SESSION['passwd']=$pswd;
		  $_SESSION['kode_upi']=$kode_upi;
	


                  //echo "User Accepted";
                  include("../menu/menu_index_link.php");
		  } else {
   		  echo "Maaf, password yang anda masukkan tidak sesuai";
		  echo "<br><a href=\"../../monitoring3/admin/index.php/start/login\">kembali ke form login</a>";
                  }
		} else {
		echo "Maaf, ID User tidak terdaftar ";
		echo "<br><a href=\"../../monitoring3/admin/index.php/start/login\">kembali ke form login</a>";
		}
		oci_close($cn);

?>