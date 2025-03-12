<div>
    <!-- Estadísticas Resumidas -->
    <div class="grid grid-cols-4 gap-4">
        <div class="p-4 bg-gradient-to-b from-[#2973B2] to-[#152B59] shadow-md rounded-lg text-white hover:bg-none hover:bg-white hover:text-gray-800 transition duration-200">
            <h3 class="text-lg font-bold">Total de Empleados</h3>
            <div class="flex items-center">
              <img src="{{ asset('img/icon/working.png') }}" alt="" class="w-8 h-8 mr-2">
              <p class="text-2xl">{{ $totalEmployees }}</p>
            </div>
        </div>

        <div class="p-4 bg-gradient-to-b from-[#2973B2] to-[#152B59] shadow-md rounded-lg text-white hover:bg-none hover:bg-white hover:text-gray-800 transition duration-200">
            <h3 class="text-lg font-bold">Nuevos <span>(Últimos 30 días)</span></h3>
            <div class="flex items-center">
              <img src="{{ asset('img/icon/group.png') }}" alt="" class="w-8 h-8 mr-2">
              <p class="text-2xl">{{ $newEmployees }}</p>
            </div>
        </div>

        <div class="p-4 bg-gradient-to-b from-[#2973B2] to-[#152B59] shadow-md rounded-lg text-white hover:bg-none hover:bg-white hover:text-gray-800 transition duration-200">
            <h3 class="text-lg font-bold">Vendedores</h3>
            <div class="flex items-center">
              <img src="{{ asset('img/icon/gerente.png') }}" alt="" class="w-8 h-8 mr-2">
              <p class="text-2xl">{{ $vendedorCount }}</p>
            </div>
        </div>

        <div class="p-4 bg-gradient-to-b from-[#2973B2] to-[#152B59] shadow-md rounded-lg text-white hover:bg-none hover:bg-white hover:text-gray-800 transition duration-200">
            <h3 class="text-lg font-bold">Departamentos</h3>
            <div class="flex items-center">
              <img src="{{ asset('img/icon/apartment.png') }}" alt="" class="w-8 h-8 mr-2">
              <p class="text-2xl">{{ $totalDepartments }}</p>
            </div>
        </div>
    </div>

    <!-- Gráfica y notificaciones -->
    <div class="grid grid-cols-2 gap-6 my-6">
      <div class="p-4 shadow rounded-lg bg-white">
          <h3 class="text-lg font-bold text-center mb-4">Estadísticas</h3>
          <div id="chart-2"></div>
      </div>
        <div class="p-4 shadow rounded-lg bg-white">
            <h3 class="text-lg font-bold text-center mb-4">Estadísticas de Empleados</h3>
            <div id="chart"></div>
        </div>
        <div class="p-4 shadow rounded-lg bg-white">
            <p class="text-lg font-bold text-center mb-4">Notificaciones</p>
            <livewire:notifications-dashboard />
        </div>
        <div class="p-4 shadow rounded-lg bg-white">
            <h3 class="text-lg font-bold text-center mb-4">Estadísticas</h3>
            <div id="chart-3"></div>
        </div>
    </div>
    

    <script>

        /* Primer Gráfica*/
        var coordinadorCount = @json($coordinadorCount);
        var supervisorCount = @json($supervisorCount);
        var directorCount = @json($directorCount);
        var gerenciaCount = @json($gerenciaCount);


        var options = {
        series: [
            {
            name: 'Coordinadores',
            data: [coordinadorCount]
            },
            {
            name: 'Supervisores',
            data: [supervisorCount]
            },
            {
            name: 'Directores',
            data: [directorCount]
            },
            {
            name: 'Subgerentes',
            data: [gerenciaCount]
            }
        ],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
            horizontal: false,
            columnWidth: '55%',
            borderRadius: 5
            }
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: ['Total']
        },
        yaxis: {
            title: {
            text: 'Cantidad'
            }
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
            formatter: function (val) {
                return val + " empleados";
            }
            }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>

    <script>
        var directorCount = @json($directorCount);
        var supervisorCount = @json($supervisorCount);
        var gerenciaCount = @json($gerenciaCount);
        var coordinadorCount = @json($coordinadorCount);


        var options = {
          series: [coordinadorCount, supervisorCount, directorCount, gerenciaCount],
          chart: {
          height: 390,
          type: 'radialBar',
        },
        plotOptions: {
          radialBar: {
            offsetY: 0,
            startAngle: 0,
            endAngle: 270,
            hollow: {
              margin: 5,
              size: '30%',
              background: 'transparent',
              image: undefined,
            },
            dataLabels: {
              name: {
                show: false,
              },
              value: {
                show: false,
              }
            },
            barLabels: {
              enabled: true,
              useSeriesColors: true,
              offsetX: -8,
              fontSize: '16px',
              formatter: function(seriesName, opts) {
                return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex]
              },
            },
          }
        },
        colors: ['#1ab7ea', '#0084ff', '#39539E', '#0077B5'],
        labels: ['Coordinadores', 'Supervisores', 'Director', 'Subgerente'],
        responsive: [{
          breakpoint: 480,
          options: {
            legend: {
                show: false
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#chart-2"), options);
        chart.render();
      
    </script>

    <script>
        /* Tercer Gráfica*/
        var options = {
            series: [{
            name: 'series1',
            data: [31, 40, 28, 51, 42, 109, 100]
            }, {
            name: 'series2',
            data: [11, 32, 45, 32, 34, 52, 41]
            }],
            chart: {
            height: 350,
            type: 'area'
            },
            dataLabels: {
            enabled: false
            },
            stroke: {
            curve: 'smooth'
            },
            xaxis: {
            type: 'datetime',
            categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
            },
            tooltip: {
            x: {
                format: 'dd/MM/yy HH:mm'
            },
            },
            };

            var chart = new ApexCharts(document.querySelector("#chart-3"), options);
            chart.render();
    </script>
</div>


