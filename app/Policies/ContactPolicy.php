<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class ContactPolicy
{
    public function delete(User $user): bool
    {
        return $user->can('remove contact request');
    }

    public function view(User $user): bool
    {
        return $user->can('show contact content');
    }
}
