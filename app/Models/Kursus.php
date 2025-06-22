<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kursus extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kursus', 'durasi', 'instruktur_id', 'biaya'];

    public function instruktur(): BelongsTo
    {
        return $this->belongsTo(Instruktur::class);
    }

    public function pendaftarans(): HasMany
    {
        return $this->hasMany(Pendaftaran::class);
    }

    public function materis(): HasMany
    {
        return $this->hasMany(Materi::class);
    }

    public function pesertas()
    {
        return $this->belongsToMany(Peserta::class, 'pendaftarans')
        //Satu kursus bisa punya banyak peserta, satu peserta bisa ikut banyak kursus
                    ->withPivot('status')
                    ->withTimestamps();
    }
}