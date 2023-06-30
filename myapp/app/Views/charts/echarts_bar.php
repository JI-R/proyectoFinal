<html>
  <head>
    <meta charset="utf-8" />
    <title>EChart Bar</title>
    <script src="/assets/js/echarts/echarts.js" type="text/javascript"></script>
    <script src="/assets/js/jquery.js" type="text/javascript"></script>
  </head>
  <body>

  <div class="card text-center col-auto">
    <div class="card-header">
      Temperatura, Humedad, Indice
    </div>
    <div class="card-body" style="width:100%;">
      <div id="main" style="width: 800px;height:400px;"></div><!-- Este div ya existía con style incluido -->
    </div>
    <div class="card-footer text-body-secondary">
      Ultimo registro
    </div>
  </div>

<script type="text/javascript">
  var myChart = echarts.init(document.getElementById('main'));

  myChart.setOption({
    title: {
      text: 'ECharts Bar'
    },
    tooltip: {},
    legend: {
      data: ['Medidas']
    },
    xAxis: {
      data: ['temperatura','humedad','indice']
    },
    yAxis: {},
    series: [
      {
        name: 'Medidas',
        type: 'bar',
        data: [0,0,0]
      }
    ]
  });

  function fetch() {
    $.ajax({
        url:"/data-eb",
        type:"GET",
        dataType:"json",
        success:function(data){ 
            console.log(data);
            myChart.setOption({
            xAxis: {
            data: data.categories
            },
            series: [{
              name: 'Medidas',
              data: data.data
            }]
          });
        }
      });
  }

  $(document).ready(function(){
    fetch();
    setInterval(fetch, 15000);
  });
    </script>
  </body>
</html>

 

