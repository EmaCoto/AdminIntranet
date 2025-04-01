<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\IngresoNuevo;

class IngresoNuevoTable extends Component
{
    use WithPagination;

    public $nombre, $gmail, $estado;
    public $openDeleteConfirm = false;
    public $ingresoIdToDelete = null;
    public $ingresoId = null;
    public $open = false;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $ingresos = IngresoNuevo::orderBy('id','desc')->paginate(10);
        return view('livewire.ingreso-nuevo-table', compact('ingresos'));
    }

    public function create()
    {
        $this->resetInput();
        $this->estado = 'en espera';
        $this->open = true;
    }

    public function store()
    {
        $this->validate([
            'nombre' => 'required|string|max:255',
            'gmail' => 'nullable|email|max:255',
        ]);

        IngresoNuevo::create([
            'nombre' => ucwords(strtolower($this->nombre)), // Capitalize
            'estado' => $this->estado,
            'gmail' => $this->gmail
        ]);

        session()->flash('message', 'Usuario agregado exitosamente.');
        $this->closeModal();
    }

    public function edit($id)
    {
        $ingreso = IngresoNuevo::findOrFail($id);
        $this->ingresoId = $ingreso->id;
        $this->nombre = $ingreso->nombre;
        $this->gmail = $ingreso->gmail;
        $this->estado = 'finalizado';
        $this->open = true;
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required|string|max:255',
            'gmail' => 'required|email|max:255',
        ]);

        $ingreso = IngresoNuevo::findOrFail($this->ingresoId);
        $ingreso->update([
            'nombre' => ucwords(strtolower($this->nombre)), // Capitalize
            'gmail' => $this->gmail,
            'estado' => $this->estado,
        ]);

        session()->flash('message', 'Usuario actualizado exitosamente.');
        $this->closeModal();
    }

    public function closeModal()
    {
        $this->resetInput();
        $this->open = false;
        $this->openDeleteConfirm = false;
    }

    public function resetInput()
    {
        $this->nombre = '';
        $this->gmail = '';
        $this->estado = 'en espera';
        $this->ingresoId = null;
        $this->ingresoIdToDelete = null;
    }

    public function confirmDelete($id)
    {
        $this->ingresoIdToDelete = $id;
        $this->openDeleteConfirm = true;
    }

    public function delete()
    {
        if ($this->ingresoIdToDelete) {
            $ingreso = IngresoNuevo::find($this->ingresoIdToDelete);
            if ($ingreso) {
                $ingreso->delete();
                session()->flash('message', 'Usuario eliminado exitosamente.');
            } else {
                session()->flash('message', 'Usuario no encontrado.');
            }

            $this->resetInput();
            $this->openDeleteConfirm = false;
        }
    }
}
