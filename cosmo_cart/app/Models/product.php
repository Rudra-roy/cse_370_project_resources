<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'price',
        'short_description',
        'long_description',
        'product_image',
        'product_category_id',
        'product_subcategory_id',
        'slug',
        'product_image',
        'count',
    ];
}
