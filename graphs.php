<html>
<head>

<script>
var data=[''];

</script>
<?php
    include_once 'dbconnect.php'
    $query = 'SELECT * FROM rainfall where state ilike 'Karnataka' and district ilike 'shimoga';
    $result = pg_query($query) or die('Query failed: ' . pg_last_error());
    
?>
<script src="http://code.highcharts.com/highcharts.js">
var chart1; // globally available


$(function() {
       chart1 = Highcharts.stockChart('container', {
         rangeSelector: {
            selected: 1
         },
         series: [{
            name: 'USD to EUR',
            data: usdtoeur // predefined JavaScript array
         }]
      });
   });
</script>


</head>
<body>
<div id="container" style="width:100%; height:400px;"></div>
</body>
</html>