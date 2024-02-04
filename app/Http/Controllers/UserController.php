<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = User::get();

        return response()->json([
            'users'=>$users,
        ]);
    }

    public function getUserById($id)
    {
        $users = User::where('id', $id)->first();

        return response()->json([
            'users'=>$users,
        ]);
    }

    public function store(Request $request)
    {
        $users = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "role" => "admin"
        ]);

        return response()->json([
            'message' => "Create Users Success"
        ]);
    }

    public function update(Request $request, $id)
    {
        $checkUsers = User::where('id', $id)->first();

        if (!$checkUsers) {
            return response()->json([
                'message' => "Users Not Found with id: ".$id
            ], 404);
        }
     
        $users = User::where('id', $id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => "Update user success",
        ]);
    }

    public function delete($id)
    {
        $users = User::where('id', $id)->delete();

        return response()->json([
            'message' => "Delete Users Success",
        ]);
    }
}
