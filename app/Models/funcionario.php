<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class funcionario extends Model
{
    use HasFactory;
    protected $table ='funcionario';
    protected $primaryKey = 'id';
    protected $fillable =['cargo','fecha_ingreso','fecha_salida','usuarios_id','observaciones'];
}
