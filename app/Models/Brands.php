<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    use HasFactory;
    public function statuses()
    {
        return $this->hasOne(Status::class, 'id', 'status');
    }

    public function users(){
        return $this->belongsToMany(User::class, 'brand_users', 'brand_id');
    }
}