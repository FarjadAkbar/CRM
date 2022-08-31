<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'status', 'product_status', 'user_id', 'cost', 'client_id', 'brand_id', 'breif_id', 'breif_type'];

    public function brand()
    {
        return $this->hasOne(Brands::class, 'id', 'brand_id');
    }

    public function client()
    {
        return $this->hasOne(Clients::class, 'id', 'client_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    
    public function added_by()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function project_category()
    {
        return $this->belongsToMany(Category::class, 'category_project', 'project_id', 'category_id');
    }

    public function tasks()
    {
        return $this->hasMany(Tasks::class);
    }
}