<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brod extends Model
{

    use HasFactory;
    protected $fillable = [
        'last_name', 'first_name', 'middle_name', 'photo',
    ];
}
