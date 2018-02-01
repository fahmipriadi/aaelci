<?php
//$result=file_get_contents("http://10.30.1.21/aaelci/proc_1/pengail_get_image_loop03.php?$_GET['161400145440']");
//$result;
$myfile = fopen(date('Y-m-d_H_i_s')."cek_loop_gambar.txt", "w") or die("Unable to open file!");
//$txt = $result;
$txt = 'coba';
fwrite($myfile, $txt);
fclose($myfile);
?>


