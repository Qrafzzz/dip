<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function editUser($email)
    {
        $roles = Role::all();
        $user = User::where("email", $email)->first();

        return view('profile.admin.table.partials.editUser', [
            "user" => $user,
            "roles" => $roles,
        ]);
    }

    public function updateUserSubmit(UpdateUserRequest $request, $id)
    {
        $data = User::findOrFail($id);

        $data->surname = $request->input('surname');
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->role_id = $request->input('role_id');

        $data->update();

        return redirect(route("profile"));
    }
}
