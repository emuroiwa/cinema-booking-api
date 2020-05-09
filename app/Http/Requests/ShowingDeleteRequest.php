<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShowingDeleteRequest extends FormRequest
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
            'customer_id' => 'required|exists:customers,id',
            'showing_id' => 'required|exists:showings,id'
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
            'customer_id.required' => 'Customer id is required!',
            'showing_id.required' => 'showing id is required!',
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
            'customer_id' => 'trim|digit|escape',
            'showing_id' => 'trim|digit|escape',
        ];
    }
}
