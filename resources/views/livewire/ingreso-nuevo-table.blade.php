<div class="p-10" id="tabla-gmail-corpo">
    <div class="w-full flex justify-between items-center p-1">
        <h2 class="text-[#152B59] font-bold uppercase">Colaboradores que faltan por correo corporativo</h2>
        <button wire:click="create" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fa-solid fa-plus mr-2"></i> Agregar
        </button>
    </div>

    @if (session()->has('message'))
        <div class="text-green-600 font-semibold my-2">
            {{ session('message') }}
        </div>
    @endif

    <div>
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-6 py-3 border-b">Nombre Completo</th>
                    <th class="px-6 py-3 border-b">Gmail</th>
                    <th class="px-6 py-3 border-b">Estado</th>
                    <th class="px-6 py-3 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ingresos as $ingreso)
                    <tr class="hover:bg-gray-100 text-center text-sm">
                        <td class="p-1">{{ $ingreso->nombre }}</td>
                        <td class="p-1 py-2">{{ $ingreso->gmail ?? 'No proporcionado' }}</td>
                        <td class="p-1 py-2">
                            <span class="inline-block px-4 py-1 rounded-full {{ $ingreso->estado == 'en espera' ? 'bg-[#B23B3B] text-white' : 'bg-green-500 text-white' }}">
                                {{ $ingreso->estado }}
                            </span>
                        </td>
                        <td class="p-1 py-2 text-center">
                            <button wire:click="edit({{ $ingreso->id }})" class="bg-[#152B59] hover:bg-[#0e1d3c] text-white px-4 py-2 rounded-md">
                                <i class="fa-solid fa-pen-to-square"></i> Editar
                            </button>
                            <button wire:click="confirmDelete({{ $ingreso->id }})" class="bg-[#B23B3B] hover:bg-red-700 text-white px-4 py-2 rounded-md ml-2">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-6">Sin colaboradores nuevos para registrar</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $ingresos->links() }}
        </div>
    </div>

    @if ($open)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-40">
            <div class="bg-white p-6 rounded-lg w-96">
                <h3 class="text-xl font-semibold mb-4">{{ $ingresoId ? 'Editar Usuario' : 'Agregar Nuevo Usuario' }}</h3>
                <form wire:submit.prevent="{{ $ingresoId ? 'update' : 'store' }}">
                    <div class="mb-4">
                        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" id="nombre" wire:model="nombre" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
                    </div>

                    @if ($ingresoId)
                        <div class="mb-4">
                            <label for="gmail" class="block text-sm font-medium text-gray-700">Gmail</label>
                            <input type="email" id="gmail" wire:model="gmail" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
                        </div>
                    @endif

                    <div class="mb-4 opacity-0">
                        <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                        <select id="estado" wire:model="estado" class="mt-1 p-2 w-full border border-gray-300 rounded-md" disabled>
                            <option value="en espera">En espera</option>
                            <option value="finalizado">Finalizado</option>
                        </select>
                    </div>

                    <div class="flex justify-center gap-x-2">
                        <button type="button" wire:click="closeModal" class="px-4 py-2 bg-gray-500 text-white rounded-md">Cerrar</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">
                            {{ $ingresoId ? 'Actualizar Usuario' : 'Agregar Usuario' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    @if ($openDeleteConfirm)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-40">
            <div class="bg-white p-6 rounded-lg w-96">
                <h3 class="text-xl font-semibold mb-4">Confirmar Eliminación</h3>
                <p>Antes de eliminar el colaborador, asegúrate de que si esté registrado en la intranet.</p>
                <div class="flex justify-between mt-4">
                    <button wire:click="closeModal" class="text-white bg-gray-500 hover:bg-gray-600 px-4 py-2 rounded-md">
                        Cancelar
                    </button>
                    <button wire:click="delete" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md">
                        Eliminar
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
