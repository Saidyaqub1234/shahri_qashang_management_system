<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSale extends Model
{
    use HasFactory;
    protected $guarded=['id'];


    public function product_type()
{
    return $this->belongsTo(product_type::class);
}

public function currency()
{
    return $this->belongsTo(Currancy::class); // Currency if fixed
}

public function customer()
{
    return $this->belongsTo(Customer::class);
}

public function branch()
{
    return $this->belongsTo(Branch::class);
}

}
