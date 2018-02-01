<html>
<body>
<?php
$kdunit=$_POST['kdunit'];
include("../data_akses/pengail_modul.php");
?>
<tr>
<table border=1 width=100%><tr>
<td width=4% align="CENTER"><font size=1>NO</font></td>
<td width=12% align="CENTER"><font size=1>KD RAYON</font></td>
<td width=12% align="CENTER"><font size=1>KD LEMARI</font></td>
<td width=12% align="CENTER"><font size=1>JML BARIS</font></td>
<td width=12% align="CENTER"><font size=1>JML KOLOM</font></td>
<td width=12% align="CENTER"><font size=1>AIL MAX</font></td>
<td width=12% align="CENTER"><font size=1>POS BARIS</a></font></td>
<td width=12% align="CENTER"><font size=1>POS KOLOM</font></td>
<td width=12% align="CENTER"><font size=1>POS NOMOR</font></td>
</tr>
</table>
<?php
$cn=oci_connect($uid,$pwd,$dbs);
$Qry="select * from cust_ail_lemari where ail_rayon='$kdunit' order by ail_lemari";
$stm=oci_parse($cn,$Qry);
oci_execute($stm);

$num=0;
echo "<table border=1 width=100%>\n";
while ($data=oci_fetch_array($stm,OCI_BOTH))
{
$num=$num+1;
$kunci[num]=$data[1];
echo "<td width=4% align=\"RIGHT\"><font size=2>$num</font></td>\n";
echo "<td width=12% align=\"RIGHT\"><font size=2>$data[0]</font></td>\n";
echo "<td width=12% align=\"RIGHT\"><font size=2>$data[1]</font></td>\n";
echo "<td width=12% align=\"RIGHT\"><font size=2>$data[2]</font></td>\n";
echo "<td width=12% align=\"RIGHT\"><font size=2>$data[3]</font></td>\n";
echo "<td width=12% align=\"RIGHT\"><font size=2>$data[4]</font></td>\n";
echo "<td width=12% align=\"RIGHT\"><font size=2>$data[5]</font></td>\n";
echo "<td width=12% align=\"RIGHT\"><font size=2>$data[6]</font></td>\n";
echo "<td width=12% align=\"RIGHT\"><font size=2>$data[7]</font></td>\n";
echo "</tr>\n";
}
echo "</table>\n";

?>
<form method="get" target="lemari_edit" action="pengail_referensi_lemari_edit.php">
Nomor lemari : 
<input type="text" name="kunit" value=<?php echo $kdunit ?> readonly="readonly">
<input type="text" name="no_lemari"> 
<input type="submit" name="_edit" value="Edit">
<input type="submit" name="_add" value="Add">
</form>


</body>
</html>