<?php
include "../data_akses/pengail_modul.php";
$fileName = $_FILES['userfile']['name'];     
$tmpName  = $_FILES['userfile']['tmp_name']; 
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];
$midpel=substr($_FILES['userfile']['name'],0,12);
$file2=$fileName;
$posisi=$_POST['posisi'];
Global $namafile;
$namafile=$fileName;

if ($fileSize > 500000) {
echo "<script type='text/javascript'>alert('Ukuran/Size file lebih besar dr 500 KB..!');</script>";
exit;}


if (strpos($file2,'_I-01')||strpos($file2,'_I_01')||strpos($file2,'_I01')) {$jdok='01';$pr='1';}
elseif (strpos($file2,'_KTP')) {$jdok='02';$id='1';}
elseif (strpos($file2,'_I-02')||strpos($file2,'_I_02')||strpos($file2,'_I02')) {$jdok='03';$sv='1';}
elseif (strpos($file2,'_I-03')||strpos($file2,'_I_03')||strpos($file2,'_I03')||strpos($file2,'_SIP')) {$jdok='04';$sj='1';}
elseif (strpos($file2,'_SPJBTL')||strpos($file2,'_spjbtl')) {$jdok='05';$sb='1';}
elseif (strpos($file2,'_ADD')||strpos($file2,'_SUPLEMEN')||strpos($file2,'_add')||strpos($file2,'_suplemen')) {$jdok='06';$ss='1';}
elseif (strpos($file2,'_SLO')||strpos($file2,'_slo')||strpos($file2,'_SPSLO')||strpos($file2,'_spslo')) {$jdok='07';$so='1';}
elseif (strpos($file2,'_I-06')||strpos($file2,'_I_06')||strpos($file2,'_I06')||strpos($file2,'_KUITANSI')) {$jdok='08';$kw='1';}
elseif (strpos($file2,'_PK')||strpos($file2,'_pk')) {$jdok='09';$kj='1';}
elseif (strpos($file2,'_BA')||strpos($file2,'_ba')) {$jdok='10';$bc='1';}
elseif (strpos($file2,'_PDL')||strpos($file2,'_DIL')||strpos($file2,'_pdl')||strpos($file2,'dil')) {$jdok='12';$npdl='1';}
else {$jdok='11';$ln='1';}

session_start();
$username =$_SESSION['nip'];
$kodeup=$_SESSION['kodeup'];
$kode_ap=$_SESSION['kode_ap'];
$kode_upi=$_SESSION['kode_upi'];
$tglupload = date("Ymd-His");
/*if (substr($kodeup,0,5)!=substr($midpel,0,5)) {
echo "<script type='text/javascript'>alert('Beda UNIT ..!');</script>";
exit;}
*/


$cn=oci_connect($uid,$pwd,$dbs);
$Qry="select ltrim(to_char(max(no_img)+1,'000')) no_baru from cust_ail_img 
      where idpel='$midpel' and kode_img='$jdok' ";
$sql=oci_parse($cn,$Qry);
oci_execute($sql);
$data=oci_fetch_array($sql,OCI_BOTH); 
  if (!$data){
  $no_baru="001";
  } else {
  $no_baru=$data[0];
  } 

$Qry="select count(*) adakah from cust_ail_img 
      where idpel='$midpel' and nmfile='$fileName' ";
$sql=oci_parse($cn,$Qry);
oci_execute($sql);
$datax=oci_fetch_array($sql,OCI_BOTH); 
  
if ($datax[0]>=1){
echo "<script type='text/javascript'>alert('File sudah PERNAH di UPLOAD..!');</script>";
exit;
}
//echo "<script type='text/javascript'>alert(' ".$midpel." + ".$tmpName."');</script>";
$content=oci_new_descriptor($cn,OCI_D_LOB);
$Qry="insert into cust_ail_img values (:idpel,:jdk,:urutdok,:fileName,:fileType,:fileSize,EMPTY_BLOB(),:username,:kodeup,:kode_ap,:kode_upi,:tglupload) returning content into :content";
$sql=oci_parse($cn,$Qry);
oci_bind_by_name($sql,':idpel',$midpel);
oci_bind_by_name($sql,':jdk',$jdok);
oci_bind_by_name($sql,':urutdok',$no_baru);
oci_bind_by_name($sql,':fileName',$fileName);
oci_bind_by_name($sql,':fileType',$fileType);
oci_bind_by_name($sql,':fileSize',$fileSize);
oci_bind_by_name($sql,':content',$content,-1,OCI_B_BLOB);
oci_bind_by_name($sql,':username',$username);
oci_bind_by_name($sql,':kodeup',$kodeup);
oci_bind_by_name($sql,':kode_ap',$kode_ap);
oci_bind_by_name($sql,':kode_upi',$kode_upi);
oci_bind_by_name($sql,':tglupload',$tglupload);

oci_execute($sql,OCI_DEFAULT);

$content->savefile($tmpName);

oci_commit($cn);

