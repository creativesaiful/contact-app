<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'district_id', 'upazila_id', 'union_id', 'ward_id',
        'name', 'bangla_name', 'contact_number_1', 'contact_number_2','category_id','batch_id',
        'address', 'profession', 'comments'
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function upazila()
    {
        return $this->belongsTo(Upazila::class);
    }

    public function union()
    {
        return $this->belongsTo(Union::class);
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }

    public function batch(){
        return $this->belongsTo(Batch::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
