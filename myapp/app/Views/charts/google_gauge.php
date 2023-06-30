<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Google Gauge</title>
</head>
<body>
  <div id="chart_div" style="width: 400px; height: 120px;"></div>
</body>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['gauge']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['Temperatura', 0],
        ['Humedad', 0],
        ['Indice', 0]
      ]);

      var options = {
        width: 500, height: 220,
        greenFrom:50,greenTo:180,
        redFrom: 180, redTo: 200,
        yellowFrom:150, yellowTo: 180,
        minorTicks: 5, max:200
        };

      var chart = new google.visualization.Gauge(document.getElementById('chart_div'));
      chart.draw(data, options);

      setInterval(function() {
        $.ajax({
          url:"/data-gg",
          type:"GET",
          dataType:"json",
          success:function(datos){ 
              console.log(datos);
              data.setValue(0, 1,Math.round(datos.temperatura));
              chart.draw(data, options);
              data.setValue(1, 1, Math.round(datos.humedad));
              chart.draw(data, options);
              data.setValue(2, 1, Math.round(datos.indice));
              chart.draw(data, options);
          }
        }) 
      }, 15000);
  }
</script>
</html>