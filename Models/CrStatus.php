<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'name_en'
    ];
}
