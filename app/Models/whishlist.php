<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class whishlist extends Model
{
    use HasFactory;
    protected $table = "whishlist";
    protected $guarded = [];
    public $timestamps = false;

    public function WhishlistId(){
        return $this->hasOne(products::class , 'id' , 'product_id');
    }
}
