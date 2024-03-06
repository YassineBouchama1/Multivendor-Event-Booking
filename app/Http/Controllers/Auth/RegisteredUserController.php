<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->file('image'));
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'address' => ['required'],
            'image' => ['nullable', 'image'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        //if regsiter for ogranzier validate name
        // if ($request->role === 'is_organizer') {
        //     $request->validate([
        //         'organizerName' => ['required', 'string', 'max:255', 'unique:' . User::class],
        //     ]);
        // }



        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);


        // //assign role for admin
        // $userRole = Role::findByName('admin');
        // $user->assignRole($userRole);




        if ($request->role === 'is_user') {
            // dd('has user');
            //assign role
            $userRole = Role::findByName('user');
            $user->assignRole($userRole);
        }
        if ($request->role === 'is_organizer') {
            //assign role & name organizer
            $userRole = Role::findByName('organizer');
            $user->assignRole($userRole);

            // $user->organizerName = $request->organizerName;
            // $user->save();
        }

        // update image if it passing with request
        if ($request->image) {
            $image = $request->file('image');
            // dd($image);
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('avatars'), $imageName);
            $user->image = $imageName;
            $user->save();
        } else {
            $user->image = 'a1.jpg';
            $user->save();
        }



        event(new Registered($user));

        // Auth::login($user);

        return redirect(RouteServiceProvider::LOGIN);
    }
}
