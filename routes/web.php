<?php

use App\Livewire\Instruktur\Index as InstrukturIndex;
use App\Livewire\Instruktur\Create as InstrukturCreate;
use App\Livewire\Instruktur\Edit as InstrukturEdit;
use App\Livewire\Kursus\Index as KursusIndex;
use App\Livewire\Kursus\Create as KursusCreate;
use App\Livewire\Kursus\Edit as KursusEdit;
use App\Livewire\Kursus\PesertaCount as KursusPesertaCount;
use App\Livewire\Pendaftaran\Index as PendaftaranIndex;
use App\Livewire\Pendaftaran\Create as PendaftaranCreate;
use App\Livewire\Pendaftaran\Edit as PendaftaranEdit;
use App\Livewire\Materi\Index as MateriIndex;
use App\Livewire\Materi\Create as MateriCreate;
use App\Livewire\Peserta\Index as PesertaIndex;
use App\Livewire\Peserta\Create as PesertaCreate;
use App\Livewire\Peserta\Edit as PesertaEdit;
use Illuminate\Support\Facades\Route;

// Load auth routes first
require __DIR__.'/auth.php';

// Homepage Redirect
Route::get('/', function () {
    return redirect()->route(auth()->check() ? 'dashboard' : 'login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', \App\Livewire\Dashboard::class)->name('dashboard');
    
    // Profile
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
    
    // Instruktur Routes
    Route::get('/instrukturs', InstrukturIndex::class)->name('instrukturs.index');
    Route::get('/instrukturs/create', InstrukturCreate::class)->name('instrukturs.create');
    Route::get('/instrukturs/{instruktur}/edit', InstrukturEdit::class)->name('instrukturs.edit');

    // Kursus Routes
    Route::get('/kursuses', KursusIndex::class)->name('kursuses.index');
    Route::get('/kursuses/create', KursusCreate::class)->name('kursuses.create');
    Route::get('/kursuses/{kursus}/edit', KursusEdit::class)->name('kursuses.edit');
    Route::get('/kursuses/peserta-count', KursusPesertaCount::class)->name('kursuses.peserta-count');

    // Pendaftaran Routes
    Route::get('/pendaftarans', PendaftaranIndex::class)->name('pendaftarans.index');
    Route::get('/pendaftarans/create', PendaftaranCreate::class)->name('pendaftarans.create');
    Route::get('/pendaftarans/{pendaftaran}/edit', PendaftaranEdit::class)->name('pendaftarans.edit');

    // Materi Routes
    Route::get('/kursuses/{kursus}/materis', MateriIndex::class)->name('materis.index');
    Route::get('/kursuses/{kursus}/materis/create', MateriCreate::class)->name('materis.create');

    // Peserta Routes
    Route::get('/pesertas', PesertaIndex::class)->name('pesertas.index');
    Route::get('/pesertas/create', PesertaCreate::class)->name('pesertas.create');
    Route::get('/pesertas/{peserta}/edit', PesertaEdit::class)->name('pesertas.edit');
});