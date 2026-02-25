<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiporesiduo extends Model
{
    use HasFactory;

    protected $table = 'tipoResiduo';

    protected $fillable = [
        'residuo'
    ];

    protected $casts = [
        'id' => 'integer'
    ];

    public function reportes()
    {
        return $this->hasMany(Report::class, 'tipoResiduo_id');
    }
}
