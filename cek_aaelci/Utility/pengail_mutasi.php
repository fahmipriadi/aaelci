<?php
session_start();
$usr=$_SESSION['nip'];
$kodeup=$_SESSION['kodeup'];
include "../data_akses/pengail_modul.php";
$cn=oci_connect($uid,$pwd,$dbs);
$tbh=0;

//  $Qry1="select * from cust_mutasi where kodeup='$kodeup' and kode_mut is null";
  $Qry1="select * from cust_mutasi where jenis_mutasi='A' and kodeup='$kodeup' and kode_mut is null ";
  $stm1=oci_parse($cn,$Qry1);
  oci_execute($stm1);
  while ($hasil1=oci_fetch_array($stm1,OCI_BOTH)){
	$mkd_upi=$hasil1[0];
	$mkd_ap=$hasil1[1];
	$mkd_up=$hasil1[2];
	$mno_pdl=$hasil1[3];
	$mno_agenda=$hasil1[4];
	$mblthmut=$hasil1[5];
	$midpel=$hasil1[6];
	$mnama=$hasil1[7];
	$mpnj=$hasil1[8];
	$m_alamat=$mpnj." ".$hasil1[9];
	$mjmut=$hasil1[10];
	$mtrf=$hasil1[11];
	$mtglpdl=$hasil1[12];
	$mdaya=$hasil1[13];
	$mtrflama=$hasil1[14];

	$mdaya_lama=$hasil1[15];
	$usr=$hasil1[16];
	$mtgl_remaja=$hasil1[17];
           $Qry2="select idpel from dil where idpel='$midpel'";
           $stm2=oci_parse($cn,$Qry2);
           oci_execute($stm2);
           $data1=oci_fetch_array($stm2,OCI_BOTH);
           if (!$data1){
              if ($mdaya>197000){$mprd='11';} else {
                  if ($mdaya>=41500){$mprd='12';} else {
                      if ($mdaya>=6600){$mprd='13';} else {
                          if ($mdaya>=2200){$mprd='14';} else {$mprd='15';}
                      } 
                  }
              } 
              $Qry="insert into dil values ('$midpel','$mnama','$m_alamat',
              '$mkd_upi','$mkd_ap','$mkd_up','$mtrf',$mdaya,'0' ,1 ,
              0 ,0 ,'AKTIF' ,'$mtgl_remaja','$mjmut',null,null,'$mblthmut',null)";
              $sql=oci_parse($cn,$Qry);
              oci_execute($sql);
	      $tbh=$tbh+1;
              $Qry="update cust_mutasi set kode_mut='1' where no_pdl='$mno_pdl'";
              $sql=oci_parse($cn,$Qry);
              oci_execute($sql);
              $Qry="insert into cust_ail(IDPEL,KD_AMPLOP,KD_LABEL,PERMOHONAN,IDENTITAS,      
                   SURVEY,SJPS,SPJBTL,SSPJBTL,SLO,KUITANSI,PK,BA,AIL_LAIN2,AIL_RAYON,KODE_AP,KODE_UPI,PRD_PLAN) 
                   values('$midpel','0','0','0','0','0','0','0','0','0','0','0','0','0','$mkd_up','$mkd_ap','$mkd_upi','$mprd')";
              $sql=oci_parse($cn,$Qry);
              oci_execute($sql);
	      $tbh=$tbh+1;
              $Qry="update cust_mutasi set kode_mut='1' where no_pdl='$mno_pdl'";
              $sql=oci_parse($cn,$Qry);
              oci_execute($sql);
              oci_commit($cn);
            }

  }


echo "Selesai insert ".$tbh." pelanggan baru<br> (*** Catatan :mutasi selain pasang baru menunggu rekon dengan DIL setelah proses billing)";

?>
