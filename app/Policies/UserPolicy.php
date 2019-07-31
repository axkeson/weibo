<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $currentUser
     * @param User $user
     *
     * @return bool
     */
    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id;
    }

    /**
     * @param User $currentUser
     * @param User $user
     *
     * @return bool
     */
    public function destroy(User $currentUser, User $user)
    {
        return $currentUser->is_admin && $currentUser->id != $user->id;
    }
}
