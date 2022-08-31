<?php

namespace App\Models;

// use App\Models\Brands;
// use App\Models\Status;
// use App\Models\Invoices;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'last_name', 'email', 'contact', 'user_id', 'status', 'brand_id'
    ];

    public function brand()
    {
        return $this->hasOne(Brands::class, 'id', 'brand_id');
    }

    public function statuses()
    {
        return $this->hasOne(Status::class, 'id', 'status');
    }

    public function leads()
    {
        return $this->hasManyThrough(Invoices::class, Clients::class, 'id', 'client_id');
    }
    
}