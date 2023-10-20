<?php

namespace App\Policies;

use App\Models\Slide\Slide;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SlidePolicy
{
    public function list(User $user): bool
    {
        return $user->can('show slide list');
    }

    public function view(User $user): bool
    {
        return $user->can('show a slide');
    }

    public function create(User $user): bool
    {
        return $user->can('create new slide');
    }

    public function store(User $user): bool
    {
        return $user->can('store new slide');
    }

    public function edit(User $user): bool
    {
        return $user->can('edit a slide');
    }

    public function update(User $user): bool
    {
        return $user->can('update a slide');
    }

    public function destroy(User $user): bool
    {
        return $user->can('destroy a slide');
    }
}
