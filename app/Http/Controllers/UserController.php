<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collections\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view("users", compact("users"));
    }

    public function create()
    {
        return view("createUser");
    }

    public function store(Request $request)
    {
        User::create($request->all());
        return redirect("user")->with("success", "User data saved successfully. :)");
    }

    public function edit($userId)
    {
        $user = User::find($userId);
        return view("editUser", compact("user", "userId"));
    }

    public function update(Request $request, $userId)
    {
        $user = User::find($userId);

        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->save();

        return redirect("user")->with("success", $request->name . "'s data updated successfully. :)");
    }

    public function destroy($userId)
    {
        $user = User::find($userId);
        $user->delete();

        return redirect("user")->with("success", $user->name . " removed successfully.");
    }
}
