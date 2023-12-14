<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class administrador extends Model
{
    use HasFactory;
    protected $table ='administrador';
    protected $primaryKey = 'id';
    protected $fillable =[ 'horario_entrada', 'horario_salida', 'usuarios_id'];
}
