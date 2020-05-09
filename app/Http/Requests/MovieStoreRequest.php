<?php

namespace App\Http\Requests;

class MovieStoreRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //dd($this->segment(3));
        return [
            'movie_name' => 'required|unique:movies'
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
