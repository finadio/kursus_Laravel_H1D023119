<?php

namespace App\Livewire\Pendaftaran;

use App\Models\Kursus;
use App\Models\Pendaftaran;
use App\Models\Peserta;
use Livewire\Component;

class Edit extends Component
{
    public Pendaftaran $pendaftaran;
    public $kursus_id;
    public $peserta_id;
    public $status;

    public function mount(Pendaftaran $pendaftaran)
    {
        $this->pendaftaran = $pendaftaran;
        $this->kursus_id = $pendaftaran->kursus_id;
        $this->peserta_id = $pendaftaran->peserta_id;
        $this->status = $pendaftaran->status;
    }

    public function update()
    {
        $this->validate([
            'kursus_id' => 'required|exists:kursuses,id',
            'peserta_id' => 'required|exists:pesertas,id',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        // Cek apakah peserta sudah terdaftar di kursus yang sama (kecuali data ini sendiri)
        $existing = Pendaftaran::where('kursus_id', $this->kursus_id)
            ->where('peserta_id', $this->peserta_id)
            ->where('id', '!=', $this->pendaftaran->id)
            ->first();

        if ($existing) {
            session()->flash('error', 'Peserta sudah terdaftar di kursus ini.');
            return;
        }

        $this->pendaftaran->update([
            'kursus_id' => $this->kursus_id,
            'peserta_id' => $this->peserta_id,
            'status' => $this->status,
        ]);

        session()->flash('message', 'Pendaftaran berhasil diperbarui.');
        return redirect()->route('pendaftarans.index');
    }

    public function render()
    {
        return view('livewire.pendaftaran.edit', [
            'kursuses' => Kursus::all(),
            'pesertas' => Peserta::all()
        ]);
    }
}