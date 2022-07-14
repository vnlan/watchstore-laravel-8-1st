<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCompany extends Model
{
    protected $table = 'product_company';
    protected $fillable= ['company_name', 'logo', 'address'];

}
