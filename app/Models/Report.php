<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reportes';

    protected $fillable = [
        'ubicación',
        'nivel_gravedad',
        'comentario',
        'foto_reporte',
        'foto_cierre',
        'tipoResiduo_id',
        'users_id',
        'estatus_id',
        'centrosReciclaje_id'
    ];

    protected $casts = [
        'id' => 'integer',
        'tipoResiduo_id' => 'integer',
        'users_id' => 'integer',
        'estatus_id' => 'integer',
        'centrosReciclaje_id' => 'integer'
    ];

    public function tiporesiduo()
    {
        return $this->belongsTo(Tiporesiduo::class, 'tipoResiduo_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function estatus()
    {
        return $this->belongsTo(Estatus::class, 'estatus_id');
    }
    public function centrosreciclaje()
    {
        return $this->belongsTo(Centrosreciclaje::class, 'centrosReciclaje_id');
    }
}
