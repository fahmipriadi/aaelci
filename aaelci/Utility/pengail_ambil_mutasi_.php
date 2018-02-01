<?php

//session_start();

//include "cek.php";

$fileName = $_FILES['userfile']['name'];     
$tmpName  = $_FILES['userfile']['tmp_name']; 
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];
$username = $_SESSION['username'];

echo $fileName;

//$fp      = fopen($tmpName, 'r');
//$content = fread($fp, filesize($tmpName));
//$content = addslashes($content);

//fclose($fp);

//mysql_connect('localhost','root','root');
//mysql_select_db('contoh');

//$query = "INSERT INTO upload (name, size, type, content, username) 
//          VALUES ('$fileName', '$fileSize', '$fileType', '$content', '$username')";
		  
//mysql_query($query);
//echo "<h1>Anda login sebagai : ".$username."</h1>";
//echo "<p>[ <a href='formupload.php'>Upload</a> ] [ <a href='list.php'>Daftar File</a> ] [ <a href='logout.php'>Logout</a> ]</p>";

echo "<p>File ".$fileName." telah terupload</p>";

?>
