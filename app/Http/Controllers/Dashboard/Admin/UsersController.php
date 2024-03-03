<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    public function index()
    {



        //bring only users dosn't have a role admin
        $users = Cache::remember('non_admin_users', 60, function () {
            return User::whereDoesntHave('roles', function ($query) {
                $query->where('name', 'admin');
            })->get();
        });
        // dd($users);
        return view('dashboard.users.index', compact('users'));
    }

    public function update(User $user, Request $request)
    {
        $user->status = $request->status;
        $user->save();
        // dd($user);

        return Redirect::route('users.index')->with('success', 'user Updated Successfully');
    }
}
