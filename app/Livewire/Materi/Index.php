<?php

namespace App\Livewire\Materi;

use App\Models\Kursus;
use App\Models\Materi;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public Kursus $kursus;
    public $search = '';

    public function mount($kursus)
    {
        $this->kursus = $kursus;
    }

    public function render()
    {
        return view('livewire.materi.index', [
            'materis' => Materi::where('kursus_id', $this->kursus->id)
                ->where(function($query) {
                    $query->where('judul', 'like', '%'.$this->search.'%')
                        ->orWhere('deskripsi', 'like', '%'.$this->search.'%');
                })
                ->paginate(10)
        ])->layout('components.layouts.app');
    }
}