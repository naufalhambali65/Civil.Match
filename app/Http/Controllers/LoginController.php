<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\JobSeeker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('homepage.login.index');
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'login-email' => 'required|email:dns',
            'login-password' => 'required'
        ]);

        $credentials = ['email' => $validatedData['login-email'], 'password' => $validatedData['login-password']];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin')->with('success', 'Login Success!');
        }

        return back()->with('error', 'Login Failed!');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'user_role' => 'required|in:company,jobseeker',
            'password' => 'required|min:5|max:255',
            'confirm-password' => 'required|same:password|min:5|max:255'
        ]);

        $userData = User::create($validatedData);

        $data = [
            'user_id' => $userData->id,
        ];
        if ($validatedData['user_role'] == 'jobseeker') {
            JobSeeker::create($data);
        } else if ($validatedData['user_role'] == 'company') {
            Company::create($data);
        }

        return redirect('/login')->with('success', 'Registration Success!, Please Login!');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->intended('/login')->with('success', 'Logout Success!');
    }
}
