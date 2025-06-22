<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = ['kursus_id', 'judul', 'deskripsi', 'file_path'];

    public function kursus(): BelongsTo
    {
        return $this->belongsTo(Kursus::class);
        //Contoh: Setiap kursus punya satu 
    }
}