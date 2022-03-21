<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_in_shop extends Model
{
    use HasFactory;

    public function Shops(){
        return $this->hasMany(shop::class, 'shop_id');
    }

    public function Products()
    {
        return $this->hasMany(Product::class, 'product_id');
    }
}
