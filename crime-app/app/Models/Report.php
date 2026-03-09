<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'date',
        'latitude',
        'longitude',
        'description',
        'severity_scale',
        'image',
        'created_at',
        'updated_at'
    ];
}
