<?php

namespace App\Http\Resources;

use Phpsa\LaravelApiController\Http\Resources\ApiCollection;

class CategoryResourceCollection extends ApiCollection
{
    /**
     * Transform the resource collection into an array.
     * Note that this could be an empty placeholder now.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
