<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visitantes_parqueadero extends Model
{
    use HasFactory;
    protected $table ='visitantes_parqueadero';
    protected $primaryKey = 'id';
    protected $fillable =['placa','visitante_id'];
}
