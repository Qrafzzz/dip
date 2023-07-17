<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateResumeRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use App\Models\CompanyResume;
use App\Models\Employment;
use App\Models\Experience;
use App\Models\Profession;
use App\Models\Resume;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
    public function index(Request $request)
    {
        $resumes = Resume::query();

        if ($request->has('search')) {
            $searchQuery = $request->input('search');
            $resumes->where(function($query) use ($searchQuery) {
                $query->whereHas('profession.category', function($query) use ($searchQuery) {
                    $query->where('name', 'LIKE', '%'.$searchQuery.'%');
                })
                    ->orWhereHas('profession', function($query) use ($searchQuery) {
                        $query->where('name', 'LIKE', '%'.$searchQuery.'%');
                    })
                    ->orWhere('description', 'LIKE', '%'.$searchQuery.'%');
            });
        }

        if ($request->has('cities')) {
            $resumes->whereIn('city_id', $request->input('cities'));
        }
        if ($request->has('professions')) {
            $resumes->whereIn('profession_id', $request->input('professions'));
        }
        if ($request->has('categories')) {
            $categoryIds = $request->input('categories');
            $professions = Profession::whereIn('category_id', $categoryIds)->pluck('id');
            $resumes->whereIn('profession_id', $professions);
        }
        if ($request->has('experiences')) {
            $resumes->whereIn('experience_id', $request->input('experiences'));
        }
        if ($request->has('employments')) {
            $resumes->whereIn('type_of_employment_id', $request->input('employments'));
        }
        if ($request->has('schedules')) {
            $resumes->whereIn('schedule_id', $request->input('schedules'));
        }

        $user = User::find(1);
        $categories = Category::with('professions')->get();
        $professions = Profession::all();
        $resumes = $resumes->paginate(10);
        $cities = City::orderBy("name", "DESC")->get();
        $experiences = Experience::all();
        $employments = Employment::all();
        $schedules = Schedule::all();
        return view('resume.index',[
            "resumes" => $resumes,
            "user" => $user,
            "categories" => $categories,
            "professions" => $professions,
            "cities" => $cities,
            "experiences" => $experiences,
            "employments" => $employments,
            "schedules" => $schedules,
        ]);
    }

    public function show($author_id)
    {

        $resume = Resume::where("author_id", $author_id)->first();
        $user = Auth::user();
        $companies = Company::where('author_id', $user->id)->get();
        $users = User::all();
        return view('resume.show', [
            "resume" => $resume,
            "users" => $users,
            "companies" => $companies,
        ]);
    }

    public function resume()
    {

        $resume = Resume::where("author_id", Auth::id())->first();
        $professions = Profession::all();
        $cities = City::all();
        $experiences = Experience::all();
        $employments = Employment::all();
        $schedules = Schedule::all();


        return view('profile.worker.resumeRemove',[
            "resume" => $resume,
            "professions" => $professions,
            "cities" => $cities,
            "experiences" => $experiences,
            "employments" => $employments,
            "schedules" => $schedules,
        ]);

    }

    public function updateResume(UpdateResumeRequest $request)
    {

        $data = $request->validated();

        Resume::updateOrCreate([
            "author_id" => Auth::id()
        ],
            [
                "profession_id" => $data["profession_id"],
                "wage" => $data["wage"],
                "description" => $data["description"],
                "city_id" => $data["city_id"],
                "experience_id" => $data["experience_id"],
                "type_of_employment_id" => $data["type_of_employment_id"],
                "schedule_id" => $data["schedule_id"],
            ]);

        return redirect(route("profile"));

    }

    public function addResponseResume(Request $request, $id)
    {

        $user = Auth::user();
        if ($user->company) {
            $data = $request->validate([
                "company_id" => ["required", "integer"],
            ]);
            $company = Company::find($data['company_id']);
            $existingResponse = CompanyResume::where([
                'company_id' => $company->id,
                'resume_id' => $id,
                'status_id' => '1',
            ])->exists();
            if ($existingResponse) {
                return back()->with('error', 'Вы уже отправили свою вакансию');
            }
            $companyResume = CompanyResume::create([
                'resume_id' => $id,
                'company_id' => $data['company_id'],
                'status_id' => '1',
            ]);

            return back()->with('success', 'Вакансия отправлена');

        }
        else{
            return redirect(route("companyRemove"));
        }



    }
}
