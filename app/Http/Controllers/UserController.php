<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Podcast;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User:: all();

        return view ('index', ['users' => $users]);

        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create', ['user'=> new User]);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:128'],
            'last_name' => ['required', 'max:128'],
            'password' => ['required', 'confirmed', Password::min(6)],
            'email'=>['required', 'email']
        ]);
        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);
        return redirect()->route('users.index')->with('message','User successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

        $podcasts = $user->podcasts;
        return view ('show', [
            'user' => $user,
            'podcasts' => $podcasts
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrfail($id);
        return view('users.edit', compact('user'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:128'],
            'last_name' => ['required', 'max:128'],
            'password' => ['required', 'confirmed', Password::min(6)],
            'email'=>['required', 'email']
        ]);
        $validated['password'] = Hash::make($validated['password']);
        User::whereId($id)->update($validated);
        return redirect()->route('users.index')->with('message','User successfully created');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->route('users.index');
        //
    }
}
