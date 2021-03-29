<?php

namespace App\Models\Blog\Policies;

use App\Models\Blog\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
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
     * @param  \App\Models\Blog\Post  $post
     * @return mixed
     */
    public function view(?User $user, Post $post)
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
        return $user->can('blog-post-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Blog\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        return $user->can('blog-post-update') || $user->can('manage_own_post', $post);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Blog\Post  $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        return $user->can('blog-post-delete') || $user->can('manage_own_post', $post);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Blog\Post  $post
     * @return mixed
     */
    public function restore(User $user, Post $post)
    {
        return $user->can('blog-post-restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Blog\Post  $post
     * @return mixed
     */
    public function forceDelete(User $user, Post $post)
    {
        return false;
    }

    /**
     * Add query to the index (getall) endpoint for this endpoint call.
     *
     * @param \App\Model\User $user
     * @param mixed $builder
     *
     * @return void
     */
    public function qualifyCollectionQueryWithUser(?User $user, $builder): void
    {
        //
    }

    /**
     * Add query to the show (get) endpoint for this endpoint call.
     *
     * @param \App\Model\User $user
     * @param mixed $builder
     *
     * @return void
     */
    public function qualifyItemQueryWithUser(?User $user, $builder): void
    {
        //
    }

    /**
     * allows you to manipulate the data for the store endpoint
     *
     * @param \App\Model\User $user
     * @param array $data
     *
     * @return array
     */
    public function qualifyStoreDataWithUser(User $user, array $data): array
    {
        if (! isset($data['user_id']) || empty($data['user_id'])) {
            $data['user_id'] = auth()->user()->id;
        }
        return $data;
    }

    /**
     * allows you to manipulate the data for the update endpoint
     *
     * @param \App\Model\User $user
     * @param array $data
     *
     * @return array
     */
    public function qualifyUpdateDataWithUser(User $user, array $data): array
    {
        return $data;
    }
}
