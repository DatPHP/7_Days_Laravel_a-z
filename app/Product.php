<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = Product::class;
    protected $fillable = ['name', 'price', 'content','image_path'];
}
