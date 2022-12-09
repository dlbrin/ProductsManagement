<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = []; 

    public function categoriesType(){
        return $this->hasOne(categories::class , 'id' , 'category_id');
    }
}
