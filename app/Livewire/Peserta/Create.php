<?php

namespace App\Livewire\Peserta;

use App\Models\Peserta;
use Livewire\Component;

class Create extends Component
{
    public $nama;
    public $email;

    protected $rules = [
        'nama' => 'required|min:3',
        'email' => 'required|email|unique:pesertas,email',
    ];

    public function mount()
    {
        // Initialize empty values
        $this->nama = '';
        $this->email = '';
    }

    public function save()
    {
        $this->validate();

        Peserta::create([
            'nama' => $this->nama,
            'email' => $this->email,
        ]);

        session()->flash('message', 'Peserta berhasil ditambahkan.');
        return redirect()->route('pesertas.index');
    }

    public function render()
    {
        return view('livewire.peserta.create')
            ->layout('components.layouts.app');
    }
} 