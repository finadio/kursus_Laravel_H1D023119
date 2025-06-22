<?php

namespace App\Livewire\Peserta;

use App\Models\Peserta;
use Livewire\Component;
use Illuminate\Http\Request;

class Edit extends Component
{
    public ?Peserta $peserta = null;
    public $nama;
    public $email;

    protected function rules()
    {
        return [
            'nama' => 'required|min:3',
            'email' => 'required|email|unique:pesertas,email,' . ($this->peserta ? $this->peserta->id : 'NULL'),
        ];
    }

    public function mount(Request $request, $peserta = null)
    {
        // Jika $peserta null, ambil dari route parameter
        if (!$peserta) {
            $pesertaId = $request->route('peserta');
            $peserta = Peserta::findOrFail($pesertaId);
        }
        $this->peserta = $peserta;
        $this->nama = $peserta->nama;
        $this->email = $peserta->email;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        $this->peserta->update([
            'nama' => $this->nama,
            'email' => $this->email,
        ]);

        session()->flash('message', 'Data peserta berhasil diperbarui.');
        return redirect()->route('pesertas.index');
    }

    public function render()
    {
        return view('livewire.peserta.edit', [
            'peserta' => $this->peserta
        ])->layout('components.layouts.app');
    }
} 