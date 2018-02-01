<?php
	// masih ada eror " something went wrong"
	// kayaknya harus di declarasi nol kan dari awal semua variable dinamis.
	error_reporting(1);
	session_start();
	include('db.php');
	$session_id='1';
	//$session id
	define ("MAX_SIZE","500");
	

	// -- Function Name : getExtension
	// -- Params : $str
	// -- Purpose : 
	function getExtension($str){
		$i = strrpos($str,".");
		
		if (!$i) {
			return "";
		}

		$l = strlen($str) - $i;
		$ext = substr($str,$i+1,$l);
		return $ext;
	}

	$cn=oci_connect($uid,$pwd,$dbs);
	$no_baru = 0;
	$vusername = 'JURUS2';
	//$vup = '16100';
	
	$vupi = '16';
	$valid_formats = array("jpg", "png", "gif", "bmp","jpeg");
	$tglupload = date("Ymd-His");
	
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") {
		//$uploaddir = "uploads/"; //a directory inside
		foreach ($_FILES['photos']['name'] as $name => $value)    {
			$filename = stripslashes($_FILES['photos']['name'][$name]);
			$size= filesize($_FILES['photos']['tmp_name'][$name]);
			$filesize= filesize($_FILES['photos']['tmp_name'][$name]);
			$tmpName = str_replace('xampp','Xampp',$_FILES['photos']['tmp_name'][$name]);
			$filetype= $_FILES['photos']['type'][$name];
			$file2 = $_FILES['photos']['name'][$name];
			$midpel = substr($_FILES['photos']['name'][$name],0,12);
			//get the extension of the file in a lower case format
			$ext = getExtension($filename);
			$ext = strtolower($ext);
			//echo "<script type='text/javascript'>alert('1 - '+ '$filename');</script>";     	
			
			$vup = substr($midpel,0,5);
			if (substr($vup,0,3) == '161') {
			$vap = '16BGK';
			}  else {
			$vap = '16BLT';
			}
			
			if(in_array($ext,$valid_formats)) {
				
				if ($size < (MAX_SIZE*1024)) {
					$image_name=time().$filename;
					//echo "<img src='".$uploaddir.$image_name."' class='imgList'>";
					//$newname=$uploaddir.$image_name;
					//=========================
					
					if (strpos($file2,'_I-01')||strpos($file2,'_I_01')||strpos($file2,'_I01')) {
						$jdok='01';
						$pr='1';
					}

					elseif (strpos($file2,'_KTP')) {
						$jdok='02';
						$id='1';
					}

					elseif (strpos($file2,'_I-02')||strpos($file2,'_I_02')||strpos($file2,'_I02')) {
						$jdok='03';
						$sv='1';
					}

					elseif (strpos($file2,'_I-03')||strpos($file2,'_I_03')||strpos($file2,'_I03')||strpos($file2,'_SIP')) {
						$jdok='04';
						$sj='1';
					}

					elseif (strpos($file2,'_SPJBTL')||strpos($file2,'_spjbtl')) {
						$jdok='05';
						$sb='1';
					}

					elseif (strpos($file2,'_ADD')||strpos($file2,'_SUPLEMEN')||strpos($file2,'_add')||strpos($file2,'_suplemen')) {
						$jdok='06';
						$ss='1';
					}

					elseif (strpos($file2,'_SLO')||strpos($file2,'_slo')||strpos($file2,'_SPSLO')||strpos($file2,'_spslo')) {
						$jdok='07';
						$so='1';
					}

					elseif (strpos($file2,'_I-06')||strpos($file2,'_I_06')||strpos($file2,'_I06')||strpos($file2,'_KUITANSI')) {
						$jdok='08';
						$kw='1';
					}

					elseif (strpos($file2,'_PK')||strpos($file2,'_pk')) {
						$jdok='09';
						$kj='1';
					}

					elseif (strpos($file2,'_BA')||strpos($file2,'_ba')) {
						$jdok='10';
						$bc='1';
					}

					elseif (strpos($file2,'_PDL')||strpos($file2,'_DIL')||strpos($file2,'_pdl')||strpos($file2,'dil')) {
						$jdok='12';
						$npdl='1';
					} else {
						$jdok='11';
						$ln='1';
					}

					$Qry="select ltrim(to_char(max(no_img)+1,'000')) no_baru from cust_ail_img where idpel='$midpel' and kode_img='$jdok' ";
					$sql=oci_parse($cn,$Qry);
					oci_execute($sql);
					$data=oci_fetch_array($sql,OCI_BOTH);
					
					if (!$data){
						$no_baru="001";
					} else {
						$no_baru=$data[0];
					}

					$Qry="select count(*) adakah from cust_ail_img 
					  where idpel='$midpel' and nmfile='$filename' and LENGTH (content) = 0";
					$sql=oci_parse($cn,$Qry);
					oci_execute($sql);
					$datax=oci_fetch_array($sql,OCI_BOTH);
					
					if ($datax[0]>=1){
						//echo "<script type='text/javascript'>alert('File sudah PERNAH di UPLOAD..-> $filename!');</script>";
						echo "<script type='text/javascript'>function myFunction() {var txt;var r = confirm('File sudah PERNAH di UPLOAD... $filename Upload Ulang ? (klik OK)!');	if (r == true) {alert('Di-Upload ULANG.');} else {alert('Di-Batalkan.');exit;}}</script>";
						echo "<script type='text/javascript'>myFunction();</script>";
						//exit;
					}

					//	echo "<script type='text/javascript'>alert(' ".$midpel."');</script>";
					//	echo "<script type='text/javascript'>alert('".$midpel."' o '".$jdok."' o '".$no_baru."' o '".$filename."' o '".$filetype."' o '".$filesize."' o '".$vusername."' o '".$vup."' o '".$vap."' o '".$vupi."');</script>";
					$sql = '';
					//$content = '';
					$content=oci_new_descriptor($cn,OCI_D_LOB);
					$Qry="insert into cust_ail_img values (:idpel,:jdk,:urutdok,:filename,:fileType,:fileSize,EMPTY_BLOB(),:username,:kodeup,:kode_ap,:kode_upi,:tglupload) returning content into :content";
					//			$Qry="insert into cust_ail_img values (:idpel,:jdk,:urutdok,:filename,:fileType,:fileSize,:username,:kodeup,:kode_ap,:kode_upi) returning content into :content";
					$sql=oci_parse($cn,$Qry);
					oci_bind_by_name($sql,':idpel',$midpel);
					oci_bind_by_name($sql,':jdk',$jdok);
					oci_bind_by_name($sql,':urutdok',$no_baru);
					oci_bind_by_name($sql,':filename',$filename);
					oci_bind_by_name($sql,':fileType',$filetype);
					oci_bind_by_name($sql,':fileSize',$filesize);
					oci_bind_by_name($sql,':content',$content,-1,OCI_B_BLOB);
					oci_bind_by_name($sql,':username',$vusername);
					oci_bind_by_name($sql,':kodeup',$vup);
					oci_bind_by_name($sql,':kode_ap',$vap);
					oci_bind_by_name($sql,':kode_upi',$vupi);
					oci_bind_by_name($sql,':tglupload',$tglupload);
					//echo "<script type='text/javascript'>alert('5');</script>";
					//echo "<script type='text/javascript'>alert(' ".$sql."');</script>";
					oci_execute($sql,OCI_DEFAULT);
					//echo "<script type='text/javascript'>alert('5a');</script>";			
					oci_error($sql);
					// For oci_execute errors pass the statement handle
					//die($e['message'], $e['code']);
					//if(!oci_execute($sql , OCI_DEFAULT)) {
					//	$error=oci_error($sql);
					//	die($error['message'], $error['code']);
					//}
					//echo "<script type='text/javascript'>alert('Siap Simpan');</script>";			
					$content->saveFile($tmpName);
					/*
					if ($content->savefile($tmpName)){
					oci_commit($cn);
					echo "Blob successfully uploaded\n";
					}else{
					echo "Couldn't upload Blob\n";
					}*/		
					//$content->free();
					//oci_free_statement($sql);
					//echo "<script type='text/javascript'>alert('Sukses');</script>";
					oci_commit($cn);
					oci_free_statement($sql);
					//echo "<script type='text/javascript'>alert('6');</script>";	
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
					
					if (strpos($file2,'_I-01')||strpos($file2,'_I_01')||strpos($file2,'_I01')) {
						$jdok='01';
						$pr='1';
					}

					elseif (strpos($file2,'_KTP')) {
						$jdok='02';
						$id='1';
					}

					elseif (strpos($file2,'_I-02')||strpos($file2,'_I_02')||strpos($file2,'_I02')) {
						$jdok='03';
						$sv='1';
					}

					elseif (strpos($file2,'_I-03')||strpos($file2,'_I_03')||strpos($file2,'_I03')||strpos($file2,'_SIP')) {
						$jdok='04';
						$sj='1';
					}

					elseif (strpos($file2,'_SPJBTL')||strpos($file2,'_spjbtl')) {
						$jdok='05';
						$sb='1';
					}

					elseif (strpos($file2,'_ADD')||strpos($file2,'_SUPLEMEN')||strpos($file2,'_add')||strpos($file2,'_suplemen')) {
						$jdok='06';
						$ss='1';
					}

					elseif (strpos($file2,'_SLO')||strpos($file2,'_slo')||strpos($file2,'_SPSLO')||strpos($file2,'_spslo')) {
						$jdok='07';
						$so='1';
					}

					elseif (strpos($file2,'_I-06')||strpos($file2,'_I_06')||strpos($file2,'_I06')||strpos($file2,'_KUITANSI')) {
						$jdok='08';
						$kw='1';
					}

					elseif (strpos($file2,'_PK')||strpos($file2,'_pk')) {
						$jdok='09';
						$kj='1';
					}

					elseif (strpos($file2,'_BA')||strpos($file2,'_ba')) {
						$jdok='10';
						$bc='1';
					}

					elseif (strpos($file2,'_PDL')||strpos($file2,'_DIL')||strpos($file2,'_pdl')||strpos($file2,'dil')) {
						$jdok='12';
						$npdl='1';
					} else {
						$jdok='11';
						$ln='1';
					}

					//Update Tabel CUST_AIL
					$Qry="update cust_ail set kd_amplop='1',kd_label='1',permohonan='$pr',identitas='$id',survey='$sv',
					sjps='$sj',spjbtl='$sb',sspjbtl='$ss',slo='$so',kuitansi='$kw',
					pk='$kj',ba='$bc',ail_lain2='$ln',pdl=$npdl, ail_rayon='$rayon', 
					ail_lemari='$lemari', ail_baris='$baris', ail_kolom='$kolom',
					ail_nomor='$nomor', tgl_update='$tgl', jam_update='$jam', prd_lap='$prd' where idpel= '$midpel'";
					$stm=oci_parse($cn,$Qry);
					oci_execute($stm);
					oci_commit($cn);
					//===========================
					/*		   
					if (move_uploaded_file($_FILES['photos']['tmp_name'][$name], $newname)) 
					{
					$time=time();
					//mysql_query("INSERT INTO user_uploads(image_name,user_id_fk,created) VALUES('$image_name','$session_id','$time')");
					}
					else
					{
					echo '<span class="imgList">You have exceeded the size limit! so moving unsuccessful! </span>';
					}		
					*/
				} else {
					echo '<span class="imgList">Size File melebihi batas > 500 KB !</span>';
				} //if ($size

			} else {
				echo '<span class="imgList">Ekstensi file tidak diketahui!</span>';
			} //if(in_array

		} //FOREACH
	}  //end if(isset($_POST)

	//echo "<script type='text/javascript'>alert('closed');</script>";
	?>
	<script>
	window.alert('Upload AIL Sudah Selesai!');
	</script>
	<?php
	oci_close($cn);
	

?>