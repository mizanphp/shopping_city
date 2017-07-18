<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'name', 'is_active', 'created_at', 'updated_at'];

    //protected $table = 'product_categories';
    public function category(){
        return $this->belongsTo(ProductCategory::class);
    }
}
