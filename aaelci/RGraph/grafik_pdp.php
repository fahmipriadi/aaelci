<html>
<head>
<script src="libraries/RGraph.svg.common.core.js"></script>
<script src="libraries/RGraph.svg.line.js"></script>
</head>
<body>
<script type="text/JavaScript" >
function awal(){
top.location.href='../../monitoring3/admin/index.php/start/login';
}

function awal1(){
top.location.href='../index.php';
}

</script>


<?php
include("../data_akses/pengail_modul.php");
$cn=oci_connect($uid,$pwd,$dbs);

 //$Qry1="select prosentase1 from snapshot_pdp where kode_ap='16BGK'and PRD_PLAN=11";
  //$stm1=oci_parse($cn,$Qry1);
  //oci_execute($stm1);

  //while ($hasil1=oci_fetch_array($stm1,OCI_BOTH)){
  //echo "$hasil1[0]";
  //}

  //function coba($kodeap,$prdplan){
  //$Qry1="select prosentase1 from snapshot_pdp where kode_ap='$kodeap'and PRD_PLAN=$prdplan";
  //$stm1=oci_parse($cn,$Qry1);
  //oci_execute($stm1);
  
  //while ($hasil1=oci_fetch_array($stm1,OCI_BOTH)){
  //echo "$hasil1[0]";
  //}
  //}
  //coba('16BGK',11);
  //exit();
?>
<div style="width: 750px; height: 300px; background-color: white" id="chart-container"></div>
<script>
    new RGraph.SVG.Line({
        id: 'chart-container',
        data: [
            [<?php $Qry1="select prosentase1 from snapshot_pdp where kode_ap='16BGK'and PRD_PLAN=11";
				$stm1=oci_parse($cn,$Qry1);
				oci_execute($stm1);
				$num=0;
				while (
				    $num=$num+1;
					$hasil1=oci_fetch_array($stm1,OCI_BOTH)){
					echo "$hasil1[0]";
				}?> 	],
            [<?php $Qry1="select prosentase1 from snapshot_pdp where kode_ap='16TJP'and PRD_PLAN=11";
				$stm1=oci_parse($cn,$Qry1);
				oci_execute($stm1);
				while ($hasil1=oci_fetch_array($stm1,OCI_BOTH)){
					echo "$hasil1[0]";
				}?> ],
        ],
        options: {
            linewidth: 3,
            gutterLeft: 50,
            gutterBottom: 50,
            xaxisLabels: ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'],
            title: 'A line chart with multiple lines'
        }
    }).draw();
</script>



</body>
</html>
