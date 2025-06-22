<?php

namespace App\Livewire\Pendaftaran;

use App\Models\Kursus;
use App\Models\Pendaftaran;
use App\Models\Peserta;
use Livewire\Component;

class Create extends Component
{
    public $kursus_id;
    public $peserta_id;
    public $status = 'pending';

    protected $rules = [
        'kursus_id' => 'required|exists:kursuses,id',
        'peserta_id' => 'required|exists:pesertas,id',
        'status' => 'required|in:pending,approved,rejected',
    ];

    public function save()
    {
        $this->validate();

        // Cek apakah peserta sudah terdaftar di kursus yang sama
        $existing = Pendaftaran::where('kursus_id', $this->kursus_id)
            ->where('peserta_id', $this->peserta_id)
            ->first();

        if ($existing) {
            session()->flash('error', 'Peserta sudah terdaftar di kursus ini.');
            return;
        }

        Pendaftaran::create([
            'kursus_id' => $this->kursus_id,
            'peserta_id' => $this->peserta_id,
            'status' => $this->status,
        ]);

        session()->flash('message', 'Pendaftaran berhasil ditambahkan.');
        return redirect()->route('pendaftarans.index');
    }

    public function render()
    {
        return view('livewire.pendaftaran.create', [
            'kursuses' => Kursus::all(),
            'pesertas' => Peserta::all()
        ])->layout('components.layouts.app');
    }
}