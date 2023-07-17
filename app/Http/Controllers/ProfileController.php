<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\City;
use App\Models\Company;
use App\Models\CompanyResume;
use App\Models\Employment;
use App\Models\Experience;
use App\Models\Gender;
use App\Models\Profession;
use App\Models\Resume;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {
        $users = User::orderBy("created_at", "DESC")->get();
        $genders = Gender::all();
        $resumes = Resume::orderBy("created_at", "DESC")->get();
        $companies = Company::orderBy("created_at", "DESC")->get();


        return view('profile.profile', [
            "users" => $users,
            'user' => $request->user(),
            "genders" => $genders,
            "resumes" => $resumes,
            "companies" => $companies,

        ]);
    }

    public function profileResumeEm(Request $request)
    {
        $user = Auth::user();
        $companyResumes = CompanyResume::orderBy("created_at", "DESC")->whereHas("company", function(Builder $query) use ($user) {
            $query->where("author_id", $user->id);
        })->where('status_id', 1)->paginate(5);

        return view('profile.employer.layout.resume',[
            'user' => $request->user(),
        ], compact('companyResumes'));
    }

    public function profileCompanyEm(Request $request)
    {
        $user = Auth::user();
        $companyResumes = CompanyResume::orderBy("created_at", "DESC")->whereHas("company", function(Builder $query) use ($user) {
            $query->where("author_id", $user->id);
        })->where('status_id', 2)->paginate(5);

        return view('profile.employer.layout.company',[
            'user' => $request->user(),
        ], compact('companyResumes'));
    }

    public function profileResumeRe(Request $request)
    {
        $user = Auth::user();
        $companyResumes = CompanyResume::orderBy("created_at", "DESC")->whereHas("resume", function(Builder $query) use ($user) {
            $query->where("author_id", $user->id);
        })->where('status_id', 2)->paginate(5);

        return view('profile.worker.layout.company',[
            'user' => $request->user(),
        ], compact('companyResumes'));
    }

    public function profileCompanyRe(Request $request)
    {
        $user = Auth::user();
        $companyResumes = CompanyResume::orderBy("created_at", "DESC")->whereHas("resume", function(Builder $query) use ($user) {
            $query->where("author_id", $user->id);
        })->where('status_id', 1)->paginate(5);

        return view('profile.worker.layout.resume',[
            'user' => $request->user(),
        ], compact('companyResumes'));
    }

    public function createCompany (UpdateCompanyRequest $request)
    {
        $data = $request->validated();

        Company::create([

            "preview" => $data["preview"],
            "name" => $data["name"],
            "profession_id" => $data["profession_id"],
            "min_wages" => $data["min_wages"],
            "max_wages" => $data["max_wages"],
            "city_id" => $data["city_id"],
            "address" => $data["address"],
            "experience_id" => $data["experience_id"],
            "description" => $data["description"],
            "type_of_employment_id" => $data["type_of_employment_id"],
            "schedule_id" => $data["schedule_id"],
            "author_id" => Auth::id()
        ]);

        return redirect(route("profile"));
    }

    public function companyAll()
    {
        $user = Auth::user();
        $companies = Company::where('author_id', $user->id)->get();

        return view('profile.employer.companyAll',[
            "companies" => $companies,

        ]);
    }

    public function companyUpdate($id)
    {
        $company = Company::where('id', $id)->first();
        $professions = Profession::all();
        $experiences = Experience::all();
        $employments = Employment::all();
        $schedules = Schedule::all();
        $cities = City::all();

        return view('profile.employer.layout.companyUpdate',[
            "company" => $company,
            "professions" => $professions,
            "experiences" => $experiences,
            "employments" => $employments,
            "schedules" => $schedules,
            "cities" => $cities,
        ]);
    }

    public function companyUpdateSubmit(UpdateCompanyRequest $request, $id)
    {
        $data = Company::findOrFail($id);

        $data->preview = $request->input('preview');
        $data->name = $request->input('name');
        $data->profession_id = $request->input('profession_id');
        $data->min_wages = $request->input('min_wages');
        $data->max_wages = $request->input('max_wages');
        $data->city_id = $request->input('city_id');
        $data->address = $request->input('address');
        $data->experience_id = $request->input('experience_id');
        $data->description = $request->input('description');
        $data->type_of_employment_id = $request->input('type_of_employment_id');
        $data->schedule_id = $request->input('schedule_id');

        $data->update();

        return redirect(route("companyAll"));
    }

    public function deleteCompany($id)
    {
        Company::find($id)->delete();
        return redirect(route("companyAll"));
    }

    public function profileUpdate(UpdateUserProfileRequest $request): RedirectResponse
    {
        $user = $request->user()->fill($request->validated());

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('public/users');
            $user['image'] = str_replace('public/users/', '', $path);
        }

        $request->user()->save();

        return redirect()->route('profile')->with('status', 'profile-updated');
    }

}
