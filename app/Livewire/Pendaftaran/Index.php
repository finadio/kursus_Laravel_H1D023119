<?php

namespace App\Livewire\Pendaftaran;

use App\Models\Pendaftaran;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        return view('livewire.pendaftaran.index', [
            'pendaftarans' => Pendaftaran::with(['kursus', 'peserta'])
                ->whereHas('kursus', function($query) {
                    $query->where('nama_kursus', 'like', '%'.$this->search.'%');
                })
                ->orWhereHas('peserta', function($query) {
                    $query->where('nama', 'like', '%'.$this->search.'%');
                })
                ->paginate(10)
        ])->layout('components.layouts.app');
    }
}