<?php

namespace App\Livewire\Kursus;

use App\Models\Instruktur;
use App\Models\Kursus;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $nama_kursus;
    public $durasi;
    public $instruktur_id;
    public $biaya;

    protected $rules = [
        'nama_kursus' => 'required|min:3',
        'durasi' => 'required|integer|min:1',
        'instruktur_id' => 'required|exists:instrukturs,id',
        'biaya' => 'required|numeric|min:0',
    ];

    public function save()
    {
        $this->validate();

        Kursus::create([
            'nama_kursus' => $this->nama_kursus,
            'durasi' => $this->durasi,
            'instruktur_id' => $this->instruktur_id,
            'biaya' => $this->biaya,
        ]);

        session()->flash('message', 'Kursus berhasil ditambahkan.');
        return redirect()->route('kursuses.index');
    }

    public function render()
    {
        return view('livewire.kursus.create', [
            'instrukturs' => Instruktur::all()
        ])->layout('components.layouts.app');
    }
}