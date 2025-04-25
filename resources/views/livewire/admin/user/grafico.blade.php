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
            <h3 class="text-lg font-bold">Oficinas</h3>
            <div class="flex items-center">
                <img src="{{ asset('img/icon/apartment.png') }}" alt="" class="w-8 h-8 mr-2">
                <p class="text-2xl">{{ count($ubicacion) }}</p>
            </div>
        </div>

        <div class="p-4 bg-gradient-to-b from-[#2973B2] to-[#152B59] shadow-md rounded-lg text-white hover:bg-none hover:bg-white hover:text-gray-800 transition duration-200">
            <h3 class="text-lg font-bold">Departamentos</h3>
            <div class="flex items-center">
              <img src="{{ asset('img/icon/apartment.png') }}" alt="" class="w-8 h-8 mr-2">
              <p class="text-2xl">{{ count($departments) }}</p>
            </div>
        </div>
    </div>

    <!-- Gráfica y notificaciones -->
    <div class="grid grid-cols-2 gap-6 my-6">
        <div class="p-4 shadow rounded-lg bg-white">
            <h3 class="text-base font-bold text-center mb-4 uppercase">Colaboradores por país</h3>
            <div id="chart-2"></div>
        </div>

        <div class="p-4 shadow rounded-lg bg-white">
            <p class="text-lg font-bold text-center mb-4">Notificaciones</p>
            <livewire:notifications-dashboard />
        </div>

        <div class="p-4 shadow rounded-lg bg-white">
          <h3 class="text-base font-bold text-center mb-4 uppercase">Colaboradores por departamentos</h3>
          <div class="max-h-[375px] overflow-y-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                <thead class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-6 text-left">Departamento</th>
                        <th class="py-3 px-6 text-center">Colaboradores</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                  @foreach($departments as $name => $count)
                  <tr class="border-b border-gray-300 hover:bg-gray-100">
                      <td class="py-3 px-6 text-left">{{ $name }}</td>
                      <td class="py-3 px-6 text-center">{{ $count }}</td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
        </div>

        <div class="p-4 shadow rounded-lg bg-white">
          <h3 class="text-base font-bold text-center mb-4 uppercase">Colaboradores por oficina</h3>
          <div class="max-h-[375px] overflow-y-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                <thead class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-6 text-left">Oficina</th>
                        <th class="py-3 px-6 text-center">Colaboradores</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                  @foreach($ubicacion as $name => $count)
                  <tr class="border-b border-gray-300 hover:bg-gray-100">
                      <td class="py-3 px-6 text-left">{{ $name }}</td>
                      <td class="py-3 px-6 text-center">{{ $count }}</td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
        </div>

        <div class="p-4 shadow rounded-lg bg-white">
          <h3 class="text-base font-bold text-center mb-4 uppercase">Colaboradores por área</h3>
          <div class="max-h-[375px] overflow-y-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                <thead class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-6 text-left">Áreas</th>
                        <th class="py-3 px-6 text-center">Colaboradores</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                  @foreach($area as $name => $count)
                  <tr class="border-b border-gray-300 hover:bg-gray-100">
                      <td class="py-3 px-6 text-left">{{ $name }}</td>
                      <td class="py-3 px-6 text-center">{{ $count }}</td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
        </div>

    </div>
    

    {{-- <script>
        /* Primer Gráfica*/
        var traduccion = @json($traduccion);
        var uscis = @json($uscis);
        var ventasPermisosTrabajo = @json($ventasPermisosTrabajo);
        var ventasIMS = @json($ventasIMS);

        var options = {
        series: [
          { name: 'Traducción', data: [traduccion] },
          { name: 'USCIS', data: [uscis] },
          { name: 'Ventas de Permisos de Trabajo', data: [ventasPermisosTrabajo] },
          { name: 'Ventas IMS', data: [ventasIMS] }
        ],
        chart: {
            type: 'bar',
            height: 500
        },
        plotOptions: {
            bar: {
            horizontal: false,
            columnWidth: '100%',
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
    </script> --}}

    <script>
        var colombia = @json($colombia);
        var costaRica = @json($costaRica);
        var estadosUnidos = @json($estadosUnidos);
        var argentina = @json($argentina);
        var mexico = @json($mexico);
        var puertoRico = @json($puertoRico);


        var options = {
          series: [colombia, costaRica, estadosUnidos, argentina, mexico, puertoRico],
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
        colors: ['#152B59', '#2973B2', '#B23B3B', '#152B59', '#2973B2', '#B23B3B'],
        labels: ['Colombia', 'Costa Rica', 'Estados Unidos', 'Argentina', 'México', 'Puerto Rico'],
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


