<?php

namespace App\Livewire\Instruktur;

use App\Models\Instruktur;
use Livewire\Component;

class Create extends Component
{
    public $nama;
    public $email;

    protected $rules = [
        'nama' => 'required|min:3',
        'email' => 'required|email|unique:instrukturs,email',
    ];

    public function save()
    {
        $this->validate();

        Instruktur::create([
            'nama' => $this->nama,
            'email' => $this->email,
        ]);

        session()->flash('message', 'Instruktur berhasil ditambahkan.');
        return redirect()->route('instrukturs.index');
    }

    public function render()
    {
        return view('livewire.instruktur.create')
            ->layout('components.layouts.app');
    }
}