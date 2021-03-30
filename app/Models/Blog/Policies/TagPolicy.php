<?php

namespace App\Models\Blog\Policies;

use App\Models\Blog\Tag;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TagPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Blog\Tag  $tag
     * @return mixed
     */
    public function view(?User $user, Tag $tag)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('blog-tag-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Blog\Tag  $tag
     * @return mixed
     */
    public function update(User $user, Tag $tag)
    {
        return $user->can('blog-tag-update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Blog\Tag  $tag
     * @return mixed
     */
    public function delete(User $user, Tag $tag)
    {
        return $user->can('blog-tag-delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Blog\Tag  $tag
     * @return mixed
     */
    public function restore(User $user, Tag $tag)
    {
        return $user->can('blog-tag-restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Blog\Tag  $tag
     * @return mixed
     */
    public function forceDelete(User $user, Tag $tag)
    {
        return false;
    }
}
