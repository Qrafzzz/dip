<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCompanyRequest;
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

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $employers = Company::query();

        if ($request->has('search')) {
            $searchQuery = $request->input('search');
            $employers->where(function($query) use ($searchQuery) {
                $query->whereHas('profession.category', function($query) use ($searchQuery) {
                    $query->where('name', 'LIKE', '%'.$searchQuery.'%');
                })
                    ->orWhereHas('profession', function($query) use ($searchQuery) {
                        $query->where('name', 'LIKE', '%'.$searchQuery.'%');
                    })
                    ->orWhere('description', 'LIKE', '%'.$searchQuery.'%')
                    ->orWhere('preview', 'LIKE', '%'.$searchQuery.'%');
            });
        }

        if ($request->has('cities')) {
            $employers->whereIn('city_id', $request->input('cities'));
        }
        if ($request->has('professions')) {
            $employers->whereIn('profession_id', $request->input('professions'));
        }
        if ($request->has('categories')) {
            $categoryIds = $request->input('categories');
            $professions = Profession::whereIn('category_id', $categoryIds)->pluck('id');
            $employers->whereIn('profession_id', $professions);
        }
        if ($request->has('experiences')) {
            $employers->whereIn('experience_id', $request->input('experiences'));
        }
        if ($request->has('employments')) {
            $employers->whereIn('type_of_employment_id', $request->input('employments'));
        }
        if ($request->has('schedules')) {
            $employers->whereIn('schedule_id', $request->input('schedules'));
        }

        $user = User::find(1);
        $categories = Category::with('professions')->get();
        $professions = Profession::all();
        $employers = $employers->paginate(10);
        $cities = City::orderBy("name", "DESC")->get();
        $experiences = Experience::all();
        $employments = Employment::all();
        $schedules = Schedule::all();
        return view('employer.index',[
            "employers" => $employers,
            "user" => $user,
            "categories" => $categories,
            "professions" => $professions,
            "cities" => $cities,
            "experiences" => $experiences,
            "employments" => $employments,
            "schedules" => $schedules,
        ]);
    }

    public function show($id)
    {
        $employer = Company::where("id", $id)->first();
        $users = User::all();
        return view('employer.show', [
            "employer" => $employer,
            "users" => $users,
        ]);
    }

    public function company()
    {
        $company = Company::where("author_id", Auth::id())->first();
        $professions = Profession::all();
        $experiences = Experience::all();
        $employments = Employment::all();
        $schedules = Schedule::all();
        $cities = City::all();

        return view('profile.employer.companyCreate',[
            "company" => $company,
            "professions" => $professions,
            "experiences" => $experiences,
            "employments" => $employments,
            "schedules" => $schedules,
            "cities" => $cities,
        ]);
    }

    public function addResponseCompany($id)
    {
            $user = Auth::user();
        if ($user->resume) {
            $resume = $user->resume()->first();
            $existingResponse = CompanyResume::where([
                'company_id' => $id,
                'resume_id' => $resume->id,
                'status_id' => '2',
            ])->exists();
            if ($existingResponse) {
                return back()->with('error', 'Вы уже отправили свое резюме в данную компанию');
            }
            $companyResume = CompanyResume::create([
                'company_id' => $id,
                'resume_id' => $resume->id,
                'status_id' => '2',
            ]);
            return back()->with('success', 'Резюме отправлено');
        }
        else{
            return redirect(route("resumeRemove"));
        }
    }





}
