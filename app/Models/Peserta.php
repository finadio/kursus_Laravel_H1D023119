<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Peserta extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'email'];

    public function kursuses(): BelongsToMany
    {
        return $this->belongsToMany(Kursus::class, 'pendaftarans')
                    ->withPivot('status')
                    ->withTimestamps();
    }
}