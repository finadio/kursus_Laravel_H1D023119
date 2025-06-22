<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = ['kursus_id', 'peserta_id', 'status'];

    public function kursus(): BelongsTo
    {
        return $this->belongsTo(Kursus::class);
    }

    public function peserta(): BelongsTo
    {
        return $this->belongsTo(Peserta::class);
    }
    //Contoh: Setiap kursus punya satu instruktur
}