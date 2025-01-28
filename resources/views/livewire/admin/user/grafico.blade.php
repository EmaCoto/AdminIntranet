<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Estadísticas Resumidas -->
    <div class="grid grid-cols-1 gap-4">
        <div class="p-4 bg-white shadow rounded-lg">
            <h3 class="text-lg font-bold">Total de Empleados</h3>
            <p class="text-2xl">{{ $totalEmployees }}</p>
        </div>

        <div class="p-4 bg-white shadow rounded-lg">
            <h3 class="text-lg font-bold">Empleados Nuevos (Últimos 30 días)</h3>
            <p class="text-2xl">{{ $newEmployees }}</p>
        </div>

        <div class="p-4 bg-white shadow rounded-lg">
            <h3 class="text-lg font-bold">Empleados Retirados</h3>
            <p class="text-2xl">{{ $retiredEmployees }}</p>
        </div>

        <div class="p-4 bg-white shadow rounded-lg">
            <h3 class="text-lg font-bold">Departamentos</h3>
            <p class="text-2xl">{{ $totalDepartments }}</p>
        </div>

        <div class="p-4 bg-white shadow rounded-lg">
            <h3 class="text-lg font-bold">Cambios en Departamentos</h3>
            <p class="text-2xl">{{ $jobTitleChanges }}</p>
        </div>
    </div>

    <!-- Gráfica -->
    <div class="p-4 bg-white shadow rounded-lg">
        <h3 class="text-lg font-bold text-center mb-4">Estadísticas de Empleados</h3>
        <div id="chart"></div>
    </div>

</div>


