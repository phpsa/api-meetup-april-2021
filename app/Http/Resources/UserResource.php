<?php

namespace App\Http\Resources;

use Phpsa\LaravelApiController\Http\Resources\ApiResource;

class UserResource extends ApiResource
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
        'name'
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
    protected static $allowedScopes = null;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $data = parent::toArray($request);
        $data['roles'] = collect($data['roles'])->map(fn($role) => $role['name'])->toArray();
        return $data;
    }
}
