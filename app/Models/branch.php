<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branch extends Model
{
    use HasFactory;
    protected $primaryKey = 'id'; // default is fine unless it's different
    protected $fillable=['name','address'];

    public function branchstores(){
        $this->hasMany(branchstore::class,'branch_id');
    }
}
