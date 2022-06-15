<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'id',
        'name',
        'description',
        'date',
        'place',
        'time',
        'id_user',
        'status'
    ];
}
