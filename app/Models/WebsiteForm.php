<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'website_title',
        'purpose',
        'objective',
        'project_target',
        'brand_target',
        'desired_reaction',
        'competitor',
        'design',
        'functionality',
        'postive_aspects',
        'negative_aspects',
        'traffic_levels',
        'current_performance',
        'currrent_hosting',
        'negative_hosting',
        'filesname',
        'additional_information',
        'user_id',
        'invoice_id',
        'brand_id',
        'agent_id',
    ];

    
    public function client()
    {
        return $this->hasOne(Clients::class, 'id', 'user_id');
    }

    public function invoice()
    {
        return $this->hasOne(Invoices::class, 'id', 'invoice_id')->select('invoice_number');
    }
    
    public function agent()
    {
        return $this->hasOne(User::class, 'id', 'agent_id');
    }
    
}