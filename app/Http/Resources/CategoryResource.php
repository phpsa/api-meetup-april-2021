<?php

namespace App\Http\Resources;

use Phpsa\LaravelApiController\Http\Resources\ApiResource;

class CategoryResource extends ApiResource
{

    /**
     * Resources to be mapped (ie children).
     *
     * @var array|null
     */
    protected static $mapResources = null;

    /**
     * Default fields to return on request.
     *
     * @var array|null
     */
    protected static $defaultFields = [
        'id',
        'title'
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
        'withTrashed',
        'onlyTrashed'
    ];

    //our admin may need to restore deleted items.

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
