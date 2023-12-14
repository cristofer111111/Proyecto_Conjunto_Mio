<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class residente extends Model
{
    use HasFactory;
    protected $table ='residente';
    protected $primaryKey = 'id';
    protected $fillable =['tipo_residente','usuarios_id','apto_id'];
}
