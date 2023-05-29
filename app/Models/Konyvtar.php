<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konyvtar extends Model
{
    use HasFactory;

    protected $fillable = ['szerzo', 'cim', 'kiado', 'reszleg'];

    public function Konyvtar()
    {
        return this->hasMany(Konyvtar::class);
    }
}
