<<div class="card text-center col-auto">
  <div class="card-header">
    Temperatura, Humedad, Indice
  </div>
  <div class="card-body" style="width:100%;">
    <div id="main"></div><!-- Este div ya existía con style incluido -->
  </div>
  <div class="card-footer text-body-secondary">
    Historial de registros
  </div>
</div>
<script src="/assets/js/echarts/echarts.js"></script>
<script src="/assets/js/jquery.js" type="text/javascript"></script>

<script type="text/javascript">
  var myChart = echarts.init(document.getElementById('main'));

  myChart.setOption({
    title: {
      text: 'ECharts Line'
    },
    tooltip: {},
    legend: {
      data: ['Temperatura','Humedad','Indice']
    },
    xAxis: {
      data: []
    },
    yAxis: {},
    series: [
      {
          name: 'Temperatura',
          data: [],
          type: 'line',
          stack: 'x'
      },
      {
          name: 'Humedad',
          data: [],
          type: 'line',
          stack: 'x'
      },
      {
          name: 'Indice',
          data: [],
          type: 'line',
          stack: 'x'
      }
    ]
  });

function fetch() {
  $.ajax({
      url:"/data-el",
      type:"GET",
      dataType:"json",
      success:function(data){ 
          console.log(data);
          myChart.setOption({
            notMerge :true,
        yAxis: {
          data: data.columnas
          },
          series: [{
            name: 'Temperatura',
            data: data.temperatura
          },{
            name: 'Humedad',
            data: data.humedad
          },{
            name: 'Indice',
            data: data.indice
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
