<?php

namespace App\Http\Resources;

use Phpsa\LaravelApiController\Http\Resources\ApiCollection;

class PostResourceCollection extends ApiCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
