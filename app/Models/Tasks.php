<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;


    public function project()
    {
        return $this->hasOne(Projects::class, 'id', 'project_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function brand()
    {
        return $this->hasOne(Brands::class, 'id', 'brand_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function clientfiles()
    {
        return $this->hasOne(ClientFiles::class, 'task_id', 'id')->selectRaw('task_id, count(*) as count')->groupBy('task_id');
    }
    public function clientfilesall()
    {
        return $this->hasMany(ClientFiles::class, 'task_id', 'id');
    }

    public function subtask()
    {
        return $this->hasMany(SubTask::class, 'task_id', 'id');
    }
}