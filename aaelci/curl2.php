<?php
//$result=file_get_contents("utility/laporan_pdp_link.php");
$result=file_get_contents("http://10.30.1.21/aaelci/utility/laporan_pdp_link.php");
$date=date('Y-m-d_H_i_s');

//$myfile = fopen("snapshot/$date-curl.html", "w") or die("Unable to open file!");
$txt = $result;
fwrite($myfile, $txt);
fclose($myfile);

$url = 'http://10.30.1.21/aaelci/utility/laporan_pdp_refresh.php';
$data = array('bt16TJP' => 'Expand');

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
//if ($result === FALSE) { /* Handle error */ }
$myfile = fopen("snapshot/$date-curlTJP.html", "w") or die("Unable to open file!");
$txt = $result;
fwrite($myfile, $txt);
fclose($myfile);

$data = array('bt16BGK' => 'Expand');

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
//if ($result === FALSE) { /* Handle error */ }
$myfile = fopen("snapshot/$date-curlBGK.html", "w") or die("Unable to open file!");
$txt = $result;
fwrite($myfile, $txt);
fclose($myfile);


include("data_akses/pengail_modul.php");

$cn=oci_connect($uid,$pwd,$dbs);
$Qry="INSERT into snapshot (ID_snapsot, nama_file, tanggal) values (snapshot_sequence.nextval,'$date', sysdate)";
//echo $Qry;
$stm=oci_parse($cn,$Qry);
oci_execute($stm);

?>
