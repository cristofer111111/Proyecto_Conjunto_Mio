<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apto extends Model
{
    use HasFactory;
    protected $table ='apto';
    protected $primaryKey = 'id';
    protected $fillable =['apartamento','torre_id'];
}
