<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Comment extends Model
{
    use HasFactory , SoftDeletes;
    protected $table = 'comments';
    public $fillable = [
        'user_id',
        'product_id',
        'content',
    ];
}
