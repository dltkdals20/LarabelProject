<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sign extends Model
{
    protected $fillable = ['id','userId','userPassword','userPh'];
}
