<?php

namespace App\Livewire\Instruktur;

use App\Models\Instruktur;
use Livewire\Component;

class Edit extends Component
{
    public Instruktur $instruktur;
    public $nama;
    public $email;

    public function mount(Instruktur $instruktur)
    {
        $this->instruktur = $instruktur;
        $this->nama = $instruktur->nama;
        $this->email = $instruktur->email;
    }

    protected $rules = [
        'nama' => 'required|min:3',
        'email' => 'required|email|unique:instrukturs,email',
    ];

    public function update()
    {
        $this->validate([
            'nama' => 'required|min:3',
            'email' => 'required|email|unique:instrukturs,email,'.$this->instruktur->id,
        ]);

        $this->instruktur->update([
            'nama' => $this->nama,
            'email' => $this->email,
        ]);

        session()->flash('message', 'Instruktur berhasil diperbarui.');
        return redirect()->route('instrukturs.index');
    }

    public function render()
    {
        return view('livewire.instruktur.edit');
    }
}