<!--	$i = 0;
	echo '<html><body>';
		
	echo 'DATA PDP';
	echo '<br>';
	echo '<br>';
	echo '<br>';	
	echo '<table border="1"><tr>';
	while ($i < oci_fetch($stm))
	{
		$meta = oci_num_fileds($stm, $i);
		echo '<td>' . $meta->name . '</td>';
		$i = $i + 1;
	}
	echo '</tr>';
	
	$i = 0;
	while ($row = oci_fetch_row($stm)) 
	{
		echo '<tr>';
		$count = count($row);
		$y = 0;
		while ($y < $count)
		{
			$c_row = current($row);
			echo '<td>' . $c_row . '</td>';
			next($row);
			$y = $y + 1;
		}
		echo '</tr>';
		$i = $i + 1;
	}
	echo '</table>';
	echo 'DATA PDP';
	echo '<br>';
	echo '<br>';
	echo '<br>';	
    
	echo '</body></html>';
    
    
	oci_free_statement($stm);-

/**/
//mysql_close ($link);