<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    public function company(){
      return  $this->belongsTo(company::class);
    }
    public function product_type(){
        return $this->belongsTo(product_type::class);
    }
}
