<?php

namespace App\Livewire\Materi;

use App\Models\Materi;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Delete extends Component
{
    public Materi $materi;
    public $confirmingDeletion = false;

    public function mount($materi)
    {
        $this->materi = $materi;
    }

    public function confirmDelete()
    {
        $this->confirmingDeletion = true;
    }

    public function delete()
    {
        if ($this->materi->file_path) {
            Storage::disk('public')->delete($this->materi->file_path);
        }
        
        $this->materi->delete();
        session()->flash('message', 'Materi berhasil dihapus.');
        return redirect()->route('materis.index', ['kursus' => $this->materi->kursus_id]);
    }

    public function render()
    {
        return view('livewire.materi.delete');
    }
}