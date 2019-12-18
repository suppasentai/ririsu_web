<?php

namespace App\Policies;

use App\User;
use App\Release;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReleasePolicy
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

    public function create(User $user){
        return $user->hasAccess(['release.create']);
    }

    public function update(User $user, Release $release){
        return $user->hasAccess(['release.update']) or $user->id == $release->user_id;
    }

    public function publish(User $user){
        return $user->hasAccess(['release.publish']);
    }

    public function draft(User $user){
        return $user->hasAccess(['release.draft']);
    }
}
