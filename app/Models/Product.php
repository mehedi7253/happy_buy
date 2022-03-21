<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function Categories(){
       return $this->belongsTo(Category::class, 'category_id');
    }

    public function product_in_shop()
    {
        return $this->belongsTo(product_in_shop::class, 'product_id');
    }
}
