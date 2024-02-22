<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SSC_Batch extends Model
{
    use HasFactory;
    protected $fillable = ['batch_year'];

    public function contacts(){

        return $this->hasMany(Contact::class);
    }
}
