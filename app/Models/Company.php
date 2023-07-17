<?php

namespace App\Models;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        "preview",
        "name",
        "profession_id",
        "max_wages",
        "min_wages",
        "city_id",
        "address",
        "experience_id",
        "description",
        "type_of_employment_id",
        "schedule_id",
        "author_id",
    ];

    public function profession()
    {
        return $this->belongsTo(Profession::class, 'profession_id', 'id');
    }

    public function experience()
    {
        return $this->belongsTo(Experience::class, 'experience_id', 'id');
    }

    public function employment()
    {
        return $this->belongsTo(Employment::class, 'type_of_employment_id', 'id');
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function resume()
    {
        return $this->belongsToMany(Resume::class, 'company_resumes', 'company_id', 'resume_id');
    }



}
