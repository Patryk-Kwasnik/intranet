<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'text',
        'status',
        'priority',
        'id_user_assigned',
        'id_author',
        'start_date',
        'end_date',
    ];
}
