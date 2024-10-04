<?php

namespace App\Policies;

use App\Models\Item;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ItemPolicy
{

    public function viewAny(User $user): bool
    {
        return $user->role == 'admin' || $user->role == 'accountant';
    }

    public function create(User $user): bool
    {
        return $user->role == 'admin' || $user->role == 'accountant';
    }

    public function update(User $user, Item $item): bool
    {
        return $user->role == 'admin' || $user->role == 'accountant';
    }

    public function delete(User $user, Item $item): bool
    {
        return $user->role == 'admin' || $user->role == 'accountant';
    }
}
