<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anuncios extends Model
{
    use HasFactory;
    protected $table ='mensajes';
    protected $primaryKey = 'id';
    protected $fillable =['titulo','mensaje','fecha','administrador_id','usuarios_notificados'];
}
