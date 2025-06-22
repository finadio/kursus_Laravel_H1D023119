<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Instruktur extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'email'];

    public function kursuses(): HasMany
    //HasMany = Satu instruktur bisa punya banyak kursus
    {
    }
}