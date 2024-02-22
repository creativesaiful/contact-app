<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dairy extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'time',
        'person',
        'place',
        'description',

    ];
}
