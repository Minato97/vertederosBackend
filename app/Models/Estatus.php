<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estatus extends Model
{
    use HasFactory;

    protected $table = 'estatus';
    protected $fillable = ['id','estatus'];

    public function users()
    {
        return $this->hasMany(User::class, 'estatus_id');
    }
}
