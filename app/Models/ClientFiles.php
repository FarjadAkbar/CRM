<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientFiles extends Model
{
    use HasFactory;
    protected $fillable = ['path', 'name', 'task_id', 'status', 'user_id', 'user_check'];
}