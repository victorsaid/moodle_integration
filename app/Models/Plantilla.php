<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plantilla extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'shortname'];

    public function cursos()
    {
        return $this->belongsToMany(Curso::class);
    }

    //n x 1
    public function inicios()
    {
        return $this->hasMany(Inicio::class);
    }
}
