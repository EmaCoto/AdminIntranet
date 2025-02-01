<div>
    <!-- Estadísticas Resumidas -->
    <div class="grid grid-cols-4 gap-4">
        <div class="p-4 bg-gradient-to-b from-[#2973B2] to-[#152B59] shadow rounded-lg text-white hover:bg-none hover:bg-white hover:text-gray-800 transition duration-200">
            <h3 class="text-lg font-bold">Total de Empleados</h3>
            <div class="flex items-center">
              <img src="{{ asset('img/icon/working.png') }}" alt="" class="w-8 h-8 mr-2">
              <p class="text-2xl">{{ $totalEmployees }}</p>
            </div>
        </div>

        <div class="p-4 bg-gradient-to-b from-[#2973B2] to-[#152B59] shadow rounded-lg text-white hover:bg-none hover:bg-white hover:text-gray-800 transition duration-200">
            <h3 class="text-lg font-bold">Nuevos <span>(Últimos 30 días)</span></h3>
            <div class="flex items-center">
              <img src="{{ asset('img/icon/group.png') }}" alt="" class="w-8 h-8 mr-2">
              <p class="text-2xl">{{ $newEmployees }}</p>
            </div>
        </div>

        <div class="p-4 bg-gradient-to-b from-[#2973B2] to-[#152B59] shadow rounded-lg text-white hover:bg-none hover:bg-white hover:text-gray-800 transition duration-200">
            <h3 class="text-lg font-bold">Empleados Retirados</h3>
            <div class="flex items-center">
              <img src="{{ asset('img/icon/shrug.png') }}" alt="" class="w-8 h-8 mr-2">
              <p class="text-2xl">{{ $retiredEmployees }}</p>
            </div>
        </div>

        <div class="p-4 bg-gradient-to-b from-[#2973B2] to-[#152B59] shadow rounded-lg text-white hover:bg-none hover:bg-white hover:text-gray-800 transition duration-200">
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
            <h3 class="text-lg font-bold text-center mb-4">Estadísticas de Empleados</h3>
            <div id="chart"></div>
        </div>
        <div class="p-4 shadow rounded-lg bg-white">
            <h3 class="text-lg font-bold text-center mb-4">Estadísticas</h3>
            <div id="chart-2"></div>
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
        var totalEmployees = @json($totalEmployees);
        var newEmployees = @json($newEmployees);
        var retiredEmployees = @json($retiredEmployees);
        var totalDepartments = @json($totalDepartments);
        var jobTitleChanges = @json($jobTitleChanges);


        var options = {
        series: [
            {
            name: 'Empleados',
            data: [totalEmployees]
            },
            {
            name: 'Empleados Nuevos',
            data: [newEmployees]
            },
            {
            name: 'Empleados Retirados',
            data: [retiredEmployees]
            },
            {
            name: 'Departamentos',
            data: [totalDepartments]
            },
            {
            name: 'Cambios en Departamentos',
            data: [jobTitleChanges]
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
        /* Segunda Gráfica*/
        var options = {
          series: [44, 55, 67, 83],
          chart: {
          height: 350,
          type: 'radialBar',
        },
        plotOptions: {
          radialBar: {
            dataLabels: {
              name: {
                fontSize: '22px',
              },
              value: {
                fontSize: '16px',
              },
              total: {
                show: true,
                label: 'Total',
                formatter: function (w) {
                  // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
                  return 249
                }
              }
            }
          }
        },
        labels: ['Apples', 'Oranges', 'Bananas', 'Berries'],
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

    <script>
            var options = {
          series: [{
          data: [44, 55, 41, 64, 22, 43, 21]
        }, {
          data: [53, 32, 33, 52, 13, 44, 32]
        }],
          chart: {
          type: 'bar',
          height: 430
        },
        plotOptions: {
          bar: {
            horizontal: true,
            dataLabels: {
              position: 'top',
            },
          }
        },
        dataLabels: {
          enabled: true,
          offsetX: -6,
          style: {
            fontSize: '12px',
            colors: ['#fff']
          }
        },
        stroke: {
          show: true,
          width: 1,
          colors: ['#fff']
        },
        tooltip: {
          shared: true,
          intersect: false
        },
        xaxis: {
          categories: [2001, 2002, 2003, 2004, 2005, 2006, 2007],
        },
        };

        var chart = new ApexCharts(document.querySelector("#chart-4"), options);
        chart.render();
      
    </script>
</div>


