<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function branchstores()
{
    return $this->hasMany(branchstore::class, 'company_id');
}
public function container()
{
    return $this->hasMany(container::class);
}

}
