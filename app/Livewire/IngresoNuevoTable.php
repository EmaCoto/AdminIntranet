<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\IngresoNuevo;

class IngresoNuevoTable extends Component
{
    use WithPagination;

    public $nombre, $gmail, $estado;
    public $ingresoId = null;  // Para identificar si estamos editando o creando
    public $open = false;      // Controla si el modal está abierto

    // Número de registros por página
    protected $paginationTheme = 'tailwind';

    // Método para renderizar la tabla
    public function render()
    {
        $ingresos = IngresoNuevo::orderBy('id','desc')->paginate(10); // Paginación de 10 elementos
        return view('livewire.ingreso-nuevo-table', compact('ingresos'));
    }

    // Mostrar el modal y preparar para agregar un nuevo usuario
    public function create()
    {
        $this->resetInput(); // Resetear valores antes de agregar
        $this->estado = 'en espera'; // Valor por defecto para el nuevo registro
        $this->open = true; // Abrir el modal
    }

    // Guardar un nuevo usuario
    public function store()
    {
        $this->validate([
            'nombre' => 'required|string|max:255',
            // Hacer que el campo 'gmail' sea opcional al agregar
            'gmail' => 'nullable|email|max:255', 
        ]);


        IngresoNuevo::create([
            'nombre' => $this->nombre,
            'estado' => $this->estado,
            'gmail' => $this->gmail// Asegúrate de agregar 'gmail'
        ]);

        session()->flash('message', 'Usuario agregado exitosamente.');
        $this->closeModal(); // Cerrar modal después de agregar
    }


    // Preparar el modal para editar un usuario
    public function edit($id)
    {
        $ingreso = IngresoNuevo::findOrFail($id);
        $this->ingresoId = $ingreso->id;
        $this->nombre = $ingreso->nombre;
        $this->gmail = $ingreso->gmail;
        $this->estado = 'finalizado'; // Estado por defecto cuando se edita
        $this->open = true; // Abrir el modal para edición
    }

    // Actualizar un usuario
    public function update()
    {
        $this->validate([
            'nombre' => 'required|string|max:255',
            'gmail' => 'required|email|max:255',
        ]);

        $ingreso = IngresoNuevo::findOrFail($this->ingresoId);
        $ingreso->update([
            'nombre' => $this->nombre,
            'gmail' => $this->gmail,
            'estado' => $this->estado,
        ]);

        session()->flash('message', 'Usuario actualizado exitosamente.');
        $this->closeModal(); // Cerrar modal después de actualizar
    }

    // Cerrar el modal
    public function closeModal()
    {
        $this->resetInput(); // Limpiar datos al cerrar
        $this->open = false;  // Cerrar modal
    }

    // Resetear los valores del formulario
    public function resetInput()
    {
        $this->nombre = '';
        $this->gmail = '';
        $this->estado = 'en espera'; // Resetear al valor por defecto
        $this->ingresoId = null;
    }

    public function delete($id)
    {
        // Encontrar al usuario por ID y eliminarlo
        $ingreso = IngresoNuevo::findOrFail($id);
        $ingreso->delete();

        // Mensaje de confirmación
        session()->flash('message', 'Usuario eliminado exitosamente.');
    }
}
