<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notificar extends Model
{
    use HasFactory;
    protected $table = 'notificar';
    protected $primaryKey = 'id';
    protected $fillable = ['titulo', 'residente_id', 'clasification', 'observaciones'];
}
