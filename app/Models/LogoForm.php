<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogoForm extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo_name',
        'slogan',
        'imagery',
        'desired_design',
        'colors_visual',
        'intended_use',
        'business_overview',
        'target_audience',
        'filesname',
        'additional_information',
        'user_id',
        'invoice_id',
        'agent_id',
        'brand_id'
    ];

    public function client()
    {
        return $this->hasOne(Clients::class, 'id', 'user_id');
    }

    public function invoice()
    {
        return $this->hasOne(Invoices::class, 'id', 'invoice_id')->select('invoice_number', 'amount');
    }
    
    public function agent()
    {
        return $this->hasOne(User::class, 'id', 'agent_id');
    }

    public function brand()
    {
        return $this->hasOne(Brands::class, 'id', 'brand_id');
    }
}