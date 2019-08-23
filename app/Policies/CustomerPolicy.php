<?php

namespace App\Policies;

use App\User;
use App\Customer;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Customer $customer)
    {
        // Check if the owner_id of the made customer is equal to the signed in id of the user.
        return $customer->owner_id == $user->id;
    }

}
