<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    

    public function role()
    {
        return $this->belongsToMany(Role::class);
    }

    public function category()
    {
        return $this->belongsToMany(Category::class, 'category_users', 'user_id');
    }

    public function brands(){
        return $this->belongsToMany(Brands::class, 'brand_users', 'user_id', 'brand_id');
    }

    public function brand_list(){
        $brand_id = array();
        foreach ($this->brands as $brands){
            array_push($brand_id, $brands->id);
        }
        return $brand_id;
    }

    public function category_list(){
        $category_id = array();
        foreach ($this->category as $categories){
            array_push($category_id, $categories->id);
        }
        return $category_id;
    }
}