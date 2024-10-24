<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetAvailableCarsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'start_time' => 'required|date_format:d.m.Y H:i',
            'end_time' => 'required|date_format:d.m.Y H:i|after:start_time',
            'comfort_category_id' => 'sometimes|exists:comfort_categories,id',
            'model' => 'sometimes|alpha_num',
        ];
    }
}
