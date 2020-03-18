<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conn = new mysqli ("localhost","root","","db_air");
if ($conn->connect_error){
	die("koneksi_gagal: " . $conn->connect_error);
}

$show = "SELECT tekanan FROM monitor ORDER BY tekanan DESC";
$result = $conn->query($show);
$row = $result->fetch_assoc();
$tekanan = $row["tekanan"];
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	 google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Tekanan', 0]
          
        ]);

        var options = {
          
          redFrom: 90, redTo: 500,
          yellowFrom:75, yellowTo: 90,
          minorTicks: 5
        };

        options.chartArea = { top: '5%', width: "80%", height: "85%" };
 
        //create trigger to resizeEnd event     
        $(window).resize(function() {
          if(this.resizeTO) clearTimeout(this.resizeTO);
          this.resizeTO = setTimeout(function() {
            $(this).trigger('resizeEnd');
          }, 500);
        });

      //redraw graph when window resize is completed  
      $(window).on('resizeEnd', function() {
      drawChart(data, options);
      });

                        var chart = new google.visualization.Gauge((document).getElementById('tekanan'));

chart.draw(data, options);

        
        setInterval(function() {
          data.setValue(0, 1, + Math.ceil(<?php echo($tekanan) ?>));
          chart.redraw(data, options);
        }, 1000);
        
      }var chart = new google.visualization.Gauge((document).getElementById('tekanan'));

</script>
       <div id="tekanan" align="center"></div>
</body>
</html>
