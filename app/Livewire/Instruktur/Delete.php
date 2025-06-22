<?php

namespace App\Livewire\Instruktur;

use App\Models\Instruktur;
use Livewire\Component;

class Delete extends Component
{
    public Instruktur $instruktur;
    public $confirmingDeletion = false;

    public function confirmDelete()
    {
        $this->confirmingDeletion = true;
    }

    public function delete()
    {
        try {
            $this->instruktur->delete();
            session()->flash('message', 'Instruktur berhasil dihapus.');
            return redirect()->route('instrukturs.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menghapus instruktur. Pastikan tidak ada kursus yang terkait.');
        }
    }

    public function render()
    {
        return view('livewire.instruktur.delete');
    }
}