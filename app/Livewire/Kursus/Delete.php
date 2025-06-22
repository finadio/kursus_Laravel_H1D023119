<?php

namespace App\Livewire\Kursus;

use App\Models\Kursus;
use Livewire\Component;

class Delete extends Component
{
    public Kursus $kursus;
    public $confirmingDeletion = false;

    public function confirmDelete()
    {
        $this->confirmingDeletion = true;
    }

    public function delete()
    {
        try {
            $this->kursus->delete();
            session()->flash('message', 'Kursus berhasil dihapus.');
            return redirect()->route('kursuses.index');
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal menghapus kursus. Pastikan tidak ada pendaftaran atau materi yang terkait.');
        }
    }

    public function render()
    {
        return view('livewire.kursus.delete');
    }
}