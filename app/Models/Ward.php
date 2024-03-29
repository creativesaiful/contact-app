<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'union_id'];

   

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
