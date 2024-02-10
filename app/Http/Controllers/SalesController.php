<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class SalesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'user_level' => 'required|integer',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->user_level = $request->user_level;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); 
        $user->save();

        return response()->json(['message' => 'User created successfully'], 201);
    }

     /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'user_level' => 'required|integer', 
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|string|min:8',
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->user_level = $request->user_level;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); 
        $user->save();

        return response()->json(['message' => 'User updated successfully'], 200);
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }

}
