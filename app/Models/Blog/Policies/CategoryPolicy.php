<?php

namespace App\Models\Blog\Policies;

use App\Models\Blog\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
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
        return true; //Note teh?User to allow public access to this
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Blog\Category  $category
     * @return mixed
     */
    public function view(?User $user, Category $category)
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
        return $user->can('blog-category-create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Blog\Category  $category
     * @return mixed
     */
    public function update(User $user, Category $category)
    {
        return $user->can('blog-category-update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Blog\Category  $category
     * @return mixed
     */
    public function delete(User $user, Category $category)
    {
        return $user->can('blog-category-delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Blog\Category  $category
     * @return mixed
     */
    public function restore(User $user, Category $category)
    {
        return $user->can('blog-category-restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Blog\Category  $category
     * @return mixed
     */
    public function forceDelete(User $user, Category $category)
    {
        return false; //no force deleting
    }

    /**
     * Add query to the index (getall) endpoint for this endpoint call.
     *
     * @param \App\Model\User $user
     * @param mixed $builder
     *
     * @return void
     */
    public function qualifyCollectionQueryWithUser(User $user, $builder): void
    {
        //explain this before removing it.
        //relate it to a global scope
    }

    /**
     * Add query to the show (get) endpoint for this endpoint call.
     *
     * @param \App\Model\User $user
     * @param mixed $builder
     *
     * @return void
     */
    public function qualifyItemQueryWithUser(User $user, $builder): void
    {
        // tied to above
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
        //how this could be used to autmatically add fields to an insert!
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
        //as above
        return $data;
    }
}
