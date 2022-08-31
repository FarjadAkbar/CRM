<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    use HasFactory;

    public function service(){
        return $this->hasOne(Services::class, 'id', 'service_id');
    }

    
    public function brand(){    
        return $this->hasOne(Brands::class, 'id', 'brand_id');
    }
    
    public function currency(){
        return $this->hasOne(Currencies::class, 'id', 'currencies_id');
    }
}
