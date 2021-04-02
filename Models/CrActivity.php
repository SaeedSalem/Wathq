<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'name_en'
    ];

    public function Cr()
    {
        return $this->belongsToMany(Cr::class, 'activety_commercial_registration', 'cr_activity_id', 'cr_id')->withTimestamps();
    }
}
