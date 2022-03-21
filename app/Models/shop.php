<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shop extends Model
{
    use HasFactory;

    public function Shop_product()
    {
        return $this->belongsTo(product_in_shop::class, 'shop_id');
    }
}
