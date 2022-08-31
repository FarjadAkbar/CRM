<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBrand extends Model
{
    use HasFactory;
    protected $table = 'brand_users';

    protected $fillable = [
        'user_id', 
        'brand_id'
    ];
}