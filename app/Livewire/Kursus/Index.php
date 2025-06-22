<?php

namespace App\Livewire\Kursus;

use App\Models\Kursus;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Response;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $filterInstruktur = '';
    public $sortBy = 'created_at';
    public $sortDirection = 'desc';

    protected $queryString = [
        'search' => ['except' => ''],
        'filterInstruktur' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterInstruktur()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function exportCsv()
    {
        $query = Kursus::with('instruktur')
            ->when($this->search, function ($query) {
                $query->where('nama_kursus', 'like', '%' . $this->search . '%');
            })
            ->when($this->filterInstruktur, function ($query) {
                $query->whereHas('instruktur', function ($q) {
                    $q->where('nama', 'like', '%' . $this->filterInstruktur . '%');
                });
            })
            ->orderBy($this->sortBy, $this->sortDirection);

        $kursuses = $query->get();

        $filename = 'kursus_' . date('Y-m-d_H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($kursuses) {
            $file = fopen('php://output', 'w');
            
            // Header CSV
            fputcsv($file, ['ID', 'Nama Kursus', 'Durasi (jam)', 'Instruktur', 'Email Instruktur', 'Biaya', 'Tanggal Dibuat']);
            
            // Data
            foreach ($kursuses as $kursus) {
                fputcsv($file, [
                    $kursus->id,
                    $kursus->nama_kursus,
                    $kursus->durasi,
                    $kursus->instruktur->nama,
                    $kursus->instruktur->email,
                    number_format($kursus->biaya, 0, ',', '.'),
                    $kursus->created_at->format('d/m/Y H:i')
                ]);
            }
            
            fclose($file);
        };

        return Response::stream($callback, 200, $headers);
    }

    public function render()
    {
        $query = Kursus::with('instruktur')
            ->when($this->search, function ($query) {
                $query->where('nama_kursus', 'like', '%' . $this->search . '%');
            })
            ->when($this->filterInstruktur, function ($query) {
                $query->whereHas('instruktur', function ($q) {
                    $q->where('nama', 'like', '%' . $this->filterInstruktur . '%');
                });
            })
            ->orderBy($this->sortBy, $this->sortDirection);

        $kursuses = $query->paginate(10);
        $instrukturs = \App\Models\Instruktur::all();

        return view('livewire.kursus.index', compact('kursuses', 'instrukturs'))
            ->layout('components.layouts.app');
    }
}