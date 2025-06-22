<?php

namespace App\Livewire\Peserta;

use App\Models\Peserta;
use Livewire\Component;

class Delete extends Component
{
    public Peserta $peserta;

    public function mount(Peserta $peserta)
    {
        $this->peserta = $peserta;
    }

    public function confirmDelete()
    {
        $this->js("
            if (confirm('Apakah Anda yakin ingin menghapus peserta {$this->peserta->nama}? Tindakan ini tidak dapat dibatalkan.')) {
                \$wire.delete();
            }
        ");
    }

    public function delete()
    {
        $this->peserta->delete();
        
        session()->flash('message', 'Peserta berhasil dihapus.');
        $this->dispatch('peserta-deleted');
    }

    public function render()
    {
        return view('livewire.peserta.delete');
    }
} 