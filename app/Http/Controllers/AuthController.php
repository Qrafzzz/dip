<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isFalse;

class AuthController extends Controller
{
    public const WORKER_ROLE = 1;
    public const EMPLOEYR_ROLE = 2;
    public const ADMIN_ROLE = 3;

    public function showLoginForm()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            "email" => ["required", "email", "string"],
            "password" => ["required"],

        ]);

        if (auth("web")->attempt($data)){
            $user = User::where('email', $request->email)->first();
        } else {
            return redirect(route("login"))->withErrors(["email" => "Пользователь не найден, либо данные введены не правильно"]);
        }


        return $this->getRedirect($user->role_id);
    }

    private function getRedirect(int $roleId)
    {
        if($roleId === self::EMPLOEYR_ROLE) {
            return redirect(route("employer"));
        } elseif ($roleId === self::ADMIN_ROLE){
            return redirect(route("profile"));
        }
        return redirect(route("home"));
    }

    public function logout()
    {
        auth("web")->logout();

        return redirect(route("home"));
    }

    public function showRegisterForm()
    {
        $genders = Gender::all();
        return view("auth.register", [
            "genders" => $genders,
        ]);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            "name" => ["required", "string"],
            "surname" => ["required", "string"],
            "email" => ["required", "email", "string", "unique:users,email"],
            "password" => ["required", "confirmed", "min:8"],
            "gender_id" => ["required", "string"],
        ]);

        $data['image'] = "default_user.png";

        $user = User::create([
            "name" => $data["name"],
            "surname" => $data["surname"],
            "email" => $data["email"],
            "password" => bcrypt($data["password"]),
            "gender_id" => $data["gender_id"],
            "role_id" => "1",
            "image" => $data['image'],
        ]);

        if($user) {
            auth("web")->login($user);
        }

        return redirect(route("home"));

    }

    public function registerWorker(Request $request)
    {
        $data = $request->validate([
            "name" => ["required", "string"],
            "surname" => ["required", "string"],
            "email" => ["required", "email", "string", "unique:users,email"],
            "password" => ["required", "confirmed", "min:8"],
            "gender_id" => ["required", "string"],
        ]);
        $data['image'] = "default_employer.png";
        $user = User::create([
            "name" => $data["name"],
            "surname" => $data["surname"],
            "email" => $data["email"],
            "password" => bcrypt($data["password"]),
            "gender_id" => $data["gender_id"],
            "role_id" => "2",
            "image" => $data['image'],
        ]);

        if($user) {
            auth("web")->login($user);
        }

        return redirect(route("employer"));

    }

    public function showRegisterFormWorker()
    {
        $genders = Gender::all();
        return view("auth.registerWorker", [
            "genders" => $genders,
        ]);
    }
}
