<?php

namespace App\Http\Requests;

class MovieUpdateRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
        * Get the validation rules that apply to the request.
        *
        * @return array
        */
    public function rules()
    {
        return [
            'movie_name' => 'required'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'movie_name.required' => 'Movie name is required!'
        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            'movie_name' => 'trim|capitalize|escape|strip_tags'
        ];
    }
}
