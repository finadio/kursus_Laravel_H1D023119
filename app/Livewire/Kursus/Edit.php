<?php

namespace App\Livewire\Kursus;

use App\Models\Instruktur;
use App\Models\Kursus;
use Livewire\Component;

class Edit extends Component
{
    public Kursus $kursus;
    public $nama_kursus;
    public $durasi;
    public $instruktur_id;
    public $biaya;

    public function mount(Kursus $kursus)
    {
        $this->kursus = $kursus;
        $this->nama_kursus = $kursus->nama_kursus;
        $this->durasi = $kursus->durasi;
        $this->instruktur_id = $kursus->instruktur_id;
        $this->biaya = $kursus->biaya;
    }

    public function update()
    {
        $this->validate([
            'nama_kursus' => 'required|min:3',
            'durasi' => 'required|integer|min:1',
            'instruktur_id' => 'required|exists:instrukturs,id',
            'biaya' => 'required|numeric|min:0',
        ]);

        $this->kursus->update([
            'nama_kursus' => $this->nama_kursus,
            'durasi' => $this->durasi,
            'instruktur_id' => $this->instruktur_id,
            'biaya' => $this->biaya,
        ]);

        session()->flash('message', 'Kursus berhasil diperbarui.');
        return redirect()->route('kursuses.index');
    }

    public function render()
    {
        return view('livewire.kursus.edit', [
            'instrukturs' => Instruktur::all()
        ]);
    }
}