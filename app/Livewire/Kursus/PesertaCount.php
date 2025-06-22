<?php

namespace App\Livewire\Kursus;

use App\Models\Kursus;
use Livewire\Component;

class PesertaCount extends Component
{
    public function render()
    {
        $kursuses = Kursus::withCount(['pendaftarans as peserta_count' => function($query) {
            $query->where('status', 'approved');
        }])->get();

        return view('livewire.kursus.peserta-count', compact('kursuses'))
            ->layout('components.layouts.app');
    }
}