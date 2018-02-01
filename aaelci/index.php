<?
// awal halaman pemeliharaan
/*if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
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
<head><title>Aplikasi Revenue Assurance - Pembenahan DIL</title></head>
<body>
<form method="POST" action="menu/pengail_login.php">

<table border=0 width=100%>
<tr><td width=20%></td><td width=45% align="CENTER"><img src="images/sampul.jpg"></td><td width=35%></td></tr>
<tr><td width=20%></td><td width=45%>
			<table border=0 width=100%>
			<tr><td width=10% align="RIGHT"><img src="images/login_image.jpg"></td>
		        <td width=40% ><font color="#000066"><b>Silakan login terlebih dahulu .....</b></font>
       				<table bgcolor="#EAEAEA" border="1">
       				<tr><td width="120" align="RIGHT"><font color="#000066">User ID :</td><td><input type="TEXT" name="nip" size=22></font></td></tr> 
       				<tr><td width="120" align="RIGHT"><font color="#000066">Password :</td><td><input type="PASSWORD" name="pswd" size=22></font></td></tr>
       				<tr><td width="120" align="RIGHT"><font color="#000066"><a href="file_yg_kosong.php">File Yg Kosong (Load 1 Menit) </a></td><td align="RIGHT"x><a href="laporan_pdp_revas_link.php">Progress Report .</a><input type="SUBMIT" name="submit" value="Ok"></font></td></tr>
       				</table><br><br>
			</td>
			</tr>
			</table>
       			</td>
       			<td width=35%></td>  
  			</td><td></td>
</tr>
</table>
</form>
</body>
</html>