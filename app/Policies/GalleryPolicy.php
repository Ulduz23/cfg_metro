<?php

namespace App\Policies;

use App\Models\Gallery\Gallery;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class GalleryPolicy
{
    public function view(User $user): bool
    {
        return $user->can('view any gallery item');
    }

    public function list(User $user): bool
    {
        return $user->can('show gallery list');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Gallery $gallery): bool
    {
        return $user->can('update a gallery item')
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function destroy(User $user, Gallery $gallery): bool
    {
        return $user->can('delete a gallery item');
    }

    public function store(User $user)
    {
        return $user->can('store new gallery item');
    }

    public function edit(User $user)
    {
        return $user->can('edit a gallery item');
    }
}
