<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;
    // ?User - ha guest is lathatja
    public function update(User $user, Post $post)
    {
        return $post->owner_id == $user->id;
    }


}
