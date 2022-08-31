<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\User;
// use App\Models\Currencies;
// use App\Models\Brands;
// use App\Models\Clients;
// use App\Models\Packages;
// use App\Models\Services;

class Invoices extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'contact',
        'brand',
        'service',
        'package',
        'currency',
        'client_id',
        'invoice_number',
        'invoice_date',
        'sales_agent_id',
        'description',
        'amount',
        'payment_status',
        'payment_type',
        'custom_package',
        'transaction_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'sales_agent_id');
    }


    public function currencies()
    {
        return $this->hasOne(Currencies::class, 'id', 'currency');
    }

    
    public function brands()
    {
        return $this->hasOne(Brands::class, 'id', 'brand');
    }

    public function clients()
    {
        return $this->hasOne(Clients::class, 'id', 'client_id');
    }
    public function packages()
    {
        return $this->hasOne(Packages::class, 'id', 'package');
    }

    public function services()
    {
        return $this->hasOne(Services::class, 'id', 'service');
    }

}