<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class solicitudes extends Model
{
    use HasFactory;
    protected $table ='solicitudes';
    protected $primaryKey = 'id';
    protected $fillable =['fecha_evento','residente_id','servicios_id','estado'];
}
