<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class torre extends Model
{
    use HasFactory;
    protected $table ='torre';
    protected $primaryKey = 'id';
    protected $fillable =['torre'];
}
