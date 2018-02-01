<html>
<head>
<script src="libraries/RGraph.svg.common.core.js"></script>
<script src="libraries/RGraph.svg.line.js"></script>
</head>
<body>
<div style="width: 750px; height: 300px; background-color: white" id="chart-container"></div>
<script>
    new RGraph.SVG.Line({
        id: 'chart-container',
        data: [
            [19,165,132,111,185,149,199],
            [48,46,51,94,84,25,65],
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
</body
</html>