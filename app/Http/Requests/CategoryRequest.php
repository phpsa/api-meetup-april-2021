<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Note we could use this to check that the user is authorized to make this post request
        // I prefer the policies though.
        // this could be deleted
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required'
        ];
    }
}


/**
 * Note V3 of this package will have a rulesPost / rulesPut / RulesCommon option which is in development
 * this will allow you to use either the rules as it is now or extend and have a set of rules based on the request type.
 */
