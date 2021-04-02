<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cr extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'entity_number',
        'name',
        'hijri_issue_date',
        'hijri_expiry_date',
        'hijri_cancellation_date',
        'cancellation_reason',
        'main_number', 
        'activity_description',
        'cr_business_type_id',
        'cr_status_id',
        'cr_location_id'
    ];

    public function CrActivity()
    {
        return $this->belongsToMany(CrActivity::class, 'activity_cr', 'cr_id', 'cr_activity_id')->withTimestamps();
    }
}
