<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reportes extends Model
{
    use HasFactory;
    protected $table = 'reportes';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'description', 'clasification', 'funcionario_id', 'solucionado', 'observation'];
}
