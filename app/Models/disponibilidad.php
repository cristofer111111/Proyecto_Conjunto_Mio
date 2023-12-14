<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class disponibilidad extends Model
{
    use HasFactory;
    protected $table ='disponibilidad';
    protected $primaryKey = 'id';
    protected $fillable =['estado','descripcion'];
}
