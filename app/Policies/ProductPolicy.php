<?php

namespace App\Policies;

use App\Product;
use App\User;

use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //

    }

    public function modify(User $user)
    {
        return $user->is_super;
    }

}
