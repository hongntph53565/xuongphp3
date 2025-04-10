<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    public $fillable = [
        'category_id',
        'brand',
        'name',
        'description',
        'price',
        'stock',
        'is_hot',
        'image',
    ];
}
