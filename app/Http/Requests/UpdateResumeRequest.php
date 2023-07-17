<?php

namespace App\Http\Requests;

class UpdateResumeRequest extends ResumeRequest
{
    public function rules(): array
    {
        $rules = parent::rules();
        $rules["profession_id"] = ["required", "integer"];
        $rules["wage"] = ["required", "integer"];
        $rules["description"] = ["required", "string"];
        $rules["city_id"] = ["required", "integer"];
        $rules["experience_id"] = ["required", "integer"];
        $rules["type_of_employment_id"] = ["required", "integer"];
        $rules["schedule_id"] = ["required", "integer"];

        return $rules;

    }
}
