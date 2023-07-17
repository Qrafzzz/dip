<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            "preview" => ["required", "string"],
            "name" => ["required", "string"],
            "profession_id" => ["required", "integer"],
            "max_wages" => ["required", "integer"],
            "min_wages" => ["nullable", "integer"],
            "city_id" => ["required", "integer"],
            "address" => ["required", "string"],
            "experience_id" => ["required", "integer"],
            "description" => ["required", "string"],
            "type_of_employment_id" => ["required", "integer"],
            "schedule_id" => ["required", "integer"],
            "author_id" => ["nullable", "integer"],
        ];
    }
}
