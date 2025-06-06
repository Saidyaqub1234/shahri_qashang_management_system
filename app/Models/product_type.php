<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_type extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function branchstores(){
      return  $this->hasMany(branchstore::class,'product_id');
    }
    public function containers()
{
    return $this->hasMany(Container::class);
}

}
