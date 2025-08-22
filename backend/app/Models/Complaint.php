<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'type',
        'link_not_work',
        'drugs',
        'false_information',
        'child_abuse',
        'other',
        'object_id'
    ];
}
