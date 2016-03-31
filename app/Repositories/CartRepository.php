<?php

namespace App\Repositories;

use App\Cart;

use App\User;



class CartRepository
{
    public function forUser(User $user)
    {
        return Cart::where('user_id', $user->id)
            ->get();
    }


}