<div class="row g-2">
  <div class="col-4">
  <div class="card text-center">
        <div class="card-header">
            Temperatura
        </div>
        <div class="card-body" style="width:100%;min-height:220px">
            <div id="temperatura" class="gauge"></div>
        </div>
        <div class="card-footer text-body-secondary">
          Ultimo Registro:<div id="date_temperatura">Fecha/Hora</div>
        </div>
  </div>
  </div>
  <div class="col-4">
  <div class="card text-center">
    <div class="card-header">
        Humedad
    </div>
    <div class="card-body" style="width:100%;min-height:220px">
        <div id="humedad" class="gauge"></div>
    </div>
    <div class="card-footer text-body-secondary">
      Ultimo Registro:<div id="date_humedad">Fecha/Hora</div>
    </div>
  </div>
  </div>
  <div class="col-4">
  <div class="card text-center">
      <div class="card-header">
          Indice
      </div>
      <div class="card-body" style="width:100%;min-height:220px">
          <div id="indice" class="gauge"></div>
      </div>
      <div class="card-footer text-body-secondary">
        Ultimo Registro:<div id="date_indice">Fecha/Hora</div>
      </div>
  </div>
  </div>
</div>
<script src="/assets/js/echarts/echarts.js" type="text/javascript"></script>
<script src="/assets/js/jquery.js" type="text/javascript"></script>
<script>
var temperaturaChart = echarts.init(document.getElementById('temperatura'));
var humedadChart = echarts.init(document.getElementById('humedad'));
var indiceChart = echarts.init(document.getElementById('indice'));
var temperaturaDate = document.getElementById('date_temperatura');
var humedadDate = document.getElementById('date_humedad');
var indiceDate = document.getElementById('date_indice');

temperaturaChart.setOption({
  series: [
    {
      name: 'gauge_temperatura',
      type: 'gauge',
      center: ['50%', '65%'],
      startAngle: 200,
      endAngle: -20,
      min: 0,
      max: 60,
      splitNumber: 12,
      itemStyle: {
        color: '#FFAB91'
      },
      progress: {
        show: true,
        width: 30
      },
      pointer: {
        show: false
      },
      axisLine: {
        lineStyle: {
          width: 30
        }
      },
      axisTick: {
        distance: -45,
        splitNumber: 5,
        lineStyle: {
          width: 2,
          color: '#999'
        }
      },
      splitLine: {
        distance: -52,
        length: 14,
        lineStyle: {
          width: 3,
          color: '#999'
        }
      },
      axisLabel: {
        distance: -20,
        color: '#999',
        fontSize: 16
      },
      anchor: {
        show: false
      },
      title: {
        show: false
      },
      detail: {
        valueAnimation: true,
        width: '60%',
        lineHeight: 40,
        borderRadius: 8,
        offsetCenter: [0, '50%'],
        fontSize: 32,
        fontWeight: 'bolder',
        formatter: '{value} °C',
        color: 'inherit'
      },
      data: [
        {
          value: 0
        }
      ]
    }]
    });

humedadChart.setOption({
  series: [
    {
      name: 'gauge_humedad',
      type: 'gauge',
      center: ['50%', '65%'],
      startAngle: 200,
      endAngle: -20,
      min: 0,
      max: 100,
      splitNumber: 10,
      itemStyle: {
        color: '#91E5FF'
      },
      progress: {
        show: true,
        width: 30
      },
      pointer: {
        show: false
      },
      axisLine: {
        lineStyle: {
          width: 30
        }
      },
      axisTick: {
        distance: -45,
        splitNumber: 5,
        lineStyle: {
          width: 2,
          color: '#999'
        }
      },
      splitLine: {
        distance: -52,
        length: 14,
        lineStyle: {
          width: 3,
          color: '#999'
        }
      },
      axisLabel: {
        distance: -20,
        color: '#999',
        fontSize: 16
      },
      anchor: {
        show: false
      },
      title: {
        show: false
      },
      detail: {
        valueAnimation: true,
        width: '60%',
        lineHeight: 40,
        borderRadius: 8,
        offsetCenter: [0, '50%'],
        fontSize: 32,
        fontWeight: 'bolder',
        formatter: '{value} %',
        color: 'inherit'
      },
      data: [
        {
          value: 0
        }
      ]
    }]
    });

indiceChart.setOption({
  series: [
    {
      name: 'gauge_indice',
      type: 'gauge',
      center: ['50%', '65%'],
      startAngle: 200,
      endAngle: -20,
      min: 0,
      max: 60,
      splitNumber: 12,
      itemStyle: {
        color: '#ffe291'
      },
      progress: {
        show: true,
        width: 30
      },
      pointer: {
        show: false
      },
      axisLine: {
        lineStyle: {
          width: 30
        }
      },
      axisTick: {
        distance: -45,
        splitNumber: 5,
        lineStyle: {
          width: 2,
          color: '#999'
        }
      },
      splitLine: {
        distance: -52,
        length: 14,
        lineStyle: {
          width: 3,
          color: '#999'
        }
      },
      axisLabel: {
        distance: -20,
        color: '#999',
        fontSize: 16
      },
      anchor: {
        show: false
      },
      title: {
        show: false
      },
      detail: {
        valueAnimation: true,
        width: '60%',
        lineHeight: 40,
        borderRadius: 8,
        offsetCenter: [0, '50%'],
        fontSize: 32,
        fontWeight: 'bolder',
        formatter: '{value} °C',
        color: 'inherit'
      },
      data: [
        {
          value: 0
        }
      ]
    }]
});

function fetch() {
    $.ajax({
        url:"/data-gg",
        type:"GET",
        dataType:"json",
        success:function(data){ 
            console.log(data);
            temperaturaChart.setOption({
                series: [{data: [{value: data.temperatura}]}]
            });
            humedadChart.setOption({
                series: [{data: [{value: data.humedad}]}]
            });
            indiceChart.setOption({
                series: [{data: [{value: data.indice}]}]
            });
            temperaturaDate.innerHTML = data.fecha;
    			    humedadDate.innerHTML = data.fecha;
    			    indiceDate.innerHTML = data.fecha;
        }
      });
  }

  $(document).ready(function(){
     fetch(); 
    window.addEventListener('resize', function() {
        temperaturaChart.resize();
        humedadChart.resize();
        indiceChart.resize();
      });
    setInterval(fetch, 15000);
  });
</script>