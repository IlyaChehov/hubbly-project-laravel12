<?php

namespace App\Observers;

use App\Models\Role;
use App\Models\User;

class UserObserver
{
    public function created(User $user): void
    {
        $user->profile()->create();
        $roleUser = Role::where('title', '=', Role::ROLE_USER)->first();

        if ($roleUser) {
            $user->roles()->attach($roleUser->id);
        }
    }
}
