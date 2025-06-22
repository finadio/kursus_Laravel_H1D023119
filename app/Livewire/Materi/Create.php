<?php

namespace App\Livewire\Materi;

use App\Models\Kursus;
use App\Models\Materi;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{
    use WithFileUploads;

    public Kursus $kursus;
    public $judul;
    public $deskripsi;
    public $file;

    protected $rules = [
        'judul' => 'required|min:3',
        'deskripsi' => 'required|min:10',
        'file' => 'nullable|file|max:10240', // max 10MB
    ];

    public function mount($kursus)
    {
        $this->kursus = $kursus;
    }

    public function save()
    {
        $this->validate();

        $filePath = null;
        if ($this->file) {
            $filePath = $this->file->store('materis', 'public');
        }

        Materi::create([
            'kursus_id' => $this->kursus->id,
            'judul' => $this->judul,
            'deskripsi' => $this->deskripsi,
            'file_path' => $filePath,
        ]);

        session()->flash('message', 'Materi berhasil ditambahkan.');
        return redirect()->route('materis.index', ['kursus' => $this->kursus->id]);
    }

    public function render()
    {
        return view('livewire.materi.create')
            ->layout('components.layouts.app');
    }
}