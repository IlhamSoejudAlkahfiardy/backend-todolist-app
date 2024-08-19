<?php

namespace App\Http\Controllers;

use App\Models\tasks;
use App\Models\users;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    public function checkUser(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
        ]);

        $user = new users();

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->save();

        return response()->json(['message' => "User belum terdaftar", "user_id" => $user->id], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'category_id' => 'required',
        ]);

        $task = new tasks();

        $task->user_id = $request->user_id;
        $task->category_id = $request->category_id;
        $task->description = $request->description;
        $task->created_at = now();

        $task->save();

        // $test = $request->input('test');
        return response()->json(['message' => "ToDo List berhasil ditambahkan"], 201);
    }
}
