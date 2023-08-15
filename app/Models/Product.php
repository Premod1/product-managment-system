<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $filable = [
        'code',
        'name',
        'description',
        'category_id',
        'display_order_no',
        'price_created_by',
    ];
}
