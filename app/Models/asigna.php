<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asigna extends Model
{
    use HasFactory;
    protected $table ='asigna';
    protected $primaryKey = 'id';
    protected $fillable =['disponibilidad_id','solicitud_id'];
}
