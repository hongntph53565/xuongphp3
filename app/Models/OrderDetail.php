<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class OrderDetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'order_details';

    public $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];

}
