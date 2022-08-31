<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTask extends Model
{
    use HasFactory;
    protected $table = "sub_task";
    protected $fillable = ['task_id', 'description', 'user_id', 'assign_id', 'duedate'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'assign_id');
    }

    public function task()
    {
        return $this->belongsTo(Tasks::class, 'id', 'task_id');
    }
}