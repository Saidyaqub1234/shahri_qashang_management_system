<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branchstore extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo(product_type::class, 'product_id');
    }

    public function company()
    {
        return $this->belongsTo(company::class, 'company_id');
    }

    public function branch()
    {
        return $this->belongsTo(branch::class, 'branch_id');
    }
}
