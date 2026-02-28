<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guiasseparacion extends Model
{
    use HasFactory;

    protected $table = 'guiasSeparacion';

    protected $fillable = [
        'titulo',
        'descripcion',
        'manual_PDF'
    ];

    protected $casts = [
        'id' => 'integer'
    ];

}
