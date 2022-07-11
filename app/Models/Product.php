<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable= ['sku', 'name', 'price','stock','product_company_id','feature_image_path','feature_image_name', 'short_description', 'long_description','category_id'];
    public function images(Type $var = null)
    {
       return $this->hasMany(ProductImage::class, 'product_id');
    }
}
