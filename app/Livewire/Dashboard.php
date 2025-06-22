<?php

namespace App\Livewire;

use App\Models\Kursus;
use App\Models\Instruktur;
use App\Models\Pendaftaran;
use App\Models\Peserta;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $kursusCount = Kursus::count();
        $instrukturCount = Instruktur::count();
        $pendaftaranCount = Pendaftaran::count();
        $pesertaCount = Peserta::count();
        
        // Statistik tambahan
        $kursusTerbaru = Kursus::latest()->take(5)->get();
        $pendaftaranPending = Pendaftaran::where('status', 'pending')->count();
        $pendaftaranApproved = Pendaftaran::where('status', 'approved')->count();
        $pendaftaranRejected = Pendaftaran::where('status', 'rejected')->count();
        
        // Kursus dengan peserta terbanyak
        $topKursus = Kursus::withCount('pendaftarans')
            ->orderBy('pendaftarans_count', 'desc')
            ->take(3)
            ->get();

        return view('livewire.dashboard', compact(
            'kursusCount', 
            'instrukturCount', 
            'pendaftaranCount',
            'pesertaCount',
            'kursusTerbaru',
            'pendaftaranPending',
            'pendaftaranApproved',
            'pendaftaranRejected',
            'topKursus'
        ))->layout('components.layouts.app');
    }
}