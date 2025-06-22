<?php

namespace App\Livewire\Instruktur;

use App\Models\Instruktur;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        return view('livewire.instruktur.index', [
            'instrukturs' => Instruktur::where('nama', 'like', '%'.$this->search.'%')
                ->orWhere('email', 'like', '%'.$this->search.'%')
                ->paginate(10)
        ]);
    }
}