<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recibo extends Model
{
    use HasFactory;
    protected $table ='recibo';
    protected $primaryKey = 'id';
    protected $fillable =['fecha','valor','valor_pendiente','iva','descuento','estado','solicitudes_id'];
}
