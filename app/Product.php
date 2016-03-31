<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable= ['name', 'type', 'height', 'width', 'weight', 'price', 'quality', 'shape'];
}
