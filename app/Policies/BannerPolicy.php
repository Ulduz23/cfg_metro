<?php

namespace App\Policies;

use App\Models\Banner\Banner;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BannerPolicy
{
    public function create(User $user): bool
    {
        return $user->can('create new banner');
    }

    public function store(User $user): bool
    {
        return $user->can('store new banner');
    }

    public function edit(User $user): bool
    {
        return $user->can('edit a banner');
    }

    public function update(User $user): bool
    {
        return $user->can('update a banner');
    }

    public function list(User $user): bool
    {
        return $user->can('list banners');
    }

    public function view(User $user): bool
    {
        return $user->can('view a banner');
    }

    public function activate(User $user)
    {
        return $user->can('change banner status');
    }

    public function deactivate(User $user)
    {
        return $user->can('change banner status');
    }
}
