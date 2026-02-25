<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centrosreciclaje extends Model
{
    use HasFactory;

    protected $table = 'centrosReciclaje';

    protected $fillable = [
        'nombre',
        'ubicacion'
    ];

    protected $casts = [
        'id' => 'integer'
    ];

    public function reportes()
    {
        return $this->hasMany(Report::class, 'centrosReciclaje_id');
    }
}
