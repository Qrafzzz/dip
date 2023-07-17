<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResumeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "profession_id" => ["required", "integer"],
            "wage" => ["required", "integer"],
            "description" => ["required", "string"],
            "city_id" => ["required", "integer"],
            "experience_id" => ["required", "integer"],
            "type_of_employment_id" => ["required", "integer"],
            "schedule_id" => ["required", "integer"],
        ];
    }
}
