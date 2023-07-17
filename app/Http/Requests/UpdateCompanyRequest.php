<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends CompanyRequest
{
    public function rules(): array
    {
        $rules = parent::rules();
        $rules["preview"] = ["required", "string"];
        $rules["name"] = ["required", "string"];
        $rules["profession_id"] = ["required", "integer"];
        $rules["max_wages"] = ["nullable", "integer"];
        $rules["min_wages"] = ["required", "integer"];
        $rules["city_id"] = ["required", "integer"];
        $rules["address"] = ["required", "string"];
        $rules["experience_id"] = ["required", "integer"];
        $rules["description"] = ["required", "string"];
        $rules["type_of_employment_id"] = ["required", "integer"];
        $rules["schedule_id"] = ["required", "integer"];

        return $rules;

    }
}
