<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CityRequest;
use App\Http\Requests\ProfessionRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Http\Requests\UpdateProfessionRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Company;
use App\Models\Profession;
use App\Models\Resume;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function users()
    {
        $users = User::all();

        return view('profile.admin.layout.users', [
            "users" => $users,
        ]);
    }

    public function company()
    {
        $companies = Company::all();

        return view('profile.admin.layout.company', [
            "companies" => $companies,
        ]);
    }

    public function resume()
    {
        $resumes = Resume::all();

        return view('profile.admin.layout.resume', [
            "resumes" => $resumes,
        ]);
    }

    public function profession()
    {
        $professions = Profession::all();
        $categories = Category::all();

        return view('profile.admin.layout.profession', [
            "professions" => $professions,
            "categories" => $categories,
        ]);
    }

    public function createProfession(ProfessionRequest $request)
    {
        $data = $request->validated();

        Profession::create([
            "name" => $data["name"],
            "category_id" => $data["category_id"],
        ]);

        return redirect(route("profession"));
    }

    public function editProfession($name)
    {
        $categories = Category::all();
        $profession = Profession::where("name", $name)->first();

        return view('profile.admin.table.partials.editProfession', [
            "profession" => $profession,
            "categories" => $categories,
        ]);

    }

    public function updateProfessionSubmit(UpdateProfessionRequest $request, $id)
    {
        $data = Profession::findOrFail($id);

        $data->name = $request->input('name');
        $data->category_id = $request->input('category_id');

        $data->update();

        return redirect(route("profession"));
    }

    public function removeProfession($id)
    {
        Profession::find($id)->delete();
        return redirect(route("profession"));
    }

    public function category()
    {
        $categories = Category::all();

        return view('profile.admin.layout.category', [
            "categories" => $categories,
        ]);
    }

    public function createCategory(CategoryRequest $request)
    {
        $data = $request->validated();

        Category::create([
            "name" => $data["name"],
        ]);

        return redirect(route("category"));
    }

    public function editCategory($name)
    {
        $category = Category::where("name", $name)->first();

        return view('profile.admin.table.partials.editCategory', [
            "category" => $category,
        ]);

    }

    public function updateCategorySubmit(UpdateCategoryRequest $request, $id)
    {
        $data = Category::findOrFail($id);

        $data->name = $request->input('name');

        $data->update();

        return redirect(route("category"));
    }

    public function removeCategory($id)
    {
        Category::find($id)->delete();
        return redirect(route("category"));
    }

    public function city()
    {
        $cities = City::all();

        return view('profile.admin.layout.city', [
            "cities" => $cities,
        ]);
    }

    public function createCity(CityRequest $request)
    {
        $data = $request->validated();

        City::create([
            "name" => $data["name"],
        ]);

        return redirect(route("city"));
    }

    public function editCity($name)
    {
        $city = City::where("name", $name)->first();

        return view('profile.admin.table.partials.editCity', [
            "city" => $city,
        ]);

    }

    public function updateCitySubmit(UpdateCityRequest $request, $id)
    {
        $data = City::findOrFail($id);

        $data->name = $request->input('name');

        $data->update();

        return redirect(route("city"));
    }

    public function removeCity($id)
    {
        City::find($id)->delete();
        return redirect(route("city"));
    }
}
