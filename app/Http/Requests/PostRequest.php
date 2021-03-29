<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Phpsa\LaravelApiController\Http\Request\Traits\MethodRules;

class PostRequest extends FormRequest
{

    use MethodRules;
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function commonRules()
    {
        //Only admins can set someone else as a user id
        $userIdRule = auth()->user()->hasRole('Admin') ? 'sometimes' : 'prohibited';

        return [
            'title'        => ['string'],
            'description'  => ['string'],
            'user_id'      => ['int',$userIdRule],
            'image'        => ['nullable'],
            'category_id'  => ['int', 'nullable'],
            'published_at' => ['date', 'nullable'],
        ];
    }

    public function storeRules()
    {

        return [
            'title'       => ['string','required'],
            'description' => ['string','required'],
        ];
    }

    public function publishRules()
    {
        return [
            'published_at' => ['required', 'date']
        ];
    }
}
