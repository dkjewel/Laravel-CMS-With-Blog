<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function index()
    {
        return view('backend.user.index')->with('users', User::all()->except(Auth::id()));

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit(User $user)
    {
        return view('backend.user.edit')->with('user', $user);
    }


    public function update(Request $request, User $user)
    {

        $user->update([
            'role' => $request->role
        ]);

        session()->flash('success', 'User Role Updated Successfully.');
        return redirect(route('user.index'));
    }


    public function destroy(User $user)
    {
        $user->delete();

        session()->flash('success', 'User Deleted Successfully.');
        return redirect(route('user.index'));
    }
}
