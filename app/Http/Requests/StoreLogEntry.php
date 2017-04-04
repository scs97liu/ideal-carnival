<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLogEntry extends FormRequest
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
            'datetime' => 'required',
            'bg' => 'min:0|required_without_all:carbs,insulin.0,exercise,additional-notes',
            'carbs' => 'min:0',
            'insulin.0' => 'min:0',
            'insulin-types' => 'required_with:insulin.0',
            'exercise' => 'min:0',
            'exercise-intensity' => 'required_with:exercise',
        ];
    }

    public function messages()
    {
        return [
            'datetime.required' => 'Date and time are required',
            'bg.min' => 'Blood sugar can not be below 0',
            'bg.required_without_all' => 'You may not submit an empty log',
            'carbs.min' => 'Can not have negative carbohydrates',
            'insulin.0.min' => 'Can not have negative insulin',
            'insulin-types.required_with' => 'You must add a type of insulin',
            'exercise.min' => 'Can not have negative exercise',
            'exercise-intensity.required_with' => 'You must add how difficult your workout was'
        ];
    }


}
