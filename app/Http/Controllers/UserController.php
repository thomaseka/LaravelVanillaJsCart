<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
        return response()
            ->view("auth.login", [
                "title" => "Login"
            ]);
    }

    public function doLogin(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required']
            ],
            [
                'email.required' => 'Tolong masukan Email anda',
                'email.email' => 'Format Email tidak sesuai',
                'password.required' => 'Tolong isi Password anda'
            ]

        );

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            $level = $user->level;
            $isActive = $user->isActive;

            if ($isActive === 0) {
                Auth::logout();
                return redirect('/login')->with('error', 'Inactive User');
            }

            if ($level === 1) {
                return redirect('/admin')->with('success', 'Admin Login');
            } elseif ($level === 3) {
                return redirect('/')->with('success', 'User Login');
            }
        } else {
            return redirect('/login')->with('error', 'The provided credentials do not match our records.');
        }
    }

    public function register()
    {
        return view('auth.register', [
            'title' => 'Register',
        ]);
    }


    public function doRegister(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required',
                'email' => ['required', 'unique:users', 'email'],
                'password' => ['required', 'min:8'],
                'passwordConfirm' => ['required', 'same:password']
            ],
            [
                'name.required' => 'Tolong masukan Nama anda.',
                'email.required' => 'Tolong masukan Email anda.',
                'email.unique' => 'Email ini sudah digunakan.',
                'email.email' => 'Format Email tidak sesuai',
                'password.required' => 'Masukan Password anda.',
                'passwordConfirm.required' => 'Konfirmasi password anda.',
                'passwordConfirm.same' => 'Password tidak sama.'
            ]
        );

        $validated['password'] = Hash::make($request['password']);
        $validated['level'] = 3; // Ensure level 3 for common users
        $validated['isActive'] = 1; // Ensure user is active 

        $user = User::create($validated);
        if ($user) {
            return redirect('/login')->with('status', 'User Created Successfully');
        }
        return redirect('/register')->with('error', 'Registration Failed. Please try again.');
    }

    public function doLogout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');
    }


    // ADMIN
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // unique email update ignore
        // 'email' => [
        //         'required',
        //         'email',
        //         Rule::unique('users')->ignore($id),
        //         ]

    }
}
