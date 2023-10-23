<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inicio extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'shortname', 'plantilla_id'];


    public function plantillas()
    {
        return $this->belongsTo(Plantilla::class);
    }
}
