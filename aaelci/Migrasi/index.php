<?php 
session_start();
$session_id='1'; //$session id
/*
// awal halaman pemeliharaan
if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	//header('Location: '.$uri.'/aaelci/');
	header('Location: '.$uri.'/aaelci/pemeliharaan/');
	exit;

// akhir halaman pemeliharaan
*/
?>
<html>
<head>
<title>Migrasi</title>
</head>

<script src="js/jquery.min.js"></script>
<script src="js/jquery.wallform.js"></script>
<script>
 $(document).ready(function() { 
		
            $('#photoimg').die('click').live('change', function(){ 
			           //$("#preview").html('');
			    
				$("#imageform").ajaxForm({target: '#preview', 
				     beforeSubmit:function(){ 
					
					console.log('Menampilkan Loading Gif');
					$("#imageloadstatus").show();
					 $("#imageloadbutton").hide();
					 }, 
					success:function(){ 
				    console.log('Menyembunyikan Loading Gif');
					 $("#imageloadstatus").hide();
					 $("#imageloadbutton").show();
					}, 
					error:function(){ 
					console.log('Menampilkan Error');
					 //$("#imageloadstatus").hide();
					 $("#imageloadbutton").show();
					} 
					}).submit();
					
		
			});
        }); 
</script>

<style>

body
{
font-family:arial;
}

#preview
{
color:#cc0000;
font-size:12px;
}
.imgList 
{
max-height:150px;
margin-left:5px;
border:1px solid #dedede;
padding:4px;	
float:left;	
}

</style>
<body>

<div>

<div id='preview'>

	
<form id="imageform" method="post" enctype="multipart/form-data" action='ajaxImageUpload.php' style="clear:both">
<h1>Pilih File JPG hasil Scan AIL</h1> 
<div id='imageloadstatus' style='display:none'><img src="loader.gif" alt="Uploading...."/></div>
<div id='imageloadbutton'>
<input type="file" name="photos[]" id="photoimg" multiple="true" />
</div>
<div id='beritaisi'>
<br>
<?
echo "Tanggal ".date("Ymd-His");
?>
<p id="berita"></p>
</div>

</form>

</div>
</div>
</body>
</html>