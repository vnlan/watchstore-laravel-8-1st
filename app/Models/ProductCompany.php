<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCompany extends Model
{
    protected $table = 'product_company';
    protected $fillable= ['company_name','company_short_name', 'logo_image_path', 'logo_image_name','address'];

}
