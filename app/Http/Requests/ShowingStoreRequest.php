<?php

namespace App\Http\Requests;

class ShowingStoreRequest extends BaseFormRequest
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
        return [
            'show_time' => 'required|date_format:Y-m-d H:i:s',
            'movie_id' => 'required|numeric|exists:movies,id',
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
            'show_time.required' => 'Show Time is required!',
            'movie_id.required' => 'Movie ID is required!'
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
            'show_time' => 'trim|escape|strip_tags',
            'movie_id' => 'trim|digit|escape|strip_tags'
        ];
    }
}
