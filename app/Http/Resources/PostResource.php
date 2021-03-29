<?php

namespace App\Http\Resources;

use App\Http\Resources\UserResource;
use Phpsa\LaravelApiController\Http\Resources\ApiResource;

class PostResource extends ApiResource
{

    /**
     * Resources to be mapped (ie children).
     *
     * @var array|null
     */
    protected static $mapResources = [
        'user'     => UserResource::class,
        'category' => CategoryResource::class
    ];

    /**
     * Default fields to return on request.
     *
     * @var array|null
     */
    protected static $defaultFields = [
        "id",
        "title",
        "image",
        "description",
        "user_id",
        "category_id",
        "created_at",
        "updated_at",
        "published_at",
    ];

    /**
     * Allowable fields to be used.
     *
     * @var array|null
     */
    protected static $allowedFields = null;

    /**
     * Allowable scopes to be used.
     *
     * @var array|null
     */
    protected static $allowedScopes = [
        'scopeWithUnPublished',
        'withTrashed'
    ];

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
