<?php
$result=file_get_contents("../laporan_pdp_revas_link.php");
$result;
$myfile = fopen("../snapshot/".date('Y-m-d_H_i_s')."curl.html", "w") or die("Unable to open file!");
$txt = $result;
fwrite($myfile, $txt);
fclose($myfile);
?>
