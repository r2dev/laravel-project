<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cart
 * @package App
 * A cart model contains multiple products
 * when user checkouted A cart, it became a purchase record
 * when user add a new item
 */

class Cart extends Model
{

    protected $fillable = ['user_id'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('amount', 'created_at');
    }

}
