<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'my_products';
    public $primaryKey = 'product_code';
    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = ['name', 'password', 'email'];

}