$Qry="select * from cust_ail where idpel= '$midpel'";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
$data=oci_fetch_array($stm,OCI_BOTH);
if ($data==null) {
echo "<script type='text/javascript'>alert('IDPEL tidak ketemu ..!');</script>";
exit;
}
$kdamplop=$data[1];
$kdlabel=$data[2];
$permohonan=$data[3];
$pr=$data[3];
$identitas=$data[4];
$id=$data[4];
$survey=$data[5];
$sv=$data[5];
$sjps=$data[6];
$sj=$data[6];
$spjbtl=$data[7];
$sb=$data[7];
$sspjbtl=$data[8];
$ss=$data[8];
$slo=$data[9];
$so=$data[9];
$kuitansi=$data[10];
$kw=$data[10];
$pk=$data[11];
$kj=$data[11];
$ba=$data[12];
$bc=$data[12];
$rayon=$data[13];
$lemari=$data[14];
$baris=$data[15];
$kolom=$data[16];
$nomor=$data[17];
$lain2=$data[18];
$ln=$data[18];
$pdl=$data[25];
$npdl=$data[25];
$prd=$data['PRD_LAP'];
$tgl=$data['TGL_UPDATE'];
$jam=$data['JAM_UPDATE'];

$now=getdate();
$bln=str_pad($now[mon],2,"0",STR_PAD_LEFT);
$tg=str_pad($now[mday],2,"0",STR_PAD_LEFT);
$jm=str_pad($now[hours],2,"0",STR_PAD_LEFT);
$mnt=str_pad($now[minutes],2,"0",STR_PAD_LEFT);
$dt=str_pad($now[seconds],2,"0",STR_PAD_LEFT);

if ($tgl==null){
$tgl=$now[year].$bln.$tg;
$jam=$jm.$mnt.$dt;
   if ($now[mday]<=15){
	  $prd=$now[year].$bln."1";
	  } else {
	  $prd =$now[year].$bln."2";
	  }
} 

if (strpos($file2,'_I-01')||strpos($file2,'_I_01')||strpos($file2,'_I01')) {$jdok='01';$pr='1';}
elseif (strpos($file2,'_KTP')) {$jdok='02';$id='1';}
elseif (strpos($file2,'_I-02')||strpos($file2,'_I_02')||strpos($file2,'_I02')) {$jdok='03';$sv='1';}
elseif (strpos($file2,'_I-03')||strpos($file2,'_I_03')||strpos($file2,'_I03')||strpos($file2,'_SIP')) {$jdok='04';$sj='1';}
elseif (strpos($file2,'_SPJBTL')||strpos($file2,'_spjbtl')) {$jdok='05';$sb='1';}
elseif (strpos($file2,'_ADD')||strpos($file2,'_SUPLEMEN')||strpos($file2,'_add')||strpos($file2,'_suplemen')) {$jdok='06';$ss='1';}
elseif (strpos($file2,'_SLO')||strpos($file2,'_slo')||strpos($file2,'_SPSLO')||strpos($file2,'_spslo')) {$jdok='07';$so='1';}
elseif (strpos($file2,'_I-06')||strpos($file2,'_I_06')||strpos($file2,'_I06')||strpos($file2,'_KUITANSI')) {$jdok='08';$kw='1';}
elseif (strpos($file2,'_PK')||strpos($file2,'_pk')) {$jdok='09';$kj='1';}
elseif (strpos($file2,'_BA')||strpos($file2,'_ba')) {$jdok='10';$bc='1';}
elseif (strpos($file2,'_PDL')||strpos($file2,'_DIL')||strpos($file2,'_pdl')||strpos($file2,'dil')) {$jdok='12';$npdl='1';}
else {$jdok='11';$ln='1';}

//Update Tabel CUST_AIL
$Qry="update cust_ail set kd_amplop='1',kd_label='1',permohonan='$pr',identitas='$id',survey='$sv',
sjps='$sj',spjbtl='$sb',sspjbtl='$ss',slo='$so',kuitansi='$kw',
pk='$kj',ba='$bc',ail_lain2='$ln',pdl=$npdl, ail_rayon='$rayon', 
ail_lemari='$lemari', ail_baris='$baris', ail_kolom='$kolom',
ail_nomor='$nomor', tgl_update='$tgl', jam_update='$jam', prd_lap='$prd' where idpel= '$midpel'";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);
oci_commit($cn);
								
oci_close($cn);
//echo "<script>document.getElementById(\"userfile\").onchange = function() {    document.getElementById(\"form\").submit();}</script>";
echo "<html>";
echo "<head><title>Entry/Edit Informasi AIL - Sistem Informasi Pengelolaan AIL</title>";
echo "</head>";
echo "<body>";
echo "<center>";
echo "*** Entry/Edit Informasi AIL ***<hr>";
echo "</center>";
echo "Berhasil Upload : ".$namafile;
echo "<form id=\"form\" method=\"post\" enctype=\"multipart/form-data\" action=\"pengail_upload_image.php\">";
echo "Pilih File JPEG yang berawalan nama IDPEL :";
echo "<br>";
echo "<table>";
echo "<tr><td><input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"5000000\">";
echo "<input name=\"userfile\" type=\"file\" size=\"65\"></td>";
echo "<td><input name=\"upload\" type=\"submit\" value=\"Upload\"></td></tr>";
echo "</table> ";
echo "<input type=\"hidden\" name=\"midpel\" value=\"$midpel\">";
echo "<input type=\"hidden\" name=\"jdok\" value=\"$jdok\">";
echo "<input type=\"hidden\" name=\"posisi\" value=\"$posisi\">";
echo "<br>";
echo "</form>";
echo "<br><a href=\"pengail_entry_idpel.php\">[Kembali ke form Entry AIL]</a>";
echo "</body>";
echo "</html>";
//echo $tmpName;
?>
