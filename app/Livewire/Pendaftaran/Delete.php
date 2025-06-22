<?php

namespace App\Livewire\Pendaftaran;

use App\Models\Pendaftaran;
use Livewire\Component;

class Delete extends Component
{
    public Pendaftaran $pendaftaran;
    public $confirmingDeletion = false;

    public function confirmDelete()
    {
        $this->confirmingDeletion = true;
    }

    public function delete()
    {
        $this->pendaftaran->delete();
        session()->flash('message', 'Pendaftaran berhasil dihapus.');
        return redirect()->route('pendaftarans.index');
    }

    public function render()
    {
        return view('livewire.pendaftaran.delete');
    }
}