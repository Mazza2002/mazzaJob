<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //
    public function create()
    {
        return view('user.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $formField = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);
        $formField['password'] = bcrypt($formField['password']);
        $user = User::create($formField);


        Auth::login($user);
        return redirect('/')->with('message', 'User create and logged in !');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    // show user form 
    public function login()
    {
        return view('user.login');
    }
    // authenticate user
    /*
    $user = User::where('email', $request->email)->first();
if ($user && Hash::check($request->password, $user->password)) {
    Auth::login($user);
    return redirect('/')->with('message', 'You are now logged in!');
} else {
    return back()->withErrors(['email' => 'Invalid credentials']);
}
     */
    public function authenticate(Request $request)
    {
        $formField = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($formField)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'you are now logged in !');
        } else {
            return back()->withErrors(['email' => 'Somthing is wrrong ! '])->onlyInput('email');
        }
    }
}
