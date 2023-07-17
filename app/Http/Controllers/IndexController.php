<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\PostWorker;
use App\Models\Profession;
use App\Models\Resume;
use App\Models\User;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function index()
    {
        $employers = Company::orderBy("created_at", "DESC")-> limit(3)->get();
        $phpEmployers = Company::where("profession_id", 1)->orderBy("created_at", "DESC")-> limit(3)->get();
        $javaEmployers = Company::where("profession_id", 2)->orderBy("created_at", "DESC")-> limit(3)->get();
        $htmlEmployers = Company::where("profession_id", 3)->orderBy("created_at", "DESC")-> limit(3)->get();
        return view('welcome', [
            "employers" => $employers,
            "phpEmployers" => $phpEmployers,
            "javaEmployers" => $javaEmployers,
            "htmlEmployers" => $htmlEmployers,
            ]);
    }

    public function indexEmployer(Request $request)
    {
        $users = User::orderBy("created_at", "DESC")->get();
        $newResumes = Resume::orderBy("created_at", "DESC")-> limit(3)->get();
        $phpResumes = Resume::where("profession_id", 1)->orderBy("created_at", "DESC")-> limit(3)->get();
        $javaResumes = Resume::where("profession_id", 2)->orderBy("created_at", "DESC")-> limit(3)->get();
        $htmlResumes = Resume::where("profession_id", 3)->orderBy("created_at", "DESC")-> limit(3)->get();
        $professions = Profession::all();
        return view('employer',[
            "newResumes" => $newResumes,
            "phpResumes" => $phpResumes,
            "javaResumes" => $javaResumes,
            "htmlResumes" => $htmlResumes,
            "users" => $users,
            'user' => $request->user(),
            "professions" => $professions,
        ]);
    }

}
