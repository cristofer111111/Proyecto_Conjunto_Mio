<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visitantes extends Model
{
    use HasFactory;
    protected $table ='visitantes';
    protected $primaryKey = 'id';
    protected $fillable =['name','document','phone','apto_id','salio','salida'];
}
