<?php

namespace App\Http\Requests;

class BookingUpdateRequest extends BaseFormRequest
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
            'showing_id' => 'required|exists:showings,id',
            'number_of_seats' => 'required|numeric|min:1|max:10'
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
            'showing_id.required' => 'showing id is required!',
            'number_of_seats.max' => 'max number of seats needs to be 10 !',

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
            'showing_id' => 'trim|digit|escape',
            'number_of_seats' => 'trim|digit|escape',
        ];
    }
}
