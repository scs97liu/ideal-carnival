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
            'bg' => 'min:0|required_with:bg-note|required_without_all:carbs,insulin.0,exercise,additional-notes',
            'carbs' => 'min:0|required_with:carb-note',
            'carbs' => 'min:0|required_with:carb-note',
            'insulin.0' => 'min:0|required_with:medication-note',
            'insulin-types' => 'required_with:insulin.0',
            'exercise' => 'min:0|required_with:exercise-note',
            'exercise-intensity' => 'required_with:exercise',
        ];
    }

    public function messages()
    {
        return [
            'datetime.required' => 'Date and time are required',
            'bg.min' => 'Blood sugar can not be below 0',
            'bg.required_with' => 'You may not add a note on a blood sugar that does not exist',
            'bg.required_without_all' => 'You may not submit an empty log',
            'carbs.min' => 'Can not have negative carbohydrates',
            'carbs.required_with' => 'You may not add a note on carbohydrates that do not exist',
            'insulin.0.min' => 'Can not have negative insulin',
            'insulin.0.required_with' => 'You may not add a note on insulin that does not exist',
            'insulin-types.required_with' => 'You must add a type of insulin',
            'exercise.min' => 'Can not have negative exercise',
            'exercise.required_with' => 'You may not add a note on exercise that does not exist',
            'exercise-intensity.required_with' => 'You must add how difficult your workout was'
        ];
    }


}
